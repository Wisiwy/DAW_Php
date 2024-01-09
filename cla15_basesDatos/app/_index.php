<?php
require "vendor/autoload.php";
use Utilidades\DB as Database;
use Dotenv\Dotenv;

//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../"); //donde esta mi dot env
$dotenv->safeLoad();

 $con = new Database();
 var_dump($con);

$opcion = $_POST['submit'] ?? null;
switch ($opcion){
    case "Acceder":
        $user = $_POST['user'];
        $password = $_POST['password'];
        if ( $con->validar_usuario($user,$password)){
            session_start();
            $_SESSION['user'] = $user;
            header("Location:sitio.php");
            exit();
        }
        $msj = "datos incorrectos";
        break;
    case "Registrarme":
        $user = $_POST['user'];
        $password = $_POST['password'];
        $rtdo = $con->insertar_usuario($user,$password);
        $msj = $rtdo ? "Insercion correcta $user" : "Error en insercion";
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
    <link rel="stylesheet" href="estilo.css">
    <title>Base de datos</title>
</head>
<body>
<h2>Mensaje: <?=$msj ??"" ?></h2>
<fieldset>
    <legend>Datos de acceso</legend>
    <form action="" method="POST">
        Usuario <input type="text" name="user" placeholder="Usuario" id=""><br>
        Password <input type="text" name="password" placeholder="Password" id=""><br>
        <input type="submit" value="Acceder" name="submit">
        <input type="submit" value="Registrarme" name="submit">

    </form>
</fieldset>

</body>
</html>
