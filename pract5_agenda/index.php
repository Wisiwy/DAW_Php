<?php
$cuentaContactos = 0;
$tablaContactos = 'Agenda sin contactos'; //Tabla a mostrar
$agenda = $_POST['agenda'] ?? [];

if (isset($_POST['submit'])) {
    /*$nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];*/
    $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre'));
    $telefono = filter_input(INPUT_POST, 'telefono');

    $error = valida_datos($agenda, $nombre, $telefono);
    if ($error == null) {
        //agrega, borra o actualiza depende del error
        $agenda[$nombre] = $telefono; //Agrega tlf si esta bien

    }
        switch ($error) {
            case 1: //nombre esta vacio
                $msjError = "Añade nombre";
            case 2: //telefono no es numerico
                $msjError = "Añade teléfono valido. ";
            case 3: //nombre ya existe en la agenda
                $msjError = "Contacto ya existe. Intro otro.";
        }

    $cuentaContactos++;

    /*Escribre tabla*/

    $tablaContactos = "<h3>Nombre: $nombre, Telefono: $telefono</h3>";


    function valida_datos($agenda, $nombre, $telefono)
    {
        $error = null;
        if ($nombre == '')
            $error = 1;
        if (!(is_numeric($telefono)))
            $error = 2;
        if ((isset($agenda[$nombre]))
        $error = 3;
        return $error;

    }
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
<form action="index.php" method="post">
    <fieldset>
        <legend><em>Nuevo Contacto</em></legend>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id=""><br>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id=""><br>

        <input type="submit" value="Actualizar agenda" name="submit">
        <input type="submit" value="Eliminar contacto" name="submit">
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
