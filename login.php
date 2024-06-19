<?php 
    session_start();
    include "mcript.php";
    if (isset($_COOKIE['access_key'])) {
        header("Location: http://localhost/adminavl/views/dashboard");
        //header("Location: https://webapp.avlchile.cl/adminavl/views/dashboard");
    }
?>
<?php

    $booleanerror = false;
    $error = 0;
    $key = rand_sha1(50);
    function rand_sha1($length) {
        $max = ceil($length / 40);
        $random = '';
        for ($i = 0; $i < $max; $i ++) {
            $random .= sha1(microtime(true).mt_rand(10000,90000));
        }
        return substr($random, 0, $length);
    }

    $recuerdame = isset($_POST["recuerdame"]) ? $_POST["recuerdame"] : 0;

    if(isset($_COOKIE['user'])){
        if(!isset($_COOKIE['pass'])){
            header("Location: lock-screen.php");
        }
    }

    if(isset($_POST["usuario"]) && isset($_POST["password"])) {
        try {
            include "models/conexion.php";
            $usuario = $_POST["usuario"];
            $pass = md5($_POST["password"]);
            $id = "";
            $nombre = "";
            $apellido = "";
            $perfil = "";
			$id_perfil = "";
			$estado = "";

			$query = "SELECT u.id_usuario, u.nombre, u.apellido, u.id_perfil, u.estado, p.nombre AS nombre_perfil, CASE WHEN u.id_cliente IS NULL THEN NULL ELSE CONCAT(c.id_cliente, ' - ', c.nombre) END AS cliente
					 FROM usuario u
                     INNER JOIN perfil p ON p.id_perfil = u.id_perfil
                     LEFT JOIN cliente c ON c.id_cliente = u.id_cliente
					 WHERE u.usuario = '$usuario'
					 AND u.password = '$pass'";


			$result = sqlsrv_query( $conexion, $query, array(), array("Scrollable"=>"buffered"));
            
			if (sqlsrv_num_rows($result) > 0) {
				while($rows  = sqlsrv_fetch_object($result) ) {
                    $id = $rows->id_usuario;
					$nombre = $rows->nombre;
                    $apellido = $rows->apellido;
					$id_perfil = $rows->id_perfil;
					$estado = $rows->estado;
                    $perfil = $rows->nombre_perfil;
                    $cliente = $rows->cliente;
				}
                
                if($estado == 1){
					setcookie('access_key', $key, time() + 10800);
					setcookie('id', $id, time() + 10800);
					setcookie('nombre', $nombre, time() + 10800);
					setcookie('apellido', $apellido, time() + 10800);
					setcookie('id_perfil', $id_perfil, time() + 10800);
                    setcookie('perfil', $perfil, time() + 10800);

                    if($id_perfil == 3){
                        setcookie('cliente', $cliente, time() + 10800);
                    }

                    if($recuerdame == 1){
                        setcookie('user', $_POST["usuario"], time() + 43200);
                        setcookie('pass', $encriptar($_POST["password"]), time() + 43200);
                    }
					

					$tsql = "UPDATE usuario SET ultima_conexion = CURRENT_TIMESTAMP WHERE id_usuario = $id";
					$result = sqlsrv_query( $conexion, $tsql );
					
					header("Location: views/dashboard");
				}else{
					$booleanerror = true;
					$error = 2;
				}


			} else {
                $booleanerror = true;
                $error = 1;

            }
        } catch( PDOException $e ) { 
			die( "Error connecting to SQL Server" );   
		} finally {
			sqlsrv_close( $conexion );
		}
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- TITLE -->
    <title>Login - AVLChile</title>

    <!-- FAVICON -->
    <link rel="icon" href="assets/images/authentication/Logo_AVL.png" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- MAIN JS -->
    <script src="assets/js/authentication-main.js"></script>

    <link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">

    <style>
    p {
        margin-top: 0;
        margin-bottom: 0rem;
    }

    #background {
        background-image: url("assets/images/authentication/global.jpg");
        background-repeat: no-repeat;
        background-size: cover;

    }
    </style>

</head>

<body id="background">
    <div style="backdrop-filter:blur(2px);width: 100%;">
        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="my-3 d-flex justify-content-center">
                        <a href="index.php">
                            <img src="assets/images/authentication/logoavlblancomundo.png" alt="logo"
                                class="" style="width:50px;">
                            <img src="assets/images/authentication/logoavlblancotexto.png" alt="logo"
                                class="" style="width:190px;">
                        </a>
                        
                    </div>
                    <p class="mb-4 fw-normal text-center" style="color:white;">Ingrese su usuario y contraseña para iniciar sesión</p>
                    <?php  if($booleanerror == true){ ?>
                        <div class="alert alert-danger alert-dismissible fade show custom-alert-icon shadow-sm mb-4"
                            role="alert">
                            <svg class="svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem"
                                viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z" />
                            </svg>
                            <?php 
                                switch($error){
                                    case 1:
                                        echo "Usuario o contraseña incorrecta.";
                                        break;
                                    case 2:
                                        echo "Usuario desactivado.";
                                        break;
                                }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="bi bi-x"></i></button>
                        </div>
                        <?php } ?>

                    <div class="card custom-card">
                        <div class="card-body p-5">
                            
                            <form class="row gy-3" method="post">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">Usuario</label>
                                    <input type="text" class="form-control form-control-lg" name="usuario">
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Contraseña<a
                                            href="resetpassword-basic.php" class="float-end text-danger">¿Olvidaste tu contraseña?</a></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="password" id="input-pass">
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('input-pass',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="recuerdame" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Recuerdame
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2 mb-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SCRIPTS -->

    <!-- BOOTSTRAP JS -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- INTERNAL AUTHENTICATION JS -->
    <script src="assets/js/authentication.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="assets/js/show-password.js"></script>

    <!-- END SCRIPTS -->
    <script src="assets/js/custom-switcher.js"></script>
</body>

</html>