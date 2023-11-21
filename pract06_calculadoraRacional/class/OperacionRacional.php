<?php

class OperacionRacional extends Operacion
{
    public function __construct($cadena)
    {
        parent::__construct($cadena);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);

    }

    function operar()
    {
        $retorno = null;
        switch ($this->operador) {
            case '+':
                $retorno = $this->op1->sumar($this->op2);
                break;
            case '-':
                $retorno= $this->op1->restar($this->op2);
                break;
            case '*':
                $retorno= $this->op1->multiplicar($this->op2);
                break;
            case '/':
                $retorno= $this->op1->dividir($this->op2);
                break;

        }
        return $retorno;

    }

    public function __toString(): string
    {
        return parent::__toString();
    }

}