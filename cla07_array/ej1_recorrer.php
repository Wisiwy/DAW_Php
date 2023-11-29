<?php
/*EJERCICIO 1: Recorrer una array básico
    Crea un array indexado con 5 valores de países y recórrelo con un for*/
echo " <h2>EJERCICIO 1</h2>";
$paises = ["Francia", "Portugar", "Italia", "Espaya", "Catalunya"];
echo " <h3> Recorrer pises con FOR</h3>";
for ($i = 0; $i < sizeof($paises); $i++) {
    echo "<h4>Posicion $i el país $paises[$i]</h4>";
}
/*    Ahora crea un array con 5 países como índice y sus correspondiente capitales como valores
    Después recorrelo con un foreach*/
$capitales = ["Francia" => "Paris",
    "Portugar" => "Lisboa",
    "Italia" => "Roma",
    "Espaya" => "Madriz",
    "Catalunya" => "Salou"];
echo " <h3> Recorrer capitales con FOREACH</h3>";
foreach ($capitales as $pais => $capital) {
    echo "<h4>Pais: $pais, Capital: $capital   </h4>";
}
/*---------------------------------------*/
/*EJERCICIO 2: Manipulando un array // Asignando y elmininando valores*/

//Creamos un array asingnándole 5 valores de forma indexada
//Asigna valores entero, cadenas, y la quinta posición que sea otro array de tres elementos
echo " <h2>EJERCICIO 2</h2>";
$varicoki1 = [1, 2.4, "melon", "cabrito", $array1 = ["array1", "array2  ", "array3"]];
//Lo visualizamos con un var_dump
var_dump($varicoki1);
//Agregamos valores en posiciones 15 y 30
$varicoki1[15] = "posicion15";
$varicoki1[30] = "posicion30";
$varicoki1[] = "sin decir posicion";
var_dump($varicoki1);

//Eliminamos los índices vacíos de forma que quede compacto(sin usar funciones)
//Es decir las desaparecen las posiciones 15 y 30 //Sus valores se mantienen en las posicones 5 y 6
/*$i = 0;
foreach ($varicoki1 as $valor) {
    $valorAux = $valor;
    if (!empty($valor[$i])) {
        $varicoki1[$i] = $valorAux;
    }
    echo "valor[$i]: $varicoki1[$i] // valor: $valor <br>";
    $i++;
    /*else {
        unset($varicoki1[$valor]);
    }
    //COMO RECOjo la posicion de $valor recoger el [15]del valor
}
var_dump($varicoki1); */
echo "SOL Array Aux ";
$varicoki1Compacto = [];
// Recorremos el array original y agregamos los valores no vacíos al nuevo array
foreach ($varicoki1 as $valor) {
    if (!empty($valor)) {
        $varicoki1Compacto[] = $valor;
    }
}

// Asignamos el nuevo array a la variable original para compactarla
$varicoki1 = $varicoki1Compacto;
var_dump($varicoki1);


