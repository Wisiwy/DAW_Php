<?php
//controlador: todo lo que tenga ver con php
echo "hola";
$html_contenido = "";
for(~n=33; $n<164; $n++)

    //añadiendo un punto  se concatena. autoasignacion ver expresiones.
    $html_contenido = $html_contenido. "<tr>
                           <td>$n</td>
                           <td>$ascii</td>
                        </tr>";


?>
//vista
<!doctype html>
<html lang ="en">
<head>
</head>
<body>

    <table>
        <tr>
            <td>Numero</td>
            <td>Código ascci</td>
            <?=$html_contenido?>
        </tr>
    </table>
</body>
</html>

