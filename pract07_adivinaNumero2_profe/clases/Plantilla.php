<?php
/*
 * Clase con todos los métodos estáticos
 * Aquí incluiremos las accoines que nos den parte del html
 * que queramos visualizar
 * */

namespace jugadas;

class Plantilla
{
    static public function obtener_informe_jugada(Jugada $jugada): string
    {
        $msj = "<h2>Informe de la jugada " . sizeof($_SESSION['jugadas']) . "</h2>";
        $msj .= "<h3>$jugada</h3>";
        return $msj;
    }
    static public function get_informe_final(): string
    {
        $msj="";
        foreach ($_SESSION['jugadas'] as $numero_jugada =>$jugada) {
            $jugada = unserialize($jugada);
            $msj .="<h1>Jugadas número $numero_jugada<h1>".$jugada;
        }

        return $msj;
    }

}