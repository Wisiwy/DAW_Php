<?php

class OperacionReal extends \class\Operacion
{
public function __construct(int|string $cadena)
{
    parent::__construct($cadena);
}

    function operar()
    {
        switch ($this->operador) {
            case '+':
                return $this->op1 + $this->op2;
            case '-':
                return $this->op1 - $this->op2;
            case '*':
                return $this->op1 * $this->op2;
            case ':':
                return $this->op1 / $this->op2;
            default:
                throw new \Exception('Unexpected value');
        }
    }

    public function __toString(): string
    {
        return parent::__toString();
    }
}