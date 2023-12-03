<?php

namespace jugadaEj03;

class Jugada
{
    private int $dado1;
    private int $dado2;
    private $hora;
    private bool $resultado; //dice si se ha ganado o no la jugada

    public function __construct()
    {
        $this->dado1 = rand(1, 6);
        $this->dado2 = rand(1, 6);
        $this->hora = date("d/m/y H:i:s");
        $this->resultado = $this->jugar();
    }

    public function __toString()
    {
        $rtdo = $this->resultado ? 'Acierto' : 'Fallo';
        return "Dado1: $this->dado1 | Dado2: $this->dado2 | $this->hora | $rtdo";
      }

    private function jugar()
    {
        //gana si los dados son iguales o su suma <5
        return ($this->dado1 == $this->dado2) || ($this->dado1 + $this->dado2) < 5;
    }

    public function getDado1(): int
    {
        return $this->dado1;
    }

    public function getDado2(): int
    {
        return $this->dado2;
    }

    /**
     * @return false|string
     */
    public function getHora()
    {
        return $this->hora;
    }

    public function isResultado(): bool
    {
        return $this->resultado;
    }


}