<?php
echo "<h1> Ahora voay a RAAAA include.pahp </h1>";
include "./ficheros/include.php";
include "./ficheros/noexiste.php"; //sigue la ejecucion
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