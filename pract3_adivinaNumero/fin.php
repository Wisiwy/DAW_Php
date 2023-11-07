<?php
$estado = $_GET['estado'] ?? "";
$jugada = $_GET['jugada'] ?? "";
if($estado == ""){
    header("location:index.php");
    exit();
}

$msj = ($estado)?"Genial has acertado":"Me has engañado." ;



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>FIN</h2>

    <h3><?=$msj?></h3>


    <form action="index.php">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>

</html>