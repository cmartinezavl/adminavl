<div class="modal fade" id="modalAgregarUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:5px;">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="staticBackdropLabel">Agregar usuario</h4>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control form" id="nombreuser" placeholder="Ingrese nombre usuario"
                        required>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Apellido</label>
                    <input type="text" class="form-control form" id="apellidouser"
                        placeholder="Ingrese apellido usuario" required>
                </div>
                <div class="mb-4 has-validation">
                    <label for="" class="form-label">Usuario</label>
                    <input type="text" class="form-control form" id="usuario" placeholder="Ingrese usuario cuenta"
                        required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        El usuario ya existe.
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="text" class="form-control form" id="pass" placeholder="Ingrese una contraseña"
                        required>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Perfil</label>
                    <select name="perfil" class="form-control form" data-trigger id="perfil">
                        <option value="" hidden selected>Seleccione un perfil</option>
                    </select>
                </div>

                <div class="mb-4" id="empresaDiv" style="display:none;">
                    <label for="" class="form-label">Cliente</label>
                    <select name="empresa" class="form-control" data-trigger id="empresa">
                        <option value="" hidden selected>Seleccione una empresa</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info float-right ml-2" id="btn-agregar-usuario">Agregar</button>
                <button type="button" class="btn btn-secondary float-right" id="btn-cerrar-usuario"
                    data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>