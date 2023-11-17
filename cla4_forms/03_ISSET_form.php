<?php
echo "<h1>PHP</h1>";
/****METODO GET /POST :
 *El usuario aporta info variable-valor.
 *Lo recogemos con metodos GET o POST (más seguro) */

/******ISSET: Comprobar si venimos del submit.*/
if (isset($_POST['submit']))
    $msj = "Estoy aquí porque me han solicitado a traves de un formulario. ";
else
    $msj = "Estoy aquí porque me han solicitado por URL";
echo "<h3>$msj</h3>";
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
        <!--Diferentes inputs: -->
        <legend>Datos personales</legend>
        Nombre (type text) <input type="text" name="nombre" id="">
        Apellido (type text) <input type="text" name="apellido" id="">
        Email (type email)<input type="emaill" name="email" id="">
        Genero (radip)<br>
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
