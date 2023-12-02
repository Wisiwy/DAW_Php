<?php

/***Recordar que es.*/
ini_set("display_errors", true);
error_reporting(E_ALL);

//**ESCRIBIR AL PRINCIPIO DEL PROGRAMA**
/**
 * User: Nombre y apellidos
 * Date: 19/10/17
 * Version: 17:40
 */

//COMPOSER


//**FILTER INPUT y **HTMLSPECIALCHARS
$nombre = htmlspecialchars( filter_input(INPUT_POST,'nombre'));

    //FILTER_VALIDATE_INT
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT); //Filtra que sea entero
