# Ejercicio propuesto en clase
Se trata de un juego dónde la aplicación genera un número de 1 a 1024 y el usuario debe de acertarlo

Clona el proyecto en un directorio de tu document root:
* /var/www/html en linux si no lo has modificado el DocumentRoot
* c:\xampp\htdocs en windows si has instalado xampp y no lo has modificado el DocumentRoot

```bash
git clone https://github.com/MAlejandroR/adivinar_numero_usando_sesiones.git
```

Como usamos composer para el autoload lo primero tienes que orquestar.

Para ello en el terminal (igual da windows que linux ), vas al directorio de tu proyecto y orquestas.

```bash
cd /var/www/html/adivinar_sesiones
composer update
```

En el directorio **clases**  están las clases usadas y referenciadas por el namespace Jugada

## Notas importantes
La parte práctica en el examen la haré parecida a este ejercicio, pero en otro contexto, por lo que estaría muy bien que entiendas este ejercicio y lo hagas comprendiendo lo que haces

Notas observa cómo hay que serializar para mantener las diferentes jugadas en la variable de sesión (fichero **index.php en la línea 29**).

Igualmente al recuperarla debo de deserializar (**fin.php línea 11 y en Plantilla línea 22**)




# adivinar_numero_usando_sesiones
