<?php
//Funcion time
$segundos = time();
echo "<h2>$segundos</h2>";


//date

$dia_actual = date("d"); //sacar dia actual

date_default_timezone_set('Europe/Madrid');  //coge la zona horaria del madrid
$fecha_actual = date("d-m-y H:i:s", time() );
$fecha_25h = date("d-m-y H:i:s", time() + (25*60*60));
echo "<h2>$fecha_actual</h2>";

//transformar valores a date
$fecha="01/09/1991";
$timestamp_nacimiento= strtotime("$fecha"); //parseasr  string a marca tiempo
echo "<h2> Segundos hasta $fecha son $timestamp_nacimiento</h2>";

//calcular tiempo desde mi nacimiento
$segundos_vida = time()-$timestamp_nacimiento;
echo "<h2> Segundos desde nacimiento $fecha son $segundos_vida </h2>";


//modo calculando desde segundos
/*$anos_vida = $segundos_vida / (60*60*24*365);
$resto = $segundos_vida%(60*60*24*365);
echo "<h2> Años desde nacimiento $fecha son $anos_vida </h2>"
echo "<h2> Dias resto desde nacimiento $fecha son $anos_vida </h2>"
$dias_vida = $resto / (60*60*24);
$resto = $segundos_vida%(60*60*24*365);*/

//modo fechas actuales

$dia_actual = date("d"); //sacar dia actual
$mes_actual = date("m"); //sacar dia actual
$year_actual = date("Y"); //sacar dia actual

$dia_naci = "01";
$mes_naci = "12";
$year_naci = "1991";

$year = $year_actual-$year_naci;
$year = $mes_naci > $mes_actual? $year-1:$year;
if (($mes_naci == $mes_actual) && ($dia_naci>$dia_actual))
    $year--;

$mes = $mes_actual-$mes_naci;
if ($mes <= 0)
    $mes = 0;


echo "<h2> Años desde nacimiento $fecha son año $year, mes  $mes</h2>";






?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<hr>
<h1>Zonas horarias</h1>

<h3><a href="spain.php"> En España </a> </h3>
<h3><a href="canarias.php"> En Canarias </a> </h3>
<h3><a href="austria.php"> En Austria </a> </h3>
<h3><a href="spain.php"> En España </a> </h3>
<h3><a href="spain.php"> En España </a> </h3>

<h2>Segundos después del 1/1/1970 a las 0:0 <span style = "color:#0051ff"> <?= $fecha_actual?> </span> </h2>
<h2>Segundos  <span style = "color:#0051ff"> <?= $fecha_actual?> </span> </h2>
<h2>Segundos 25 HORAS  <span style = "color:#0051ff"> <?= $fecha_25h?> </span> </h2>
<hr>

</body>
</html>

