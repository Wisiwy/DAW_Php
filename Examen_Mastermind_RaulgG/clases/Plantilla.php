<?php

namespace Mastermind;

class Plantilla
{

    public static function escribir_clave(): string
    {
        $html = '';
        foreach ($_SESSION['clave'] as $color) {
            $html .= $color . "//";
        }
        return $html;

    }

    public static function escribir_combinacion($combinacion): string
    {
        $html = '';
        foreach ($combinacion as $color) {
            $html .= $color . "//";
        }
        return $html;

    }
}