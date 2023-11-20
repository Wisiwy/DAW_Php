<?php
/*Ejercicio 2: Clase Menu

    Confeccionar una clase llamada Menu.
Permitir añadir diferentes opciones al menú, según necesitáramoss.
Mostrar el menú en forma horizontal o vertical (según que método llamemos)*/

class Menu
{

    private $titulo;
    private $opciones;
    private $orientacion;


    /**
     * @param $opciones
     */
    public function __construct(string $titulo, array $opciones, $ori)
    {
        $ori = strtolower($ori);
        if ($ori == 'v') {
            $this->vertical( $titulo,  $opciones);
        }else
            $this->horizontal( $titulo,  $opciones);
    }
    public function vertical(string $titulo, array $opciones ){
        //menu vertical
        echo "<h3>$titulo vertical</h3>";
        echo "<ol>";
        foreach ($opciones as $opcion) {
            echo "<li>$opcion</li>";
        }
        echo "</ol>";
    }
    public function horizontal(string $titulo, array $opciones ){
        echo "<h3>$titulo horizontal</h3>";
        foreach ($opciones as $opcion) {
            //Como coger la posicion en arrays. 
            echo "$opcion &nbsp;";
        }
    }

}