<?php
//Leer los datos del formulario.


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$estudios = $_POST['estudios'];
$idiomas = $_POST['idiomas'];

/* *****+ SEGURIDAD: Filtrar los datos, seguridad en nuestro servidor **** */
//STRING
//Sanitice esta , coger los caracteres considerados peligrosos y el navegador lo convierte como el codigo html &****/
/*$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING); */
    //Este es el recomendado, httspecial chars y filter input.
$nombre = htmlspecialchars( filter_input(INPUT_POST,'nombre'));

//INT
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT); //Filtra que sea entero


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

    <h1>Datos personales</h1>
    <h2>Nombre <?= $nombre ?></h2>
    <h2>Apellido <?= $apellido ?></h2>
    <h2>Email <?= $email ?></h2>
    <h2>Género <?= $genero ?></h2>
    <h2>Estudios <?= $estudios ?></h2>
    <h2>Idiomas</h2>
    <!--al pasar por el form un array idiomas lo recorremos con un foreach-->
    <?php
    foreach ($idiomas as $idioma)
        echo "<h3>&nbsp &nbsp $idioma</h3>"
    ?>
    </body>
</html>