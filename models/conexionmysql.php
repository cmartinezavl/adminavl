<?php

$SERVER = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'webapp.avlchile.cl';

if ($SERVER === 'localhost') {
    define('SERVER_NAME', 'webapp.avlchile.cl'); //Cuando esta en localhost
} else {
    define('SERVER_NAME', 'localhost'); //Cuando esta en servidor
}

define('USER_NAME', 'root');
define('PASSWORD', 'chiletrack');
define('DB_NAME', 'flespi_integracion');

/* crea la conexión */
$conn = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);

/* verificar la conexión */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* cambiar el conjunto de caracteres a utf8 */
if (!$conn->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
}

?>
