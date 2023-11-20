<?php


abstract class Operacion
{
    protected int|string $op1;
    protected int|string $op2;
    protected string $operador;
    const OPERACION_REAL=1;
    const OPERACION_RACIONAL=2;
    const ERROR=0;

static public function tipo_operacion(string $cadena){
    $retorno = self::ERROR;
/*    //Expresiones regulares de los elementos a comprobar
    $numero_entero = "[0-9]+";
    $numero_real = "$numero_entero\[\.$numero_entero\]?";
    $numero_racional = "$numero_entero\/";/*?¿?¿
    $operador_real = "\+|\-|\*|\:|\" */

    $regEx_Real = "#\d+(\.\d+)?[+\-*:]\d+(\.\d+)?#";
    $regEx_Racional = "#\d+(\.\d+)?[+\-*/]\d+(\.\d+)?#";

    //Hacerlo por el metodo profe mejor separacion de regEx


}

    abstract function operar();

}
