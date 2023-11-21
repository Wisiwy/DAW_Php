<?php
//Crearemos una clase operacion real y racional para Realizar los calculos.


abstract class Operacion
{
    protected int|string|Racional $op1;
    protected int|string|Racional $op2;
    protected string $operador;
    const OPERACION_REAL = 1;
    const OPERACION_RACIONAL = 2;
    const ERROR = 0;

    /**
     * @param int|string $op1
     */
    public function __construct(int|string $cadena)
    {
        $this->operador = $this->busca_operador($cadena);
        $numero = explode($this->operador, $cadena);
        $this->op1 = $numero[0];
        $this->op2 = $numero[1];
    }

    static public function tipo_operacion(string $cadena)
    {
        $retorno = self::ERROR;
        //Expresiones regulares de los elementos a comprobar
        $numeroEntero = "[0-9]+";
        $numeroReal = "$numeroEntero(\.[0-9]+)?";
        $numeroRacional = "$numeroEntero\/[1-9]+[0-9]*"; //*le indicamos que 0 o mas . Puede no estar el [0-9].
        $operadorReal = "[\-\+\*\/]";
        $operadorRacional = "[\-\+\*\:]";

        $operacionReal = "^$numeroReal$operadorReal$numeroReal$";
        $operacionRacional = "^$numeroRacional$operadorRacional$numeroRacional$";
        $operacionRacional1 = "^$numeroEntero$operadorRacional$numeroRacional$";
        $operacionRacional2 = "^$numeroRacional$operadorRacional$numeroEntero$";

        $retorno = match (1) { //Ponemos uno porque pregmatch devuelve entero no true
            preg_match("#$operacionReal#", $cadena) => self::OPERACION_REAL,
            preg_match("#$operacionRacional#", $cadena) => self::OPERACION_RACIONAL,
            preg_match("#$operacionRacional1#", $cadena) => self::OPERACION_RACIONAL,
            preg_match("#$operacionRacional2#", $cadena) => self::OPERACION_RACIONAL,
            default => self::ERROR
        };
        return $retorno;
    }

//La operacion puede ser real o racional. Tendremos clases para las dos posibilidades
    abstract function operar();

    private function busca_operador($cadena)
    {
        //Mejor jugar con una variable un solo retorno
        $retorno = "/";
        if (str_contains($cadena, '+'))
            $retorno = '+';
        if (str_contains($cadena, '-'))
            $retorno = '-';
        if (str_contains($cadena, '*'))
            $retorno = '*';
        if (str_contains($cadena, ':'))
            $retorno = ':';
        //Tiene que ser la ultima porque puede ser parte del
        // numero tiene que ser la última la única que queda.
        if (str_contains($cadena, '/'))
            $retorno = '/';
        return $retorno;

    }

    public function __toString(): string
    {
        return "$this->op1 $this->operador $this->op2";

    }

}
