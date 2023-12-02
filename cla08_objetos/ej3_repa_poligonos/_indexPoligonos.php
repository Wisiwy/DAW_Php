<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 02/12/23
 * Version: 00.1
 */


ini_set("display_errors", true);
error_reporting(E_ALL);
require "vendor/autoload.php";

use poligonos\Cuadrado;
use poligonos\Rectangulo;
use poligonos\Triangulo;
use poligonos\Poligono;

//instanciar objetos
$triangulo =  new Triangulo(200,400);
$cuadrado =  new Cuadrado(400);
$rectangulo =  new Rectangulo(200,400);
//visualizar string de lados poligono
echo "\n Triangulo, ".Poligono::lados($triangulo);
echo "\n Cuadrado, ".Poligono::lados($cuadrado);
echo "\n Rectangulo, ".Poligono::lados($rectangulo);
//visualizar area
echo "<br>";
echo "\n Area del Triangulo: ".$triangulo->area();
echo "\n Area del Cuadrado: ".$cuadrado->area();
echo "\n Area del Rectangulo: ".$rectangulo->area();
