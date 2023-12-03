<?php

namespace jugadaEj03;
require "vendor/autoload.php";

class Tabla
{
    private string $title;
    private string $cabecera;
    private string $contenido;
    const ARRAY_ASOCIATIVO = 1;
    const ARRAY_INDEXADO = 2;

    const ARRAY_JUGADAS = 3;


    public function __construct($title)
    {
        $this->title = "<caption>$title</caption>";

    }

    public function add_cabecera(array $cabecera)
    {

        $this->cabecera = "<tr>";
        foreach ($cabecera as $valor) {
            $this->cabecera .= "<th>$valor</th>";
        }
        $this->cabecera .= "</tr>";


    }

    /**CAMBIA ASOCIATIVO a  INDEXADO DE ARRAYS
     * @param array $contenido array asociativo
     * @return array indexado de arrays
     */
    private function asociativo2indexado(array $contenido)
    {
        $array = [];
        foreach ($contenido as $key => $value)
            $array[] = [$key, $value];
        return $array;

    }

    private function jugada2array(array $contenido):array
    {

        //intento
        $infoJugada = [];
        //$arrayAuxIndexado[] = "";

        //devolvemos un array de arrays [Jugadas (filas)[inof jugada,dados,hora,rtdo]]
        foreach ($contenido as $index => $jugada) {
            $jugada = unserialize($jugada);

            //puede que haya problemas al reconocer JUGADA
            if ($jugada instanceof \jugadaEj03\Jugada){
                $dado1= $jugada->getDado1();
                $dado2= $jugada->getDado2();
                $hora = $jugada->getHora();
                $rtdo = $jugada->isResultado();
                $infoJugada[] =[$dado1,$dado2,$hora,$rtdo];
                //$arrayAuxIndexado[$index]=$infoJugada;
            }
        }

        //return $arrayAuxIndexado;
        return $infoJugada;

    }

    public function add_contenido(array $contenido, int $tipo = self::ARRAY_INDEXADO)
    {
        //metodo que cambia de array asociativo a indexado

        if ($tipo == self::ARRAY_JUGADAS)
            $contenido = $this->jugada2array($contenido);
        $this->contenido = "";
        //ahora tenemos array de arrays. Uno con cada fila.
        foreach ($contenido as $fila) {
            $this->contenido .= " </tr > ";
            foreach ($fila as $valor)
                $this->contenido .= "<td>$valor</td>";
            $this->contenido .= " </tr > ";
        }
    }

    public
    function __toString(): string
    {
        return "<table> $this->title$this->cabecera$this->contenido </table >";

    }


}