<?php
/*Ahora leemos la opción que nos ha traído aquí. ROOTEO. */
$opcion = $_POST['submit'] ?? null;
/*Inicializar valores cuando venimos de index.php*/
$intentos = $_POST['intentos'];
$msj = "La defino en inicio.";
$jugada = 1;
$msj = "";

/*Para manetener checked*/
$cheked_mayor = $_POST['>'] ?? "checked";
$cheked_menor = $_POST['<'] ?? "";
$cheked_igual = $_POST['='] ?? "";



/*Rooteo de las los submits de jugarProfe.php*/
switch ($opcion) {
    case "Reiniciar":
        $msj = "Vengo de REINICIAR empezar.";
    case "Empezar":
        /*Msj para debuggear el rooteo*/
        $msj = ($msj == "") ? "Vengo INDEX empezar." : $msj;
        /*Inicializar valores cuando venimos de index.php*/
        $min = 0;
        $max = 2 ** $intentos;
        //Número de intentos es la potencia a la que elevamos el 2.
        $numAdivina = ($min + $max) / 2;
        break;

    case "Jugar":
        $msj = "Vengo bton JUGAR empezar.";
        $jugada = $_POST['jugada'];
        $respuesta = $_POST['respuesta'];
        $min = $_POST['min'];
        $max = $_POST['max'];
//OTRA OPCION PARA CONTROLAR EL FIN (IF...ELSE)
        /*        if ($jugada == $intentos) {*/
        /*Cuando leemos una variable con más de tres valores buena práctica usar "switch..case"
        if para verdadero -falso.*/
        switch ($respuesta) {
            /*Renombrar nombre submits a < > =  */
            case ">":
                /*Mínimo será el máximo del anterior, numAdivina*/
                $min = $_POST['numAdivina'];
                /*Cheked*/
                break;
            case "<":
                $cheked_mayor = "";
                $cheked_menor = "checked";
                /*Máximo será el numAdivina*/
                $max = $_POST['numAdivina'];
                break;
            case "=":
                //enviar mensaje acertaste
                $estado = true;
                $msj = "Acertaste en xxx jugadas ";
                header("location:fin.php?estado = $estado");
                break;
        }
        $numAdivina = round(($min + $max) / 2);
        /*Controlo fin*/
        $jugada++;
        if ($jugada > $intentos) {
            $estado = false;
            header("location:fin.php?estado = $estado");
            exit();
        }
//OTRA OPCIÓN PARA CONTROLAR EL FIN
        /*        } else {
                    header("location:fin.php" );
                    //enviar mensaje se te acabaron los intentos.

                }*/
        break;

    case "Volver":
        header("location:indexProfe.php?intentos = $intentos");
    default:
        header("location:indexProfe.php");
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
        <input type="radio" name="respuesta" <?= $cheked_mayor ?> value=">">Mayor<br>
        <input type="radio" name="respuesta" <?= $cheked_menor ?> value="<">Menor<br>
        <input type="radio" name="respuesta" <?= $cheked_igual ?> value="=">Igual <br><br>
        <!--Boton Jugar-->
        <input type="submit" value="Jugar" name="submit">
        <!--Hidden para pasar valores a siguientes jugadas. -->
        <input type="hidden" value="<?= $max ?>" name="max">
        <input type="hidden" value="<?= $min ?>" name="min">
        <input type="hidden" value="<?= $numAdivina ?>" name="numAdivina">
        <input type="hidden" value="<?= $jugada ?>" name="jugada">
        <input type="hidden" value="<?= $intentos ?>" name="intentos">


        <input type="submit" value="Reiniciar" name="submit">
        <input type="submit" value="Volver" name="submit">
    </fieldset>
</form>
</body>

</html>