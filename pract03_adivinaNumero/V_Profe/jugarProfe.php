<?php

//Ahora leemos la opción que nos ha traído aquí
$opcion = $_POST['submit'] ?? null;

//genero unos valores iniciales
$intentos = $_POST["intentos"];

//Establezco unas opciones de juego por defecot
//expereriencia de usuario
$cheked_mayor ="checked";
$cheked_menor ="";

//TODO
// necesito guarcdar este valor en formularios
//Este es un modo de controlar el routeo es decir, qué evento a solicitado este recurso
switch ($opcion){
    case "Reiniciar":
    case "Empezar"://inicializar los valores
        $min =0;
        $max = 2**$intentos;
        $jugada =1;
        $numero = ($min+$max)/2;
        break;
    //Acciones is vengo del _index.php y empiezo la jugada
    case "Jugar":
        $min = $_POST['min'];
        $max = $_POST['max'];
        $jugada = $_POST['jugada'];
        $numero = $_POST['numero'];
        $rtdo = $_POST['rtdo'];
        switch ($rtdo){
            case '>':
                $cheked_mayor ="checked";
                $cheked_menor ="";
                $min = $numero;
                break;
            case '<':
                $cheked_mayor ="";
                $cheked_menor ="checked";
                $max = $numero;
                break;
            case '=':
                $fin = true;
        }
        $numero=($max+$min)/2;
        //Controlo el final de jugada
        $jugada ++;
        if (($jugada > $intentos) || ($fin == true) ){
            header("location:finProfe.php?jugada=$jugada");
            exit();
        }


        //Acciones si he presionado jugar
        break;
    case "Volver":
        header ("location:indexProfe.php?intentos=$intentos");
        //Acciones si he presionado volver
        exit();
    default:
        header ("location:indexProfe.php");
    //Acciones por defecto
}

//Si hay variables que acutalizo la pongo aquí en cualquier caso, las debería de poner aquí

?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de adivina un número</title>
</head>
<body style="width: 60%;float:left;margin-left: 20%; ">

<h3></h3>
<fieldset style="width:40%;background:bisque ">
    <legend>Empieza el juego</legend>
    <form action="jugarProfe.php" method="POST" >
        <h2> El n&uacutemero es  <span style="color: blue"> <?=$numero?></span> </h2>
        <h5> Jugada  <span style="color: blue"> <?=$jugada?></span>  </h5>
        <h5> Actualmente te quedan   <span style="color: blue"> <?=$intentos - $jugada?> </span> intentos </h5>

        <input type="hidden" value="<?= $intentos ?>" name="intentos">
        <fieldset>
            <legend>Indica c&oacutemo es el n&uacutemero qu&eacute has pensado</legend>
            <input type="radio" name="rtdo" <?=$cheked_mayor?> value='>'> Mayor<br />
            <input type="radio" name="rtdo" <?=$cheked_menor?> value='<'> Menor<br />
            <input type="radio" name="rtdo" value='='> Igual<br />
        </fieldset>
        <hr />
        <input type="submit" value="Jugar" name="submit" >
        <input type="submit" value="Reiniciar" name="submit"  >
        <input type="submit" value="Volver" name="submit"  >
        <!-- guardo valores paraq siguentes jugadas -->
        <input type="hidden" name="min" value="<?=$min?>" >
        <input type="hidden" name="max" value="<?=$max?>" >
        <input type="hidden" name="intentos" value="<?=$intentos?>" >
        <input type="hidden" name="jugada" value="<?=$jugada?>" >
        <input type="hidden" name="numero" value="<?=$numero?>" >

    </form>
</fieldset>

</body>
</html>

