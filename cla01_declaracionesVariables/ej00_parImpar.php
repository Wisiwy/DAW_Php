<!-- Programa para ver si un número es o no par  -->
<?php
//-----------CONTROLADOR-----------------------------
//Instrucciones que realizan cálculos
//Guardo el resultado que quiero mostrar en variables
$a = rand(1, 100); // Genero num aleatorio entre 1- 100
$fecha = date("d m Y", time()); //Obtenemos la fecha
$title =  "Hoy , $fecha, veremos si '$a' es par o impar "; //titulo
$msj = ($a % 2 == 0) ? "El número $a es par" : "El número $a es impar";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando php</title>
</head>

<body>
    <h1><?php echo $title ?> </h1>
    <hr />
    <h3><?php echo $msj ?> </h3>
</body>

</html>