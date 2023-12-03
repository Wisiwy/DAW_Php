<?php

namespace adivinaNumero2;

class Plantilla
{
static public function informe_final(): string{
    $msj= "";
    foreach ($_SESSION['partida'] as $numero_jugada => $jugada){
        $jugada = unserialize($jugada);
        $numero_jugada++;
        $msj .= "<h2>Numero jugada $numero_jugada</h2>";
        var_dump($jugada);
        $msj .= "<h3>$jugada</h3>";
    }
    return $msj;

}


}