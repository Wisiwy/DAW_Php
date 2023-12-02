<?php

namespace Jugada;

class Jugada
{
    private int $numero;
    private string $hora;
    private bool $resultado;

    public function __construct($numero = null,  $hora = null, $resultado = null)
    {
        $this->numero = $numero;
        $this->hora = $hora;
        //$this->resultado = $resultado;
    }

    public function jugar ($clave){
        $this->resultado = $this->numero == $clave ? true : false;
    }

    public function isResultado(): bool
    {
        return $this->resultado;
    }
    /*public function pista*/



}