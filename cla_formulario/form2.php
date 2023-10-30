<?php
/* ***SEGURIDAD: en el servidor siempre revisar las cajas que entran por los formularios en nuestro servidor.
Estamos dejando una puerta abierta al servidor. Revisar las cajas. Preguntar que tipo de dato quiero.
Tener cuidado.  **** */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="formStyle.css">
    <title>Document</title>
</head>
<body>
<form action="datos2.php" method="POST">
    <!--Archivo donde voy a guardar los datos enviados
    methos: POST. Por el que se pasan los datos. -->
    <fieldset>
        <legend>Datos personales</legend>
        <label for="nombre">Nombre</label> <!--uso de label corrcto pero Manuel le da igual-->
        <input type="text" name="nombre" id=""><br/> <!--Emmet-> "input:text + tab" -->
        Apellido<input type="text" name="apellido" id=""><br/>
        Edad <input type="text" name="edad" id="">
        Email<input type="email" name="email" id=""><br/>
        Genero <br/>
        <input type="radio" name="genero" value="mujer" id="">Mujer <br/>
        <input type="radio" name="genero" value="hombre" id="">Hombre <br/>
        <input type="radio" name="genero" value="no aporta" id="">No aporta <br/>
        <hr/>

        Estudios <br/>
        <select name="estudios" id="">
            <option value="eso">ESO</option>
            <option value="bach">Bach</option>
            <option value="ciclo medio">Ciclo Medio</option>
            <option value="ciclo medio">Ciclo Medio</option>
            <option value="GRADO">GRADO</option>
        </select>
        <br/>

        Idiomas <br>
        <!--Especificar que idiomas es un array de datos. En la visualizacion diremos que es un array-->
        <input type="checkbox" name="idiomas[]" value="ingles" id="">Inglés <br/>
        <input type="checkbox" name="idiomas[]" value="frances" id="">Francés <br/>
        <input type="checkbox" name="idiomas[]" value="aleman" id="">Alemán <br/>
        <input type="checkbox" name="idiomas[]" value="rumano" id="">Rumano <br/>
        <br>
        <input type="submit" value="Enviar" name="submit">
    </fieldset>
</form>
</body>
</html>
