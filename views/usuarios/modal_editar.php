<div class="modal fade" id="modalEditarUsuarios" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:5px;">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="staticBackdropLabel">Editar usuario</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_user_edit">
                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_edit" placeholder="Ingrese nombre usuario">
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido_edit"
                            placeholder="Ingrese apellido usuario">
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario_edit" placeholder="Ingrese usuario cuenta">
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="pass_edit" placeholder="Ingrese una contraseña">
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Perfil</label>
                        <select name="perfil_edit" class="form-control" data-trigger id="perfil_edit">
                            <option value="" hidden selected>Seleccione un perfil</option>
                        </select>
                    </div>
                    <div class="mb-4 col-md-6" id="empresaDivEdit" style="display:none;">
                        <label for="" class="form-label">Cliente</label>
                        <select name="empresa-edit" class="form-control" data-trigger  id="empresa-edit">
                        </select>
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="" class="form-label">Estado</label>
                        <div class="form-check form-switch form-check-lg">
                            <input class="form-check-input" type="checkbox" checked id="estado_edit">
                            <label for="toggleswitchPrimary" class="form-check-label"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning float-right ml-2" id="btn-editar-usuario">Editar</button>
                <button type="button" class="btn btn-secondary float-right" id="btn-cerrar"
                    data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>