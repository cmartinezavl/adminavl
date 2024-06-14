<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="exampleModalScrollable2"
    data-bs-keyboard="false" aria-hidden="true" data-bs-backdrop="static">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel2">Modificar Máquina
                </h6>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <input type="hidden" id="id">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Imei</label>
                            <input type="text" class="form-control" id="imei" disabled required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Device ID</label>
                            <input type="text" class="form-control" id="device_id" disabled required>
                        </div>
                    </div>
                    

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Código AVL</label>
                            <input type="text" class="form-control" id="cod_avl" disabled required>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Máquina</label>
                            <input type="text" class="form-control form-modificar" id="maquina" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Tipo de Máquina</label>
                            <select class="form-select form-select-lg" style="border-radius:0.35rem;"
                                id="tipo_maquina" disabled required>
                                <option value="" hidden selected>Ninguno</option>
                                <option value="CARRO">CARRO</option>
                                <option value="CLASIFICADOR">CLASIFICADOR</option>
                                <option value="FELLER">FELLER</option>
                                <option value="PROCESADOR">PROCESADOR</option>
                                <option value="SHOVEL">SHOVEL</option>
                                <option value="SKIDDER">SKIDDER</option>
                                <option value="TORRE">TORRE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" disabled required>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" disabled required>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Api ID</label>
                            <input type="text" class="form-control" id="api" disabled required>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Vin</label>
                            <input type="text" class="form-control" id="vin" disabled required>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="" class="form-label">Team</label>
                            <select class="form-select form-select-lg form-modificar" style="border-radius:0.35rem;"
                                id="team_list" required>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-1">
                        <div class="form-group">
                            <label for="" class="form-label">color</label>
                            <input type="color" class="form-control form-control-color border-0" id="color"
                                style="margin-top: 3px;" disabled required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-transparent" data-bs-dismiss="modal" id="btn-cancelar-actualizar">Cerrar</button>
                <button type="button" class="btn btn-warning-transparent" id="btn-actualizar-maquina">Modificar</button>
            </div>
        </div>
    </div>
</div>