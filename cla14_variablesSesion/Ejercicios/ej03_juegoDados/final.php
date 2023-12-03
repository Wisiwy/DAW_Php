<?php

require "vendor/autoload.php";

use jugadaEj03\Tabla as Tabla;

session_start();


/*$tabla = new Tabla("INFORME DE JUGADAS");
$tabla->add_cabecera(['Dado1', 'Dado2', 'Hora', '¿Ganada?']);
$tabla->add_contenido($_SESSION['partida'],3);
var_dump($tabla);*/
//para añadir contenido necesitamos


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Este es el final del juego</h1>
<?php
$informe = '';
foreach ($_SESSION['partida'] as $index => $jugada) {
    var_dump($jugada);
    $informe .= "$jugada <br>";

}
?>
<?= $informe ?>
</body>
</html>