<?php
function crea_formulario(array $tienda): string
{
    $formulario = "";

    foreach ($tienda as $producto => $detalle) {
        $formulario .= "<label for ='$producto' >$producto</label>";
        $formulario .= "( a {$detalle['precio']} €) ";
        $formulario .= "<input type=text name='$producto' id =$producto><br />";
    }
    return $formulario;
}

/**
 * @param array $tienda el detalle de los productos
 * @return string con diferentes líneas por cada producto comprado
 */
function generar_factura(array $tienda): string
{

    $factura ="";
    $total=0;
    foreach ($tienda as $producto =>$detalle){
        $cantidad = filter_input(INPUT_POST,$producto, FILTER_VALIDATE_INT);
        $stock = $detalle['unidades'];
        $cantidad = $cantidad>$stock? $stock: $cantidad;
        if ($cantidad>0) {
            $precio = $detalle['precio'];
            $subtotal = $precio * $cantidad;
            $total+=$subtotal;
            $factura.="<h2>$cantidad de $producto a $precio € subtotal  $subtotal €</h2>";
        }
    }
    $factura.="<h1> Total = $total</h1>";
    return $factura;

}

function obtener_informe (array $productos ): string{

}