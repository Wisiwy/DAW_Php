<?php

$num = 0;
empty($num); //no permite el 0

//no poner mixed mejor int|array

//**ARRAY_KEY_EXISTS**
$miArray = array(
    'nombre' => 'Juan',
    'edad' => 25,
    'ciudad' => 'Ejemplo'
);
// Verificar y mostrar mensajes usando notación ternaria
echo (array_key_exists('edad', $miArray)) ? "La clave 'edad' existe en el array.<br>" : "La clave 'edad' no existe en el array.<br>";
echo (array_key_exists('genero', $miArray)) ? "La clave 'genero' existe en el array.<br>" : "La clave 'genero' no existe en el array.<br>";
?>