<?php
if (isset($_POST['submit'])){
    $numeros = $_POST['numero'];
    echo "<h2>$numeros</h2>"; /*Aparece ARRAY la palabra.*/
    /*Visualizar arrays*/
    foreach ($numeros as $numero) {
        echo "<h2>$numero</h2>";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="nombres_repetidos.php" method="POST">
    Valor 1 <input type="text"  name="numero[]" value="1" id=""> <br>
    Valor 2 <input type="text"  name="numero[]" value="2" id=""> <br>
    Valor 3 <input type="text"  name="numero[]" value="3" id=""> <br>
    Valor 4 <input type="text"  name="numero[]" value="4" id=""> <br>
    Valor 5 <input type="text"  name="numero[]" value="5" id=""> <br>
    Valor 6 <input type="text"  name="numero[]" value="6" id=""> <br>
    Valor 7 <input type="text"  name="numero[]" value="7" id=""> <br>
    Valor 8 <input type="text"  name="numero[]" value="8" id=""> <br>
    <input type="submit" name="submit" value="Enviar">
</form>
</body>
</html>