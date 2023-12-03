<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 03/12/23
 * Version: 00.1
 */
ini_set("display_errors", true);
error_reporting(E_ALL);

session_start();
$msj='';
/*$accesosSubmit=0;
$accesosURL = 0;*/

if (isset($_POST['submit'])) {
    $_SESSION['accesos'] ['submit']++;
    $msj = "Accedo por boton";
    if($_POST['submit']=="Eliminar")
        session_destroy();
}else{
    $_SESSION['accesos'] ['url']++;
    $msj = "Accedo por URL";
}
$sumar = fn($acumulado,$valor)=>$acumulado+$valor;
$accesosTotal = array_reduce($_SESSION['accesos'], $sumar, 0);
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
<h2>Total: <?=$accesosTotal?></h2>
<h2>Submit: <?=$_SESSION['accesos'] ['submit']?></h2>
<h2>Url: <?=$_SESSION['accesos'] ['url']?></h2>
<form action="ej01_cuentaVisitas.php" method="post">
    <input type="submit" value="Recarga" name="submit">
    <input type="submit" value="Eliminar" name="submit">
</form>

</body>
</html>
