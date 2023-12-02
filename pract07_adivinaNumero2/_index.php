<?php
ini_set("display_errors", true);
error_reporting(E_ALL);

require "vendor/autoload.php";

use Jugada\Jugada;
use Jugada\Clave;
use Jugada\Plantilla;

//inicio sesion
session_start();
//inicio de para boton clave y hora
$ver_ocultar_numero = "Ver clave";
$horaActual = date("H:i:s");
var_dump($horaActual);

//elementos estáticos con ::
$clave = Clave::obtener_clave();

//array con todas las jugadas actualizamos de la sesion
if (isset($_SESSION['partida'])) {
    $partida = unserialize($_SESSION['partida']);
    //$partida[] = unserialize($_SESSION['partida']);
}
var_dump($partida);
var_dump($_SESSION['partida']);

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Jugar":
        // $numero = $_POST['numero']; ¡¡MAL!!!
        $numero = htmlspecialchars($_POST['numero']);
        //creamos jugada
        $jugada = new Jugada($numero, $horaActual);
        //comprobamos jugada d
        $jugada->jugar($clave);
        //añadimos jugada a array y var sesión con todas las jugadas, añadimos jugada
        $partida[] = $jugada;
        var_dump($partida);
        //sacamos el numero de jugada
        $numero_jugada = sizeof($partida);
        //nedesario serializar objeto partidas
        $_SESSION ['partida'] = serialize($partida);


        if ($jugada->isResultado()) {
            header("location:victoria.php");
            exit(); //!Acordarse del exit(); Despues de header
        }

        //generar msj informativo con jugada actual
        break;
    case "Reiniciar":
        //$clave =  Clave::regenerar_clave();
        session_destroy();
        break;
    case "Ver clave":
        $msj = Plantilla::get_clave();
        $ver_ocultar_numero = "Ocultar clave";
        break;
    case "Ocultar clave":
        $msj = " ";
        $ver_ocultar_numero = "Ver clave";
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
    <title>Adivina numero 2</title>
</head>
<body>
<form action="_index.php" method="post">
    <fieldset>
        <legend><em>Adivina número</em></legend>
        <label for="inserta">Tu número</label><br>
        <input type="text" id="inserta" name="numero" value=""><br>
        <!--botones-->
        <input type="submit" value="Jugar" name="submit">
        <input type="submit" value="Reiniciar" name="submit">
        <input type="submit" value="<?= $ver_ocultar_numero ?>" name="submit">
    </fieldset>
</form>
<h2><?=$msj?></h2>
<h2>Numero de jugada:  <?=$numero_jugada?></h2>

</body>
</html>
