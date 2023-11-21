<?php

namespace class;

class OperacionRacional extends \class\Operacion
{


    public function __construct($cadena)
    {
        parent::__construct($cadena);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);

    }

    function operar()
    {
        switch ($this->operador) {
            case '+':
                return $this->op1->sumar($this->op2);
            case '-':
                return $this->op1->restar($this->op2);
            case '*':
                return $this->op1->multiplicar($this->op2);
            case '/':
                return $this->op1->dividir($this->op2);
        }

        // TODO: Implement operar() method.
    }
    public function __toString(): string
    {
        return parent::__toString();
    }

}