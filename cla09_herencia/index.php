<?php
//Se ejecuta cuando usamos el "new". Busca si esta la clase y la carga. Ejecuta la función de carga.

$carga = fn($clase) => require ("$clase.php");
spl_autoload_register($carga);

/*AL SER ABSTRACTA NO DEJA CREAR UN OBJETO
 * $persona = new Persona("Pedro", 36);*/
$bailarin = new Bailarin ( "Maria", 45,4000, "Hip-hop");
$deportista = new Deportista( "David", 25,430, 22, "voley");

echo "hola";
/*echo "<h3> Person a vale $persona </h3>";*/
echo "<h3> Bailarin a vale $bailarin </h3>";
echo "<h3> Queja Deportista"."$deportista->queja"." </h3>";
echo "<h3> Queja Bailarin a vale $bailarin->queja </h3>";
