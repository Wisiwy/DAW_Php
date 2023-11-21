<?php

class OperacionReal extends Operacion
{
    public function __construct(int|string $cadena)
    {
        parent::__construct($cadena);
    }

    /**
     * @throws \Exception
     */
    function operar()
    {
        $retorno = null ;
        switch ($this->operador) {
            case '+':
                $retorno = $this->op1 + $this->op2;
                break;
            case '-':
                $retorno = $this->op1 - $this->op2;
                break;
            case '*':
                $retorno = $this->op1 * $this->op2;
                break;
            case '/':
                $retorno = $this->op1 / $this->op2;
                break;
            default:
                throw new \Exception('Unexpected value');
        }
        return $retorno;
    }

    public function __toString(): string
    {
        return parent::__toString();
    }
}