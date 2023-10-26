<?php
echo "<h1>PHP</h1>";
/*FORMULARIO
*el cliente puede aportar datos variable valor. */


/*$submit = $_GET['submit'];
$nombre = $_GET['nombre'];

$msj = "Estoy aquí porque me han solicitado por URL";
$msj = "Estoy aquí porque me han solicitado a traves de un formulario. ";*/

//COMPROBAR SI ESTAMOS POR HABER PULSADO EL SUBMIT
if (isset($_GET['submit']))
    $msj = "Estoy aquí porque me han solicitado a traves de un formulario. ";
else
    $msj = "Estoy aquí porque me han solicitado por URL";

/*echo "<h3>$msj</h3>";
echo "<h3>Valor de submit: $submit</h3>";
echo "<h3>Valor de nombre: $nombre</h3>";*/

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
<h1>Formularios</h1>
<hr>
<h2>Estoy en index</h2>
<!--action carga las acciones del fichero datos.php. Script que solicito al botón submit-->
<form style="width: :50%;background:antiquewhite;margin-left:50px"
      action="http://localhost/dwec_php/cla_formulario/index_form.php" method="post">
    <fieldset>

        <!--INPUTS: Muchos tipos. Con expresiones regulares ya predefinidas.
        Name: recuperar valor en el servidor. -->
        <!--*****EJERCICIO formulario de Datos Personales*****-->

        <legend>Datos personales</legend>
        Nombre <input type="text" name="nombre" id="">
        Apellido <input type="text" name="apellido" id="">
        Email <input type="emaill" name="email" id="">
        Genero <br>
        <input type="radio" name="genero" value="mujer" id="">Mujer<br/>
        <input type="radio" name="genero" value="hombre" id="">Hombre<br/>
        <input type="radio" name="genero" value="no aporta" id="">No aporta<br/>
        <hr>
        <select name="estudios" id=""

        </select>
        <input type="submit" value="Enviar" name="submit">

    </fieldset>
</form>
</body>
</html>
