<?php
/*GENERAR TABLA ASCCI*/
    //CONTROLADOR: todo lo que tenga ver con php
echo "hola";
$html_contenido = "";
for ($n = 33; $n < 164; $n++)

    //añadiendo un punto  se concatena. autoasignacion ver expresiones.
    $html_contenido = $html_contenido .
        "<tr> 
            <td>$n</td>
            <td>&#$n</td>
        </tr>";

?>
<!--VISTA-->
<!doctype html>
<html lang="en">

<head>
</head>

<body>

    <table>
        <tr>
            <td>Numero</td>
            <td>Código ascci</td>
        </tr>
        <?= $html_contenido ?>
    </table>
</body>

</html>