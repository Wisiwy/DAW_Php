<?php
/*****ARRAY_REDUCE
 * aplicación de funciones recursiva.
 * coge un array y aplica recursivamente una funcion, al resultado del primera aplicación
 * le aplica la función otra vez. Recursivamente. */

$array = range(1,10);
var_dump($array);
$sumar = fn($num1,$num2) => $num1+$num2;
$restar = fn($num1,$num2) => $num1-$num2;
$multiplicar = fn($num1,$num2) => $num1*$num2;

$suma = array_reduce($array,$sumar);
echo "<h3> La suma del array es $suma </h3>";
$resta = array_reduce($array,$restar);
echo "<h3> La suma del array es $resta </h3>";
$multiplicacion = array_reduce($array,$multiplicar,initial: 1);
echo "<h3> La suma del array es $multiplicacion </h3>";


/**ARRAY FILTER
 *
 */
echo "<h2>Array Filter</h2>";
$array = range(1,100);
$multiplos_5 = fn($valor) => $valor%5==0;
$array_multiplos = array_filter($array,$multiplos_5);
var_dump($array_multiplos);
