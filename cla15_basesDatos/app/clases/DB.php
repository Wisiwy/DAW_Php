<?php

namespace Utilidades;

class DB
{
    private \mysqli $con; //indicarle \ mysqli del sistema.

    public function __construct()
    {
        $host = $_ENV['HOST'];
        $user = $_ENV['USER_'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASE'];
        $port = $_ENV['PORT_MYSQL'];
        try {
            $con = new \mysqli($host, $user, $password, $database, $port);
        } catch (\mysqli_sql_exception $e) { //recogemos el error
            die ("Error conectando: " . $e->getMessage());
        }
        $this->con = $con;
    }

    public function insertar_usuario(string $usuario, string $password)
    {
        $sentencia = <<<FIN
            INSERT INTO usuarios 
            (nombre, password) VALUES ('$usuario','$password')
FIN;
        try {
            $rtdo = $this->con->query($sentencia); //devuelve boolean si lo ha echo
            if ($this->con->affected_rows > 0)
                return "El usuario $usuario se ha insertado";
            else
                return " no se ha podido insertar $usuario";
        } catch {
            return "error: " . $e->getMessage();
        }

    }

    public function valida_usuario(string $usuario, string $password)
    {
        $sentencia = <<<FIN
            select *
            from usuario = '$nombre' and password = '$password' 
FIN;
        try {
            $rtdo = $this->con->query($sentencia); //devuelve boolean si lo ha echo
            var_dump($rtdo); //objeto de l select
            if ($rtdo->num_rows > 0)
                return true;
            else
                return true;
        } catch() {
            return "error: " . $e->getMessage();
        }
    }


}