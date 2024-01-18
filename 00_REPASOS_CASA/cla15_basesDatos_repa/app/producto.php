<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 13/01/24
 * Version: 00.1
 */
/*Ver errores*/
session_start();
var_dump($_SESSION);
ini_set("display_errors", true);
error_reporting(E_ALL);
/*Composer y alias a clases*/
require "vendor/autoload.php";

use utilidades_repa\DB as Database;
use Dotenv\Dotenv;

//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../");
$dotenv->safeLoad();


//Conexion
$con = new Database();

//Rotear: Si venimos de sitio ("editar"), o de los botones de producto
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    //desde sitio.php: mostramos info del producto extraido de la DB con cod_producto
    case "Editar":
        //recoger del hidden de 'sitio.php',  cod_producto
        $cod_producto = $_POST['cod_producto'];
        //consulta a DB: array con info del producto
        $datos_producto = $con->obtener_productos($cod_producto, "producto");
        break;
    case "Actualizar":
        //recogemos los nuevos valores del formulario
        $nombre = $_POST["nombreCorto"];
        $descripcion = $_POST["descripcion"];
        $pvp = $_POST["pvp"];
        $cod_producto = $_POST['cod_producto'];
        //actualizamos la base de datos con la nueva info
        if($con->actualizar_producto($nombre, $descripcion, $pvp,$cod_producto))
            header("Location:actualizar.php");
        else
            //si no se ha realizado la inserccion devuelve false
            echo "Actualizacion incorrecta";
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
    <link rel="stylesheet" href="estilos/estilo-producto.css">
    <title>cla15_DB_repa: Producto</title>
</head>
<body>
<h1>Actualizar Producto con código: <?= $cod_producto ?></h1>
<h2><?= $datos_producto[0]['nombre'] ?></h2>
<form action="producto.php" method="post">

    <label for="nombreCorto">Nombre Corto:</label>
    <input type="text" id="nombreCorto" name="nombreCorto" value="<?= $datos_producto[0]['nombre'] ?>">

    <br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" rows="15" required><?= $datos_producto[0]['descripcion'] ?></textarea>

    <br>

    <label for="pvp">Precio (PVP):</label><br>
    <input type="text" id="pvp" name="pvp" step="0.01" value="<?= $datos_producto[0]['PVP'] ?>">

    <br>
    <!-- Pasamos por post el cod_producto para actualizar base datos -->
    <input type="hidden" name="cod_producto" value="<?=$datos_producto[0]['cod']?>" >

    <button type="submit" name="submit" value="Actualizar">Actualizar</button>
</form>
<form action="sitio.php" method="post">
    <button type="submit" name="submit" value="Cancelar">Cancelar</button>
</form>
</body>
</html>
