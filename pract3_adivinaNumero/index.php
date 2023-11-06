<?php
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina número</title>
</head>
<body>
<h1>EL GURÚ DE LOS NÚMEROS</h1>
<!--Selección de intervalo. Formulario. -->
<h3>Selecciona un intervalo del menú de abajo.</h3>
<form action="jugar.php" method="post">
    <fieldset>
        <legend>Establece intervalo</legend>
        <input type="radio" name="intervalo" checked value="10">1-1024(2<sup>10</sup>). 10 intentos <br>
        <input type="radio" name="intervalo" value="16">1-65.536(2<sup>16</sup>). 16 intentos <br>
        <input type="radio" name="intervalo" value="20">1-1.048.576(2<sup>20</sup>). 20 intentos <br><br>
        <input type="submit" value="Empezar" name="submit">
    </fieldset>
</form>
<h3>Piensa un número dentro de este intervalo </h3>
<h3>La aplicación lo acertara en el número de intentos establecidos según el intervalo</h3>
<h3>Cada vez que la aplicación te especifique un número deberás de indicar. </h3>
<p> &nbsp Si el número buscado es mayor.</p>
<p>&nbspSi el número buscado es menor.</p>
<p>&nbspSi has acertado el número.</p>

</body>
</html>
