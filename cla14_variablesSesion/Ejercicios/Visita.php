<?php

class Visita
{
    private $hora;
    private string $tipo;

    const VIA_SUBMIT = 1;
    const VIA_URL = 2;

    public function __construct(int $tipo = self::VIA_URL)
    {
        $this->hora = date("H:i:s");

        $this->tipo = match ($tipo) {
            1 => 'submit',
            2 => 'url',
            default => 'error'
        };
    }
    public function __toString(): string
    {
        return <<<FIN
            Via $this->tipo // Hora $this->hora
FIN;

    }

}