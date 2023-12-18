<?php

/*
 * Mas interes las acciones y no
 *  PDO: se adapta a cualquiera bases de datos
 *
 * ***SENTENCIAS SQL
 *  -SELECT, INSERT UPDATE, DELETE MERGE - DML (modificacion
 * -CREATE ALTER DROP RENAME TRUNCATE COMMENT - ddL
 * -GRANT REVOKE - DCL (control de datos
 * -COMMIT, ROLLBACK, SAVEPINT Control de transacciones ( se ejecutan como una unidad o se hacen todas.
 * Acciones se quedan en escucha hasta commit si no se hace un rollback
 *
 * ***mysquli (mysql improve)
 *
 * 3. DOCKERIZAMOS LA BASE DE DATOS. (docker composer) 2 contenedores
 *  /Docker - Software Gestionar contenedores , virtualizaciones de servicios. Emular una máquina.
 * /Contenedor(imagentes) - Fichero que emula de manera aislada un sistema con sus aplicaciosnes.
 * ¿Porqué imagenes y contenedores? - Contenedor porner la imagen a funcionar. Contenedor e imagen van de la mano.
 *                                      Imagen un fichero solo lectura y con las cosas necesarias para poner un sistemas a
 *                                      funcioar
 *
 * SQL apartado wiki no comenta mucho. */