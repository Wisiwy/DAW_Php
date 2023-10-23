<?php
$c = 2;
$numero = $a ?? $b ?? $c ; //resolucion de nulos coge la primera variable y si es nula pasa a la siguiente.
// La última dara error si esta vacia

/*-------------------------------------------------------------------------------------------------------------------*/
/** "/**" + enter para que saque los parametros  y el return
 * @param int $a
 * @param int $b
 * @return int
 */
function sumar (int $a, int $b) :int {
    return $a+$b;
}
/*-------------------------------------------------------------------------------------------------------------------*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>


</body>

</html>