<?php
/**+Include VS Required
 * Ambas incluyen el contenido de un fichero php en esa posición
    - INCLUDE si no se encuentra se continúa ejecutando en esa posición
    - REQUIRED si no está el fichero se detiene en ese punto la ejecución del script
 *  - _ONCE antes de incluirlo mira a ver si ya lo incluyó previamente en cuyo caso ya no lo hace

 * */

echo "<h1> Ahora voay a RAAAA include.php </h1>";
include "./ficheros/include.php";
include "./ficheros/noexiste.PHP"; //sigue la ejecucion
include "./ficheros/include.php";

require "./ficheros/include.php";
require "./ficheros/noexiste.php"; //no sigue la ejecucion del programa
require "./ficheros/include.php";

include_once "./ficheros/include.php";
include_once "./ficheros/noexiste.php"; //sigue la ejecucion
include_once "./ficheros/include.php";

require_once "./ficheros/include.php";
require_once "./ficheros/noexiste.php"; //sigue la ejecucion
require_once "./ficheros/include.php";


?>