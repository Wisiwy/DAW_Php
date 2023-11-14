<?php
require_once "Fecha.php"; //Si ya re a require una vez no se vuelva a incluir
require_once "Racional.php";

$f1 = new Fecha(); // 14//11/2023
$f2 = new Fecha(25); // 25//11/2023
$f3 = new Fecha(25,3); // 25//03/2023
$f4 = new Fecha(12,11,2004); // 12//10/2004
//El metodo magico __toString se  invoca de manera inplicita cuando intento convertirla a un String
$f5 = new Fecha("05/04/2024"); // 05/04/2024
echo $f1 ->visualiza();
echo $f2 ->visualiza();
echo $f3 ->visualiza();
echo $f4 ->visualiza();
echo $f5 ->visualiza();
echo "<h1>Valor de \$f1 $f1 </h1>>";
echo "<h1>Valor de \$f2 $f2</h1>>";
echo "<h1>Valor de \$f3 $f3 </h1>>";
echo "<h1>Valor de \$f4 $f4 </h1>>";
echo "<h1>Valor de \$f5 $f5 </h1>>";


//clase RACIONAL
$r1 = new Racional(); //
$r2 = new Racional(25); //
$r3 = new Racional(7,4); //
$r4 = new Racional("9/6"); //

echo "<h1>$r1</h1>";
echo "<h1>$r2</h1>";
echo "<h1>$r3</h1>";
echo "<h1>$r4</h1>";

