
<?php
echo "<h1>PHP</h1>";
/*$submit = $_GET['submit'];
$nombre = $_GET['nombre'];

$msj = "Estoy aquí porque me han solicitado por URL";
$msj = "Estoy aquí porque me han solicitado a traves de un formulario. ";*/

//COMPROBAR SI ESTAMOS POR HABER PULSADO EL SUBMIT
if (isset($_GET['submit']))
    $msj = "Estoy aquí porque me han solicitado a traves de un formulario. ";
else
    $msj = "Estoy aquí porque me han solicitado por URL";

echo "<h3>$msj</h3>";
echo "<h3>Valor de submit: $submit</h3>";
echo "<h3>Valor de nombre: $nombre</h3>";

echo "<hr>"
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
<h1>Formularios</h1><hr>
<h2>Estoy en index</h2>
<!--action carga las acciones del fichero datos.php. Script que solicito al botón submit-->
    <form action = "http://localhost/dwec_php/cla_formulario/index_form.php" method="">
        <input type="text" name = "nombre">
        <input type="submit" value="Enviar" name="submit">
    </form>
</body>
</html>
