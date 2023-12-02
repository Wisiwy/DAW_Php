<?php


trait Trabajador
{
    //herencia múltiple conseguir con trait
    protected int $sueldo;
    /**
     * @return int
     */
    public function getSueldo(): int
    {
        return $this->sueldo;
    }



}