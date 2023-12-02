<?php
/*Recorrer un string como un array de caracteres

    Podemos recorrer un array como un vector de caracteres
    Esto nos puede permitir controlar y gestionar los string analizando cada carácter.*/
$nombre = "Manuel Romero Miguel ";
for ($n=0; $n<strlen($nombre); $n++){
    echo "Cáracter en posicion <strong>$n</strong> es <strong>".$nombre[$n]."</strong><br />";
}