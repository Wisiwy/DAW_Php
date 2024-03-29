<?php

/*
**DOCKER COMPOSE: Software Gestionar contenedores , virtualizaciones de servicios. Emular una máquina.
 *                Herramienta para definir y gestionar app multi-contenedor.
    -'docker-compose.yaml' : archivo para configurar la estructura de al app y definir como los diferentes
                             servicios interactuan.
    - multicontenedor: Contenedores de Docker que necesitan trabajar juntos. Definir todos los servicios, redes y
                        volúmenes en un solo archivo, simplificando la gestión de la aplicación.
    - 'docker compose up'

REFERENCIAS:
    -Imagenes ya creadas: https://hub.docker.com/
*/

//LIMPIAR - Al inicializar un contenedor
/*When a container is started for the first time, a new database with the specified name will be created and
initialized with the provided configuration variables . Furthermore, it will execute files with extensions
. sh, .sql and .sql . gz that are found in / docker - entrypoint - initdb . d . Files will be executed in alphabetical
order . You can easily populate your mysql services by mounting a SQL dump into that directory and provide custom
images with contributed data . SQL files will be imported by default to the database specified by the MYSQL_DATABASE
variable .*/