<?php
$nota = rand (0,10);

switch ($nota) {
    case ($nota >= 0 and $nota <= 3):
        echo "<h1>Nota $nota es  deficiente</h1>";
        break;
    case 4:
        echo "<h1>Nota $nota es  insuficiente</h1>";
        break;
    case 5:
        echo "<h1>Nota $nota es  suficiente</h1>";
        break;
    case 6:
        echo "<h1>Nota $nota es  bien</h1>";
        break;
    case ($nota > 6 and $nota < 9):
        echo "<h1>Nota $nota es  notable</h1>";
        break;
    case ($nota >= 9):
        echo "<h1>Nota $nota es  sobresalinte</h1>";
        break;
}

/*Pero observa que si $nota vale 0, no está funcionando correctamente
    Esto es por que en php estoy comparando valores de diferente tipo y realiza una conversión, (de nuevo queda patente la expresividad de php)
    Si la expresión del case es un valor booleano, el valor $nota, se convierte a booleano
    Si el valor es 0, lo voy comparando con las difernetes expresione. Vemos qué ocurre en este caso ($nota =0):
    1.-Primer case: case ($nota>=0 and $nota<=3)

Esta expresión da TRUE, ya que nota es >=0. entonces estoy comparando 0 con TRUE. Convierto 0 a booleano y estaría comparando FALSE con TRUE que es falso, por lo que no ejectua este case

    2.-Segundo case case 4

En este caso comparo 0 con 4 que es FALSE, por lo que tampoco ejecuto este case

    3.-Tercer y cuarto case, igual que el segundo
    4.-Quinto case: case ($nota>6 and $nota<9)

En este caso la expresión devuelve FALSE, ya que 0 no es mayor que 6 ni menor que 9, por lo que comparo 0 con FALSE. Se convierte 0 a booleano y compararía FALSE con FALSE, que como es igual me retorno TRUE y ejecutaría este case.

Para solucionar esta situación, en php lo que debemos hacer es buscar una expresión que sea TRUE, por lo que en los diferentes case debemos especificar expresiones booleanas de forma que aquella que sea TRUE es la que queremos que se ejecute. Esto implicaría poner el valor TRUE en el switch. Veamos cómo queda en el código*/

$nota = rand(0, 10);
switch (TRUE) {
    case ($nota >= 0 and $nota <= 3):
        echo "<h1>Nota $nota es  deficiente</h1>";
        break;
    case $nota == 4:
        echo "<h1>Nota $nota es  insuficiente</h1>";
        break;
    case $nota == 5:
        echo "<h1>Nota $nota es  suficiente</h1>";
        break;
    case $nota == 6:
        echo "<h1>Nota $nota es  bien</h1>";
        break;
    case ($nota > 6 and $nota < 9):
        echo "<h1>Nota $nota es  notable</h1>";
        break;
    case ($nota >= 9):
        echo "<h1>Nota $nota es  sobresalinte</h1>";
        break;
}