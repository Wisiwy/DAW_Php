<?php
namespace poligonos;

 class Rectangulo extends Poligono
{
    public function __construct($base = null, $altura = null)
    {
        /*parent::__construct($base, $altura);
        $this->lados=3;*/
        //El número de lados lo ponemos directamente en CONSTRUCTOR
        parent::__construct(4, $base, $altura);

    }

    public function area()
    {
        return $this->base*$this->altura;
    }
}