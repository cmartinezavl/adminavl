<style>
.gm-ui-hover-effect {
    display: none !important;
}
</style>
<div class="modal fade" id="modalAgregarSolicitud" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:5px;">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="staticBackdropLabel">Agregar Solicitud</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    onclick="document.body.classList.remove('no-scroll')" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="background-color:var(--default-body-bg-color);">
                <div class="row g-2">
                    <div class="card p-3 col-xl-5" style="border-radius:0.5rem;">
                        <div class="row g-2">
                            <div class="col-xl-12">
                                <h5>Datos Cliente</h5>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Cliente</label>
                                    <?php if($_COOKIE['id_perfil'] == 3){ ?>
                                    <input type="text" class="form-control form-add" id="cliente"
                                        value="<?php echo $_COOKIE['cliente']; ?>" readonly>
                                    <?php } else {?>
                                    <div id="cliente" placeholder="Seleccione un cliente"></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Nombre contacto</label>
                                    <input type="text" class="form-control form-add" id="nombre" required>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Numero contacto</label>
                                    <input type="text" class="form-control form-add" id="numero" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 col-xl-7" style="border-radius:0.5rem;">
                        <div class="row g-2">
                            <div class="col-xl-12">
                                <h5>Coordenada Vehículos</h5>
                            </div>
                            <div class="col-xl-12">
                                <div id="map" class=""
                                    style="height: 100%; border-radius:0.5rem;height: 265px;"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card p-3 col-xl-12" style="border-radius:0.5rem;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5>Detalle Vehículos</h5>
                            <div>
                                <button class="btn btn-icon btn-danger btn-wave" id="btn-menos">
                                    <i class="las la-minus"></i>
                                </button>
                                <span class="text-dark mx-2" id="contador">1</span>
                                <button class="btn btn-icon btn-primary btn-wave" id="btn-mas">
                                    <i class="las la-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="accordion accordion-customicon1 accordions-items-seperate contenido"
                            id="accordioncustomicon1Example">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-transparent" id="btn-agregar-solicitud">Agregar</button>
            </div>
        </div>
    </div>
</div>