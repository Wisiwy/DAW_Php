<?php
$msj = "Empieza a clickar";
$clicks = $_POST['contador'] ?? 0;

if (isset($_POST['click'])) {
    $clicks++;
    $msj = "Has realizado $clicks clicks";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuenta Clicks</title>
</head>
<body>
<h1>Llevas <?= $clicks ?> clicks</h1>
<h1><?=$msj?></h1>
<form action="cuentaClicks.php" method="post">
    <input type="hidden" value= "<?= $clicks ?>" name="contador" id="">
    <input type="submit" value="Click" name="click">
</form>


</body>
</html>
