<?php

/*FUNCION NORMAL*/
function a(&$num1, &$num2, $num3){
    echo "Dentro de la función visibilizando valores <hr />";
    echo "Valor de los parámetros \$num1 = $num1 \$num2 = $num2 \$num3 = $num3<br />";
    $num1+=5;
    $num2+=5;
    $num3+=5;

    echo "Valor de los parámetros \$num1 = $num1 \$num2 = $num2 \$num3 = $num3<br />";
    echo "Salgo de la función";
}
//Ahora considero programa principal
$a=100;
$b=200;
$c=300;
echo "En el main antes de invocar a la función visualizando variables<hr />";
echo "Valor de variables \$a = $a \$b = $b \$c = $c <br />";
a($a,$b,$c);
echo "En el mail  después de invocar a la función visualizando variables<hr />";
echo "Valor de variables \$a = $a \$b = $b \$c = $c <br />";


/*<!--**FUNCIONES ANÓNIMAS-->
Son funciones que no tienen nombre
Se asignan a variables.*/

// Ejemplo con función anónima
$operacion_anonima = function ($a, $b) {
    return $a + $b;
};
echo $operacion_anonima(3, 4);  // Imprime 7

// ===================================
// Ejemplo con función flecha
$operacion_flecha = fn($a, $b) => $a + $b;
echo $operacion_flecha(3, 4);  // Imprime 7

//ORDEN DE EJECUCION de ejecución
/*En PHP, las funciones anónimas asignadas a variables no pueden ser invocadas antes de su declaración.
Por lo tanto, el siguiente código dará un error:
php*/

echo $mi_funcion();  // Error: variable $mi_funcion no definida aún
$mi_funcion = function () {
    return "hola caracola";
};

?>