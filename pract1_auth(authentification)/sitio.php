<?php
$nombre = $_GET['nombre'] ?? ""; //?? resolver nulos
if ($nombre == null)
    header("location:cuentaClicks.php?msj=debes de identificarte");
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
<h1>Bienvenido a la pagina <?= $nombre ?></h1>
<form action="index.php" method="POST">
    <input type="submit" value="Desconectar" name="submit">
    <input type="hidden" value="<?=$nombre?>" name="nombre">
</form>
</body>
</html>