<?php

/***Recordar que es.*/
ini_set("display_errors", true);
error_reporting(E_ALL);

//**ESCRIBIR AL PRINCIPIO DEL PROGRAMA**
/**
 * User: Raúl Gómez Sanz
 * Date: 02/12/23
 * Version: 00.1
 */

//COMPOSER
require "vendor/autoload.php";
/*"autoload": {
    "classmap": ["class"],
    "psr-4": {
        // "Nombre_Espacio\\":"Dir_donde_están_las_clases",
        "controladores\\": "class/controladores",
    }
  }*/

//**FILTER INPUT y **HTMLSPECIALCHARS
$nombre = htmlspecialchars( filter_input(INPUT_POST,'nombre'));

            //Ejemplo en: cla13_cookies/Formulario_Cookies/_index.php

    //FILTER_VALIDATE_INT
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT); //Filtra que sea entero

//**CONSTANTES USARLAS
    const NOMBRE_INCORRECTO = 1;
    const TELEFONO_INCORRECTO = 2;
        //llamar de una clase
            MiClase::CONSTANTE_EJEMPLO;
