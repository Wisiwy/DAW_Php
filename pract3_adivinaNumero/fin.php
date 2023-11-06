<?php


if ($_POST['acertado']) {
    $jugadas = $_POST($jugada); //HAbtia que restar el total al numero de jugada
    $msj = "He acertado !!!!!!! en <?= $jugadas ?> jugadas.";
} else
    $msj = "No has sido sincere. "

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
    <h3><?= $msj ?></h3>
    <h3><?=$_POST['acertado']?> </h3>
    <!-- <h3>He acertado !!!!!!! en XXX jugadas. </h3>
    <!--o 
    <h3>No has sido sincere</h3> -->

    <form action="index.php">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>

</html>