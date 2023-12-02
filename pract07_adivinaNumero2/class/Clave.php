<?php

namespace Jugada;

class Clave
{
    static private int $clave;

    static public function obtener_clave()
    {
        //variable de sesion
    if (!isset($_SESSION['clave']))
            $_SESSION['clave'] = rand(1, 1024);
        self::$clave = $_SESSION['clave'];
        return self::$clave;

    }



}