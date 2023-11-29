<?php
require "vendor/autoload.php";

use aUtilidades\Tabla as Tabla;

session_start();
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Establecer":
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $_SESSION[$nombre] = $valor;
        $msj = "Se ha creado la variable de sesión $nombre";
        break;
    case "Borrar":
        $nombre = $_POST['nombre'];
        unset ($_SESSION[$nombre]);
    case "Ver":
        $tabla = new Tabla("Listado de Cookies");
        $tabla->add_cabecera(["Nombre", "Valor"]);
        //$_SESSION  es array asociativo, no array de arrays que pide la clase tabla.
        //creamos un array de arrays con los datos de las variables de la sesión.
        foreach ($_SESSION as $nombre => $valor) {
            $btn_borrar = <<<FIN
                <form>
                    <input type="submit" name="submit" value="Borrar">
                    <input type="hidden" name="nombre" value="$nombre" >
                </form>
                FIN;
            $filas[] = [$nombre, $valor, $btn_borrar];
        }
        $tabla->add_contenido($filas);
    //crear la fila con el nombre de la sesion el valor y un boton borrar con hidden.
    //el nuevo array lo meto en add_contenido()
    default:
}
var_dump($_SESSION);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FormVariablesSesion</title>
</head>
<body>
<?php if (($opcion == "Ver") || ($opcion == "Borrar")): ?>
    <form action="formVarSesion.php" method="post">
        <fieldset>
            <legend><em>Variables de sesion.</em></legend>
            <?= $tabla ?>
        </fieldset>
    </form>
    <input type="submit" value="Establecer" name="submit">


<?php else: ?>
    <form action="formVarSesion.php" method="post">
        <fieldset>
            <legend><em>Establecer variables</em></legend>
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" value=""><br>
            <label for="valor">Valor</label><br>
            <input type="text" id="valor" name="valor" value=""><br>
            <!--botones-->
            <input type="submit" value="Establecer" name="submit">
            <input type="submit" value="Ver" name="submit">
        </fieldset>
    </form>
<?php endif ?>

</body>
</html>
