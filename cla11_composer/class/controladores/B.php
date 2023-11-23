<?php
namespace controladores;

class B
{
    public function __toString()
    {
        $msj = "Soy de la clase ".__CLASS__;
        $msj .= "<br>Estoy en el namespace ".__NAMESPACE__;
        return $msj;

    }
}