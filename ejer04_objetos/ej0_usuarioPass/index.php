<?php

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'] ?? '';
    $pass = $_POST['pass'] ?? '';
    echo "$nombre , $pass <br>";
    $user = new Usuario($nombre, $pass);
    echo "$user->getUsuario()";
    if (is_null($user->getError()))
        echo "<h4>Usuario creado correctamente </h4> ";
    else
        echo "<h4>$user->getError() </h4> ";


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
<fieldset>
    <legend>Registro usuario</legend>
    <form action="index.php" method="post">
        <input type="text" name="nombre"><br>
        <input type="text" name="pass"><br>
        <input type="submit" name="submit" value="Registrar">
    </form>
</fieldset>
</body>
</html>
