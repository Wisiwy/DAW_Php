<?php
/*NAME vs VALUE
 *  * 1.- NAME es el que vamos a utilizar para recuperar el contenido del input en el servidor.
            Tip: El name es al servidor lo mismo que el id es al cliente, con id podéis acceder a los valores de los
                elementos con javascript, con el name lo haremos en php
    2.-VALUE es el valor. Este valor se sustituye por el contenido del input del formulario.*/

$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$email= $_POST['email'];
$genero= $_POST['genero'];
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
    <h1>Ficha de datos</h1>
<h2>Nombre <?=$nombre?></h2>
<h2>Apellido <?=$nombre?></h2>
<h2>Nombre <?=$nombre?></h2>
<h2>Nombre <?=$nombre?></h2>
</body>
</html>
