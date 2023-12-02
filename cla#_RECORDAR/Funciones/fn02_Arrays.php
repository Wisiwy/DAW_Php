<?php
// Definir un array inicial
$array = array(1, 2, 3, 4, 5);

//**COUNT($array)**: Cuenta el número de elementos en un array.
$numeroElementos = count($array);
echo "Número de elementos en el array: $numeroElementos<br>";

// **ARRAY_PUSH($array, $value)**: Añade uno o más elementos al final de un array.
array_push($array, 6, 7);
echo "Array después de añadir elementos: "; print_r($array);

// **ARRAY_POP($array): Elimina el último elemento de un array.
$ultimoElemento = array_pop($array);
echo "Último elemento eliminado: $ultimoElemento<br>";

// **ARRAY_MERGE($array1, $array2)**: Combina dos o más arrays.
$array2 = array(8, 9, 10);
$arrayCombinado = array_merge($array, $array2);
echo "Arrays combinados: "; print_r($arrayCombinado);

// **ARRAY_FILL($start_index, $num, $value)**: Llena un array con un valor específico.
$arrayLlenado = array_fill(0, 5, "Hola");
echo "Array llenado: "; print_r($arrayLlenado);

// **ARRAYP_MAP($callback, $array)**: Aplica una función a cada elemento de un array.
$arrayMapeado = array_map(fn($numero) => $numero * $numero, $array);
echo "Array después de aplicar la función cuadrado: "; print_r($arrayMapeado);

// **RANGE($start, $end, $step)**: Crea un array que contiene un rango de elementos.
$rangeArray = range(0, 10, 2); //[0, 2, 4, 6, 8, 10]
echo "Array generado con range: "; print_r($rangeArray);

// **ARRAY_REDUCE($array, $callback, $initial): Reduce un array a un solo valor.
$sumar = fn($acumulado,$valor)=>$acumulado+$valor;
$resultadoReducido = array_reduce($array, $sumar, 0);
echo "Resultado de reducir el array: $resultadoReducido<br>";

