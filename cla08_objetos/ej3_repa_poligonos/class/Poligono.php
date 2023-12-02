<?php
namespace poligonos;

abstract class Poligono
{
    protected $lados;
    protected $base;
    protected $altura;

    public function __construct($lados = null, $base = null, $altura = null )
    {
        $this->lados = $lados;
        $this->base = $base;
        $this->altura = $altura;
    }

    /**Clase abstracta no puede instanciar objetos pero si llamar mñetodos
     * ESTATICOPS
     * @param $obj Un objeto de la clase poligono
     * @return string
     */
    public static function lados ($obj){
        return "Este polígono tienen $obj->lados lados";
    }

    abstract function area();

}