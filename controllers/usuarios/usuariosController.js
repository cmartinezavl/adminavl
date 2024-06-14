var base_url = '../../models/usuarios/usuariosModel.php'

var id_perfilC = getCookie("id_perfil");
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");

    if (parts.length == 2) {
        return parts.pop().split(";").shift();
    }
}
CargaListaUsuarios();
function CargaListaUsuarios() {
    $('#tableListaUsuarios').dataTable().fnDestroy();
    $('#tabla_usuarios').empty();
    $("#cargando_usuarios").empty();
    $("#cargando_usuarios").append('<div class="lds-dual-ring" style="margin-top: 35vh;" role="status"></div>');
    $.ajax({
        type: 'POST',
        url: base_url,
        dataType: 'json',
        data: {
            call: 'getUsuarios',
        },
        success: function (data) {
            var i = 0;
            $("#cargando_usuarios").empty();
            $("#tabla_usuarios").append('<div class="bg-white" style="border-radius:5px;">' +
                '<div class="box-body">' +
                '       <div class="table-responsive">' +
                '           <table class="table table-bordered" id="tableListaUsuarios" width="100%" cellspacing="0">' +
                '               <thead class="bg-inverse" >' +
                '                   <tr>' +
                '                       <th style="border: none;">NOMBRE</th>' +
                '                       <th style="border: none;">APELLIDO</th>' +
                '                       <th style="border: none;">USUARIO</th>' +
                '                       <th style="border: none;">PERFIL</th>' +
                '                       <th style="border: none;">ÚLTIMA CONEXIÓN</th>' +
                '                       <th style="border: none;">EMPRESA</th>' +
                '                       <th style="border: none;">ESTADO</th>' +
                '                       <th class="text-center" style="border: none;">EDITAR</th>' +
                '                   </tr>' +
                '               </thead>' +
                '               <tbody>' +
                '               </tbody>' +
                '           </table>' +
                '       </div>' +
                '   </div>' +
                '</div>');
            $('#tableListaUsuarios').DataTable({
                data: data,
                searching: true,
                paging: true,
                fixedHeader: true,
                sort: true,
                ordering: true,
                info: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columns: [
                  
                    { data: 'nombre_usuario', title: 'NOMBRE' },
                    { data: 'apellido', title: 'APELLIDO' },
                    { data: 'usuario', title: 'USUARIO' },
                    { data: 'nombre_perfil', title: 'PERFIL' },
                    {
                        defaultContent: '',
                        "render": function (data, type, row) {
                            if (row.fecha == null) {
                                var fecha = '<div class="text-center">-</div>';
                            } else {
                                var fecha = (row.fecha);
                            }
                            return fecha
                        }
                    },
                    {
                        defaultContent: '',
                        "render": function (data, type, row) {
                            if (row.nombre_cliente == null) {
                                var nombre_cliente = 'AVL Chile';
                            } else {
                                var nombre_cliente = row.nombre_cliente;
                            }
                            return nombre_cliente
                        }
                    },
                    {
                        defaultContent: '',
                        "render": function (data, type, row) {
                            if (row.estado == 1) {
                                var estado = '<span class="badge bg-success-transparent">Activado</span>';
                            }
                            if (row.estado == 0) {
                                var estado = '<span class="badge bg-warning-transparent">Suspendido</span>';
                            }
                            return estado
                        }
                    },
                    {
                        defaultContent: '',
                        "render": function (data, type, row) {
                            var editar = '<div class="text-center"><a class="text-warning" href="#" onclick="modaleditusuarios' +
                                '(' + row.id_usuario + ', `' + row.nombre_usuario + '`, `' + row.apellido + '` , `' + row.usuario + '` , `' + row.password + '`, ' + row.id_perfil + ', ' + row.estado + ', ' + row.id_cliente + ')"' +
                                '><i class="bi bi-pencil-square" style="font-size:15px;"></i></a></div>';
                            return editar
                        }
                    }
                ],
            })
        },
        error: function (data) {
            console.log('error');
        }
    });
}
CargaListaPerfil();
function CargaListaPerfil(id_perfil) {
    $.ajax({
        type: 'POST',
        url: base_url,
        dataType: 'json',
        data: {
            call: 'getPerfil',
        },
        success: function (data) {
            
            $("#perfil").empty();
            $("#perfil_edit").empty();
            $("#perfil").append(
                '<option value="" hidden selected>Seleccione un perfil</option>'
            );

            $.each(data, function (key, registro) {
                var option = '<option value="' + registro.id_perfil + '">' + registro.nombre + '</option>';
                $("#perfil").append(option);
            
                
                if (registro.id_perfil == id_perfil) {
                    $("#perfil_edit").append(
                        '<option value="' +
                        id_perfil+
                        '" selected>' +
                        registro.nombre +
                        "</option>"
                    );
                } else {
                    $("#perfil_edit").append(option);
                }
            });
        },
        error: function (data) {
            console.log('error');
        }
    });
}
$("#perfil").change(function () {
    var perfil = $("#perfil").val();
    if (perfil != 3) {
        $("#empresaDiv").hide();
    } else {
        $("#empresaDiv").show();
    }
});
$("#perfil_edit").change(function () {
    var perfil = $("#perfil_edit").val();
    if (perfil != 3) {
        $("#empresaDivEdit").hide();
    } else {
        $("#empresaDivEdit").show();
    }
});
cargaEmpresa();
function cargaEmpresa(id) {
    $.ajax({
        type: "POST",
        url: base_url,
        dataType: "json",
        data: {
            call: "getCliente",
        },
        success: function (data) {
            $("#empresa").empty();
            $("#empresa-edit").empty();
            $("#empresa").append(
                '<option value="" hidden selected>Seleccione una empresa</option>'
            );
            $("#empresa-edit").append(
                '<option value="" hidden>Seleccione una empresa</option>'
            );

            $.each(data, function (key, registro) {

                $("#empresa").append(
                    '<option value="' +
                    registro.id_cliente +
                    '">' +
                    registro.nombre +
                    "</option>"
                );
                if (registro._id_cliente == id) {
                    $("#empresa-edit").append(
                        '<option value="' +
                        registro.id +
                        '" selected>' +
                        registro.nombre +
                        "</option>"
                    );
                } else {
                    $("#empresa-edit").append(
                        '<option value="' +
                        registro.id_cliente +
                        '">' +
                        registro.nombre +
                        "</option>"
                    );
                }
            });
        },
        error: function (data) {
            console.log("error");
        },
    });
}
$(document).on("keyup", "#usuario, #usuario_edit", function () {
    var usuario = $(this).val();
    var campo = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: base_url,
        dataType: 'json',
        data: {
            call: 'consultaUsuario',
            usuario: usuario
        },
        success: function (data) {
            $.each(data, function (key, registro) {
                if (registro.mensaje == 1) {
                    $("#" + campo).removeClass('is-invalid').addClass('is-valid');
                } else if (registro.error == 0) {
                    $("#" + campo).removeClass('is-valid').addClass('is-invalid');
                }
            });
        },
        error: function (data) {
            console.log('error');
        }
    });
});

