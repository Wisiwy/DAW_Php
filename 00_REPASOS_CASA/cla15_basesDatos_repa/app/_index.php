<?php
require "vendor/autoload.php";

use utilidades_repa\DB as Database;
use Dotenv\Dotenv;

//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../");
$dotenv->safeLoad();

//Creamos la conexion con la DB (a traves de la clase)
$con = new Database();
var_dump($con);

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Acceder":
        //recogo datos usuario
        $user = $_POST['user'];
        $password = $_POST['password'];
        //compruebo que existe usuario en base de datos
        if ($con->validar_usuario($user, $password)) {
            //guardo usuario en variable sesion, para llamarlo en sitio.php
            session_start();
            $_SESSION['user'] = $user;
            //redirigo al sitio del usuario
            header("Location:sitio.php");
            exit;
        }
        $msj = "Datos acceso incorectos. Miau";

        break;
    case "Registrarme":
        //Leemos los datos del formulario
        $user = $_POST['user'];
        $password = $_POST['password'];
        //
        break;

    default:
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estiloindex.css">
    <title>Databases</title>
</head>
<body>

<section>
    <fieldset>
        <form action="" method="POST">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="user" placeholder="Usuario">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">

            <input type="submit" value="Acceder" name="submit">
            <input type="submit" value="Registrarme" name="submit">
        </form>
    </fieldset>
</section>
<section class="mensajes">
    <h2>Aqui van los mensajes para el usuario:</h2><br>
    <h3><?=$msj?></h3>
</section>
</body>
</html>
