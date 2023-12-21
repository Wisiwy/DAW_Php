<?php
require "vendor/autoload.php";

use Dotenv\Dotenv;
use Utilidades\DB;

 // https://github.com/MAlejandroR/ejemplo_basico_mysql.git - Git con solución Manuel

/*DOTENV libreria para extraer info de archivo .env
indicar en composer.json
variable - $_ENV*/
$dotenv = Dotenv::createImmutable(__DIR__ . "/.."); //DIR - Indica directorio de la apliccion
$dotenv->safeLoad();

//** mirar clase DB.php, creación DB con datos de $_ENV */
$conexionRaul = new DB();
var_dump(value: $conexionRaul);

/*Atributos de la conexion importantes
    -affected rows: lineas afectadas en la anterior conexión.
    -info del cliente
    -error de conexion - lanza excepciones.
    -field_count: cuantas columnas en un select
    -insert_id: numero asignado al último cliente.
        Inserto cliente y luego inserto info en otra tabla. */

if (isset($_POST['submit'])) {
    $usuario = htmlspecialchars(filter_input(INPUT_POST, 'usuario'));;
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));

    $opcion = $_POST['submit'] ?? null;
    switch ($opcion) {
        case "Acceder":
            //$conexionRaul.accesoUsuario($usuario, $password);
            if ($conexionRaul->valida_usuario($usuario, $password)) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location;sitio.php");
            } else
                $msj = $conexionRaul->insertar_usuario($usuario, $password); //return un mensaje en insertar usuario

            break;
        case "Registrarme":
            $msj = $conexionRaul->insertar_usuario($usuario, $password); //return un mensaje en insertar usuario
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
<fieldset style="width: :50%; background: antiquewhite; margin: 20%">
    <legend>Datos de acceso</legend>

    <form action="_index.php" method="post">
        usuario <input type="text" name="usuario"><br>
        password <input type="text" name="password"><br>
        <input type="submit" value="Acceder" name="submit">
        <input type="submit" value="Registrarme" name="submit">
        <?= $msj ?>


    </form>
</fieldset>
</body>
</html>
