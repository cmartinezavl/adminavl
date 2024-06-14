<?php include '../../../head.php';?>
<style>
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
        margin-top: 10px;
        margin-right: 10px;
    }

    .dataTables_length {
        margin-top: 10px;
        margin-left: 10px;
    }

    .dataTables_info {
        margin-top: 1px;
        margin-left: 10px;
    }

    .data-table-btn {
        margin: 11px 0 0 92px;
    }
    .dataTables_scrollHeadInner {
        box-sizing: content-box;
        width: 100% !important;
        padding-right: 0px;
    }

    div.dataTables_wrapper div.dataTables_paginate {
        margin: 0;
        white-space: nowrap;
        text-align: right;
        margin-top: 5px;
        margin-right: 10px;
    }

    ::-webkit-scrollbar:horizontal {
        height: 10px;
        background: lightgrey;
    }

    ::-webkit-scrollbar-thumb:horizontal {
        background: grey;
    }

    .table th,
    .table td {
        padding: 0.40rem;
        vertical-align: middle;
        line-height: 1.462;
        font-size: 0.813rem;
        font-weight: 500;
    }
    table.dataTable>tbody>tr.child ul.dtr-details>li {
        border-bottom: 1px solid #efefef;
        padding: .5em 0;
        display: flex;
        align-items: center;
    }
    table.dataTable>tbody>tr.child ul.dtr-details {
        display: block;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
</style>
<div class="container-full mt-2 mb-2">
    <div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="bottomleft-Toast" class="toast fade shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" style="border: 1px solid rgba(255, 255, 255, 0.1)">
            <div class="toast-header bg-success text-fixed-white">
                <i class="las la-exclamation-circle me-2" style="font-size:17px;"></i>
                <strong class="me-auto">Alerta</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            </div>
        </div>
    </div>
    <div class="row g-2">
        <div class="col-xl-12">
            <div class="table-responsive bg-white" style="padding-bottom:10px;border-radius:5px;" id="tabla_vehiculos">
            </div>
        </div>
    </div>
</div>
<?php include 'modal-agregar.php'; ?>
<?php include 'modal-modificar.php'; ?>
<?php include 'modal-eliminar.php'; ?>
<script src="../../../controllers/integraciones/validacionesController.js"></script>
<?php include '../../../body.php'; ?>