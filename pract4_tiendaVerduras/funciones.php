<?php
function crea_formularios(array $tienda): string
{
    $formulario = "";

    foreach ($tienda as $producto => $detalle) {
        //concantenar una linea en cada iteración
        $formulario .= "<label for = '$producto'>$producto</label>";
        $formulario .= " (precio: {$detalle['precio'] }€)";
        $formulario .= "<input type = text name ='$producto' id = '$producto'> <br>";
    }
    return $formulario;
}

/*function genera_factura(array $tienda): string
{
    $factura = "<h3>Producto &nbsp; Cantidad &nbsp; Precio</h3>";
   foreach ($tienda as $producto => $detalle) {
        if (isset($_POST['tomates'])) {
            $cantidad = $_POST['tomates'];
            $precio = $cantidad * $detalle['precio'];
            $factura .= " <h3>$producto &nbsp; $cantidad &nbsp;  $precio </h3> ";
        }else {
            $factura .= "";
        }
    }
    return $factura;
}*/
/**
 * @param array $tienda el detalle de los productos
 * @return string con con diferentes líneas por cada producto comprado
 */
function genera_factura(array $tienda): string
{
    $factura = "";
    $total = 0;
    foreach ($tienda as $producto => $detalle) {
        $cantidad = filter_input(INPUT_POST, $producto, FILTER_VALIDATE_INT);
        $stock = $detalle['unidades'];
        $unidades = $cantidad > $stock ? $stock : $cantidad;
        if ($unidades > 0) {
            $precio = $producto ['precio'];
            $subtotal = $precio * $cantidad;
            $total+=$subtotal;
            $factura.= "$cantidad de $producto a $precio € subtotal $subtotal €";
        }
    }
    $factura.="<h1>Total = $total</h1>";
    return $factura;
}


//Inventario de como se ha quedado el almacen.
/*function obtener_inventario (array $tienda): string{
return $inventario;
}*/