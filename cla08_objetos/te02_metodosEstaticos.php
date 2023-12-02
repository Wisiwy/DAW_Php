<?php
class Factura {
    const IVA = 0.21; // Constante IVA

    private $importe_bruto;
    private $fecha;

    // Atributo estático para contar el número de facturas
    private static $num_facturas = 0;

    public function __construct($importe_bruto, $fecha) {
        $this->importe_bruto = $importe_bruto;
        $this->fecha = $fecha;

        // Incrementar el contador de facturas al crear una nueva
        self::$num_facturas++;
    }

    // Método estático para obtener el número de facturas
    public static function getNumFacturas() {
        return self::$num_facturas;
    }

    // Método para generar la factura
    public function generarFactura($nombre_cliente) {
        $iva_aplicado = $this->importe_bruto * self::IVA;
        $total_bruto = $this->importe_bruto + $iva_aplicado;

        echo "Factura de $nombre_cliente\n";
        echo "Fecha: $this->fecha\n";
        echo "Importe: $this->importe_bruto\n";
        echo "IVA aplicado: $iva_aplicado\n";
        echo "Total bruto: $total_bruto\n";
        echo "=====================\n";
    }
}

// Crear 5 facturas
$factura1 = new Factura(100, '2023-01-01');
$factura2 = new Factura(150, '2023-02-01');
$factura3 = new Factura(200, '2023-03-01');
$factura4 = new Factura(120, '2023-04-01');
$factura5 = new Factura(180, '2023-05-01');

// Obtener y visualizar el número de facturas
echo "Número de facturas: " . Factura::getNumFacturas() . "\n";

// Generar facturas
$factura1->generarFactura("Cliente1");
$factura2->generarFactura("Cliente2");
$factura3->generarFactura("Cliente3");
$factura4->generarFactura("Cliente4");
$factura5->generarFactura("Cliente5");

// Eliminar dos facturas
unset($factura3);
unset($factura4);

// Obtener y visualizar el número de facturas después de eliminar dos
echo "Número de facturas después de eliminar dos: " . Factura::getNumFacturas() . "\n";

// Imprimir las dos facturas restantes
$factura1->generarFactura("Cliente1");
$factura2->generarFactura("Cliente2");
?>
