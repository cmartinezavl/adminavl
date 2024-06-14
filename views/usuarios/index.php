<?php include '../../head.php'; ?>
<style>
    div.table-responsive>div.dataTables_wrapper>div.row {
        margin: 10px;
    }

    #floating-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #3e8ef6;
        position: fixed;
        bottom: 30px;
        right: 30px;
        cursor: pointer;
        box-shadow: 0px 2px 5px #666;
        z-index: 30;
    }


    #floating-button:hover {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #3171C4;
        position: fixed;
        bottom: 30px;
        right: 30px;
        cursor: pointer;
        box-shadow: 0px 2px 5px #666;
        z-index: 30;
    }

    .open-background-tasks {
        color: white;
        position: absolute;
        top: 0;
        display: block;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        padding: 0;
        margin: 0;
        line-height: 55px;
        font-size: 17px;
        font-family: 'Roboto';
        font-weight: 800;
        animation: plus-out 0.3s;
    }

    #background-tasks {
        position: fixed;
        width: 70px;
        height: 70px;
        bottom: 30px;
        right: 30px;
        z-index: 50;
    }

    #background-tasks:hover {
        height: 400px;
        width: 90px;
        padding: 30px;
    }

    #background-tasks:hover .open-background-tasks {
        animation: plus-in 0.15s linear;
        animation-fill-mode: forwards;
    }

    .form-control-color {
        width: 40px;
        height: 40px !important;
        overflow: hidden;
        padding: 0;
    }

    td.details-control {
        text-align: center;
        color: forestgreen;
    }

    .table thead {
        background-color: #3e8ef6;
        color: white;
    }
</style>
<div class="container-full mt-2 mb-2 ml-2 mr-2">
    <div id="background-tasks">

        <div id="floating-button" data-toggle="tooltip" data-placement="left" title="Agregar usuario">
            <a id="btn-addUsuario" href="#">
                <p class="open-background-tasks"><i class="ri-add-line"></i></p>
            </a>
        </div>

    </div>
    <div>
        <div id="cargando_usuarios" style="display: flex; justify-content:center; align-items: center;">

        </div>
        <div id="tabla_usuarios">

        </div>
    </div>
</div>

<?php include '../../views/usuarios/modal_editar.php'; ?>
<?php include '../../views/usuarios/modal_agregar.php'; ?>
<script src="../../controllers/usuarios/usuariosController.js"></script>
<?php include '../../body.php'; ?>