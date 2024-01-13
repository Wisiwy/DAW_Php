<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 13/01/24
 * Version: 00.1
 */
/*Ver errores*/
ini_set("display_errors", true);
error_reporting(E_ALL);
/*Composer y alias a clases*/
require "vendor/autoload.php";
use utilidades_repa\DB as Database;
use Dotenv\Dotenv;
//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../");
$dotenv->safeLoad();

//Recoger del hidden cod_producto
$cod_producto = $_POST['cod_producto'];
var_dump($cod_producto);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cla15_DB_repa: Producto</title>
</head>
<body>
<h1>Cod_producto:<?=$cod_producto?></h1>


</body>
</html>
