<?php

/*Funciones anónimas y funciones flecha*/

$pre = "Qué tal estas";
function saludo ($msj){
    /*Acceder a variable fuera de la función*/
    global $pre;
    /*Volvemos global una variable interna de la función*/
    global $msj;
    $msj = $msj." mas texto que pongon en la función";
    echo $pre.$msj;

}
/*Referenciamos la variable
     &pre->Le pasamos la posicíón de memoria de la variable - Pasmos por valor
Pasar por valor o por referencia. */

function saludo2 ($msj, &:$pre){
    global $pre;
    global $msj;
    $msj = $msj." mas texto que pongon en la función";
    echo $pre.$msj;

}
$msj = "Pedro";

/*------------------------------------------*/
/*Use accedemos valirames del ambito del script. Con &$pre -> referenciamos la dirección de memoria-*/
$saludo = function ($msj) use (&$pre){
    return{$pre.$msj};
};

/*Funciones flecha
    Tengo acceso atodas las variables del codigo pero sin poder modificar. */
/*$saludo = fn() => expresion;*/
$saludo = fn($msj) => $msj;/*A partir de la version 7.3*/
echo $saludo("qué tal estas");
exit();
