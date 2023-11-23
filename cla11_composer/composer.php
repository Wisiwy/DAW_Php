<?php
/*COMPOSER
¿Qué hace?
    -Un orquestador que gestionará todos los paquetes y librerías
    -Autocarga de los ficheros que implementan las clases que utilizo.
    -Instalar librerías y paquetes de terceros
    Permite:
        -Incorporar paquetes en el proyecto
        -Autoload de clases.

¿Qué es **NAMESPACE**?
    -Organizar los ficheros, dos clases con mismo nombre en diferentes Namespace.
    -Referenciar namespace MiProyecto\nivel1\subnivel2;

    -'namespace' como el "package" de Java

1. Creamos un nuevo archivo **composer.json**. Especificamos cosas:
    -"autoload" - Le decimos a composer el directorio donde buscar las clases.
        - "classmap": ["class"]  //indicmos el de mayor nivel, hace busqueda recursiva
    -Instalar composer en ubuntu y en la carpeta del proyecto
        .curl -sS https://getcomposer.org/installer | php
        -sudo mv composer.phar /usr/bin/composer //cambia directorio la instalación
        -composer install: en la carpeta del proyecto
        -composer update actualizar el class map. //se soluciona con otro autoload
2. Carpeta VENDOR
    -Crea vendor, con varios autoload. Entre ellos el "classmap".
    -Busca las clases a cargar ahí.
3. BUENAS PRÁCTICAS programacion, agruparlos por NAMESPACES.
    -Nombres iguales en Namespaces diferentes.
    -No tiene porqué coincidir con carpeta , suele ser lo normal.
    -Especificar ALIAS**: use \controladores\A;
4. PSR 4.
    -Necesario add "namespaces":
        -en vendor auto load incluir "psr-4":{ 'especificar los namespaces'}
    -no hace falta 'composer update' se actualiza solo.
    -Uso de clase del mismo namespace no hace falta ruta.
*/
require "./vendor/autoload.php";
 use \controladores\A;
 use \privadas\A_ as APrivada;

/*INSTANCIAMOS CLASES*/

$a = new A();
$b = new \controladores\B();
$c = new \controladores\C();
$bd1 = new \modelos\MiMongo();
$bd2 = new \modelos\MySql();
$formulario = new \plantillas\Formulario();
$html = new \plantillas\Html();
$a_privado = new APrivada();
$b_privado = new \privadas\B_();
$a_publica = new \publicas\A_();
$b_publica = new \publicas\B_();

echo "<h3>a $a</h3>";
echo "<h3>b $b</h3>";
echo "<h3>c $c</h3>";
echo "<h3>bd1 $bd1</h3>";
echo "<h3>bd2 $bd2</h3>";
echo "<h3>formulario $formulario</h3>";
echo "<h3>html $html</h3>";
echo "<h3>aPrivada $a_privado</h3>";
echo "<h3>bPrivada $b_privado</h3>";
echo "<h3>aPublica $a_publica</h3>";
echo "<h3>bPublica $b_publica</h3>";



