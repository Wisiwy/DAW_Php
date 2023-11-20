<?php

class Bailarin extends Persona
{
    use \Trabajador;

    public function __construct(string         $nombre,
                                int            $edad,
                                int            $sueldo,
                                private string $estilo)
    {
        parent::__construct($nombre, $edad);
        echo "<h3>Nombre $this->nombre</h3>";
        $this->sueldo = $sueldo;
    }

    public
    function __toString(): string
    {
        return parent::__toString() . "estilo $this->estilo" . "sueldo $this->sueldo"; // TODO: Change the autogenerated stub
    }

    public function queja()
    {
        return  "No vuelvo a bailar $this->estilo";
        // TODO: Implement queja() method.
    }
}