<?php

namespace Utilidades;

class Tabla
{
    private string $title;
    private string $cabecera;
    private string $contenido;

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

    public function add_contenido(array $contenido)
    {   //Array de arrays. Un con cada fila.
        var_dump($contenido);
        $this->contenido = "";
        foreach ($contenido as $fila) {
            
            $this->contenido .= " </tr > ";
            $this->contenido .= "<td>$nombre</td><td>$valor</td>";
            $this->contenido .= " </tr > ";
        }
        var_dump($this);
    }

    public function __toString(): string
    {
        return "<table> $this->title$this->cabecera$this->contenido </table >";

    }

}