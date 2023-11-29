<?php

namespace aUtilidades;

class Tabla
{
    private string $title;
    private string $cabecera;
    private string $contenido;
    const ARRAY_ASOCIATIVO = 1;
    const ARRAY_INDEXADO = 2;


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

    public function add_contenido(array $contenido, int $tipo = self::ARRAY_INDEXADO)
    {
        //metodo que cambia de array asociativo a indexado
        if ($tipo == self::ARRAY_ASOCIATIVO)
            $contenido = $this->asociativo2indexado($contenido);
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