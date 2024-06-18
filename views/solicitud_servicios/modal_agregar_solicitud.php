<div class="modal fade" id="modalAgregarSolicitud" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:5px;">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="staticBackdropLabel">Agregar Solicitud</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="background-color:var(--default-body-bg-color);">
                <div class="row g-2">
                    <div class="card p-3 bg-white col-xl-5" style="border-radius:0.5rem;"
                        data-animation="FadeIn">
                        <div class="row g-2">
                            <?php if($_COOKIE['id_perfil'] == 4 || $_COOKIE['id_perfil'] == 1){ ?>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Cliente</label>
                                    <input type="text" class="form-control form-add" id="cliente" required>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Empresa</label>
                                    <input type="text" class="form-control form-add" id="empresa" required>
                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Nombre Contacto</label>
                                    <input type="text" class="form-control form-add" id="nombre" required>
                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Numero Contacto</label>
                                    <input type="text" class="form-control form-add" id="numero" required>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Coordenadas</label>
                                    <input type="text" class="form-control form-add" id="coordenadas" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div id="map" class="bg-white" style="height: 100%; border-radius:0.5rem;height: 250px;"></div>
                    </div>
                    <div class="card p-3 bg-white col-xl-12" style="border-radius:0.5rem;" data-animation="FadeIn">
                        <div class="d-flex align-items-center justify-content-end mb-3">
                            <button class="btn btn-icon btn-danger btn-wave" id="btn-menos">
                                <i class="las la-minus"></i>
                            </button>
                            <span class="text-dark mx-2" id="contador">1</span>
                            <button class="btn btn-icon btn-primary btn-wave" id="btn-mas">
                                <i class="las la-plus"></i>
                            </button>
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