<?php
namespace poligonos;

 class Cuadrado extends Poligono
{
    public function __construct($base=null)
    {
        parent::__construct(4, $base, $base);
    }
    public function area()
    {
        return $this->base*$this->base;
    }
}