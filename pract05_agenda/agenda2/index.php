<?php
//INICIAMOS VARIABLES
$tablaContactos = 'Agenda sin contactos';
$cuentaContactos = 0;
$msj = "Mensaje inicial";
$agenda = [];
$activarBoton = "disabled";

if (isset($_POST['submit'])) {

    //**ACTUALIZAMOS VARIABLES
    $agenda = $_POST['agenda'] ?? [];
    //$nombre = $_POST['nombre'] ?? '';
    $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre')) ?? null;
    //$telefono = $_POST['telefono'] ?? null;
    $telefono = filter_input(INPUT_POST, 'telefono') ?? null;
    $cuentaContactos = filter_input(INPUT_POST, 'cuentaContactos');

    //**VALIDAMOS DATOS: si hay error mostramos mensaje dependiendo del tipo
    $error = validarDatos($nombre, $telefono);
    $msj = match ($error) {
        1 => "Introduce un nombre",
        2 => "Telefóno no numérico",
        default => "Sin error"
    };
    //**AÑADIMOS CONTACTO. Si datos estan correctos. Manejamos la causistica de la intro en agenda
    if (is_null($error)) {
        list($msj, $agenda, $cuentaContactos) = addContacto($agenda, $nombre, $cuentaContactos, $telefono);
    }
    //**ESCRIBIMOS FILAS DE LA TABLA
    $tablaContactos = dibujaContactos($agenda);

    //**ACTIVAMOS BOTON
    $activarBoton = (empty($agenda)) ? "disable" : "";
}

//**BORRAMOS AGENDA
if (isset($_POST['eliminar'])) {
    unset($agenda);
}
var_dump($agenda);
/*FUNCIONES*/

/**FUNCION VALIDAR DATOS
 * @param $nombre
 * @param $telefono
 * @return int|null 1. Si el nombre no se introduce // 2. Si el telefono no es numerico.
 */
function validarDatos($nombre, $telefono): int|null
{
//Devuelve un numero dependiendo tipo de error
    //nombre vacio
    if ($nombre == null)
        return 1;
    //tlfo no numérico no vacio y no numerico
    if (!empty($telefono) && !is_numeric($telefono))
        return 2;
    //si no hay error '0'
    return null;
}

/**AÑADIR CONTACTO: añade o borra segun la causistica.
 * @param mixed $agenda
 * @param string|null $nombre
 * @param int $cuentaContactos
 * @param mixed $telefono
 * @return array
 */
function addContacto(mixed $agenda, ?string $nombre, int $cuentaContactos, mixed $telefono): array
{
    echo "addContacto " . $telefono;
    var_dump($telefono);
//si esta agenda miramos si hay o no telefno
    if (isset($agenda[$nombre])) {
        if (empty($telefono)){
            unset($agenda[$nombre]);
            $cuentaContactos--;
            $msj ="Telefono borrado";
        }else{
            $agenda[$nombre] = $telefono;
            $msj ="Contacto $nombre, actualizado";
        }
    } else {
        $agenda[$nombre] = $telefono;
        $cuentaContactos++;
        $msj = "Contacto añadido";
    }
    return array($msj, $agenda, $cuentaContactos);
}

/**DIBUJAR CONTACTOS : dibuja las filas de la tabla con los contactos
 * @param $agenda
 * @return string
 */
function dibujaContactos($agenda): string
{
    $filas = '';
    foreach ($agenda as $nombre => $telefono) {
        $filas .= "<tr>
                        <td> $nombre </td>
                        <td>$telefono</td>
                   </tr>";
    }
    return $filas;
}


?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
<header>
    <h1>Agenda de contactos: <?= $cuentaContactos ?> </h1>
</header>
<main>
    <section id="nuevo_contacto">
        <form action="index.php" method="post">
            <fieldset>
                <legend><em>Nuevo contacto</em></legend>
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" value=""><br>
                <label for="telefono">Teléfono</label><br>
                <input type="text" id="telefono" name="telefono" value=""><br><br>
                <input type="submit" value="Actualizar agenda" name="submit">
                <input type="submit" <?= $activarBoton ?> value="Eliminar contactos" name="eliminar">
                <!--Pasamos los valores-->
                <?php
                foreach ($agenda as $nombre => $telefono) {
                    echo "<input type='hidden' value='$telefono' name='agenda[$nombre]'>";
                }
                ?>
                <input type='hidden' value=<?= $cuentaContactos ?> name='cuentaContactos'>


            </fieldset>
        </form>
    </section>
    <section id="lista_contactos">
        <h3>LISTADO DE CONTACTOS</h3>
        <hr>
        <table>
            <tr>
                <th>NOMBRE</th>
                <th>TELÉFONO</th>
            </tr>
            <?= $tablaContactos ?>
        </table>
    </section>

    <section id="mensaje">
        <h2><?= $msj ?></h2>
    </section>
</main>


</body>
</html>
