<?php


/*PHP es un lenguaje debilmente tipado
 En este sentido php es un lenguaje de tipado dinámico,
 el tipo de la variable depende del valor que
tiene en un momento dado o de los operadores que lo afecten. */


$a = 5; //Ahora la variable $a es de tipo entero
$b = "Nieves"; //Ahora la variable $b es de tipo string
$c = 5.3; //Ahora la variable $b es de tipo string
$d = false; //boolean
$e = null; //null

//*** gettype()
echo "Valor de la variable \$a es $a y es de tipo ".gettype($a)."<br />";
echo "Valor de la variable \$a es $b y es de tipo ".gettype($b)."<br />";
echo "Valor de la variable \$a es $c y es de tipo ".gettype($c)."<br />";
echo "Valor de la variable \$a es $d y es de tipo ".gettype($d)."<br />";
echo "Valor de la variable \$a es $e y es de tipo ".gettype($e)."<br />";

//**STRINGS
//Concatenacion
$nombre="Manuel";
$apellido="Romero";
echo "Tu identificación $nombre_$apellido <br>";//mal solo sale "Romero"
echo "Tu identificación $nombre"."$apellido<br>";
echo "Tu identificación {$nombre}_{$apellido}<br>  ";

/**CONSTANTES
 * Se definen con la función define()
 * O con la palabra reservada const*/
const  A =1;
define ("B", "Cadena");
//Visualización de valores
echo "valor de la constante A ".A ."<br />";
echo "valor de la constante B ".B."<br />";
echo "tipo de la constante A ". gettype(A)."<br />";
echo "tipo de la constante B ". gettype(B)."<br />";