<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 02/12/23
 * Version: 00.1
 */

//muestra errores en el navegador
ini_set("display_errors", true);
error_reporting(E_ALL);

//autoload
/******
CORRECCIÓN
También deberías de haber puesto un session_destroy para inciar el juego al pasar por el index
*/
session_start()

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
<h1>INSTRUCCIONES DEL JUEGO MASTERMIND</h1>
<div class="containerIndex">
<!--RF0 Mostramos la pantalla de inicio informando del juego-->
    <div class="presentacion">
        <h2>DESCRIPCIÓN DEL JUEGO DE MASTER BIND</h2>
        <hr>
        <ol>
            <li>Esta es una presentación personalizada del juego.</li>
            <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li>
            <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li>
            <li>En total habrá 14 intentos para adivinar la clave.</li>
            <li>En cada jugada la app informará:
                <ul>
                    <li>cuántos colores has acertado de la combinación</li>
                    <li>cuántos de ellos están en la posición correcta.</li>
                </ul>
            </li><li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
        </ol>
        <hr>
        <form action="jugar.php">
            <input type="submit" value="Empezar a jugar">
        </form>
    </div>
</div>
</body>
</html>
