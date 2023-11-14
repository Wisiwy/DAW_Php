<?php

class Racional
{
//atributos

    private $numerador;
    private $denominador;

//metodo
    public function __construct($numerador = null, $denominador = null)
    {
        if (is_string($numerador)) {
            $racional = explode("/", $numerador);
            $numerador = $racional[0];
            $denominador = $racional[1];

        }
        $this->numerador = ($numerador == null) ? 1 : $numerador; //podemos especificarlo en el constructor
        $this->denominador = ($denominador == null) ? 1 : $denominador;
    }

    public function __toString(): string
    {
        return "$this->numerador/$this->denominador";
    }

    public function visualiza()
    {
        return "$this->numerador/$this->denominador";
    }

}