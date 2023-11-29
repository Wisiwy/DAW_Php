<?php

require "vendor/autoload.php";

use class\Tabla;

//Creamos una app con los siuientes requisiotes
/*
 * Un formularion  con 3 campo sde input:
 *  nombre_cookie // valor_cookie //tiempo_vida
 *
 * 3 BOTONES:
 *  -Crear cookie (tendŕe que tener los 3 inputs con valor)
 *      msj la cookie xxx ha sido creada
 *  -Ver Cookies ( se ignorarán los valor d de los inputs..)
 *      msj la cookie .... ha sido borrada
 *  -Borrar Cookies (necesiot el campo nombre_cookie a borrar)
 *      una tabla con las cookies
 */

$opcion = $_POST['submit'] ?? null;
switch ($opcion){
    case "Crear cookie":
        $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre')) ?? "";
        $valor = htmlspecialchars(filter_input(INPUT_POST, 'valor')) ?? "";
        $tiempo = filter_input(INPUT_POST, 'tiempo',FILTER_VALIDATE_INT);
        $tiempo = !$tiempo ? $tiempo:0;

        setcookie($nombre, $valor, $tiempo);
        $html_msj = "Cookie creada";
        break;
    case "Ver cookie":
        $verCookie = new Tabla("LISTADO DE COOKIES");
        $verCookie->add_cabecera(['Nombre' , 'Valor']);
        $verCookie->add_contenido($_COOKIE);
        $html_msj=$verCookie;
        break;
    case "Borrar cookie":
        $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre')) ?? "";
        setcookie($nombre, "", time()-1);
        $html_msj = "Cookie borrada";

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
    <title>Document</title>
</head>
<body>
<form action="_index.php" method="post">
    <fieldset>

        <legend><em>Nuevo contacto</em></legend>
       <!--Valores-->
        <label for="nombre_cookie">Nombre Cookie</label><br>
        <input type="text" id="nombre_cookie" name="nombre" value=""><br>

        <label for="valor_cookie">Valor Cookie</label><br>
        <input type="text" id="valor_cookie" name="valor" value=""><br>

        <label for="tiempo_cookie">Tiempo Cookie</label><br>
        <input type="text" id="tiempo_cookie" name="tiempo" value=""><br>
        <!--Botones-->
        <input type="submit" value="Crear cookie" name="submit">
        <input type="submit" value="Ver cookie" name="submit">
        <input type="submit" value="Borrar cookie" name="submit">

    </fieldset>
</form>

<?=$html_msj?>

</body>
</html>
