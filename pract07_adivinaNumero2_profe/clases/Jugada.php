<?php
/**
 * Una jugada es la acción que realiza el usuario
 * Cada jugada tiene el número con el el juego, en instante de la jugada y un restultado
 */

namespace jugadas;

class Jugada
{
    private int $numero;
    private int $hora;
    private int $resultado;

    public function __construct(int $num)
    {
        $this->numero = $num;
        $this->hora = time();
        $this->evaluar_jugada($num);
    }

    /**Ç
     * @param $numero a evaluar
     * @return void guardo en resultado
     * el valor será 1 (mayor) 0 (he acertado) -1 (menor)
     * Observa el operador utilizado "nave espacial"
     */
    private function evaluar_jugada($numero)
    {
        $this->resultado = $numero <=> Clave::obtener_clave();
    }

    /*
     * Convierto la jugada en un texto informativo sobre la misma
     */
    public function __toString()
    {
        $msj_resultado = match ($this->resultado) {
            1 => "Mayor",
            -1 => "Menor",
            0 => "Acertado"
        };
        $hora = date("H:i:s");
        return <<<FIN
                Numero en la jugada <span class='resaltado'>$this->numero</span>
                Instante <span class='resaltado'>$hora</span>
                Con resultado <span class='resaltado'>$msj_resultado</span>

FIN;
    }

    //Retorno el 1, 0 p -1 informando del resultado (mayor, acertado o menor respectivamente)
    public function get_resultado(){
        return $this->resultado;
    }


}