<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 03/12/23
 * Version: 01.1
 */

//visualizador de errores
ini_set("display_errors", true);
error_reporting(E_ALL);

//cargamos composer
require "vendor/autoload.php";

use jugadaEj03\Jugada as Jugada;

//creamos seision
session_start();


if (isset($_POST['submit'])) {
    $opcion = htmlspecialchars(filter_input(INPUT_POST, 'submit'));
    switch ($opcion) {
        case "Jugar":
            $jugada = new Jugada();
            serialize($jugada);
            $_SESSION['partida'][] = $jugada;
            $intentos = 10 - sizeof($_SESSION['partida']);
            if ($intentos == 0) {
                header("location:final.php");
                exit();
            }
            break;
        case
        "Reiniciar":
            session_destroy();
            break;
        default:
    }

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
<h1>Juego de los dados</h1>
<p>Bienvenido al juego de los dados. Coincide los dos dados o su suma es meno de 5 tu ganas.</p>
<p>Tienes <?= $intentos ?> intentos.</p>
<form action="juegoDados.php" method="post">
    <input type="submit" value="Jugar" name="submit">
    <input type="submit" value="Reiniciar" name="submit">
</form>
<?=$jugada?>
</body>
</html>