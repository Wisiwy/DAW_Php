<?php
//Funcion time
$segundos = time();
echo "<h2>$segundos</h2>";


//date
date_default_timezone_set('Europe/Madrid');  //coge la zona horaria del sistema
$fecha_actual = date("d-m-y H:i:s", time() );
$fecha_25h = date("d-m-y H:i:s", time() + (25*60*60));
echo "<h2>$fecha_actual</h2>"
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
<h1>ESPAÑA</h1>
<h2>Segundos después del 1/1/1970 a las 0:0 <span style = "color:#0051ff"> <?= $fecha?> </span> </h2>
<h2>Segundos  <span style = "color:#0051ff"> <?= $fecha?> </span> </h2>

</body>
</html>
