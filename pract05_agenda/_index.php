<?php
$tablaContactos = 'Agenda sin contactos'; //Tabla a mostrar
$cuentaContactos = 0;
if (isset($_POST['submit'])) {
    $cuentaContactos = $_POST['cuenta'];
    //RECOGER VARIABLES
    $agenda = $_POST['agenda'] ?? [];
    $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre')) ?? null;
    $telefono = filter_input(INPUT_POST, 'telefono') ?? 0;
    /*$nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];*/
    $error = validaDatos($agenda, $nombre, $telefono);
    echo "Error ".$error;
    if ($error == null) {
        //agrega, borra o actualiza depende del error
        $agenda[$nombre] = $telefono;//Agrega tlf si esta bien
        $cuentaContactos++;
        $msjError = '';
    } else {
        switch ($error) {
            case 1: //nombre esta vacio
                $msjError = "Añade nombre";
                break;
            case 2: //telefono no es numerico
                $msjError = "Añade teléfono valido. ";
                break;
            case 3: //nombre ya existe en la agenda
                $msjError = "Contacto ya existe. Intro otro.";
                break;
            default:
                $msjError = "tu puta madre";
        }

    }
    /*Escribe tabla*/
    foreach ($agenda as $nombre => $telefono) {
        if ($telefono != null)
            $tablaContactos .= "<h3>Nombre: $nombre, Telefono: $telefono</h3>";
    }
}
if (isset($_POST['borrar'])) {
    unset($agenda);
}
function validaDatos($agenda, $nombre, $telefono): int|null
{
    if ($nombre == null)
        return 1;
    if (!(is_numeric($telefono)))
        return 2;
    if ((isset($agenda[$nombre])))
        return 3;
    return null;
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

<h1>Agenda de contactos: <?= $cuentaContactos ?></h1>
<!--Formulario "Nuevo Contacto-->
<form action="_index.php" method="post">
    <fieldset>
        <legend><em>Nuevo Contacto</em></legend>
        <h2><span style="color: red"><?= $msjError ?></span></h2>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id=""><br>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id=""><br>
        <input type="submit" value="Actualizar agenda" name="submit">
        <input type="submit" value="Eliminar contacto" name="borrar">
        <input type="hidden" value="<?= $cuentaContactos ?>" name="cuenta">
        <!--Pasamos valores-->
        <?php
        foreach ($agenda as $nombre => $telefono) {
            echo "<input type='hidden' value  ='$telefono' name='agenda[$nombre]'>";
        }

        ?>

    </fieldset>
</form>
<!--Listado de contactos-->
<section>
    <h2>LISTADO DE CONTACTOS</h2>
    <hr>
    <?= $tablaContactos ?>
</section>

</body>
</html>
