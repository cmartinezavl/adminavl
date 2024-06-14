<?php ?>


<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="<?php echo $base_url ?>views/dashboard" class="header-logo">
            <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo" class="desktop-logo">
            <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo" class="toggle-logo">
            <div class="d-flex align-items-center">
                <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo"
                    class="desktop-dark">
                <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL_nombre.png" alt="logo"
                    class="desktop-dark" style="width: 120px;height: 53px;">
            </div>
            <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo" class="toggle-dark">
            <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo"
                class="desktop-white">
            <img src="<?php echo $base_url ?>assets/images/authentication/Logo_AVL.png" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!--------------------------------------- ADMINISTRACION ---------------------------------->
              
                    <li class="slide__category"><span class="category-name">ADMINISTRACION</span></li>
                    <li class="slide mb-1">
                        <a href="<?php echo $base_url ?>views/cotizacion/" class="side-menu__item <?php if ($url == "/adminavl_v4/views/cotizacion/") {
                               echo "active";
                           } ?>">
                            <i class="las la-file-alt side-menu__icon"></i>
                            <span class="side-menu__label">Cotizacion</span>
                        </a>
                    </li>
                    <li class="slide mb-1">
                        <a href="<?php echo $base_url ?>views/contrato/" class="side-menu__item <?php if ($url == "/adminavl_v4/views/contrato//") {
                               echo "active";
                           } ?>">
                            <i class="las la-file-contract side-menu__icon"></i>
                            <span class="side-menu__label">Contrato</span>
                        </a>
                    </li>
                

                <!--------------------------------------- GESTORES ---------------------------------->
                <li class="slide__category"><span class="category-name">GESTORES</span></li>
                <li class="slide has-sub mb-1 <?php if ($url == "/adminavl_v3/views/inventario/gps/") {
                        echo "open";
                    } ?>">
                        <a href="javascript:void(0);" class="side-menu__item <?php if ($url == "/adminavl_v3/views/inventario/gps/") {
                            echo "active";
                        } ?>">
                            <i class="las la-boxes side-menu__icon"><img style="margin-bottom: 14px !important;" width="15" heigth="15"></i>
                            <span class="side-menu__label">Inventario</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1"
                            style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(119.2px, 236.8px, 0px); display: none; box-sizing: border-box;"
                            data-popper-placement="bottom">
                            <li class="slide mb-1">
                                <a href="<?php echo $base_url ?>views/gps" class="side-menu__item <?php if ($url == "/adminavl_v3/views/gps/") {
                                       echo "active";
                                   } ?>">
                                    <span class="side-menu__label">GPS</span>
                                </a>
                            </li>
                            <?php if ($_COOKIE['id_perfil'] == 1) { ?>
                                <li class="slide mb-1">
                                    <a href="<?php echo $base_url ?>views/emsefor" class="side-menu__item <?php if ($url == "/adminavl_v3/views/emsefor/") {
                                           echo "active";
                                       } ?>">
                                        <span class="side-menu__label">Marca</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="slide mb-1">
                                <a href="<?php echo $base_url ?>views/incumplimientos" class="side-menu__item <?php if ($url == "/adminavl_v3/views/incumplimientos/") {
                                       echo "active";
                                   } ?>">
                                    <span class="side-menu__label">Modelo</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php if ($_COOKIE['id_perfil'] == 1) { ?>
                    <li class="slide mb-1">
                        <a href="<?php echo $base_url ?>views/estado-cliente" class="side-menu__item <?php if ($url == "/adminavl_v4/views/estado-cliente/") {
                               echo "active";
                           } ?>">
                            <i class="las la-toggle-on side-menu__icon" style="color:#357FBC;"></i>
                            <span class="side-menu__label">Estado Cliente</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($_COOKIE['id_perfil'] != 8) { ?>
                    <li class="slide mb-1">
                        <a href="<?php echo $base_url ?>views/vehiculos" class="side-menu__item <?php if ($url == "/adminavl_v3/views/vehiculos/") {
                               echo "active";
                           } ?>">
                            <i class="las la-truck side-menu__icon"></i>
                            <span class="side-menu__label">vehiculos</span>
                        </a>
                    </li>
                <?php } ?>
                <li class="slide mb-1">
                    <a href="<?php echo $base_url ?>views/solicitudes-servicio" class="side-menu__item <?php if ($url == "/adminavl_v3/views/solicitudes-servicio/") {
                           echo "active";
                       } ?>">
                        <i class="las la-clipboard-list side-menu__icon"></i>
                        <span class="side-menu__label">Solicitud de Servicios</span>
                    </a>
                </li>
                <!--------------------------------------- MANTENEDORES ---------------------------------->
                <?php if ($_COOKIE['id_perfil'] == 1) { ?>
                    <li class="slide__category"><span class="category-name">MANTENEDORES</span></li>
                    <li class="slide mb-1">
                        <a href="../usuarios/" class="side-menu__item <?php if ($url == "/adminavl_v4/views/usuarios/") {
                            echo "active";
                        } ?>">
                            <i class="la la-user-friends side-menu__icon"></i>
                            <span class="side-menu__label">Usuarios</span>
                        </a>
                    </li>
                    <li class="slide mb-1">
                        <a href="../clientes/" class="side-menu__item <?php if ($url == "/adminavl_v4/views/clientes/") {
                            echo "active";
                        } ?>">
                            <i class="las la-user-tie side-menu__icon"></i>
                            <span class="side-menu__label">Clientes</span>
                        </a>
                    </li>
                <?php } ?>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>