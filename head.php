<?php
include "session.php";
$url = $_SERVER["REQUEST_URI"];
$base_url = 'http://localhost/adminavl_v3/'; //desa
//$base_url = 'https://webapp.avlchile.cl/adminavl_v3/'; //prod
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="icon-overlay-close" style="--primary-rgb: 53, 127, 188;">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <?php if ($url == "/adminavl_v3/views/dashboard/") {?>
    <title>Dashboard - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/estado-cliente/") {?>
    <title>Estado Cliente - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/treseme/vehiculos/") {?>
    <title>Vehículos Treseme - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/treseme/emsefor/") {?>
    <title>Emsefor Treseme - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/treseme/usuarios/") {?>
    <title>Usuarios Treseme - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/sofofa/vehiculos/") {?>
    <title>Vehículos Sofofa - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/integraciones/vehiculos/") {?>
    <title>Vehículos Integraciones - AVLChile</title>
    <?php } ?>
    <?php if ($url == "/adminavl_v3/views/integraciones/validaciones/") {?>
    <title>Validaciones Integraciones - AVLChile</title>
    <?php } ?>

    <!-- FAVICON -->
    <link rel="icon" href="<?php echo $base_url?>assets/images/authentication/Logo_AVL.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?php echo $base_url?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- ICONS CSS -->
    <link href="<?php echo $base_url?>assets/css/icons.css" rel="stylesheet">
    <!-- STYLES CSS -->
    <link href="<?php echo $base_url?>assets/css/styles.css" rel="stylesheet">
    <!-- NODE WAVES CSS -->
    <link href="<?php echo $base_url?>assets/libs/node-waves/waves.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url?>assets/libs/prismjs/themes/prism-coy.min.css">
    <!-- SIMPLEBAR CSS -->
    <link rel="stylesheet" href="<?php echo $base_url?>assets/libs/simplebar/simplebar.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>assets/css/virtual-select.min.css" />
    <!-- COLOR PICKER CSS -->
    <link rel="stylesheet" href="<?php echo $base_url?>assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>assets/libs/@simonwep/pickr/themes/nano.min.css">
    <!-- CHOICES CSS -->
    <link rel="stylesheet" href="<?php echo $base_url?>assets/libs/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>assets/css/index.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?php echo $base_url?>assets/css/datatables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/libs/sweetalert2/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="<?php echo $base_url?>assets/js/virtual-select.min.js"></script>
    <script src="<?php echo $base_url?>assets/js/main.js"></script>
    <script src="<?php echo $base_url?>assets/js/moment.js"></script>
    <script src="<?php echo $base_url?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="<?php echo $base_url?>assets/libs/prismjs/prism.js"></script>
    <script src="<?php echo $base_url?>assets/js/prism-custom.js"></script>
    <script src="<?php echo $base_url?>assets/js/Toasts.js"></script>
    
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="<?php echo $base_url?>assets/js/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>

    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/timeline.js"></script>
    <script src="<?php echo $base_url?>assets/js/grouped-categories.js"></script>
    <script src="<?php echo $base_url; ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <style>
    .modal-header {
        padding: 14px;
        border-block-end: 1px solid var(--default-border);
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .modal-footer {
        padding: 8px;
        border-block-start: 1px solid var(--default-border);
    }
    </style>

</head>

<body>

    <!-- SWITCHER -->
    <?php include 'switcher.php'; ?>

    <!-- END SWITCHER -->

    <!-- LOADER -->
    <div id="loader">
        <img src="<?php echo $base_url?>assets/images/media/loader.svg" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">

        <!-- HEADER -->
        <?php include 'nav.php'; ?>

        <!-- END HEADER -->

        <!-- SIDEBAR -->
        <?php include 'sidebar.php'; ?>

        <!-- END SIDEBAR -->

        <!-- MAIN-CONTENT -->

        <div class="main-content app-content">