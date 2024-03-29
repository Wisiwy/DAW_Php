<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 13/01/24
 * Version: 00.1
 */
/*Ver errores*/
/*ini_set("display_errors", true);
error_reporting(E_ALL);*/

/*Composer y alias a clases*/
require "vendor/autoload.php";

use utilidades_repa\DB as Database;
use Dotenv\Dotenv;

//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../");
$dotenv->safeLoad();

//Creamos la CONEXIÓN con la DB (a traves de la clase)
$con = new Database();

//Acceso o Registro dependiendo boton pulsado en formulario
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Acceder":
        //Recojo datos del usuario
        $usuario = htmlspecialchars(filter_input(INPUT_POST, 'usuario'));
        $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
        //Compruebo que existe usuario en base de datos
        if ($con->validar_usuario($usuario, $password)) {
            //Guardo usuario en variable sesion, para llamarlo en sitio.php
            session_start();
            $_SESSION['usuario'] = $usuario;
            //Redirigo al sitio del usuario
            header("Location:sitio.php");
            exit;
        }
        $msj = "Datos acceso incorrectos.";
        break;
    case "Registrarme":
        //Leemos los datos del formulario
        $usuario = htmlspecialchars(filter_input(INPUT_POST, 'usuario'));
        $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
        //Introduciomos en la DB el nuevo registro. Recogemos el mensaje de insercción correcta
        $msj = $con->insertar_usuario($usuario, $password);
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
    <link rel="stylesheet" href="estilos/estilo-index.css">
    <title>cla15_DB_repa: Registro</title>
</head>
<body>

<section>
    <fieldset>
        <!-- Formulario de acceso/registro usuario.  -->
    <legend><h3>Acceso usuario</h3></legend>
        <form action="" method="POST">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">

            <input type="submit" value="Acceder" name="submit">
            <input type="submit" value="Registrarme" name="submit">

            <h3 style="color: darkred;">MsJ: <?= $msj ?></h3>
        </form>
    </fieldset>
</section>
</body>
</html>
