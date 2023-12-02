<?php
// tambien el caracter / como #, ambos sirven para delimitar la regEx

//CORREO ELECTRONICO
$email = "usuario@example.com";
if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    echo "Correo electrónico válido";
} else {
    echo "Correo electrónico no válido";
}

//VALIDAR NUMEROS ENTERASO EN UNA CADENA
$cadena = "La edad es 25 y el salario es 5000";
preg_match_all('/\d+/', $cadena, $numeros); //guarda las coincidencias en la variable numeros
print_r($numeros[0]);

//REEMPLAZAR PALABRAS EN UNA CADENA
$texto = "El perro es rápido y el gato es rápido también";
$nuevoTexto = preg_replace('/rápido/', 'veloz', $texto);
echo $nuevoTexto;

//DIVIDIR UNA CADENA EN PALABRAS
$frase = "Hola, ¿cómo estás?";
$palabras = preg_split('/\s+/', $frase);
print_r($palabras);

//ELIMINAR ESPACIOS EN BLANCO
$cadena = "   Esto es un ejemplo   ";
$cadenaLimpia = trim($cadena);
echo $cadenaLimpia;

//CONVERTIR UN TXT A MINUSCULAS
$texto = "CONVERTIR A MINÚSCULAS";
$textoMin = strtolower($texto);
echo $textoMin;

//VALIDAR UNA URL
$url = "https://www.ejemplo.com";
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "URL válida";
} else {
    echo "URL no válida";
}
