<?php
require
session_start();
$opcion = $_POST['submit'] ?? "Establecer";

$opcion = $_POST['submit'] ?? null;
switch ($opcion){
    case "Establecer":
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $_SESSION[$nombre]=$valor;
        break;
    case "Ver":
        $tabla = new \Utilidades\Tabla("listado de cookies");
        $tabla->add_cabecera(["Nombre","Valor"]);
        //$_SESSION  es array asociativo, no array de arrays que pide la clase tabla.
        //creamos un array de arrays con los datos de las variables de la sesión.
        $tabla->add_contenido($_SESSION,::self);
        //crear la fila con el nombre de la sesion el valor y un boton borrar con hidden.
    //el nuevo array lo meto en add_contenido()
        break;
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
<?php if ($opcion == "Establecer"): ?>
    <form action="formularioVarSesion.php" method="post">
        <fieldset>
            <legend><em>Establecer variables</em></legend>
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" value=""><br>
            <label for="valor">Valor</label><br>
            <input type="text" id="valor" name="valor" value=""><br>
            <input type="submit" value="Establecer" name="submit">
            <input type="submit" value="Ver" name="submit">
            <!--Ver botones dependiendo-->
        </fieldset>
    </form>
<?php else: ?>
    <form action="formularioVarSesion.php" method="post">
        <fieldset>
            <legend><em>Borrar variables.</em></legend>
            Nombre <input type="submit" id="nombre" name="borrar" value="Borrar"><br>
            Hora<input type="submit" id="nombre" name="borrar" value="Borrar"><br>
            Opcion 3<input type="submit" id="nombre" name="borrar" value="Borrar"><br>
            Opcion 4<input type="submit" id="nombre" name="borrar" value="Borrar"><br>
            <input type="submit" value="Borrar todas" name="submit">
            <input type="submit" value="Establecer" name="submit">
        </fieldset>
    </form>
<?php endif ?>

</body>
</html>
