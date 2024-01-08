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
        var_dump($port);
        try {
            $con = new \mysqli($host, $user, $password, $database, $port);
        } catch (\mysqli_sql_exception $e) { //recogemos el error
            die ("Error conectando : " . $e->getMessage());
        }
        $this->con = $con;
    }

    public function insertar_usuario(string|null $usuario, string|null $password): bool
    {
        $sentencia = <<<FIN
               INSERT INTO usuarios (nombre, password)
            VALUES ('$usuario','$password')
   FIN;
        //metodo query
        try {
            $rtdo = $this->con->query($sentencia);
        } catch (\mysqli_sql_exception $e) {
            return false;
        }
        return $rtdo;

        /* return $rtdo;//devuelve boolean si lo ha echo
             if ($this->con->affected_rows > 0)
                 return "El usuario $usuario se ha insertado";
             else
                 return " no se ha podido insertar $usuario";
         } catch (\mysqli_sql_exception $e) {
             return "error insertando usuario RA: " . $e->getMessage();
         }*/

    }

    public function validar_usuario(string $usuario, string $password): bool
    {
        $sentencia = <<<FIN
                   SELECT * FROM usuarios 
                   WHERE nombre = '$usuario' AND password = '$password'
       FIN;
        try {
            $rtdo = $this->con->query($sentencia); //devuelve boolean si lo ha echo
            var_dump($rtdo); //objeto del select
        } catch (\mysqli_sql_exception $e) {
            return "error: " . $e->getMessage();
        }
        if ($rtdo->num_rows > 0)
            return true;
        else
            return true;
    }


}