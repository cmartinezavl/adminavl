<?php
/**
 * Created by PhpStorm.
 * User: desarrolloavl
 * Date: 21-11-2017
 * Time: 18:59
 */

 setcookie('access_key', '', 0);
 setcookie('id', '', 0);
 setcookie('nombre', '', 0);
 setcookie('apellido', '', 0);
 setcookie('id_perfil', '', 0);
 setcookie('perfil', '', 0);
 setcookie('pass', '', 0);
 
if(isset($_COOKIE['user'])){
    header('Location: http://localhost/adminavl_v3/lock-screen.php');
    // header('Location: https://webapp.avlchile.cl/adminavl_v3/login.php');
}else{
    header('Location: http://localhost/adminavl_v3/login.php');
    // header('Location: https://webapp.avlchile.cl/adminavl_v3/login.php');
}
 
