<?php
/*Ejercicio 1: Clase Empleado

    Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
Definir un método inicializarlo para que lleguen como dato el nombre y sueldo.
Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos
 (si el sueldo supera a 3000 paga impuestos)*/

namespace ej1_claseEmpleado;

class Empleado
{
private $nombre;
private $sueldo;

    public function __construct(string $nombre, int $sueldo)
    {
    $this->nombre= $nombre;
    $this->sueldo= $sueldo;
    $this->impuestos();
    }
    public function impuestos(): void
    {
        if ($this->sueldo>3000)
            echo "<h2>Paga impuestos</h2>";
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getSueldo(): int
    {
        return $this->sueldo;
    }



}