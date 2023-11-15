<?php
//RANDOM
$num1 = rand(1, 5);
$num2 = rand(1, 100);

/*OPERADORES ARITMÉTICOS
    -Aritméticos (+,-,*,/,%,**)
    -Autoincremente/decremento(++ --)
    -Asignación compuesta (los aritmétcios segidos de una asignación += -= *= ....)*/

$num = 5 + 6 * 8 - 4 / 2;
echo "<h1>Valor de número $num</h1>";
$num = 5 + (6 * 8) - (4 / 2);
$num = 5 + 48 - 2;
$num = 53 - 2;
echo "<h1>Valor de número $num</h1>";
/**AUTOINCREMENTO Y Decremento*/
//-PRE, primero incrementa y luego toma el valor
$a=5;
echo "PRE INCREMENTO primero incrementa y luego toma el valor ".++$a."<br />";
echo "PRE Valor de a es $a<br />";
//-POST, primero toma el valor y luego incrementa
$a=5;
echo "POST INCREMENTO  primero toma el valor y luego incrementa".$a++."<br />";
echo "POST INCREMENTO Valor de a es $a<br />";


/****IGUAL y ESTRICTAMENTE IGUAL
 * == operador de comparación igual que (mismo valor)
 * === operador de comparación exactamente igual que (mismo valor y tipo)
 * */


