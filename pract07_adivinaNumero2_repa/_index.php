<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 03/12/23
 * Version: 00.1
 */

ini_set("display_errors", true);
error_reporting(E_ALL);

require "vendor/autoload.php";

use adivinaNumero2\Clave;
use adivinaNumero2\Jugada;

session_start();
$clave = Clave::obtener_clave();
var_dump($clave);
$ver_ocultar_clave = "Ver clave";
$msj = "Bienvenido a Adivina numero";
//recogemos tiempo

$opcion = $_POST['submit'] ?? null;
var_dump($opcion);
switch ($opcion) {
    case "Jugar":
        //Creamos una jugada
        $numero = $_POST[htmlspecialchars('numero')];
        $jugada = new Jugada($numero);
        //$jugada->jugar
        //guardamos en la var session partida

        $_SESSION['partida'][] = serialize($jugada);
        //sacamos el numero de jugada
        $numeroJugada = sizeof($_SESSION['partida'] ?? 0);
        var_dump($_SESSION['partida']);
        //si adivina o llega a las 10 jugadas
        if ($jugada->isResultado() || ($numeroJugada > 10)) {
            header("location:final.php");
            exit();
        }


        //dar pista segun el numero de jugada
        break;
    case "Reiniciar":
        session_destroy();
        break;
    case "Ver clave":
        echo "estoy en ver clave";
        $msj = "La clave es  $clave";
        $ver_ocultar_clave = "Ocutar clave";
        break;
    case "Ocultar clave":
        $msj = " ";
        $ver_ocultar_clave = "Ver clave";
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
    <title>Adivina número 2 - Repaso</title>
</head>
<body>
<form action="_index.php" method="post">
    <fieldset>
        <legend>Adivina el numero</legend>

        <label for="num">Número</label>
        <input type="text" name="numero" value="" id="num">
        <!--Botones-->
        <input type="submit" value="Jugar" name="submit">
        <input type="submit" value="Reiniciar" name="submit">
        <input type="submit" value="<?= $ver_ocultar_clave ?>" name="submit">
    </fieldset>
</form>


<h2><?= $msj ?></h2>
<h2>Numero de jugada = <?= $numeroJugada ?></h2>
<h3><?=$jugada?></h3>

</body>
</html>
