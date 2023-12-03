<?php
$titPolitico = "1 - Noticiao Politica";
$titEconomico = "2 - Noticiao Economica";
$titDeportivo = "3 - Noticiao Deportiva";
$display = 'style="display: none;"';

if (isset($_POST['submit'])) {
    $_COOKIE['noticia'] = match ($_POST['titular']) {
        "politica" => "po",
        "economica" => "eco",
        "deportiva" => "dep",
        default => "Noticia incorrecta"
    };
    var_dump($_COOKIE['noticia']);
    $opcion = $_COOKIE['noticia'] ?? null;
    switch ($opcion) {
        case "po":
            $displayPol = 'style="display: none;"';
            break;
        case "eco":
            $displayEco = 'style="display: none;"';
            break;
        case "dep":
            $displayDep = 'style="display: none;"';
            break;
        default:
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
<form action="ej01_periodico.php" method="post">
    <fieldset>
        <legend>Elige la noticia</legend>
        Política <input type="radio" name="titular" id="politica" value="politica"><br>
        Económica <input type="radio" name="titular" id="economica" value="economica"><br>
        Deportiva <input type="radio" name="titular" id="deportiva" value="deportiva"><br>
        <input type="submit" value="Enviar" name="submit">
    </fieldset>
</form>

<h1<?= $displayPol ?>><?= $titPolitico ?></h1>
<h1<?= $displayEco ?>><?= $titEconomico ?></h1>
<h1<?= $displayDep ?>><?= $titDeportivo ?></h1>
</body>
</html>
