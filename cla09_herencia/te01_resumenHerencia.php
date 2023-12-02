<?php
//HERENCIA en PHP:
/*HERENCIA en PHP:
Principios de la Herencia:
    La herencia es un concepto fundamental en la programación orientada a objetos (OOP)
    que permite crear jerarquías de clases.

        -JERARQUÍA de Clases: Se crea una jerarquía de clases donde una clase principal (o superclase)
         tiene características comunes, y las clases secundarias (o subclases) heredan esas características y
         pueden agregar o modificar su comportamiento.

        -REUTILIZACIÓN de Código: Permite definir atributos y métodos comunes en una clase base,
         evitando redundancias y facilitando la reutilización de código.

        -EXTENDS: En PHP, la herencia se establece mediante la palabra reservada extends.
         Una clase secundaria hereda de una clase principal.*/
//PUNTOS CLAVE
/*  -NO  se pueden instanciar objetos de una clase abstracta;
    -EXTENDA se usa para establecer la herencia .
    -parent:: se utiliza para invocar métodos de la clase principal desde una clase secundaria .

La herencia en PHP permite construir estructuras jerárquicas que facilitan la organización y
reutilización del código en aplicaciones más complejas .*/

class Persona
{
    // Atributos y métodos comunes
}

class Sanitario extends Persona
{
    // Atributos y métodos específicos de Sanitario
}

//Podemos invocar a los métodos de la clase principal usando parent::.

/* ABSTRACTOS:
    Cuando hay métodos comunes a varias clases, pero su implementación varía en cada una,
    se utilizan clases y métodos abstractos.
    Una clase que tiene al menos un método abstracto se convierte en abstracta.
        MÉTODO ABSTRACTO: Un método sin código asociado que debe ser implementado por las clases hijas.
*/
abstract class Figura
{
    abstract public function area();
}

class Circulo extends Figura
{
    public function area()
    {
        // Implementación específica para el círculo
    }
}

