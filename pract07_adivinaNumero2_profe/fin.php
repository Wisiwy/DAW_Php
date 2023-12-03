<?php
session_start();
require "vendor/autoload.php";
use jugadas\Jugada;
use jugadas\Plantilla;

$jugadas = $_SESSION['jugadas'];

$posicion_ultima_jugada = sizeof($jugadas)-1;

$ultima_jugada=unserialize($jugadas[$posicion_ultima_jugada]);

$estado = $ultima_jugada->get_resultado();
$msj = $estado==0? "Felicidades, has acertado": "Has agotado todos los intentos";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<h1>FINALIZACIÓN DE JUGADAS</h1>
<h2><?=$msj?></h2>
<?=Plantilla::get_informe_final()?>


</body>
</html>