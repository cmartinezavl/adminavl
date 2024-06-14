<?php
/**
 * Created by PhpStorm.
 * User: desarrolloavl
 * Date: 21-11-2017
 * Time: 18:59
 */



setcookie('loggedin', false, 0);
setcookie('access_key', '', 0);
setcookie('id', '', 0);
setcookie('nombre', '', 0);
setcookie('apellido', '', 0);
setcookie('nombre_usuario', '', 0);
setcookie('id_perfil', '', 0);
setcookie('perfil', '', 0);
setcookie('pass', '', 0);

setcookie('nombre_fantasia', '', 0);
setcookie('id_speedgps', '', 0);
setcookie('estado_speedgps', '', 0);
setcookie('id_wialon', '', 0);
setcookie('estado_wialon', '', 0);
if ($id_perfil == 8) {
    setcookie('vista', '', 0);
}

if (isset($_COOKIE['user'])) {
    header('Location: http://localhost/adminavl_v4/lock-screen.php');
    // header('Location: https://webapp.avlchile.cl/adminavl_v4/login.php');
} else {
    header('Location: http://localhost/adminavl_v4/login.php');
    // header('Location: https://webapp.avlchile.cl/adminavl_v4/login.php');
}

