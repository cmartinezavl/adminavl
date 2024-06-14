<?php
$filtros = false;
$url = $_SERVER['REQUEST_URI'];
?>



<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.php" class="header-logo">
                        <img src="../../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                        <img src="../../assets/images/authentication/Logo_AVL.png" alt="logo" class="toggle-logo">
                        <img src="../../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                        <img src="../../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                        <img src="../../assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                        <img src="../../assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->



            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">






            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-moon header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->




            <!-- FILTROS SOLPED -->
            <?php if (
                $url == "/caminos/views/reporteTolva/" || $url == "/caminos/views/estadoVehiculo/"
                || $url == "/caminos/views/vehiculo/") {
                $filtros = true; ?>
            <?php } ?>
            <?php if ($filtros) { ?>
                <?php if ($url == "/caminos/views/reporteTolva/") { ?>
                    <div class="header-element header-search">
                        <a class="header-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="staticBackdrop" id="btn-filtro-backdrop">
                            <i class="las la-filter header-link-icon" data-bs-toggle="tooltip"
                                data-bs-custom-class="tooltip-dark" data-bs-placement="bottom" title="Filtros"></i>
                        </a>
                    </div>

                <?php } ?>
                <?php if ($url == "/caminos/views/estadoVehiculo/") { ?>
                    <div class="header-element header-search">
                        <a class="header-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="staticBackdrop" id="btn-filtro-backdrop">
                            <i class="las la-filter header-link-icon" data-bs-toggle="tooltip"
                                data-bs-custom-class="tooltip-dark" data-bs-placement="bottom" title="Filtros"></i>
                        </a>
                    </div>
                <?php } ?>
                <?php if ($url == "/caminos/views/vehiculo/") { ?>
                    <div class="header-element header-search">
                        <a class="header-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="staticBackdrop" id="btn-filtro-backdrop">
                            <i class="las la-filter header-link-icon" data-bs-toggle="tooltip"
                                data-bs-custom-class="tooltip-dark" data-bs-placement="bottom" title="Filtros"></i>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>




            <!-- fggfgfg -->
            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                    <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                        <img src="<?php echo $base_url ?>assets/images/authentication
                        /undraw_profile.png" alt="img"
                        width="32" height="32" class="rounded-circle">
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1" id="nombreNav"><?php echo $_COOKIE['nombre'] ?>
                                <?php echo $_COOKIE['apellido'] ?></p>
                            <span class="op-7 fw-normal d-block fs-11"><?php echo $_COOKIE['perfil'] ?></span>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">

                    <li><a class="dropdown-item d-flex" href="../../logout.php"><i
                                class="ti ti-logout fs-18 me-2 op-7"></i>Cerrar sesion</a></li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|switcher-icon -->
                <a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                    data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>