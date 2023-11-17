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