$('#btn-addUsuario').click(function () {
    $('#modalAgregarUsuario').modal('show');
});

$('#btn-agregar-usuario').click(function () {

    var nombre = $("#nombreuser").val();
    var apellido = $("#apellidouser").val();
    var usuario = $("#usuario").val();
    var pass = $("#pass").val();
    var id_perfil = $("#perfil").val();
    if (id_perfil != 3) {
        var id_cliente = 157;
    } else {
        var id_cliente = $("#empresa").val();
    }
    var estado = 1;

    var modalEditar = document.getElementById("modalAgregarUsuario");
    var inputs = modalEditar.querySelectorAll(".form");
    var c = 0;

    for (var i = 0; i < inputs.length; i++) {
        if (
            inputs[i].value == "" ||
            inputs[i].value == null ||
            inputs[i].value == undefined
        ) {
            inputs[i].reportValidity();
            return;
        } else {
            c++;
            if (inputs.length == c) {
                AgregarUsuario(nombre, apellido, usuario, pass, id_perfil, estado, id_cliente);
            }
        }
    }
});

$('#btn-cerrar-usuario').click(function () {
    $("#nombreuser").val('');
    $("#apellidouser").val('');
    $("#usuario").val('');
    $("#pass").val('');
    $("#perfil").val('');
    $("#modalAgregarUsuario").modal('hide');
});

