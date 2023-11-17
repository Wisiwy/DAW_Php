<?php

class Racional
{
//atributos

    private $numerador;
    private $denominador;

    /*//Explicar los atributos estaticos.Son elementos de la clase no del objeto
    El objeto puede acceder a su valor pero no es parte del objeto


    */
    public static $cuenta_racionales = 0;

//metodo
    public function __construct($numerador = null, $denominador = null)
    {
        if (is_string($numerador)) {
            $racional = explode("/", $numerador);
            $numerador = $racional[0];
            $denominador = $racional[1];

        }
        $this->numerador = ($numerador == null) ? 1 : $numerador; //podemos especificarlo en el constructor
        $this->denominador = ($denominador == null) ? 1 : $denominador;
        //Operador self::$cuenta_racionales++; Acceder a estatico
        self::$cuenta_racionales++;
        //Racional::$cuenta_racionales; Es lo mismo que lo anterior
    }

    public function __destruct()
    {
        self::$cuenta_racionales--;

    }

    public function __toString(): string
    {
        return "$this->numerador/$this->denominador";
    }


    public function visualiza()
    {
        return "$this->numerador/$this->denominador";
    }

    /**
     * @return void
     */
    public function sumar(Racional $r2): Racional
    {
        $num = ($this->numerador * $r2->denominador) + ($this->denominador * $r2->numerador);
        $den = $this->denominador * $r2->denominador;
        return new Racional($num, $den);
    }

    public function restar(Racional $r2): Racional
    {
        $num = ($this->numerador * $r2->denominador) - ($this->denominador * $r2->numerador);
        $den = $this->denominador * $r2->denominador;
        return new Racional($num, $den);
    }

    public function multiplicar(Racional $r2): Racional
    {
        $num = $this->numerador * $r2->numerador;
        $den = $this->denominador * $r2->denominador;
        return new Racional($num, $den);
    }

    public function dividir(Racional $r2): Racional
    {
        $num = $this->numerador * $r2->denominador;
        $den = $this->denominador * $r2->numerador;
        return new Racional($num, $den);
    }

    /**Simplificar al operacion .
     * @return Racional
     */
    public function simplifica()
    {
        $mcd = $this->mcd($this->numerador, $this->denominador);
        return new Racional($this->numerador / $mcd, $this->denominador / $mcd);
    }

    /**
     * Funcion recursiva para calcular maximo comun divisor
     * @param $n1
     * @param $n2
     * @return mixed
     */
    public function mcd($n1, $n2)
    {
        return $n2 == 0 ? $n1 : $this->mcd($n2, $n1 % $n2);
    }
    /*Funcion recursiva lo hace hasta que $n2 es igual a 0
    function mcd($n1,$n2){
        if($n2 == 0)
            return $n1;
        else
            return mcd($n2, $n1%$n2);
    }*/
}