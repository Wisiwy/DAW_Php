<?php
require_once "Fecha.php"; //Si ya re a require una vez no se vuelva a incluir
require_once "Racional.php";

$f1 = new Fecha(); // 14//11/2023
$f2 = new Fecha(25); // 25//11/2023
$f3 = new Fecha(25, 3); // 25//03/2023
$f4 = new Fecha(12, 11, 2004); // 12//10/2004
//El metodo magico __toString se  invoca de manera inplicita cuando intento convertirla a un String
$f5 = new Fecha("05/04/2024"); // 05/04/2024
echo $f1->visualiza();
echo $f2->visualiza();
echo $f3->visualiza();
echo $f4->visualiza();
echo $f5->visualiza();
echo "<h3>Valor de \$f1 $f1 </h3>";
echo "<h3>Valor de \$f2 $f2</h3>";
echo "<h3>Valor de \$f3 $f3 </h3>";
echo "<h3>Valor de \$f4 $f4 </h3>";
echo "<h3>Valor de \$f5 $f5 </h3>";


//clase RACIONAL
$r1 = new Racional(); //
$r2 = new Racional(25); //
echo "<h2>Llevo " . Racional::$cuenta_racionales . " racionales</h2>";
unset($r2);
echo "<h2>Llevo " . Racional::$cuenta_racionales . " racionales</h2>";
$r3 = new Racional(7, 4); //
$r4 = new Racional("9/6"); //
echo "<h2>Llevo " . Racional::$cuenta_racionales . " racionales</h2>";

echo "<h3>$r1</h3>";
echo "<h3>$r1</h3>";
echo "<h3>$r3</h3>";
echo "<h3>$r4</h3>";


//CALCULADORA.
//Menu racionales racionales.
if (isset($_POST['submit'])) {
    $op1 = new Racional($_POST['r1']);
    $op2 = new Racional($_POST['r2']);
    $operador = $_POST['operador'];
    $rtdo = match ($operador) {
        '+'=> $op1->sumar($op2),
        '-'=> $op1->restar($op2),
        '*'=> $op1->multiplicar($op2),
        '/'=> $op1->dividir($op2),
    };
}

echo "<h3>$op1$operador$op2<h3>";
echo "<h3>Resultado: $rtdo</h3>";
$rtdo=$rtdo->simplifica();
echo "<h3>Resultado Simplificado: $rtdo </h3>";


?>
<!doctype html>
<html lang="en" xmlns:input="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="indexObjetos.php" method="post">
    <input type="text" name="r1" value="">
    <!--radiobutton operaciones-->
    <select name="operador">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="r2" value="">
    <input type="submit" value="Operar" name="submit">
</form>
</body>
</html>
