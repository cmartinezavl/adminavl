<div class="modal fade" id="modalIngresarVehiculo" tabindex="-1" aria-labelledby="exampleModalScrollable2"
    data-bs-keyboard="false" aria-hidden="true" data-bs-backdrop="static">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel2">Agregar Vehículo
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="cerrar-agregar"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="" class="form-label">IMEI / GPS / PATENTE (ID Único)</label>
                            <input type="text" class="form-control form-add" id="imei-add" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="" class="form-label">Patente</label>
                            <input type="text" class="form-control form-add" id="patente-add" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="" class="form-label">Cod. Vehículo</label>
                            <input type="text" class="form-control form-add" id="vehiculo-add" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="" class="form-label">Tipo de Vehículo</label>
                            <input type="text" class="form-control form-add" id="tipo-add" list="tipov_list" required>
                            <datalist id="tipov_list">
                            </datalist>

                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="" class="form-label">Unidad</label>
                            <input type="text" class="form-control form-add" id="unidad-add" list="unidad_list"
                                required>
                            <datalist id="unidad_list">
                            </datalist>

                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="" class="form-label">Zona</label>
                            <input type="text" class="form-control form-add" id="zona-add" list="zona_list" required>
                            <datalist id="zona_list">
                            </datalist>

                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="" class="form-label">Vista Arauco</label>
                            <div class="form-check form-switch form-check-lg mt-1">
                                <input class="form-check-input" id="vista_arauco_add" type="checkbox" checked="">
                                <label for="estado" class="form-check-label"></label><span></span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info-transparent" id="btn-ingresar-vehiculo">Agregar</button>
            </div>
        </div>
    </div>
</div>