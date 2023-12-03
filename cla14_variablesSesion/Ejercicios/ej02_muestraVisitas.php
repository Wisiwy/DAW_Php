<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 03/12/23
 * Version: 00.1
 */
ini_set("display_errors", true);
error_reporting(E_ALL);

require "Visita.php";
session_start();
$msj='';
/*$accesosSubmit=0;
$accesosURL = 0;*/

if (isset($_POST['submit'])) {
    $visita =serialize(new Visita(1));
    $msj = "Accedo por boton";
    if($_POST['submit']=="Eliminar")
        session_destroy();
}else{
    $visita =serialize(new Visita(2));
    $msj = "Accedo por URL";
}
$_SESSION['accesos'][] = $visita;
$numeroVisitas = sizeof($_SESSION['accesos']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ej01_cuentaVisitas</title>
</head>
<body>
<h1>Bienvenido a la pagina de contar visitas</h1>
<h2>Visitas</h2>
<h3>Total: <?=$numeroVisitas?></h3>
<?php
    $arrayRevertido = array_reverse($_SESSION['accesos']);
    foreach ($arrayRevertido as $index => $visita){
        $visita=unserialize($visita);
        $msj .= "<h4>NumAcceso: $index // $visita";
    }
?>
<?=$msj?>
<form action="ej02_muestraVisitas.php" method="post">
    <input type="submit" value="Recarga" name="submit">
    <input type="submit" value="Eliminar" name="submit">
</form>

</body>
</html>
