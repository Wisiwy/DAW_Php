<?php
require "funciones.php";
$tienda = [
    'lechuga' => ['unidades' => 200,
        'precio' => 0.90],
    'tomates' => ['unidades' => 2000,
        'precio' => 2.15],
    'cebollas' => ['unidades' => 3200,
        'precio' => 0.49],
    'fresas' => ['unidades' => 4800,
        'precio' => 4.50],
    'manzanas' => ['unidades' => 2500,
        'precio' => 2.10],
];
//crear formulario

if (isset($_POST['submit'])) {
    $factura = genera_factura($tienda);
    /*  $inventario =obtener_inventario($tienda);*/

} else {
    $formulario = crea_formularios($tienda);
}
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
<fieldset style="margin:50px; background: beige" >
    <legend>Tienda frutas</legend>
    <?php if (!isset($_POST['submit'])): ?>
        <form action="index.php" method="post">
            <?= $formulario ?>
            <input type="submit" value="Comprar" name="submit">
        </form>
    <?php else:
        echo $factura;
        /*        echo $inventario;*/
    endif;
    ?>
</fieldset>
<hr>


</body>
</html>
