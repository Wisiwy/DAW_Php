<?php

//DEFINICIÓN y ASIGNACION
//indexado
$miArray = array();
$miArray = [];
$notas1 = array(20, 10, 4, 2, 1);
$notas2 = [20, 10, 4, 1, 2];

//asociativo
$capitales = array("España" => "Madrid",
    "Italia" => "Roma",
    "Alemania" => "Berlín");
$capitales2 = ["España" => "Madrid",
    "Italia" => "Roma",
    "Alemania" => "Berlín"];
//También se puede crear directamente con []
$capitales3["España"] = "Madrid";
$capitales3["Italia"] = "Roma";
$capitales3["Alemania"] = "Berlín";

//**AGREGAR ELEMENTOS
$modulos = array("PR" => "Programación",
    "BD" => "Bases de datos",
    "DWES" => "Desarrollo web en entorno servidor");
//agrego un nuevo elemento sin especificar posición
$modulos[] = "otro módulo";
//añado un módulo en el índice con valor  10  que NO ES LA POSICIÓN 10
$modulos[10] = "Módulo indexado con el índice 10";
//incorporamos un nuevo elmento en el array sin especificar el valor del índice
//PHP asignará un valor siguiente el último valor numérico que fue el 10 (indice último numérico agragado)
$modulos[] = "Último módulo añadido";
var_dump($modulos);

//**ELIMINAR ELEMENTO
unset ($notas1[4]);

//**RECORRER ARRAY
foreach ($capitales as $pais =>$capital){
    echo "La capital de la posición <b>$n</b> del país <b>$pais </b> es <b>$capital</b><br />";
    $n++;
}

/******FUNCIONES*******/
$size = sizeof($notas2);
var_dump($size);
$size = count($notas2);
var_dump($size);
echo "valor de posición 0 es $notas3[0]";

//OTRAS FUNCIONES
/* current() - Devuelve el elemento actual en un array
 * end() - Establece el puntero interno de un array a su último elemento
 * prev() - Rebobina el puntero interno del array
 * reset() - Establece el puntero interno de un array a su primer elemento
 * each() - Devolver el par clave/valor actual de un array y avanzar el cursor del array
 * key() - Obtiene una clave de un array
 * list() - Asignar variables como si fueran un array
 * next() - Avanza el puntero interno de un array
 * */




//rellenar arrays
$notas4 = [];
$notas4 = array_fill(0, 10, rand(1, 100));
$rellenar = fn() => rand(1, 10); //Devuelve un valor aleatorio.Función flecha.
$notas4 = array_map($rellenar, $notas4);

//EXTRAA "&"
//Si queremos modificarlo, tendríamos que hacer que el valor de $datos estuviera en la misma posoción de memoria que la posición correspondiente del array, y esto se consigue con el operador &, por lo que el bucle sería
//foreach ($productos as $producto=>&$datos){
   // en lugar de
//foreach ($productos as $producto=>$datos){