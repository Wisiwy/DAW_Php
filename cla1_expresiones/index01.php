<?php

$num1 = rand(1, 5);
$num2 = rand(1, 100);
//Operaciones con expresiones numéricas
$suma ;
$resta;
$multiplicacion ;
$division ;
$potencia ;
$modulo ;

//Operaciones unarias (autoincremeto autodecremento pre y post
//          Estas las hacemos directamente en la vista

//Operacones de asignación compuesta
//          Estas las hacemos directamente en la vista




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expresiones</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<fieldset>
    <legend>Operaciones con expresiones numéricas</legend>
    <fieldset><legend>Operaciones Aritméticas</legend>
        <ul>
            <li><span class="operacion"></span></li>
            <li><span class="operacion"></span></li>
            <li><span class="operacion"></span></li>
            <li><span class="operacion"></span></li>
            <li><span class="operacion"></span></li>
            <li><span class="operacion"></span></li>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones Autoincremento</legend>
        <ul>
            <li>El valor inicial $num1 <span class="operacion"></span></li>
            <li>Autoincremento pre ++$num1 <span class="operacion"></span> </li>
            <li>Autoincrementeo post $num1++ <span class="operacion"></span></li>
            <li>Pero el valor de $num1 es   <span class="operacion"></span></li>
            <li>El valor inicial $num2  <span class="operacion"></span></li>
            <li>Autoincremento pre --$num <span class="operacion"></span></li>
            <li>Autoincrementeo post $num-- <span class="operacion"></span></li>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones de asignaciÃ³n compuesta</legend>
        <h4>En este caso queremos ver que es lo mismo $num1=$num1+$num2 que $num1+=$num2</h4>
        <h4>Esto para el resto de operacones -= *= /= %= **=</h4>
        <ul>
            <li>Autosumar $num1+=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>Autoresta $num1-=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>AutomultiplicaciÃ³n $num1*=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>Autodivision $num1/=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>Automodulo $num1%=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>Autoexplonete $num1**=$num2 <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones a nivel de bit</legend>
        <h4>Son operaciones por habituales en la programacion web, pero muy potentes para calculo</h4>
        <h4> & | ^ &lt &lt &gt </h4>
        <ul>
            <li>& and logico a nivel de bit<span class="operacion"></span></li>
            <li>| or logico a nivel de bit <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>^ xor <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>$lt desplazamiento a la izquierda<span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
            <li>&gt desplazamiento a la derecha <span class="operacion">Escribe aquÃ­ la opearciÃ³n</span></li>
        </ul>
    </fieldset>
</fieldset>
<h1>OPERADORES BOOLEANOS</h1>
<fieldset>
    <legend>Operaciones con expresiones lÃ³gicas o booleanas</legend>
    <fieldset><legend>Operaciones de comparaciÃ³n</legend>
        <ul>
            <li> <span class="operacion"><?=  "$num1>$num2=".($num1>$num2? "true": "false" )?></span></li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span> </li>
            <li><span class="operacion">Escribe aquÃ­ la opearciÃ³n</span>   <li> </fieldset>
    <fieldset><legend>Operaciones lÃ³gicas and or y ! (not o negaciÃ³n)</legend>
        <ul>
            <li>
            <li> AND <span class="operacion"></span></li>
            <li> && <span class="operacion"></span></li>
            <li> OR <span class="operacion"></span></li>
            <li> || <span class="operacion"></span></li>
            <li> ! <span class="operacion"></span></li>
            </li>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones de asignaciÃ³n compuesta</legend>

    </fieldset>
</fieldset>
<h1>OTROS OPERADORES</h1>
<fieldset>
    <legend>Operaciones que retornan un valor segÃºn los operandos</legend>
    <fieldset><legend>Operaciones de asignaciÃ³n simple</legend>
        <ul>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones de asignaciÃ³n por referencia</legend>
        <ul>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones de control de errores</legend>
        <ul>
        </ul>
    </fieldset>
    <fieldset><legend>Operaciones de ejecuciÃ³n </legend>
        <ul>
        </ul>
    </fieldset>
</fieldset>

</body>
</html>
