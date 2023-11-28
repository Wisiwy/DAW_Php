<!--****VARIABLES DE SESION.
**¿Qués es una SESIÓN?
    Mientras se mantiene comunicación cliente-servidor.
    TIEMPO DE VIDA: mientras este abierto NAVEGADOR o pase cierto tiempo sin haber mensajes.
        Por ejemplo 2 min si no hay mensaje entre cliente-servidor.
**CIERRE sesión.
    -Cliente o servidor cierran la sesión || Pasa un tiempo determinado sin mensajes .
**IDENTIFICADOR de sesíón. Cookie id de sesion.
**VARIABLES de sesión.
    Durante la sesión el servidor puede escribir variables en la memoria del servidor y se mantienen mientras el cliente este enchufado-->

<?php
/*CREAR VARIABLE SESION*/
//session_start(); $_SESSION['nombre`] = 'manuel';
/*RECUPERAR SESION
//$usuario= $_SESSION['nombre'];
/*ELIMINAR Session*/
//session_destroy()


session_start();
if (isset($_POST['submit']) && $_POST['submit'] == "Reinicio") {
    session_destroy();
    session_start();
}
$contador = $_SESSION['contador'] ?? 0;
$contador++;
$plural = $contador == 1 ? "" : "s";
$msj = "Has accedido $contador click$plural.";
$_SESSION['contador'] = $contador;


/*    //FORM SWITCH ROOTEO: con más codigo
    $opcion = $_POST['submit'];
    switch ($opcion) {
        case "Click":
            $contador = $_SESSION['contador'] ?? 0;
            $contador++;
            $plural = $contador == 1 ? "" : "s";
            $msj = "Has accedido $contador click$plural.";
            $_SESSION['contador'] = $contador;
            break;
        case "Reinicio":
            break;
    }*/


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
<h2>SESIÓN: Contador de visitas en misma sesión</h2>
<h3> <?= $msj ?? "" ?> </h3>

<form action="varSesion.php" method="post">
    <input type="submit" name="submit" value="Click">
    <input type="submit" name="submit" value="Reinicio">

</form>
</body>
</html>
