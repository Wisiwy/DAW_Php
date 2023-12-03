<?php
//Lo primero cargamos el autoload de composer
require "vendor/autoload.php";

ini_set("display_errors", true);
error_reporting(E_ALL);
// Trabajaremos con sesiones
session_start();

//Establezco los use para acceder directamente a las clases
use jugadas\Jugada;
use jugadas\Clave;
use jugadas\Plantilla;

//Inicializo variables que voy a necesitar con un valor
$clave = Clave::obtener_clave();

$ver_ocultar_clave="Ver clave";
$opcion = $_POST['submit']?? null;
$msj="Aquí información del juego";

//En función de la ruta que me haya traído aquí
//    haremos una acción u otra
switch ($opcion){
    case "Jugar":
        //Creo la jugada actual y la guardo
        $jugada = new Jugada(htmlspecialchars($_POST['numero']));
        //Cuidado, los objetos los tengo que serializar
        $_SESSION['jugadas'][]=serialize($jugada);
        $numero_jugada = sizeof($_SESSION['jugadas']);

        //Evalúo las situaciones de fin de juego
        if (($jugada->get_resultado()==0) || ($numero_jugada>10)){
            header ("Location:fin.php");
            exit();
        }
        //Genero un mensaje informativo con la jugada actual
        $msj = Plantilla::obtener_informe_jugada($jugada);

      break;
    case "Ver clave":
        //Generamos un msj con la clave
        //cambiamos el texto para el botón
        $msj = "La clave es <div class='resaltado'>$clave</div>";
        $ver_ocultar_clave="Ocultar clave";
      break;
    case "Ocultar clave":
        //cambiamos el texto para el botón
        $ver_ocultar_clave="Mostrar clave";
      break;
    case "Reiniciar":
        //Generamos de nuevo la clave
        //Debemos de borrar el histórico de jugadas, lo hago en el método
        //Seguramente no es el sitio más adecuado, pero lo dejo ahí
        $clave= Clave::regenerar_clave();
        $msj ="Se ha reestablecido el juego";
      break;
   default:
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
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="contenedor">
<fieldset class="juego">
    <legend>Opciones del juego</legend>
    <form action="index.php" method="post">
        <label for="numero">Inserta un número</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="Jugar" name="submit">
        <input type="submit" value="Reiniciar" name="submit">
        <input type="submit" value="<?=$ver_ocultar_clave?>" name="submit">
    </form>
</fieldset>
<div class="informacion">
    <?=$msj ??""?>

</div>

</body>
</html>



