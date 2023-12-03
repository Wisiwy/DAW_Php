<?php
session_start();
require "vendor/autoload.php";
use adivinaNumero2\Plantilla;
$partida = $_SESSION['partida'];
var_dump($partida);
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
<h1>Este es el final del juego </h1>
<?=Plantilla::informe_final()?>
</body>
</html>
