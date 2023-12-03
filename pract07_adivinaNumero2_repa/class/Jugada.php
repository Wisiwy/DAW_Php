<?php

namespace adivinaNumero2;

class Jugada
{
    private int $numero;
    private $hora;
    private bool $resultado;

    public function __construct($numero = null)
    {
        $this->numero = $numero;
        $this->hora = date("H:i:s");
        $this->jugar();

    }

    public function jugar()
    {
        $this->resultado = ($this->numero == Clave::obtener_clave()) ? true : false;
    }

    public function isResultado(): bool
    {
        return $this->resultado;
    }

    public function __toString()
    {
        $msjResultado = ($this->resultado) ? " acierto" : " fallo";
        return <<<FIN
                      <ul>
                          <li>Numero: $this->numero </li>
                          <li>Hora: $this->hora</li>
                          <li> Es un $msjResultado</li>
                      </ul>
                      FIN;

    }
}