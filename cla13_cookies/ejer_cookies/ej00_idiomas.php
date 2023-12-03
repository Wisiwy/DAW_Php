<?php

//leemos el idioma de la cookie o lo seteamos si es la primera vez

/*if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
}*/

if (isset($_POST["submit"])) {
    $idioma = $_POST['idioma'] ?? "es";
    setcookie('idioma', $idioma,time()*60);
} else {
    $idioma = $_COOKIE['idioma'];
    $saludo = "no submit";
}
var_dump($_COOKIE);
switch ($idioma) {
    case "es":
        $saludo = "Hola. bienvenido a este sitio web";
        break;
    case "fr":
        $saludo = "Bonjour. bienvenue sur ce site";
        break;
    case "en":
        $saludo = "Hello. welcome to this website";
        break;
    default:
        $saludo = "Sin idioma";
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
<h1><?= $saludo ?></h1>

<form action="ej00_idiomas.php" method="post">
    <select name="idioma" id="">
        <option value="es">Español</option>
        <option value="en">English</option>
        <option value="fr">Frances</option>
    </select>
    <input type="submit" name="submit" value="Enviar">
</form>

</body>
</html>
