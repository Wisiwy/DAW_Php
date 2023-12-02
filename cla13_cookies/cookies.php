<!--******COOKIES******
    -Fichero que escribe el servidor y almacena en el cliente con información de este.
    -Ficheros texto con parejas "variable->valor".
    -Cliente hace petición al servidor y este devuelve la página y una cookie con
     info de preferencias del cliente (variable - valor)
        Ej. idioma=frances, la próxima sesión se abrira en Francés el sitio.
    -Necesita permisos y mejora la experiencia de usuario.
    -No guarda objetos solamente strings.

 ****VIDA COOKIES: PROCESO
1. Cookie queda almacenada en el cliente
2. Usuario solicita recurso web al servidor
    -Junto con solicitud se envian las cookies que el servidor hubiera escrito
    en ese cliente. Solo escritas por servidor.
3. Servidor entrega recurso
    -Servidor analiza los valores de las cookies.
    -Personaliza la página segun las cookies.


 ****PUNTOS IMPORTANTES
 1. Cookie no almacena objetos solo STRING
 2. Necesario PERMISO para escribir en cliente.
 3. Solo puede ser LEIDA por el servidor que la creó.

-------------------- TRABAJAR CON COOKIES ---------------------------
***CREAR cookie . setcookie()
¡CUIDADO! Seteo y borrado tendrá efecto cuando el cuando el cliente reentregue la página al cliente:
    3 primero parámetros (llega hasta 7 parámetros) :
        setcookie(Nombre_cookes, Valor_cookies, tiempo_vida);
        setcookie("usuario", $_SERVER['PHP_AUTH_USER'], time()+3600);

****RECUPERAR Cookie $_COOKIE[]
    -$_COOKIE[nombre_cookie];
    -$usuario = $_COOKIE['usuario'];

****BORRAR Cookie
    // Ponemos un tiempo de expiración negativo
    setcookie("user", "", time()-3600);


-->

<?php
/*
 ******EJEMPLOS de COOKIES***
    //Guardar momento de conexion y duración de 30sec.
    $timestamp=time();
    setcookie("conexion", $timestamp, time()+30);
*/

//*****COOKIE guarda cada peticion al servidor
//$conexionCookie = $_COOKIE("conexion") ?? []; //Array vacio. Si esta vacia la cookie.
//la linea anterior no vale porque seguiremos guardando conexiones
if (isset($_COOKIE['conexion']))
    //leer cookies de conexion. cookie es array
    //serialize() - convertir de string a objetos
    $conexiones = unserialize($_COOKIE['conexion']);
else
    //si no esta seteada creamos el array vacio
    $conexiones =  [];
var_dump($conexiones);

//crear un mensaje con las cookies de conexion. Recorremos el array.
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
