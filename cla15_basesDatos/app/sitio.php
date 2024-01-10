<?php
require "vendor/autoload.php";

use Utilidades\DB as Database;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable("./../"); //donde esta mi dot env
$dotenv->safeLoad();



session_start();
$user = $_SESSION['user'] ?? null;
if (is_null($user)) {
    header("Location:_index.php");
    exit();
}
$con = new Database();
$familias = $con->obtener_familias();

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver Productos":
        $cod = $_POST['familia'];
        var_dump($cod);
        //hacer seleccion
        //meter en un
        break;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document </title>
</head>
<body>
<h1>Bienvenido a este sitio we <?= $user ?></h1>
<form action="" method="post">
<select name = "familia" id="">
    <?php
    foreach ($familias as $familia) {
        $cod = $familia[0];
        $nombre = $familia[1];
        echo "<option value= '$cod'> $nombre </option> ";
    }
    ?>
</select>
    <input type="submit" value="Ver Productos" name="submit">
</form>
</body>

</html>
