<?php
require "vendor/autoload.php";

use Utilidades\DB as Database;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable("./../"); //donde esta mi dot env
$dotenv->safeLoad();



session_start();
$user = $_SESSION['user'] ?? null;
if (is_null($user)) {
    header("Location:_index.php");
    exit();
}
$con = new Database();
$familias = $con->obtener_familias();

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver Productos":
        //cuando quiero recoger una opcion del select recojo el value.
        $cod_familia = $_POST['familia'];
        //hacer seleccion en DB con el codigo
        $productos = $con->obtener_productos($cod_familia);
        var_dump($productos);
        //meter en un
        break;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cla15_basedatos: Tienda informatica </title>
</head>
<body>

<h1>Bienvenido a este sitio we <?= $user ?></h1>
<form action="" method="post">
<select name = "familia" id="">
    <?php
        foreach ($familias as $familia) {
        $cod = $familia[0];
        $nombre = $familia[1];
        $selected = ($cod == $cod_familia) ? "selected" : "" ;

        echo "<option $selected value= '$cod'> $nombre </option> ";
    }
    ?>
</select>
    <input type="submit" value="Ver Productos" name="submit">
</form>
<!--Crear tabla con el array conseguido de la seleccion de DB con 'productos[]'-->
<?php
//comprobar que hay productos, si hay creato tabla
if(isset($productos)): ?>
<table>
    <tr>
        <th>Nombre</th>
        <th>PVP</th>
    </tr>
    <?php
    //sacar filas del array
        foreach ($productos as $producto){
            echo <<<FIN
<!--poner un filas para los productos-->
<tr>
    <td>{$producto['nombre']}</td>
    <td>{$producto['PVP']}</td>
<!--//form con submit para modificar y enviar a una nueva taba-->
    <td>
    <form action='producto.php' method="POST">
    <input type="submit" value="Editar" name="sumbit">
    <!--Estos hidden podrían meterse en var session-->
    <!--guardamos codigo del producto-->
    <input type="hidden" name="cod_producto" value="{$producto['cod']}" >
    <!--guardamos codigo de la familia-->
    <input type="hidden" name="cod_familia" value="$cod_familia" >
</form>
</td>
</tr>
FIN;

        }
    ?>
</table>
<?php endif ?>
</body>

</html>
