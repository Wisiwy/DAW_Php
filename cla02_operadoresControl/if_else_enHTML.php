<!--//También se puede usar la sintaxis vista anteriormente, pero parece que esta quede más compacta.

/*if (condicion):
Sentencia 1;
endif;*/-->

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Document</title>
</head>
<body>
//Ahora lo vemos con código html
<?php if (true): ?>

    <h1>Esta frase seguro que aparece ahor</h1>
    <!--escribirmos código html -->
<?php else: ?>
    <h1>Aquí escribiré poco ya que no va a aparecer nada</h1>
    <!--escribimos código html -->
<?php endif ?>

</body>
</html>
