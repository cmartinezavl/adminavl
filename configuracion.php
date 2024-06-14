<div class="modal fade" id="modalConfiuracion" tabindex="-1" aria-labelledby="exampleModalScrollable2"
    data-bs-keyboard="false" aria-hidden="true" data-bs-backdrop="static">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel2">Configuración
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close" id="cerrar-configuracion"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                <div class="row g-2">
                    <div class="col-xl-3">
                        <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                            <a class="nav-link active" id="btn-tab-perfil" data-bs-toggle="tab" role="tab" aria-current="page"
                                href="#perfil-vertical-link" aria-selected="false" tabindex="-1"><i
                                    class="las la-user-circle me-2 align-middle d-inline-block"
                                    style="font-size:15px;"></i>Perfil</a>
                            <a class="nav-link mt-2" id="btn-tab-contraseña" data-bs-toggle="tab" role="tab" aria-current="page"
                                href="#contraseña-vertical-link" aria-selected="false" tabindex="-1"><i
                                    class="las la-lock me-2 align-middle d-inline-block"
                                    style="font-size:15px;"></i>Contraseña</a>
                        </nav>
                    </div>
                    <div class="col-xl-9">
                        <div class="tab-content mt-2 mt-xl-0">
                            <div class="tab-pane text-muted active" id="perfil-vertical-link" role="tabpanel"
                                style="height: 368px;">
                                <div class="row g-3">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombreUsuario" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6"></div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="apellidoUsuario" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane text-muted" id="contraseña-vertical-link" role="tabpanel"
                                style="height: 368px;">
                                <div class="row g-3">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Contraseña Actual</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control"
                                                    name="password" id="password_old" autocomplete="new-password">
                                                <button class="btn btn-light" type="button"
                                                    onclick="createpassword('password_old',this)"
                                                    id="button-addon2"><i
                                                        class="ri-eye-off-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6"></div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Contraseña Nueva</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control"
                                                    name="password" id="password_nuevo" autocomplete="new-password">
                                                <button class="btn btn-light" type="button"
                                                    onclick="createpassword('password_nuevo',this)"
                                                    id="button-addon2"><i
                                                        class="ri-eye-off-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6"></div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Confirmar Contraseña</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control"
                                                    name="password" id="confirm_password" autocomplete="new-password">
                                                <button class="btn btn-light" type="button"
                                                    onclick="createpassword('confirm_password',this)"
                                                    id="button-addon2"><i
                                                        class="ri-eye-off-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-transparent" id="btn-guardar-configuracion">Guardar</button>
            </div>
        </div>
    </div>
</div>