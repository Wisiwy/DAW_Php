<?php
//OBJETOS
//Guarda clase en un fichero en MAYUSCULA. Identificar clases.
class Fecha
{
    //atributos
    //es obligatorio especificar el alcance, desde donde puedo ver los atributos: privados, publicos
    //BUENAS PRÁCTICAS: Por defecto private
    //private nos permite crear clases integras, controlar el tipo de dato que introducimos, controlar el
    //seteo de valore, inyectar el dato correcto
    private $dia;
    private $mes;
    private $year;

    //metodos

    //constructor. Php no permite polimorfismos. Dos metodos con el mismo nombre
    //No permite varios constructore. Solución MÉTODOS MÁGICOS(__doble subrayado.

    //POLIMOFISMO: si ponemos null no falla y acepta las cosas
    public function __construct($dia = null, $mes = null, $year = null)
    {
        if (is_string($dia)) {
            $fecha = explode("/", $dia);//como split en JAva
            $dia = $fecha[0];
            $mes = $fecha[1];
            $year = $fecha[2];

        }
        //En php los objetos son direcciones de memoria.
        $this->dia = ($dia == null) ? date("d") : $dia; //this. es obligatorio en Php. Referencia al objeto de la clase cuando lo instancie
        $this->mes = ($mes == null) ? date("m") : $mes;
        $this->year = ($year == null) ? date("Y") : $year;
    }
    //Metodo magico toString()

    /**
     * @return int|string
     */
    public function __toString(): string
    {
        return "$this->dia/$this->mes/$this->year";
        // TODO: Implement __toString() method.
    }

    public function visualiza()
    {
        return "$this->dia/$this->mes/$this->year";
    }

}