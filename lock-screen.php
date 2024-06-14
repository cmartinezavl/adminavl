<?php 
    session_start();

    if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true) {
        header("Location: http://localhost/adminavl_v4/views/usuarios");
        //header("Location: https://webapp.avlchile.cl/adminavl_v4/views/usuarios");
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

    if(isset($_POST['newUser'])){
        setcookie('user', '', 0);
        header("Location: login.php");
    }

    if(!isset($_COOKIE['user'])){
        if(!isset($_COOKIE['pass'])){
            header("Location: login.php");
        }
        
    }

    if(isset($_COOKIE["user"]) && isset($_POST["password"])) {
        try {
            include "models/conexion.php";
            $usuario = strtolower($_COOKIE["user"]);
            $pass = $_POST["password"];
            $id = "";
            $nombre = "";
            $apellido = "";
            $nombre_usuario = "";
            $perfil = "";
			$id_perfil = "";
			$estado = "";
			$vista = "";

			$query = "SELECT u.id, u.nombre, u.apellido, u.nombre_usuario, u.id_perfil, u.estado, u.vista_solicitudes, p.perfil
					 FROM adm_usuario u
                     INNER JOIN adm_perfil p ON p.id_perfil = u.id_perfil
					 WHERE u.nombre_usuario = '$usuario'
					 AND u.password = '$pass'";


			$result = sqlsrv_query( $conexion, $query, array(), array("Scrollable"=>"buffered"));
            
			if (sqlsrv_num_rows($result) > 0) {
				while($rows  = sqlsrv_fetch_object($result) ) {
                    $id = $rows->id;
					$nombre = $rows->nombre;
                    $apellido = $rows->apellido;
                    $nombre_usuario = $rows->nombre_usuario;
					$id_perfil = $rows->id_perfil;
					$estado = $rows->estado;
					$vista = $rows->vista_solicitudes;
                    $perfil = $rows->perfil;
				}
                
                if($estado == 1){
					setcookie('loggedin', true, time() + 10800);
					setcookie('access_key', $key, time() + 10800);
					setcookie('id', $id, time() + 10800);
					setcookie('nombre', $nombre, time() + 10800);
					setcookie('apellido', $apellido, time() + 10800);
					setcookie('nombre_usuario', $nombre_usuario, time() + 10800);
					setcookie('id_perfil', $id_perfil, time() + 10800);
                    setcookie('perfil', $perfil, time() + 10800);
                    setcookie('pass', encryptIt($_POST["password"]), time() + 43200);
					if($id_perfil == 8){
						setcookie('vista', $vista, time() + 10800);
					}
					
					$tsql = "UPDATE adm_usuario SET fecha = CURRENT_TIMESTAMP WHERE id = '$id'";
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

    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }

    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
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
    <meta name="Description" content="PHP Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard, template dashboard, Bootstrap dashboard, admin panel template, sales dashboard, Bootstrap admin panel, stocks dashboard, crm admin dashboard, ecommerce admin panel, admin template, admin panel dashboard, course dashboard, template ecommerce website, dashboard hrm, admin dashboard">

    <!-- TITLE -->
    <title>Lock Screen - AVLChile</title>

    <link rel="icon" href="assets/images/authentication/Logo_AVL.png" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- MAIN JS -->
    <script src="assets/js/authentication-main.js"></script>

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
        <div class="container-lg">
            <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="my-3 d-flex justify-content-center">
                        <a href="lock-screen.php">
                            <img src="assets/images/authentication/logoavlblancomundo.png" alt="logo" class=""
                                style="width:50px;">
                            <img src="assets/images/authentication/logoavlblancotexto.png" alt="logo" class=""
                                style="width:190px;">
                        </a>
                    </div>
                    <p class="mb-4 fw-normal text-center" style="color:white;">Ingrese su contraseña para iniciar sesión
                    </p>
                    <?php  if($booleanerror == true){ ?>
                    <div class="alert alert-danger alert-dismissible fade show custom-alert-icon shadow-sm mb-4"
                        role="alert">
                        <svg class="svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
                            width="1.5rem" fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z" />
                        </svg>
                        <?php 
                                switch($error){
                                    case 1:
                                        echo "Contraseña incorrecta.";
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
                            <div class="d-flex align-items-center mb-3">
                                <div class="lh-1">
                                    <span class="avatar avatar-md avatar-rounded">
                                        <img src="assets/images/fondos/undraw_profile.png" alt="">
                                    </span>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0 fw-semibold text-dark"><?php echo strtoupper($_COOKIE['user']) ?></p>
                                </div>
                            </div>
                            <form class="row gy-3" method="post">
                                <div class="col-xl-12 mb-2">
                                    <label for="lockscreen-password" class="form-label text-default">Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            id="input-pass">
                                        <button class="btn btn-light" onclick="createpassword('input-pass',this)"
                                            type="button" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">

                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Desbloquear</button>
                                </div>

                            </form>
                            <form method="post" class="text-center">
                                <input type="hidden" name="newUser">
                                <button type="submit" class="btn btn-link text-dark" style="text-decoration: none;margin-top: 10px;">
                                    <p class="fw-normal text-center">Iniciar sesión con otro usuario</p>
                                </button>
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

    <script src="assets/js/show-password.js"></script>

    <script src="assets/js/custom-switcher.js"></script>

    <!-- END SCRIPTS -->

</body>

</html>