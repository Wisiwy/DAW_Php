<!-- Comprobar el uso de isset($var) empty($var) is:null($var) -->
<?php
$VariableValor = 5;
print("El valor de la variable es $VariableValor <br>");
print("El valor de otra variable es $OtraVariableValor<br>");
if (isset($VariableValor))
    print("VariableValor tiene valor asignado<br>");
else
    print("VariableValor no no tiene valor asignado<br>");
if (isset($OtraVariableValor))
    print("OtraVariableValor tiene valor asignado<br>");
else
    print("OtraVariableValor no tiene valor asignado<br>");

//Comprobamos este codigo para las funciones 
echo "<hr />";
echo "<h3>Probamos la función is_null</h3>";
echo "<hr />";

//Usa notación ternaria ()?"se cumple" : "no se cumple"
$a;
echo is_null($a) ? "SI. <b>\$a </b>, es nulo <br>\n" : "NO <b>\$a</b> no es nulo<br>\n"; //SI
$a = null;
echo is_null($a) ? "SI. <b>\$a=null</b>, \$a es nulo <br>\n" : "NO <b>\$a=null \$a</b> no es nulo<br>\n"; //SI
$a = 5;
echo is_null($a) ? "SI. <b>\$a=5</b>, \$a es nulo <br>\n" : "NO <b>\$a=5</b> \$a no es nulo<br>\n"; //NO
$a = "";
echo is_null($a) ? "SI. <b>\$a=\"\"</b>, \$a es nulo <br>\n" : "NO <b>\$a=\"\"</b> \$a no es nulo<br>\n"; //NO
$a = false;
echo is_null($a) ? "SI. <b>\$a=false</b>, \$a es nulo <br>\n" : "NO <b>\$a=false</b> \$a no es nulo<br>\n"; //NO
$a = 0;
echo is_null($a) ? "SI. <b>\$a=0</b>,  \$a es nulo <br>\n" : "NO <b>\$a=0</b> \$a no es nulo<br>\n"; //NO
unset($a); //Eliminamos la variable

echo "<h3>Probamos la función isset</h3>";
echo "<hr />";

$a;
echo isset($a) ? "SI <b>\$a</b> está definido <br>\n" : "NO <b>\$a</b> no está definido<br>\n"; //NO
$a = null;
echo isset($a) ? "SI <b>\$a=null</b> \$a está definido<br>\n" : "NO <b>\$a=null</b> \$a no está definido<br>\n"; //NO
$a = 5;
echo isset($a) ? "SI <b>\$a=5</b> \$a está definido<br>\n" : "NO <b>\$a=5</b> \$a no está definido<br>\n"; //SI
$a = "";
echo isset($a) ? "SI <b>\$a=\"\"</b> \$a está definido<br>\n" : "NO <b>\$a=\"\"</b> \$a no está definido<br>\n"; //SI
$a = false;
echo isset($a) ? "SI <b>\$a=false</b> \$a está definido<br>\n" : "NO <b>\$a=false</b> \$a no está definido<br>\n"; //SI
$a = 0;
echo isset($a) ? "SI <b>\$a=0</b>  \$a está definido <br>\n" : "NO <b>\$a=0</b> \$a no está definido<br>\n"; //SI
unset($a); //Eliminamos la variable


echo "<h3>Probamos la función empty</h3>";
echo "<hr />";
$a;
echo empty($a) ? "SI <b>\$a</b> está vacío <br>\n" : "NO \$a</b> no es nulo<br>\n"; //SI
$a = null;
echo empty($a) ? "SI <b>\$a=null</b> \$a está vacío<br>\n" : "NO <b>  \$a=null</b> \$a no está vacío<br>\n"; //SI
$a = 5;
echo empty($a) ? "SI <b>\$a=5</b> \$a está vacío<br>\n" : "NO <b>\$a=5</b> \$a no está vacío<br>\n"; //NO
$a = "";
echo empty($a) ? "SI <b>\$a=\"\"</b> \$a está vacío<br>\n" : "NO <b>\$a=\"\"</b> \$a no está vacío<br>\n"; //SI
$a = false;
echo empty($a) ? "SI <b>\$a=false</b> \$a está vacío<br>\n" : "NO <b>\$a=false</b> \$a no está vacío<br>\n"; //SI
$a = 0;
echo empty($a) ? "SI <b>\$a=0</b>  \$a está vacío<br>\n" : "NO <b>\$a=0</b> \$a no está vacío<br>\n" //SI
?>