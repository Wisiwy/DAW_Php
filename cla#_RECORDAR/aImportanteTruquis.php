<?php

/***Recordar que es.*/
ini_set("display_errors", true);
error_reporting(E_ALL);


/*** RESOLUCIÓN DE NULOS '??'*/
$c = 2;
$numero = $a ?? $b ?? $c ;
//resolucion de nulos coge la primera variable y si es nula pasa a la siguiente.
//La última dara error si esta vacia

/***FILTER_VAR , FILTER_INPUT
 *
 * filter_var($variable, $filtro)
 *      -$variable . Es la variable a filtar. Correspondería al valor del name del input que queremos recuperar.
 *      -$filtro. Es el tipo de filtro que se quiere aplicar. Para ver los tipos de filtros, consultamos a la página web http://php.net/manual/es/filter.filters.validate.php.
 *
 * filter_input($tipo_entrada. $variable, $filtro)
 *      -$tipo_entrada: Uno de los siguientes: INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER o INPUT_ENV.
 *      -$variable: como en el caso anterior.
 *      -$filtro: como en el caso anterior.*/
$nombre = htmlspecialchars( filter_input(INPUT_POST,'nombre'));
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT); //Filtra que sea entero


/****HEADER
 * Cargar pagina
https://www.php.net/manual/es/function.header.php */
header ("Refresh:5; url=URL_de_la_pagina");
exit();


/****MATCH
 * operador contro, esuna comparación estricta*/
$numero_mes = rand(1,4);
$nombre_mes = match ($numero_mes){
    1=>"Enero",
    2=>"Febrero",
    3=>"Marzo",
    default => "Mes incorrecto"
};
echo "El mes $numero_mes es $nombre_mes <br>";

///////////////////////////////////////////////////////
/// OTROS TRUQUIS/////////
//////////////////////////
/**DESCRIPCION DE FUNCION '/**' + ENTER para sacar los comentarios de la función
 * @param $num1
 * @param $num2
 * @return mixed
 */
function miFuncion($num1, $num2)
{
    return ($num1 > $num2)?$num1:$num2;
}

/**
 * HEREDOC - <<<FIN ---- FIN;
 */
//Forma de asignar una cadena a una variable.
//<<<FIN no puede llevar espacios en blanco.
//entre <<<'FIN' comillas simples actuan como comillas.
//etiqueta <pre> preformato. El formato del codigo.

$nombre = "MANUEL";
$heredoc = <<<FIN
<pre>
En un lugar de \tla mancha de cuyo $nombre \nno quiero acordarme
</pre> 
FIN; //atento a la tabulación, al inicio

echo $heredoc;