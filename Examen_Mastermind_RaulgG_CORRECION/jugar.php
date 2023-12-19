<?php
//muestra errores en el navegador
ini_set("display_errors", true);
error_reporting(E_ALL);

//autoload
require "vendor/autoload.php";

use Mastermind\Clave as Clave;
use Mastermind\Plantilla as Plantilla;
use Mastermind\Jugada as Jugada;


session_start();


//RF02 mostrar/ocultar clave
$claveMostrarOcultar = "Mostrar Clave";

/******
CORRECCIÓN
Si haces un $opciont = $_POST.. ?? null, te evitas el if - else y tomas esa acción en el default
*/

if (isset($_POST['submit'])) {
    $opcion = htmlspecialchars(filter_input(INPUT_POST, 'submit')) ?? "";
    var_dump($opcion);
    switch ($opcion) {
        //RF02 Mostra y ocultaqr clave
        case "Mostrar Clave":
            $msj = "estoy en mostrar clave";
            $msjClave = Plantilla::escribir_clave();
            $claveMostrarOcultar = "Ocultar Clave";
            break;
        case "Ocultar Clave":
            $msj = "estoy en ocultar clave";
            $claveMostrarOcultar = "Mostrar Clave";
            break;
        case "Jugar":
            //recoger combinacion
            $combinacion_user = $_POST['combinacion'];
            var_dump($combinacion_user);
            $jugada = new \Mastermind\Jugada($combinacion_user);
            /******
            CORRECCIÓN
Te falta guardar las jugadas en un array de sesion y
             * mostrar la información de las jugadas (sí que tienes el __toString de jugdas :))
             * También falta controlar el fin de juego
            */
            break;
        case "Resetear Clave":
            session_destroy();
            break;
        default:
    }
} else {
    //RF01 generar la clave de 4 colores diferentes
    //la generamos si venimos por url
/******
CORRECCIÓN
Deberías llamar a get_clave, y no generar_clave
*/
    $_SESSION ['clave'] = Clave::generar_clave();
    //var_dump($_SESSION ['clave'] );
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
<h2>OPCIONES</h2>

<!--FORMULARIO MOSTRAR/OCULTAR-->
<fieldset>
    <legend>Acciones posibles</legend>
    <form action="jugar.php" method="post">
        <input type="submit" value="">
        <input type="submit" value="<?= $claveMostrarOcultar ?>" name="submit">
        <input type="submit" value="Resetear Clave" name="submit">
    </form>
</fieldset>

<!--FORMULARIO JUGAR -->
<fieldset>
    <legend>Menú jugar</legend>
    <form action="jugar.php" method="POST">
        <div class="grupo_select">
            <!--COMENTARIO
Este código lo tendría que generar un método de la clase Plantilla
            -->
            <h3> Selecciona 4 colores para jugar</h3>
            <select onchange='cambia_color(0)' name='combinacion[]' id='combinacion0'>
                <option value='' selected disabled hidden>Color</option>
                <option class='Azul' value='Azul'>Azul</option>
                <option class='Rojo' value='Rojo'>Rojo</option>
                <option class='Naranja' value='Naranja'>Naranja</option>
                <option class='Verde' value='Verde'>Verde</option>
                <option class='Violeta' value='Violeta'>Violeta</option>
                <option class='Amarillo' value='Amarillo'>Amarillo</option>
                <option class='Marron' value='Marron'>Marron</option>
                <option class='Rosa' value='Rosa'>Rosa</option>
            </select>

            <select onchange='cambia_color(1)' name='combinacion[]' id='combinacion1'>
                <option value='' selected disabled hidden>Color</option>
                <option class='Azul' value='Azul'>Azul</option>
                <option class='Rojo' value='Rojo'>Rojo</option>
                <option class='Naranja' value='Naranja'>Naranja</option>
                <option class='Verde' value='Verde'>Verde</option>
                <option class='Violeta' value='Violeta'>Violeta</option>
                <option class='Amarillo' value='Amarillo'>Amarillo</option>
                <option class='Marron' value='Marron'>Marron</option>
                <option class='Rosa' value='Rosa'>Rosa</option>
            </select>

            <select onchange='cambia_color(2)' name='combinacion[]' id='combinacion2'>
                <option value='' selected disabled hidden>Color</option>
                <option class='Azul' value='Azul'>Azul</option>
                <option class='Rojo' value='Rojo'>Rojo</option>
                <option class='Naranja' value='Naranja'>Naranja</option>
                <option class='Verde' value='Verde'>Verde</option>
                <option class='Violeta' value='Violeta'>Violeta</option>
                <option class='Amarillo' value='Amarillo'>Amarillo</option>
                <option class='Marron' value='Marron'>Marron</option>
                <option class='Rosa' value='Rosa'>Rosa</option>
            </select>

            <select onchange='cambia_color(3)' name='combinacion[]' id='combinacion3'>
                <option value='' selected disabled hidden>Color</option>
                <option class='Azul' value='Azul'>Azul</option>
                <option class='Rojo' value='Rojo'>Rojo</option>
                <option class='Naranja' value='Naranja'>Naranja</option>
                <option class='Verde' value='Verde'>Verde</option>
                <option class='Violeta' value='Violeta'>Violeta</option>
                <option class='Amarillo' value='Amarillo'>Amarillo</option>
                <option class='Marron' value='Marron'>Marron</option>
                <option class='Rosa' value='Rosa'>Rosa</option>
            </select>
        </div>
        <input type="submit" value="Jugar" name="submit">
    </form>
</fieldset>

<h1>INFORMACION</h1>
<div class="informacion">
    <?php /*=$msj*/ ?>
    <br>
    <?= $msjClave ?>
</div>
<h2>JUGADA</h2>
<?php
if (isset($_POST['submit'])) {
    $jugada;
}

?>
</body>
</html>
