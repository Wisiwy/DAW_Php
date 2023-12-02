<?php


abstract class Persona
{

    //PROTECTED: atributos del padre protected
    public function __construct(protected string $nombre,
                                protected int    $edad){}

    public function __toString(): string
    {
        return "$this->nombre, $this->edad";
        // TODO: Implement __toString() method.
    }

    //metodo abstracto que servira para los hijos, se tendra que implementar obligatoriamente
    abstract function queja();
}