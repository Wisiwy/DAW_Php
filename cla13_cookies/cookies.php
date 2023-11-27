<!--COOKIES
Archivos parejas variable valor que el servidor escribe en el cliente. Dar permisos para escribir cookies.
Cliente hace petición y servidor devuelve la pagina y una cookie (variable-valor). La próxima vez que se solicita
la página se entrega también el archivo devuelve variable valor. Servidor lee cookies (idioma="frances") y devuelve con
esa información.
En función de las cookies se mejora la experiencia de usuario.
Una cookie no puede guardar objetos solo guarda strings
-->
<!--/*Función setcookie(). Se setea y se borra la cookie, tendra efecto cuando servido rentrege la pagina al cliente.
¡CUIDADO!. 3 primeros parámetros:
setcookie(Nombre_cookes, Valor_cookies, tiempo_vida) //    setcookie("usuario", $_SERVER['PHP_AUTH_USER'], time()+3600);

--RECUPERAR COOKIE ($__COOKIE)
$usuario = $_COOKIE[nombre_cookie];
*/
/*.................................*/
/*cookie en que hora se ha contextado*/

/*COOKIE GUARDA MOMENTO CONEXION Y DURA 30 SEC
setcookie("conexion", $timestamp, time()+30);*/-->

<?php

/*COOKIE guarda cada peticion al servidor*/

//serialize() - convertir de string a objetos

//leer cookies de conexion. cookie es array

//esto no nos vale
//$conexionCookie = $_COOKIE("conexion") ?? []; //Array vacio. Si esta vacia la cookie.

if (isset($_COOKIE['conexion']))
    $conexiones = unserialize($_COOKIE['conexion']);
else
    $conexiones =  [];
var_dump($conexiones);
//crear un mensaje con las cookies de conexion. Recollremos el array
$html_msj = "";
foreach ($conexiones as $index => $conexion){
    $html_msj .= "<h3>Conexion $index: ".date("d/m/y h:i:s", $conexion)."</h3>";
}
$conexiones[]=time();
$conexiones=serialize($conexiones);
setcookie('conexion',$conexiones, time()+24*60*60);
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
<h2>Hola a todos</h2>
<?=$html_msj?>


</body>
</html>