$('#btn-cerrar').click(function () {
    $("#nombre_edit").val('');
    $("#apellido_edit").val('');
    $("#usuario_edit").val('');
    $("#pass_edit").val('');
    $("#perfil_edit").val('');
    $("#modalEditarUsuarios").modal('hide');
});

function AgregarUsuario(nombre, apellido, usuario, pass, id_perfil, estado, id_cliente) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ms-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: '¿Está seguro que desea Agregar el usuario?',
        text: "Se Agregara el usuario con los datos asociados",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Agregar el usuario!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'POST',
                url: base_url,
                dataType: 'json',
                data: {
                    call: 'agregarUsuario',
                    nombre: nombre,
                    apellido: apellido,
                    usuario: usuario,
                    pass: pass,
                    id_perfil: id_perfil,
                    estado: estado,
                    id_cliente: id_cliente

                },
                success: function (data) {
                    $('#modalAgregarUsuario').modal('hide');
                    $("#nombreuser").val('');
                    $("#apellidouser").val('');
                    $("#usuario").val('');
                    $("#pass").val('');
                    $("#perfil").val('');
                    $("#empresa").val('');
                    CargaListaUsuarios();
                },
                error: function (data) {
                    console.log('error');
                }
            });
            swalWithBootstrapButtons.fire(
                'Agregado!',
                'El usuario a sido Agregado',
                'success'
            )
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Se a Cancelado',
                '',
                'error'
            )
        }
    })
}

function modaleditusuarios(id, nombre, apellido,usuario, pass, id_perfil, estado, id_cliente) {
    
    $("#id_user_edit").val(id);
    $("#nombre_edit").val(nombre);
    $("#apellido_edit").val(apellido);
    $("#usuario_edit").val(usuario);
    $("#pass_edit").val(pass);
    $("#perfil_edit").val(id_perfil);
    if (estado == 1) {
        $("#estado_edit").prop('checked', true);
    }
    if (estado == 0) {
        $("#estado_edit").prop('checked', false);
    }
    CargaListaPerfil(id_perfil)
    if (id_perfil == 3) {
        $("#empresa-edit").val(id_cliente);
        $("#empresaDivEdit").show();
    } else {
        $("#empresaDivEdit").hide();
    }
    
    $('#modalEditarUsuarios').modal('show');
};

$('#btn-editar-usuario').click(function () {
    EditarUsuario();
    $('#modalEditarUsuarios').modal('hide');
});

function EditarUsuario() {
    var id = $("#id_user_edit").val();
    var nombre = $("#nombre_edit").val();
    var apellido = $("#apellido_edit").val();
    var usuario = $("#usuario_edit").val();
    var pass = $("#pass_edit").val();
    var id_perfil = $("#perfil_edit").val();
    if (id_perfil != 3) {
        var id_cliente = 1;
    } else {
        var id_cliente = $("#empresa-edit").val();
    }

    if ($('#estado_edit').is(":checked")) {
        var estado = 1;
    } else {
        var estado = 0;
    }
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ms-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: '¿Está seguro que desea Actualizar el usuario?',
        text: "Se actualizaran datos asociados a este usuario",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Actualizar el usuario!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'POST',
                url: base_url,
                dataType: 'json',
                data: {
                    call: 'editarUsuario',
                    id_usuario: id,
                    nombre: nombre,
                    apellido: apellido,
                    usuario: usuario,
                    pass: pass,
                    id_perfil: id_perfil,
                    estado: estado,
                    id_cliente: id_cliente,
                },
                success: function (data) {

                    CargaListaUsuarios();

                    $("#id_user_edit").val('');
                    $("#id_user_edit").val('');
                    $("#nombre_edit").val('');
                    $("#apellido_edit").val('');
                    $("#usuario_edit").val('');
                    $("#pass_edit").val('');
                    $("#perfil_edit").val('');
                    $("#empresaDivEdit").val('');
                },
                error: function (data) {
                    console.log('error');
                }
            });
            swalWithBootstrapButtons.fire(
                'Actualizado!',
                'El usuario a sido actualizado',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Se a Cancelado la actualizaccion',
                'Tu Usuario imaginario está a salvo  :)',
                'error'
            )
        }
    })
}