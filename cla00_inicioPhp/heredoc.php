<?php
//Forma de asignar una cadena a una variable.
//<<<FIN no puede llevar espacios en blanco.
//entre <<<'FIN' comillas simples actuan como comillas.
//etiqueta <pre> preformato. El formato del codigo.

$nombre = "MANUEL";
$heredoc = <<<FIN
<pre>
En un lugar de \tla mancha de cuyo $nombre \nno quiero acordarme
</pre> 
FIN;

echo $heredoc;