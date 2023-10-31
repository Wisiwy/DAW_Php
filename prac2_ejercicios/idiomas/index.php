<?php
$idioma = $_POST['idioma'] ?? "es";
$checked_fr="";
$checked_en="";
$checked_es="";

switch ($idioma) {
    case 'fr':
        $legend1 = "Selectionnez la langue";
        $frances = "Français";
        $ingles = "Anglais";
        $espanyol = "Espagnol";
        $submitName = "Selectioner";
        $datosAcceso = "Accéder aux données";
        $insertaNombre = "Entrez votre nom";
        $submitName2 = "Accés";
        $checked_fr="checked"; //Escribe la palabra "checked" en el radio button del formulario.
        break;
    case 'en':
        $legend1 = "Select language";
        $ingles = "English";
        $frances = "French";
        $espanyol = "Spanish";
        $submitName = "Select";
        $datosAcceso = "Acces data";
        $insertaNombre = "Enter your name";
        $submitName2 = "Acces";
        $checked_en="checked";

        break;
    case 'es':
        $legend1 = "Selecciona el idioma";
        $ingles = "Ingés";
        $frances = "Frances";
        $espanyol = "Español";
        $submitName = "Selecciona";
        $datosAcceso = "Datos de acceso";
        $insertaNombre = "Inserta tu nombre";
        $submitName2 = "Acceder";
        $checked_es="checked";


        break;
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
<fieldset>
    <form action="index.php" method="post">
        <legend><?=$legend1?></legend>
        <input type="radio" name="idioma" <?=$checked_fr?> value="fr"><?=$frances?><br/>
        <input type="radio" name="idioma" <?=$checked_en?> value="en"><?=$ingles?><br/>
        <input type="radio" name="idioma" <?=$checked_es?> value="es"><?=$espanyol?><br/>
        <input type="submit" name="submit" value="<?=$submitName?>">
    </form>
</fieldset>


<form action="sitio.php" method="post">
    <fieldset>
        <legend><?=$datosAcceso?></legend>
        <?=$insertaNombre?><input type="text" name="nombre">
        <input type="submit" value="<?=$submitName2 ?>">
        <input type="hidden" name=idioma value="sp">
    </fieldset>
</form>

<!--Realizar una pagina sitio.php que se recarga en un idioma u otro dependiendo del idioma del que pasemos por post-->

</body>
</html>

