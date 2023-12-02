<?php
/****IF ...ELSE : Operador ternario.
 *
 * Es una forma más compacta de expresar un if-else en una única instrucción, cuando pretendo obtener un valor en función de una condición que voy a evaluar.
 * Esta instrucción se conoce como operador ternario, y retorna un valor
 *
 * (expresión_booleana) ? SentenciaOKExpresion : SentenciaNoOkExpresion  */

//TERNARIO
$num = rand(1, 100);
echo ($num % 2 == 0) ? "$num es par" : "$num es impar <br>";
//IF--ELSE
$num = rand(1, 100);
if ($num % 2 == 0)
    echo "$num es par <br>";
else
    echo "$num es impar <br>";
echo "<br>";
///////////////////////

/***SWITCH IN CASE*/
$nombre = "Pedro";
    switch (true){
        case "Maria":
            echo "eres una chica";
            break;
        case "Pedro";
            echo "eres una chico";
            break;
        default:
            echo "no se qué nombre tienes <br>";
    }
echo "<br>";
/****MATCH
El operador match aparece en php en la versión 8
Es una opción depurada y para casos concretos que puede sustituir de forma más eficiente y legigle a la estructura switch-case
    1.- Siempre retornará un valor
    2.- Evaluamos una expresión, al igual que con switch-case
    3.- En cada una de las ramas puedo establecer varias condiciones separadas por comas, intuyendo en ello una or lógica.
    4.- Igual que en switch-case existe la rama default
    5.- Como va a ser parte de una asignación, debe de terminar en ;
    6.- Las comparaciones que hace son estrictas a diferenica del switch-case que hace comparaciones no estrictas*/

$numero_mes = rand(1,4);
$nombre_mes = match ($numero_mes){
    1=>"Enero",
    2=>"Febrero",
	3=>"Marzo",
	default => "Mes incorrecto"
};
echo "El mes $numero_mes es $nombre_mes <br>";

/**+WHILE*/
//Suma de los 100 primeros numerso naturaslles
$i = 0;
$suma=0;
while ($i < 100) {
    $suma+=$i;
    $i++;
    echo "iteracción  {$i}ª Suma $suma<br />";
}

/**
 * DO--WHILE Y FOR
 */