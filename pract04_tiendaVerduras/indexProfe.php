<?php

require "funcionesProfe.php";

$productos = [
    'lechugas' => ['precio' => 100, 'unidades' => 50],
    'champiñones' => ['precio' => 100, 'unidades' => 50],
    'manzanas' => ['precio' => 200, 'unidades' => 100],
    'peras' => ['precio' => 300, 'unidades' => 150],
    'tomates' => ['precio' => 400, 'unidades' => 200],
    'cebollas' => ['precio' => 500, 'unidades' => 25],
    'caracoles' => ['precio' => 10, 'unidades' => 10],
];

if (isset($_POST['submit'])) {
    $factura = generar_factura($productos);
    /*    $inventario = obtener_inventario($productos);*/
} else {
    $formulario = crea_formulario($productos);
}
//creo el formulario

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
<fieldset style="margin: 50px;background: antiquewhite; width: 60%">
    <legend>Tienda de compras</legend>
    <?php if (!isset($_POST['submit'])): ?>
        <form action="indexProfe.php" method="post">
            <?= $formulario ?>
            <input type="submit" value="Comprar" name="submit">
        </form>
    <?php else:
        echo $factura;
        /*        echo $inventario;*/
    endif;
    ?>


</fieldset>

</body>
</html>
