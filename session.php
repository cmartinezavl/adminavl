<?php
/**
 * Created by PhpStorm.
 * User: desarrolloavl
 * Date: 28-08-2018
 * Time: 18:49
 */

$Version = "1.4". '.20211230'; //Fecha Modificación 23-11-2021 09:12


if (isset($_COOKIE['access_key'])) {
    
} else {
    header("Location: http://localhost/adminavl_v3/login.php");
    // header("Location: https://webapp.avlchile.cl/adminavl_v3/login.php");
    exit;
}

