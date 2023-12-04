<?php

namespace Mastermind;
class Jugada
{
    private array $combinacion_user;
    private int $coloresCorrectos;
    private int $posicionesCorrectas;

    public function __construct(array $combinacion = null)
    {
        $this->combinacion_user = $combinacion;
        $this->checkJugada($combinacion);

    }

    private function checkJugada($combinacion): void
    {
        $clave = $_SESSION['clave'];
        foreach ($combinacion as $iUser => $userColor) {
            //comprobar si esta en la clave
            foreach ($clave as $iKey => $keyColor)
                if ($userColor == $keyColor) {
                    $this->coloresCorrectos++;
                    if($iKey==$iUser)
                        $this->posicionesCorrectas++;
                }
        }

    }
    public function __toString(): string
    {
        $htmlJugada = Plantilla::escribir_combinacion($this->combinacion_user);
        $htmlJugada .= "Colores acertado ".$this->coloresCorrectos;
        $htmlJugada .= "Posiciones acertado ".$this->posicionesCorrectas;
        return $htmlJugada;
    }

    public function getCombinacionUser(): array
    {
        return $this->combinacion_user;
    }

    public function getColoresCorrectos(): int
    {
        return $this->coloresCorrectos;
    }

    public function getPosicionesCorrectas(): int
    {
        return $this->posicionesCorrectas;
    }


}