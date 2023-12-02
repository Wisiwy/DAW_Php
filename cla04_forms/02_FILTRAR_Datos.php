<?php
//LEEMOS DATOS: Leer datos por metodo POST.
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$estudios = $_POST['estudios'];
$idiomas = $_POST['ej8_idiomas'];

/******SEGURIDAD FILTRAR DATOS*/
/*filter_var($variable, $filtro)
    $variable . Es la variable a filtar. Correspondería al valor del name del input que queremos recuperar.
    $filtro. Es el tipo de filtro que se quiere aplicar. Para ver los tipos de filtros, consultamos a la página web http://php.net/manual/es/filter.filters.validate.php.
/*filter_input($tipo_entrada. $variable, $filtro)
    -$tipo_entrada: Uno de los siguientes: INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER o INPUT_ENV.
    -$variable: como en el caso anterior.
    -$filtro: como en el caso anterior.*/

//STRING
    //Sanitice esta, coger los caracteres considerados peligrosos y el navegador lo convierte como el codigo html &****/
    /*$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING); */

//**FILTER INPUT y **HTMLSPECIALCHARS
$nombre = htmlspecialchars( filter_input(INPUT_POST,'nombre'));

//FILTER_VALIDATE_INT
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