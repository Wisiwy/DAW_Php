<?php

namespace jugadas;
/**
 * La clave es el número a jugar
 * Este valor o bien lo recupero de una variable de sesión o lo genero
 * Todos métodos y atirbutos estáticos
 */

/** /
 * Esta clase necesita que esté abierta la sesión
 */
class Clave
{

    static private int $clave;

    /**
     * @return void
     * genera la clave y la guarda en variable de sesión
     */
    static private function generar_clave():int{
        $clave =rand(1,1024);
        $_SESSION['clave']=$clave;
        return  $clave;
    }
    static public  function regenerar_clave():int{
        $_SESSION['jugadas']=[];
        self::$clave=self::generar_clave();
        return self::$clave;
    }

    /**
     * @return int:  la clave
     * @example   si está en variable de sesión la toma de ahí,
     *            si no, la genera y la guarda
     */
    public static function obtener_clave():int{
        self::$clave = $_SESSION['clave'] ?? self::generar_clave();
        return self::$clave;
    }
}