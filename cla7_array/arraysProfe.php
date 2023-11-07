<?php

//Creo un array vacío;
$notas = array_fill(0, 10, 0);
$genera_notas = fn()=>rand(1,10);
$notas = array_map($genera_notas,$notas );
$mayor = $notas[0];
$menor = $notas[0];
$suma=0;

$mayor = max ($notas);
$menor = min ($notas);
$media = array_sum($notas)/count($notas);

foreach ($notas as $nota){
    $mayor = ($nota> $mayor)? $nota: $mayor;
    $menor = ($nota< $menor)? $nota: $menor;
    $suma+=$nota;
}
echo "<h2>La nota mayor es $mayor</h2>";
echo "<h2>La nota menor es $menor</h2>";
echo "<h2>La nota media es".($suma/count($notas)). "</h2>";