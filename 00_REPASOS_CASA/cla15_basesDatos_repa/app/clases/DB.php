<?php

namespace utilidades_repa;

class DB
{
//atributo de la clase \mysqli
    private \mysqli $con;

    public function __construct()
    {
        //recogemos datos conexion de fichero .env
        $host = $_ENV['HOST'];
        $user = $_ENV['USER_'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASE'];
        $port = $_ENV['PORT_MYSQL'];
        var_dump($port);
        //realizamos la conexión
        try {
            $this->con = new \mysqli($host, $user, $password, $database, $port);
        } catch (\mysqli_sql_exception $e) {
            //recogemos error, matamos programa
            die ("Error conectando: " . $e->getMessage());
        }

    }

    public function validar_usuario(string $user, string $password):bool
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
            $stmt->bind_param("s",$user);
            //ejecutamos la sentencia
            $stmt->execute();
            //comando necesario para ejecutar en DB.
            $stmt->store_result();
            //ENCRIPTACION PASS: verificacion pass encriptada. extraer la fila de la DB (firma hash)
            //establecemos var donde recoger la hash (pass) de la DB
            $stmt->bind_result($pass_database);
            $stmt->fetch(); //recoge primera fila
            //verificamos pass introducida coincide con la firma hash guardada en la DB
            return password_verify($password,$pass_database);
        }catch (\mysqli_sql_exception $e){
            return "error (miaU): " . $e->getMessage();
        }


    }

}