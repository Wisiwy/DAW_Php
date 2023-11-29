<?php
require "vendor/autoload.php";

use class\Tabla;

session_start();

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Establecer":
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $_SESSION[$nombre] = $valor;
        $msj = "Se ha creado la varaible de sesión $nombre";
        break;
    case "Borrar":
        $nombre=$_POST['nombre'];
        unset ($_SESSION[$nombre]);
    case "Ver":
        $tabla = new Tabla("Listado de cookies");
        $tabla->add_cabecera(["nombre sessión", "Valor", "Accion"]);
        foreach ($_SESSION as $nombre=>$valor) {
            $btn_borrar =<<<FIN
                <form action='index.php' method="post">
                     <input type="submit" value="Borrar" name="submit">
                     <input type="hidden" name="nombre" value="$nombre" >
                </form>
FIN;
            $filas[]=[$nombre, $valor, $btn_borrar];
        }

        $tabla->add_contenido($filas);
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
    <title>Document</title>
</head>
<body>
<?php if (($opcion == "Ver")||($opcion == "Borrar")) : ?>
    <fieldset style="background:azure; margin:30%; width:40%">
        <legend>Variables de sesión</legend>
        <?=$tabla?>
    </fieldset>


<?php else: ?>
    <fieldset style="background:azure; margin:30%; width:40%">
        <h2><?=$msj ??""?></h2>
        <legend>Variables de sesión</legend>
        <form action="index.php" method="post">
            Nombre <input type="text" name="nombre" id=""><br/>
            Valor <input type="text" name="valor" id=""><br/>
            <input type="submit" value="Establecer" name="submit">
            <input type="submit" value="Ver" name="submit">
        </form>
    </fieldset>
<?php endif ?>
</body>
</html>


