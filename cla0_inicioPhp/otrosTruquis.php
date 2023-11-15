<?php
/**ESCRIBIR '/**' + ENTER para sacar los comentarios de la función
 * @param $num1
 * @param $num2
 * @return mixed
 */
function miFuncion($num1, $num2)
{
    if ($num1 > $num2)
        return $num1;
    else
        return $num2;
}
// ?? RESOLUCIÓN DE NULOS
$c = 2;
$numero = $a ?? $b ?? $c ;
//resolucion de nulos coge la primera variable y si es nula pasa a la siguiente.
//La última dara error si esta vacia
    ?>