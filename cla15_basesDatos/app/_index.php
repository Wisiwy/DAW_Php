<?php

$host = "localhost";
$user = "alumno";
$password = "password_alumno";
$database = "dwes";
$port = 23306;

//creamos variable con conexión
try {
    $con = new mysqli($host, $user, $password, $database, $port);
} catch (mysqli_sql_exception $e ){ //recogemos el error
    die ("Error conectando: ".$e->getMessage());
}
    var_dump($con);
