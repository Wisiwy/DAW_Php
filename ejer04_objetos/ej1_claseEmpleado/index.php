
<?php

use ej1_claseEmpleado\Empleado;
require_once "Empleado.php";

$e1 = new Empleado("Adolfo",4000);
$sueldo = $e1->getSueldo();
$nombre = $e1->getNombre();
echo "$nombre, sueldo de $sueldo";
$e1->impuestos();
$e2 = new Empleado("MAnuel", 1000);

