<?php

//MIRAR PRACTICA 1  DE AUTENTIFICACIÓN. Redireccionamientos si es o no correcta la pass.

header("Location:URL_de_la_página"); //MIRAR PRACTICA 1

//con tiempo de demora
header ("Refresh:5; url=URL_de_la_pagina");

/*EXIT()
 * Después de ejecutar la función header con redirección,
no tiene sentido que se ejecute el resto del script,
por lo que es aconsejable y útil poner la función de finalización de script exit(). */


/*input HIDDEN: pasar info por campos ocultos
 *
 * Cada vez que llamemos a la página siempre que el usuario se haya identificado vamos a especificar las veces que ha invocado a la página.
Para ello necesitamos enviar a la página del servidor la información de las veces que se ha invocado a la página.
La idea es que en campo oculto contenga ese valor, el servidor lea este valor, lo incremente y lo vuelva almacenar en el campo oculto.
*/
/*        <input type="hidden" name="valorOcultoaRescatar" value="$variable">*/