<?php
//llamar a las clases.
require_once "Fecha.php"; //Si ya re a require una vez no se vuelva a incluir

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



