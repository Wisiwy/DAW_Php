<?php
//////DETERMINAR EXISTENCIA VARIABLES
///
/*****ISSET
 *Determina si una variable está definida y no es null
 */
$VariableValor = 5;
print ("El valor de la variable es $VariableValor<BR>");

print ("El valor de otra variable es $OtraVariableValor<BR>");
if (isset($VariableValor))
    print ("VariableValor tiene valor asignado<BR>");
else
    print ("VariableValor no no tiene valor asignado<BR>");
if (isset($OtraVariableValor))
    print ("OtraVariableValor tiene valor asignado<BR>");
else
    print ("OtraVariableValor no no tiene valor asignado<BR>");

/***IS_NULL()  Y   ***EMPTY() y IS_NUMERIC()
 *      -is_null($variable)    Determina si una variable ($variable) tiene valor null (BOOL)
 *      -empty($variable)    Determina si una variable ($variables)está vacía (BOOL)
 *      -is_numeric($variable) me dice si el valor de la variable es numércio
 */
echo "IS_NULL";
$a = null; //$a tiene valor null.
 is_null($a); //true
 unset($a); //*****UNSET Se destruye la variable y toma el valor null
 is_null($a); //true
 //$b una variable que no existe tiene el valor null
 is_null($b); //true

echo "EMPTY";
 $a=null; //$a está vacía
 empty($a); //true
 $a="";
 empty($a); //true
 $a="hola";
 empty($a); //false
 unset($a); /************UNSET: Destruye valor y toma null*/
 empty($a) ;//true
 $a=false;
 empty($a); //true !OJO!
 $a=0;
 empty($a); //true !OJO!


/**IS_INT: Otras
     * string is_int($variable);
     * string is_double($variable);
     * string is_bool($variable);
     * string is_integer($variable);
     * string is_null($variable);
     * string is_string($variable);
 *
 */



/*****VARDUMP
 * Nos da información sobre la estructura de un valor resultado de una expresion
 */
$array[] = [1, 2, 3, 4, 5];
var_dump($array); //void
