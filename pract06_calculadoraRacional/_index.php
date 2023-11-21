<?php

//Carga todas las clases al index del mismo namespace
$carga = fn($clase) => require "class/$clase.php";
spl_autoload_register($carga);

if(isset($_POST['submit']))  {
    $cadena = $_POST['operacion'];
    $tipo_operacion = Operacion::tipo_operacion($cadena);
    switch ($tipo_operacion) {
        case Operacion::OPERACION_RACIONAL:
            //Realizar validacion de la operacion. Mostrar mensaje
            $msj=  "$cadena es una operacion RACIONAL";
            $operacion = new OperacionRacional($cadena);
            $rtdo = $operacion->operar();
            $msj2= $rtdo;
            break;
        case Operacion::OPERACION_REAL:
            $msj =  "$cadena es una operacion REAL";
            $operacion = new OperacionReal($cadena);
            $rtdo = $operacion->operar();
            $msj2= $rtdo;
            break;
        case Operacion::ERROR:
            $msj = "Operación con $cadena errónea";
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />
</head>
<body>
<header>
    <h1>Calculadora Real / Racional</h1>
</header>
<aside>
    <fieldset id="ayuda">
        <legend>Reglas de uso de la calculadora</legend>
        <ul>
            <li>La calculadora se usa escribiendo la operación.</li>
            <li>La  operación será <strong>Operando_1 operación Operando_2</strong>.</li>
            <li>Cada operando puede ser número <i>positivo</i><strong> real  o racional.</strong></li>
            <li>Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></li>
            <li>Los operadores reales permitidos son <strong><span class="destacado"> +  -  *  /</span></strong></li>
            <li>Los operadores racionales permitidos son <strong><span class="destacado"> +  -  *  :</span> </strong></li>
            <li>No se deben de dejar espacios en blanco entre operandos y operación</li>
            <li>Si un operando es real y el otro racional se considerará operación racional</label></li>
            <li>Ejemplos:
                <ul>
                    <li>(Real) <strong>5.1+4</strong></li>
                    <li>(Racional) <strong>5/1:2</strong></li>
                    <li>(Error) <strong>5.2+5/1</strong></li>
                    <li>(Error) <strong>52214+</strong></li>
                </ul>
            </li>
        </ul>
    </fieldset>
</aside>
<main>
    <fieldset>
        <legend>Establece la operación</legend>
        <form action="_index.php" method="post">
            <label for="operacion">Operación</label>
            <input type="text" name="operacion" id="">
            <input type="submit" name="submit" value="Calcular">
        </form>
    </fieldset>

    <fieldset id=rtdo><legend>Resultado</legend>
        <label></label>
        <h3>Cadena: <?=$cadena?></h3>
        <h3>RESULTADO: <?=$msj?></h3>
        <h3>NUMERO: <?=$msj2?></h3>
    </fieldset>
</main>

</body>
</html>
