<?php include '../../head.php'; ?>


<div class="container-full mt-2 mb-2">
    <div id="background-tasks">

    <!-- <div id="floating-button" data-toggle="tooltip" data-placement="left" title="Agregar Emsefor">
        <a id="btn-addEstadoCliente" href="#">
            <p class="open-background-tasks"><i class="ri-add-line"></i></p>
        </a>
    </div> -->

</div>
<div id="alertasEmsefor" class="mb-2">
</div>
<div class="row g-2">
    <div class="col-xl-12">
        <div class="table-responsive bg-white" style="padding-bottom:10px;border-radius:5px; padding:10px;" id="tabla_estado">
        </div>
    </div>
</div>
</div>
<?php include 'modal-detalle.php'; ?>
<?php include '../../views/estado-cliente/modal-agregar.php'; ?>
<?php include 'modal-modificar.php'; ?>
<?php include 'modal-eliminar.php'; ?>
<script src="../../controllers/estado-cliente/estadoClienteController.js"></script>
<?php include '../../body.php'; ?>