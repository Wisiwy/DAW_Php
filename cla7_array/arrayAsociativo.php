<?php
/*Asociar indices '=>' */
$capitales = ["España" => "Madrid",
    "Francia" => "Paris",
    "Portugal" => "Lisboa"];
var_dump($capitales);
foreach ($capitales as $pais => $capital)
    echo "Capital $capital  de $pais  <br>";


/*Tema 5 :Modificar un array.(Sección apuntes). Array contenido ese un array. */
$productos = [
    'lechugas' => ['precio' => 100, 'unidades' => 50],
    'manzanas' => ['precio' => 200, 'unidades' => 100],
    'peras' => ['precio' => 300, 'unidades' => 150],
    'tomates' => ['precio' => 400, 'unidades' => 200],
    'cebollas' => ['precio' => 500, 'unidades' => 25],
];

echo "<h2>Visualizamos los productos</h2>";

//Visualizar: Para cada producto
foreach ($productos as $producto => $datos) {
    $precio = $datos['precio'];
    $unidades = $datos['unidades'];
    echo "<h3>Producto $producto precio $precio unidades $unidades</h3>";
}
//Modificar 10% el precio
echo '<hr>';

echo "<h2>Modificamos el precio (10%) y las unidades en 100 unidades</h2>";
foreach ($productos as $producto => &$datos) { //con el operador '&' accede al espacio de memoria
    $datos['precio'] *= 1.10;
    $datos['unidades'] += 100;

}
//Visualizar Array.
foreach ($productos as $producto => $datos) {
    $precio = $datos['precio'];
    $unidades = $datos['unidades'];
    echo "<h3>Producto $producto precio $precio unidades $unidades</h3>";
}
echo '<hr>';

foreach ($productos as $producto => $datos) {
    $precio = $datos['precio'] * 1.10;
    $unidades = $datos['unidades'] + 100;
    echo "<h3>Producto $producto precio $precio unidades $unidades</h3>";
}



