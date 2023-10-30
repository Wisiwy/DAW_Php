<?php
echo $_POST['numero']
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tabla de multiplacar</title>
    </head>
    <body>
        <form action="form1.php" method="POST">
            Inserta un numero <br>
            <input type="text" name="numero"/>
            <br/>
            <input TYPE="submit" VALUE="Enviar"/> 
        </form>
    </body>
</html>