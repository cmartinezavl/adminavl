<?php
include "session.php";
$url = $_SERVER["REQUEST_URI"];
$base_url = 'http://localhost/adminavl_v4/'; //desa
//$base_url = 'https://webapp.avlchile.cl/adminavl_v4/'; //prod
?>



<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="PHP Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard, template dashboard, Bootstrap dashboard, admin panel template, sales dashboard, Bootstrap admin panel, stocks dashboard, crm admin dashboard, ecommerce admin panel, admin template, admin panel dashboard, course dashboard, template ecommerce website, dashboard hrm, admin dashboard">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- TITLE -->
    <title> AVLChile </title>

    <!-- FAVICON -->
    <link rel="icon" href="../../assets/images/authentication/Logo_AVL.png">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="../../assets/css/icons.css" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="../../assets/css/styles.css" rel="stylesheet">


    <link rel="stylesheet" href="../../assets/css/virtual-select.min.css" />

    <!-- MAIN JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- NODE WAVES CSS -->
    <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- SIMPLEBAR CSS -->
    <link rel="stylesheet" href="../../assets/libs/simplebar/simplebar.min.css">

    <!-- COLOR PICKER CSS -->
    <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">
    <!-- CHOICES CSS -->
    <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



    <!-- Date pick -->
    <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">

    <!-- CHOICES JS -->
    <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- VIRTUAL SELECT JS -->
    <script src="../../assets/js/virtual-select.min.js"></script>
    <!-- QUILL CSS -->
    <link rel="stylesheet" href="../../assets/libs/quill/quill.snow.css">
    <link rel="stylesheet" href="../../assets/libs/quill/quill.bubble.css">

    <!-- FILEPOND CSS -->
    <link rel="stylesheet" href="../../assets/libs/filepond/filepond.min.css">
    <link rel="stylesheet" href="../../assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" href="../../assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">



    <!-- SWEETALERTS CSS -->
    <link rel="stylesheet" href="../../assets/libs/sweetalert2/sweetalert2.min.css">
    <!-- SWEETALERTS JS -->
    <script src="../../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- DATATABLES CDN JS -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


    <!-- INTERNAL DATATABLES JS -->
    <script src="../../assets/js/datatables.js"></script>

    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../../assets/js/date&time_pickers.js"></script>

    <!-- QUILL JS -->
    <script src="../../assets/libs/quill/quill.min.js"></script>

    <!-- FILEPOND JS -->
    <script src="../../assets/libs/filepond/filepond.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script
        src="../../assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script
        src="../../assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js"></script>
    <script
        src="../../assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script
        src="../../assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="../../assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js"></script>

    <!-- FLAT PICKER JS -->
    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- CREATE PROJECT JS -->
    <script src="../../assets/js/create-project.js"></script>

</head>

<body>

    <!-- SWITCHER -->
    <?php include 'switcher.php'; ?>
    <!-- END SWITCHER -->

    <!-- LOADER -->
    <div id="loader">
        <img src="../../assets/images/media/loader.svg" alt="">
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