<?php
$agenda = $_POST ['agenda'] ?? [];

if (isset($_POST['submit'])) { //vengo del form
    //Leo los agenda si no hay inicializo a vacio
    $nombre = $_POST['nombre']; //leo en nombre del input
    //aumento los clicks
    //ternario, si enombre esta en la agenda sumamos si no esta le ponemos uno.
    $agenda[$nombre] = (isset($agenda[$nombre])) ? ++$agenda[$nombre] : 1;

    //Añado un mensaje con clicks realizados
    $msj = "";
    foreach ($agenda as $nombre => $clicks)
        $msj .= "<h2>$nombre ha realizado $clicks clicks.</h2>";
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

<form action="index.php" method="post">
    <?= $msj ?>
    <fieldset>
        <legend>Nuevo contacto</legend>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="">
        <input type="submit" value="Aceptar" name="submit">

        <!--FORMA 1: foreach inputs
        Guardar los clicks de la agenda.
        Pasamos tantos inputs como elementos tengo en el array-->
        <?php
        foreach ($agenda as $nombre => $clicks) {
            echo "<input type='hidden' name = 'agenda[$nombre]' value = '$clicks' >";
        }
        /*FORMA 2 : Serializar el array. */
        /*En un  imput hidden solo puedo pasar string tengo que serializar el array
        y luego deserializarlo. Solo se pasa strings. */
        /*Serialize coge array y crea una seria de caracteres*/
        ?>

    </fieldset>
</form>
</body>
</html>
