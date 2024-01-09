<?php

namespace Utilidades;

class DB
{
    private \mysqli $con; //indicarle \ mysqli del sistema.

    public function __construct()

    {
        //especificamos en fichero .env /usar libreria phpdotenv
        $host = $_ENV['HOST'];
        $user = $_ENV['USER_'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASE'];
        $port = $_ENV['PORT_MYSQL'];
        try {
            $con = new \mysqli($host, $user, $password, $database, $port);
        } catch (\mysqli_sql_exception $e) { //recogemos el error
            die ("Error conectando : " . $e->getMessage());
        }
        $this->con = $con;
    }

    public function insertar_usuario(string|null $usuario, string|null $password): bool
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sentencia = <<<FIN
               INSERT INTO usuarios (nombre, password)
            VALUES (?,?)
   FIN;
        try {
            //prepara la sentencia
            $stmt = $this->con->stmt_init();
            //preparo la sentencia
            $stmt->prepare($sentencia);
            //indicarle que tipos de parametros (s(string), i(entero), d(float), b(blob)) se esperan para cada variable.
            $stmt->bind_param("ss", $usuario, $password);
            //ejecutar sentencia
            $stmt->execute();
            //store_result para que funcione, se queda en memoria pero no se aplica.
            $stmt->store_result();
            var_dump($stmt);
            return $stmt->affected_rows == 1 ? true : false;

        } catch (\mysqli_sql_exception $e) {
            echo $e->getMessage();
            return false;
        }


    }

    public function validar_usuario(string $usuario, string $password): bool
    {
        //entencia preparada
        $sentencia = <<<FIN
                   SELECT password FROM usuarios 
                   WHERE nombre = ? ;
       FIN;
        try {
            //Crear la sentencia
            $stmt = $this->con->stmt_init();
            $stmt->prepare($sentencia);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->store_result();
            var_dump($stmt);
            //se complica, verificar la pass. extraer la fila (firma hash).
            $stmt->bind_result($pass_database); //se establece variable donde recoger el resultado de pass
            $stmt->fetch(); //recoge resultado de la primera fila
            return password_verify($password, $pass_database);

        } catch (\mysqli_sql_exception $e) {
            return "error: " . $e->getMessage();
        }

    }

    public function obtener_familias()
    {
        $sentencia = "SELECT * FROM familia";

        try {
            $rtdo = $this->con->query($sentencia); //devuleve msqli_result
            //metodos
            return $rtdo->fetch_all();
        }catch (\mysqli_sql_exception $e){
            return "error raul:". $e->getMessage();
        }

    }

}