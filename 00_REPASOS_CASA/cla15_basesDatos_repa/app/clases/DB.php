<?php

namespace utilidades_repa;

class DB
{
//atributo de la clase \mysqli
    private \mysqli $con;

    public function __construct()
    {
        //Recogemos datos conexion de fichero .env
        $host = $_ENV['HOST'];
        $usuario = $_ENV['USER_'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASE'];
        $port = $_ENV['PORT_MYSQL'];
        //Realizamos la conexión
        try {
            $this->con = new \mysqli($host, $usuario, $password, $database, $port);
        } catch (\mysqli_sql_exception $e) {
            //recogemos error, matamos programa
            die ("Error conectando: " . $e->getMessage());
        }

    }

    /**Valida las credenciales que introduce el usuario comparandolas con las almacendas en la Base de Datos
     * @param string $usuario Nombre del usuario
     * @param string $password Contraseña a validar, y descifrar
     * @return bool True si las credenciales son validas
     *
     */
    public function validar_usuario(string $usuario, string $password): bool
    {
        //SEGURIDAD: preparamos la sentencia para evitar inyecciones de código
        //interrogantes donde pondremos las variables
        $sentencia = <<<FIN
                        SELECT password FROM usuarios
                        WHERE  nombre = ?;
FIN;
        try {
            //preparar la sentencia
            $stmt = $this->con->stmt_init();
            //metemos el string ($sentencia) con el select
            $stmt->prepare($sentencia);
            //tipo de variable y la variable
            $stmt->bind_param("s", $usuario);
            //ejecutamos la sentencia
            $stmt->execute();
            //comando necesario para ejecutar en DB.
            $stmt->store_result();
            //ENCRIPTACION PASS: verificacion pass encriptada. extraer la fila de la DB (firma hash)
            //establecemos var donde recoger la hash (pass) de la DB
            $stmt->bind_result($pass_database);
            $stmt->fetch(); //recoge primera fila
            //verificamos pass introducida coincide con la firma hash guardada en la DB
            return password_verify($password, $pass_database);
        } catch (\mysqli_sql_exception $e) {
            return "error (miaU): " . $e->getMessage();
        }


    }

    /**
     * Inserta un nuevo usuario en la base de datos con el nombre de usuario y la contraseña proporcionados.
     * La contraseña se encripta utilizando el método de encriptación BCRYPT.
     *
     * @param string|null $usuario Nombre del nuevo usuario.
     * @param string|null $password Contraseña del nuevo usuario.
     * @return string Devuelve string con mensaje de confirmación o error.
     */
    public function insertar_usuario(string|null $usuario, string|null $password): string
    {
        //Encriptación de la password. (BCRYPT: método de encriptación)
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sentencia = <<<FIN
            INSERT INTO usuarios (nombre,password) 
            VALUES (?,?)
FIN;
        try {
            //Preparamos la sentencia
            $stmt = $this->con->stmt_init();
            $stmt->prepare($sentencia);
            $stmt->bind_param("ss", $usuario, $password);
            $stmt->execute();
            $stmt->store_result();
            //Devolvemos mensaje de confirmación si la insercción ha sido correcta.
            return ($stmt->affected_rows == 1) ? "Insercion correcta $usuario" : "Error en insercion";
            //recogemos error sql en la insercción en la tabla 'usuario'
        } catch (\mysqli_sql_exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Obtiene la información de todas las familias almacenadas en la base de datos.
     * @return array|string Un array asociativo con la información de las familias o un mensaje de error en caso de fallo.
     */
    public function obtener_familias(): array|string
    {
        $sentencia = "SELECT * FROM familia;";
        try {
            //Devuelve objeto mysqli_result
            $rtdo = $this->con->query($sentencia);
            /*RECOGIDA RESULTADO 2 POSIBILIDADES:
                1. Fetch_all recoge todas las filas en un array indexado.
                2. While (fetch_asociativo) creamos array indexado de array asociativo
                    con nombre de los campos .
            */
            //return $rtdo->fetch_all();
            //return $rtdo->fetch_assoc(); //solo devuelve una linea
            while ($rtdo->fetch_assoc()) {
                $familias[] = $rtdo->fetch_assoc();
            }
            return $familias;
        } catch (\mysqli_sql_exception $e) {
            return "Error SQL: " . $e->getMessage();
        }
    }

    /**
     *   Obtiene la información de los productos a partir de un codigo, o bien el del propio producto o el de su familia.* @param string $codigo
     * @param $codigo El código del cual haremos la consulta.
     * @param $tipo Especifiar si el codigo es de la familia o el del producto.
     * @return array|string  Un array asociativo con la información del producto(codigo_producto, nombre, despcripcion, pvp) o un mensaje de error en caso de fallo
     */
    public function obtener_productos(string $codigo, string $tipo): array|string
    {
        $productos = [];
        $sentencia = '';
//dependiendo de tipo de codigo elegimos una sentencia u otra
        switch ($tipo) {
            case "familia":
                $sentencia = <<<FIN
SELECT cod, nombre_corto, descripcion, PVP, familia FROM producto
WHERE familia = ?
FIN;
                break;
            case "producto":
                $sentencia = <<<FIN
SELECT cod, nombre_corto, descripcion, PVP, familia FROM producto
WHERE cod = ?
FIN;
                break;
        }

        try {
            //Preparamos sentencia
            $stmt = $this->con->stmt_init();
            $stmt->prepare($sentencia);
            $stmt->bind_param("s", $codigo);
            $stmt->execute();
            $stmt->store_result();
            //Definimos las variables donde recogeremos los campos de la consulta
            $stmt->bind_result($cod, $nom, $descripcion, $pvp, $familia);
            //con 'fetch()' recojo una fila y creo un array asociativo con los valores de las variables recogidas en la consulta ($var, $nom, $pvp
            while ($stmt->fetch()) {
                //será un array indexado de array asociativo con las variables
                $productos[] = ["cod" => $cod, "nombre" => $nom, "descripcion" => $descripcion, "PVP" => $pvp, "familia" => $familia];
            }
        } catch (\mysqli_sql_exception $e) {
            return "Error SQL: " . $e->getMessage();

        } //finally{}: sección del código que se ejecuta siempre despues de try or catch
        finally {
            return $productos;
        }
    }

    /**
     * Actualiza el producto en la base de datos
     * @param string $nombre
     * @param string $descripcion
     * @param string $pvp
     * @param string $cod_producto
     * @return bool
     */
    public function actualizar_producto(string $nombre, string $descripcion, string $pvp, string $cod_familia, string $cod_producto): bool
    {
        $nombre = trim($nombre);
        if ($nombre !== '') {
            $sentencia = <<<FIN
UPDATE producto
SET nombre_corto = ?, descripcion = ?, PVP = ?,  familia = ?
WHERE cod = ?
FIN;
            //ponemos las variables
            $stmt = $this->con->stmt_init();
            $stmt->prepare($sentencia);
            $stmt->bind_param("sssss", $nombre, $descripcion, $pvp, $cod_familia, $cod_producto);
            $stmt->execute();
            return $stmt->store_result();
        } else
            return false;
    }
}