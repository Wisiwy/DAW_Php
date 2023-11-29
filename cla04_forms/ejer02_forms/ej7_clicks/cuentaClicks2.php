<?php
$cuentaClicks = $_POST['clicks'] ?? 0;
if ($_POST['submit'])
    $cuentaClicks++;

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

<h2>Clicks: <?= $cuentaClicks ?></h2>
<form action="cuentaClicks2.php" method="post">
    <input type="submit" value="Click" name="submit">
    <input type="hidden" value="<?= $cuentaClicks ?>" name="clicks">
</form>

</body>
</html>
