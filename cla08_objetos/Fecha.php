<?php
//OBJETOS
//Guarda clase en un fichero en MAYUSCULA. Identificar clases.
class Fecha
{
    //***ATRIBUTOS o PROPIEDADES

    //*ENCAPSULACION : private, public o protected.
    //es obligatorio especificar el alcance, desde donde puedo ver los atributos: privados, publicos
    //BUENAS PRÁCTICAS: por defecto atributos private, metodos public
    //PRIVATE nos permite crear clases integras, controlar el tipo de dato que introducimos, controlar el
    //seteo de valores, inyectar el dato correcto.
    private $dia;
    private $mes;
    private $year;

    //***METODOS MÁGICOS
    //métodos por defecto son públicos,
    //constructor. Php NO permite polimorfismos. Dos metodos con el mismo nombre
    //No permite varios constructore. Solución MÉTODOS MÁGICOS "__doble subrayado".

    //POLIMOFISMO: si ponemos null no falla y acepta las cosas
    public function __construct($dia = null, $mes = null, $year = null)
    {
        if (is_string($dia)) {
            $fecha = explode("/", $dia);//como split en JAva
            $dia = $fecha[0];
            $mes = $fecha[1];
            $year = $fecha[2];

        }
        //PHP Almacena el valor de un objeto como una referencia (dirección de memoria), no guarda el valor.
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