<?php
//Contador de contactos
$tablaContactos = 'Agenda sin contactos';
$cuentaContactos = 0;
if (isset($_POST['submit'])) {
    $agenda = $_POST['agenda'] ?? [];
    //$nombre = $_POST['nombre'] ?? '';
    $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre')) ?? null;
    //$telefono = $_POST['telefono'] ?? '';
    $telefono = filter_input(INPUT_POST, 'telefono') ?? 0;

    //Miramos si hay error y mostramos mensaje dependiendo
    $error = validarDatos($nombre, $telefono);
    $advertencia = match ($error) {
        1 => "Introduce un nombre",
        2 => "Telefóno no numérico",
        default => "Sin error"
    };

    //Si estan bien miramos causistica de intro agenda
    if (is_null($error)) {
        $msj= "Contacto añadido";
        //si esta en la agenda lo borramos
        if (isset($agenda[$nombre])) {
            unset($agenda[$nombre]);
            $msj = ($telefono != 0) ? "Contacto $nombre actuallizado" : "Telefono borrado";
        }
        //si hay telefono añadimos contacto
        if ($telefono != 0)
            $agenda[$nombre] = $telefono;

        //TODO enseñar mensaje de accion.
        //TODO resumir en funcion intro contacto
        /*BORRAR.*/
        /*            //si hay telefono lo actualizamos
                    $msj="Contacto $nombre actuallizado";
                    //no se ha intro telefono
                    if($telefono==0)
                        $msj ="Telefono borrado";*/
    }

}

/**
 * @param $nombre
 * @param $telefono
 * @return int|null 1. Si el nombre no se introduce // 2. Si el telefono no es numerico.
 */
function validarDatos($nombre, $telefono): int|null
{
//Devuelve un numero dependiendo tipo de error
    //nombre vacio
    if ($nombre == null)
        return 1;
    //tlfo no numérico
    if (!(is_numeric($telefono)))
        return 2;
    //si no hay error '0'
    return null;

}
