<?php

/*Inicializar valores cuando venimos de index*/

$intentos = 10;
$numAdivina = 10;
$jugada = 0;
$msj = "La defino en inicio.";
$min = 1;
$max = 1;


/*Rooteo de las los submits de jugar.php*/
$opcion = $_POST['submit'];
switch ($opcion) {
    case "Empezar":
        /*Msj para debuggear el rooteo*/
        $msj = "Vengo index empezar.";
        /*Inicializar valores cuando venimos de index*/
        $jugada = 1;
        $intentos = $_POST['intervalo'];
        //Numero de intentos es la potencia a la que elevamos el 2.
        $min = 1;
        $max = 2 ** $intentos;
        $numAdivina = ($min + $max) / 2;

        break;
    case "Jugar":
        $msj = "Vengo bton JUGAR empezar.";
        $jugada = ++$_POST['jugada'];
        $respuesta = $_POST['respuesta'];

        if ($jugada <= $intentos) {
            /*Cuando leemos una variable con más de tres valores buena práctica usar "switch..case"
            if para verdadero -falso.*/
            switch ($respuesta) {
                /*Renombrar nombre submits a < > =  */
                case ">":
                    /*Mínimo será el máximo del anterior, numAdivina*/
                    $min = $_POST['numAdivina'];
                    $max = $_POST['max'];
                    break;
                case "<":
                    /*Máximo será el numAdivina*/
                    $min = $_POST['min'];
                    $max = $_POST['numAdivina'];
                    break;
                case "=":
                    header("location:fin.php?msjFin=");
                    //enviar mensaje acertaste
                    break;
            }
            $numAdivina = round(($min + $max) / 2);
        } else {
            header("location:fin.php");
            //enviar mensaje se te acabaron los intentos.

        }

        break;

    //Entoy en jugada 2 o siguiente
    case "Reiniciar":
        $msj = "Vengo de REINICIAR empezar.";
        //Reinicio el juego: variables (intentos)
        break;
    case "Volver":
        header("location:index.php");

}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar.</title>
</head>
<body>
<h2><?= $msj ?></h2>
<h3>El número es <?= $numAdivina ?></h3>
<!--Checkeo de lo valores-->
<p><b>Jugada <?= $jugada ?> </b></p>
<p>Intervalo: <?= $intentos ?></p>
<p>Mínimo: <?= $min ?></p>
<p>Máximo: <?= $max ?></p>
<form action="jugar.php" method="post">
    <fieldset>
        <legend>Indica cómo es el número que has pensado.</legend>
        <input type="radio" name="respuesta" checked value=">">Mayor<br>
        <input type="radio" name="respuesta" value="<">Menor<br>
        <input type="radio" name="respuesta" value="=">Igual <br><br>
        <!--Botones-->
        <input type="submit" value="Jugar" name="submit">
        <!--Hidden para pasar valores-->
        <input type="hidden" value="<?= $max ?>" name="max">
        <input type="hidden" value="<?= $min ?>" name="min">
        <input type="hidden" value="<?= $numAdivina ?>" name="numAdivina">
        <input type="hidden" value="<?= $jugada ?>" name="jugada">

        <input type="submit" value="Reiniciar" name="submit">
        <input type="submit" value="Volver" name="submit">
    </fieldset>
</form>
</body>
</html>
