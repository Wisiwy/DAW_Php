<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
function    valida_usuario()
{
    if (isset($_POST['submit'])) {
        //Validamos
        $nombre = filter_input(INPUT_POST, 'nombre');
        $nombre = trim(htmlspecialchars($nombre)); //trim limpia espacios en blanco
        $password = filter_input(INPUT_POST, 'password');
        $password = htmlspecialchars($password);

        //Verificamos
        if (($nombre != "") && ($nombre === $password)) {
            //Cumple las condiciones, redireccionamos.
            header("location:sitio.php?nombre=$nombre&password=$password");
            exit(); //matar el script, por seguridad. después de un
        } else {
            $msj = "datos incorrectos"; //¿¿¿¿esta definida???
            return $msj;
        }
    }
//?¿?¿?¿Devolver return del else no submit
}

// /*ROOTEO : Saber que ruta me ha traido hasta aquí*/
$option = $_POST['submit'] ?? "";
switch ($option) {
    case "Entrar":
        $msj = valida_usuario();
        break;
    case "Desconectar":
        $nombre = $_POST['nombre'];
        $msj = "Espero que vuelvas pronto $nombre ";
        break;
    default:
        $msj = $_GET['msj'] ?? "";
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
<fieldset style="background: lightblue; margin:30%; width:50%">
    <legend>Introduce contraseña</legend>
    <!--Si existe la variable msj haz el echo si no vacio. Ver el operador-->
    <span style="color:red"> <?= $msj ?? "" ?></span>
    <form action="index.php" method="POST">
        Nombre <input type="text" name="nombre" id=""><br>
        Password <input type="text" name="password" id="">
        <input type="submit" value="Entrar" name="submit">

    </form>
</fieldset>


</body>

</html>