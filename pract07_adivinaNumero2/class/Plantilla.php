<?php

namespace Jugada;

class Plantilla
{
    private int $numero;
    private int $hora;
    private bool $resultado;


    public static function get_clave():string{
        //puedo acceder a la clase Clave porque estoy en el mismo namespace.
        $html="<h1>".Clave::obtener_clave()."</h1>";
        return $html;
    }
}