<?php
/**
 * User: Raúl Gómez Sanz
 * Date: 13/01/24
 * Version: 00.1
 */
/*Ver errores*/
ini_set("display_errors", true);
error_reporting(E_ALL);

/*Composer y alias a clases*/
require "vendor/autoload.php";

use utilidades_repa\DB as Database;
use Dotenv\Dotenv;

//Libreria dotenv para usar variables de .env
$dotenv = Dotenv::createImmutable("./../");
$dotenv->safeLoad();

//Recuperar nombre usuario de la sesión.
session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (is_null($usuario)) {
    header("Location:_index.php");
    exit();
}
//Obtenemos array con nombres de las familias de productos de la DB
$con = new Database();
$familias = $con->obtener_familias();

//Obtenermos productos[] de la familia que el usuario a elegido
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver Productos":
        //Cuando quiero recoger el value de un <option>, recojo el post del <select>
        $cod_familia = $_POST['familias'];
        //Obtenermos productos de la DB con el cod_familia recogido
        $productos = $con->obtener_productos($cod_familia, "familia");
        break;
    default:
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/estilo-sitio.css">
    <title>cla15_DB_repa: Sitio</title>
</head>
<body>

<h1>Bienvenido <?= $usuario ?> </h1>
<form action="" method="post">
    <select name="familias" id="">
        <!-- Menu ('select') una opción para cada uno de los nombres extraidas de la DB en $familias [] -->
        <?php
        foreach ($familias as $familia) {
            $cod = $familia['cod'];
            $nombre = $familia['nombre'];
            //Mantener la opción elegida. Ponemos "selected" en la etiqueta option.
            $selected = ($cod == $cod_familia) ? "selected" : "";
            echo "<option value='$cod' $selected >$nombre</option>";
        }
        ?>
    </select>
    <!-- Boton para ver los productos de la familia elegida. -->
    <input type="submit" value="Ver Productos" name="submit">
</form>
<section class="productos">
    <!--Tabla con el array conseguido de la seleccion de DB con 'productos[]'-->
    <?php
    //Comprobar que $productos tenga valores
    if (isset($productos)): ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>PVP</th>
                <th>Editar</th>
            </tr>
            <?php
            foreach ($productos as $producto) {
                //Una fila para cada producto, valores del array
                echo <<<FIN
            <tr>
                <td>{$producto['nombre']}</td>
                <td>{$producto['PVP']}</td>
                <!-- añadimos un boton para modificar el producto en una nueva pagina -->
                <td>
                    <form action="producto.php" method="post">
                        <input type="submit" name="submit" value="editar" >
                        <!-- hiddens para guardar valores de cod_producto y cod_familia -->
                        <input type="hidden" name="cod_producto" value="{$producto['cod']}" >
                        <input type="hidden" name="cod_familia" value="$cod_familia">
                        <!--TODO pasar por variables de sesion-->
                    </form>
                </td>
            </tr>
FIN;
            }
            ?>
        </table>
        <!-- Cerramos si no se cumple el IF  -->
    <?php endif ?>
</section>
</body>
</html>
