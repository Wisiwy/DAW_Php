<?php

/*RegEx Importantes:
^c -> Empezar por ese caracter
c$ -> acabar oir ese caracter
c+ -> 1 o mas caracteres
c* -> 0 o mas caracteres
c? -> 0 o 1 caracter
^  -> empieza por
$  -> acaba por


**DELIMITAR REGEX # ...#
 *  Delimitar la expresion regular con #:  #^[^0-9]$#


*/
if (isset($_POST['submit'])) {
    $expresion_regular = $_POST['expresion_regular'];
    $cadena = $_POST['cadena'];
    $expresion = "#$expresion_regular#";
    $msj = preg_match($expresion, $cadena) ? "$cadena cumple $expresion_regular " :
        "$cadena NO cumple $expresion_regular";
}
//EJEMPLOS EXPRESIONE REGULARES
$numeroEntero = "[0-9]+";
$numeroReal = "$numeroEntero(\.[0-9]+)?";
$numeroRacional = "$numeroEntero\/[1-9]+[0-9]*"; //*le indicamos que 0 o mas . Puede no estar el [0-9].
$operadorReal = "[\-\+\*\/]";
$operadorRacional = "[\-\+\*\:]";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0">
    <meta http-equiv="X - UA - Compatible" content="ie = edge">
    <title>Document</title>
</head>
<body>
<fieldset>
    <legend>Expresiones regulares</legend>

    <form action="index.php" method="post">
        Expresión regular <input type="text" value=" <?= $expresion_regular ?? "" ?>" name="expresion_regular"><br>
        Cadena <input type="text" value="<?= $cadena ?? "" ?>" name="cadena"><br>
        <input type="submit" value="Validar" name="submit"/>

    </form>
</fieldset>
<h2><?= $msj ?></h2>
</body>
</html>
