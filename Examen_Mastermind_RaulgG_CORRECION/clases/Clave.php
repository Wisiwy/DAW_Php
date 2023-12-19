<?php

namespace Mastermind;

class Clave
{
    const COLORES = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marron', 'Rosa'];

    static private array $clave;
/******
CORRECCIÓN
Pero aquí los colores se pueden repetir
*/
    static public function generar_clave(): array
    {
        for ($i = 0; $i < 4; $i++) {
            $random = rand(1, sizeof(self::COLORES));
            $clave[] = self::COLORES[$random];
        }
        return $clave;
    }

    /******
    CORRECCIÓN
Pero esta función no la invocas ??????
    */
    static public function get_clave(): array
    {
        if (!isset($_SESSION['clave']))
            $_SESSION['clave'] = self::generar_clave();
        self::$clave = $_SESSION['clave'];
        return self::$clave;
    }


}