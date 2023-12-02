<?php

//**EXPLODE** s
$cadena = "Juan,25|María,30|Carlos,22";
// Dividir la cadena en un array utilizando el delimitador ","
$datos = explode("|", $cadena);
// Iterar sobre el array resultante
foreach ($datos as $dato) {
    // Dividir cada elemento en nombres y edades utilizando el delimitador ","
    list($nombre, $edad) = explode(",", $dato);
    // Mostrar información
    echo "Nombre: $nombre, Edad: $edad años<br>";
}

// **IMPLODE** Dividir la cadena en un array usando el espacio como delimitador
$palabras = explode(" ", $cadena);
echo "Palabras en un array: ";
print_r($palabras);
$nuevaCadena = implode("-", $palabras);
echo "<br>Cadena después de unir: '$nuevaCadena'<br>";

//**TRIM**: Eliminar espacios en blanco al principio y al final
$cadena = "   Hola, Mundo!   ";
$cadena = trim($cadena);
echo "Cadena después de trim: '$cadena'<br>";

// **STRLEN**: Obtener la longitud de la cadena
    /**
 *RECORRER UN STRING COMO ARRAY DE CARACTERES
 *  Esto nos puede permitir controlar y gestionar los string analizando cada carácter.*/
         $nombre = "Manuel Romero Miguel ";
        for ($n=0; $n<strlen($nombre); $n++)
            echo "Cáracter en posicion <strong>$n</strong> es <strong>".$nombre[$n]."</strong><br />";

// **STRTOLOWER /UPPER** Convertir a minúsculas
$cadenaMinusculas = strtolower($cadena);
echo "Cadena en minúsculas: '$cadenaMinusculas'<br>";
$cadenaMayusculas = strtoupper($cadena);
echo "Cadena en mayúsculas: '$cadenaMayusculas'<br>";

// **STR_REPLACE**Reemplazar parte de la cadena
$cadenaReemplazada = str_replace("Hola", "Saludos", $cadena);
echo "Cadena después de reemplazar: '$cadenaReemplazada'<br>";

// **SUBSTR** Substring.Obtener parte de la cadena
$substring = substr($cadena, 5, 4); // Empieza en el índice 5 y toma 4 caracteres
echo "Substring de la cadena: '$substring'<br>";

// **SUBPOS** Buscar la posición de una subcadena
$posicion = strpos($cadena, "Mundo");
echo "Posición de 'Mundo': $posicion<br>";

//**STR_REPEAT** Repetir una cadena varias veces
$cadenaRepetida = str_repeat($cadena, 3);
echo "Cadena repetida 3 veces: '$cadenaRepetida'<br>";

//**STRIP_TAGS** Eliminar tags HTML
$html = "<p>Este es un <b>párrafo</b> HTML.</p>";
$sinHTML = strip_tags($html);
echo "Texto sin etiquetas HTML: '$sinHTML'<br>";

/*Recorrer un string como un array de caracteres

    Podemos recorrer un array como un vector de caracteres
    Esto nos puede permitir controlar y gestionar los string analizando cada carácter.*/
$nombre = "Manuel Romero Miguel ";
for ($n=0; $n<strlen($nombre); $n++){
    echo "Cáracter en posicion <strong>$n</strong> es <strong>".$nombre[$n]."</strong><br />";
}