<?php
/*Definir Arrays. */
$modulos1 = array(0 => "Programación",
    1 => 'Base de datos');
var_dump($modulos1);
$notas1 = array(20, 10, 4, 2, 1);
$notas2 = [20, 10, 4, 1, 2];
var_dump($notas1);
var_dump($notas2);

/*Vacio y añadir arrays*/
$notas3 = [];
$notas3 = [2, 3, 5];
var_dump($notas3);
$notas3 = [8]; //no se suma se iguala
var_dump($notas3);
var_dump($notas3);
$notas3[20] = 3; //agregar un nuevo elemento especificar índice [20]
var_dump($notas3);
$notas3[] = 23; //agregar un nuevo elemento sigue el índice en la 21
var_dump($notas3);

/*Eliminar elemento de una posición*/
unset ($notas3[21]);
var_dump($notas3);
$notas3[] = 3; //sigue el indice 22 aunque hayamos borrado la anterior.
var_dump($notas3);

/******FUNCIONES*******/
$size = sizeof($notas3);
var_dump($size);
$size = count($notas3);
var_dump($size);
echo "valor de posición 0 es $notas3[0]";

/*Recorrer un Array*/
//Nunca con un for, lo haremos con un for..each
foreach ($notas3 as $i => $valor) { //"Para cada elemento de notas guardo en un indice el valor"
    echo "<h2> Posición $i - valor $valor  </h2>";
    /*i es la variable indice local del for each, que recorre el Array. */
}
foreach ($notas3 as $i => &$valor) {
    //Para modificarla dentro del foreach hay que referenciarlo
    $valor++;
    echo "<h2> Posición $i - valor $valor  </h2>";
}

/*otras funciones*/
$notas = array_fill(0, 10, rand(1, 100));
var_dump($notas); //todas las posiciones el mismo numero.
//array_map que se ejecute a cada uno de los elementos del array

$rellenar = fn() => rand(1, 10); //Devuelve un valor aleatorio.Función flecha.
$cuadrados = fn($num) => $num ** 2;
$notas = array_map($rellenar, $notas); //Aplica función a cada uno de los elemntos funcion.
var_dump($notas);
$notas = array_map($cuadrados, $notas); //Aplica función a cada uno de los elemntos funcion.
var_dump($notas);

/*EJERCICIO: Array 10 notas y obtener max, min y media*/

$notas4 = [];
$notas4 = array_map(rellenar, $notas4);
$maxNota = max($notas4);
$minNota = min($notas4);
$suma = array_sum($notas4);
$media = $suma / count($notas4);
var_dump($notas4);
echo "Max $maxNota - Min $minNota";
/*$maxNota = ($notas4);*/









