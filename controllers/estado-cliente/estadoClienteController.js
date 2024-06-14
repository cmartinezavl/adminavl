var base_url = "../../models/estado-cliente/estadoClienteModel.php";

CargaListaEstado();

function CargaListaEstado() {
  $("#tableEstadoCliente").dataTable().fnDestroy();
  $("#tabla_estado").empty();
  $("#tabla_estado").append(
    '<div style="display: flex; justify-content:center; align-items: center;"><div class="spinner-border text-primary" style="margin-top:28vh;margin-bottom:28vh;" role="status">' +
    '<span class="visually-hidden">Loading...</span>' +
    "</div></div>"
  );

  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "getClientes",
    },
    success: function (data) {
      var i = 0;
      $("#tabla_estado").empty();
      $("#tabla_estado").append(

        '<table class="table table-hover w-100" id="tableEstadoCliente" style="font-size:11px; padding-left:15px" cellspacing="0">' +
        "               <thead class='bg-inverse'>" +
        "                   <tr>" +
        "                       <th>#</th>" +
        "                       <th>CLIENTE</th>" +
        "                       <th>TODOS</th>" +
        "                       <th>WIALON</th>" +
        "                       <th>SPEEDGPS</th>" +
        "                       <th>DISPOSITIVOS</th>" +
        "                       <th>ESTADO</th>" +
        "                       <th>ACCIONES</th>" +
        "                   </tr>" +
        "               </thead>" +
        "               <tbody>" +
        "               </tbody>" +
        "           </table>"
      );
      $("#tableEstadoCliente").DataTable({
        data: data,
        responsive: true,
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        language: {
          decimal: "",
          emptyTable: "No hay información",
          info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          infoEmpty: "Mostrando 0 a 0 de 0 Entradas",
          infoFiltered: "(Filtrado de _MAX_ total entradas)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: "Mostrar _MENU_ Entradas",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          search: "Buscar:",
          zeroRecords: "Sin resultados encontrados",
          paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
          },
        },
        columns: [
          {
            defaultContent: "",
            render: function (data, type, row) {
              i++;

              id = i;

              return id;
            },
          },
          {
            data: "cliente",
            title: "CLIENTE",
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.id_speedgps == 0) {
                var todos = '<div><i class="las la-minus"><i/></div>';
              } else {
                if (row.est_wialon == 0 && row.est_speedgps == 0) {
                  var todos =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="todos' +
                    i +
                    '" type="checkbox" onclick="Todos(' +
                    row.id_wialon +
                    ", `" +
                    row.id_speedgps +
                    "`, " +
                    row.est_wialon +
                    ", " +
                    row.est_speedgps +
                    ', 0)">' +
                    '<label for="todos' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
                if (row.est_wialon == 1 && row.est_speedgps == 0) {
                  var todos =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="todos' +
                    i +
                    '" type="checkbox" onclick="Todos(' +
                    row.id_wialon +
                    ", `" +
                    row.id_speedgps +
                    "`, " +
                    row.est_wialon +
                    ", " +
                    row.est_speedgps +
                    ', 0)">' +
                    '<label for="todos' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
                if (row.est_wialon == 0 && row.est_speedgps == 1) {
                  var todos =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="todos' +
                    i +
                    '" type="checkbox" onclick="Todos(' +
                    row.id_wialon +
                    ", `" +
                    row.id_speedgps +
                    "`, " +
                    row.est_wialon +
                    ", " +
                    row.est_speedgps +
                    ', 0)">' +
                    '<label for="todos' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
                if (row.est_wialon == 1 && row.est_speedgps == 1) {
                  var todos =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="todos' +
                    i +
                    '" type="checkbox" checked="" onclick="Todos(' +
                    row.id_wialon +
                    ", `" +
                    row.id_speedgps +
                    "`, " +
                    row.est_wialon +
                    ", " +
                    row.est_speedgps +
                    ', 1)">' +
                    '<label for="todos' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
              }

              return todos;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.est_wialon == 0) {
                var wialon =
                  '<div class="form-check form-switch form-check-lg">' +
                  '<input class="form-check-input" id="wialon' +
                  i +
                  '" type="checkbox" onclick="Wialon(' +
                  row.id_wialon +
                  ", " +
                  row.est_wialon +
                  ')">' +
                  '<label for="wialon' +
                  i +
                  '" class="form-check-label"></label><span ></span>' +
                  "</div>";
              }
              if (row.est_wialon == 1) {
                var wialon =
                  '<div class="form-check form-switch form-check-lg">' +
                  '<input class="form-check-input" id="wialon' +
                  i +
                  '" type="checkbox" checked="" onclick="Wialon(' +
                  row.id_wialon +
                  ", " +
                  row.est_wialon +
                  ')">' +
                  '<label for="wialon' +
                  i +
                  '" class="form-check-label"></label><span ></span>' +
                  "</div>";
              }

              return wialon;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.id_speedgps == 0) {
                var speedgps = '<div ><i class="las la-minus"><i/></div>';
              } else {
                if (row.est_speedgps == 0) {
                  var speedgps =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="speedgps' +
                    i +
                    '" type="checkbox" onclick="Speedgps(`' +
                    row.id_speedgps +
                    "`, " +
                    row.est_speedgps +
                    ')">' +
                    '<label for="speedgps' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
                if (row.est_speedgps == 1) {
                  var speedgps =
                    '<div class="form-check form-switch form-check-lg">' +
                    '<input class="form-check-input" id="speedgps' +
                    i +
                    '" type="checkbox" checked="" onclick="Speedgps(`' +
                    row.id_speedgps +
                    "`, " +
                    row.est_speedgps +
                    ')">' +
                    '<label for="speedgps' +
                    i +
                    '" class="form-check-label"></label><span ></span>' +
                    "</div>";
                }
              }

              return speedgps;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              var boton =
                '<div  onclick="Detalle(' +
                row.id_wialon +
                ", `" +
                row.id_speedgps +
                '`)"><a class="btn text-info" href="#"><i class="las la-eye" style="font-size:15px;"></i></a></div>';

              return boton;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.estado == 0) {
                var estado =
                  '<i class="ri-checkbox-blank-circle-fill" style="color: red;"></i>';
              }
              if (row.estado == 1) {
                var estado =
                  '<i class="ri-checkbox-blank-circle-fill" style="color: yellow;"></i>';
              }
              if (row.estado == 2) {
                var estado =
                  '<i class="ri-checkbox-blank-circle-fill" style="color: green;"></i>';
              }

              return estado;
            },
          },

          {
            defaultContent: "",
            render: function (data, type, row) {
              var editar =
                '<a class="btn btn-icon btn-sm btn-warning-transparent" onclick="editarCliente()" href="javascript:void(0);"><i class="ri-edit-line"></i></a>';
              var eliminar =
                '<a class="btn btn-icon btn-sm btn-danger-transparent" onclick="eliminarCliente()" href="javascript:void(0);"><i class="ri-delete-bin-line"></i></a></div>';

              return (
                "<div class='hstack gap-2 fs-15'>" +
                editar +
                eliminar +
                "</div>"
              );
            },
          },
        ],
      });
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function Detalle(id_wialon, id_speedgps) {
  var id_wialon = id_wialon;
  var id_speedgps = id_speedgps;
  $("#tableDetalleCliente").dataTable().fnDestroy();
  $("#tabla_detalle").empty();
  $("#tabla_detalle").append(
    '<div style="display: flex; justify-content:center; align-items: center;"><div class="spinner-border text-primary" style="margin-top:28vh;margin-bottom:28vh;" role="status">' +
    '<span class="visually-hidden">Loading...</span>' +
    "</div></div>"
  );

  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "getVehiculos",
      id_wialon: id_wialon,
      id_speedgps: id_speedgps,
    },
    success: function (data) {
      var i = 0;
      $("#tabla_detalle").empty();
      $("#tabla_detalle").append(
        '<table class="table table-hover w-100" id="tableDetalleCliente" style="font-size:11px; padding-left:15px" cellspacing="0">' +
        "               <thead>" +
        "                   <tr>" +
        "                       <th>#</th>" +
        "                       <th>IMEI</th>" +
        "                       <th>CODIGO AVL</th>" +
        "                       <th>PATENTE WIALON</th>" +
        "                       <th>PATENTE SPEEDGPS</th>" +
        "                       <th>EN SPEEDGPS</th>" +
        "                       <th>ESTADO</th>" +
        "                   </tr>" +
        "               </thead>" +
        "               <tbody>" +
        "               </tbody>" +
        "           </table>"
      );
      $("#tableDetalleCliente").DataTable({
        data: data,
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        language: {
          decimal: "",
          emptyTable: "No hay información",
          info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          infoEmpty: "Mostrando 0 a 0 de 0 Entradas",
          infoFiltered: "(Filtrado de _MAX_ total entradas)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: "Mostrar _MENU_ Entradas",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          search: "Buscar:",
          zeroRecords: "Sin resultados encontrados",
          paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
          },
        },
        columns: [
          {
            defaultContent: "",
            render: function (data, type, row) {
              i++;

              id = i;

              return id;
            },
          },
          { data: "imei", title: "IMEI" },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.cod_avl == "" || row.cod_avl == null) {
                var cod_avl = '<i class="las la-minus"></i>';
              } else {
                var cod_avl = row.cod_avl;
              }

              return cod_avl;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.patente == "" || row.patente == null) {
                var patente = '<i class="las la-minus"></i>';
              } else {
                var patente = row.patente;
              }

              return patente;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.vehiculo == "" || row.vehiculo == null) {
                var vehiculo = '<i class="las la-minus"></i>';
              }
              if (row.existe == 1) {
                var vehiculo = row.vehiculo;
              }

              return vehiculo;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.existe == 0) {
                var existe = '<i class="las la-times text-danger"></i>';
              }
              if (row.existe == 1) {
                var existe = '<i class="las la-check text-success"></i>';
              }

              return existe;
            },
          },
          {
            defaultContent: "",
            render: function (data, type, row) {
              if (row.wialon_status == 0) {
                var estado =
                  '<div class="form-check form-switch">' +
                  '<input class="form-check-input" id="estado' +
                  i +
                  '" type="checkbox" onclick="ActivacionVehiculo(' +
                  row.imei +
                  ", " +
                  row.id_vwialon +
                  ", `" +
                  row.cod_avl +
                  "`, " +
                  id_wialon +
                  ", " +
                  id_wialon +
                  ", " +
                  id_speedgps +
                  ", 1, `" +
                  row.vehiculo +
                  '`)">' +
                  '<label for="estado' +
                  i +
                  '" class="form-check-label"></label><span></span>' +
                  "</div>";
              }
              if (row.wialon_status == 1) {
                var estado =
                  '<div class="form-check form-switch">' +
                  '<input class="form-check-input" id="estado' +
                  i +
                  '" type="checkbox" checked="" onclick="ActivacionVehiculo(' +
                  row.imei +
                  ", " +
                  row.id_vwialon +
                  ", `" +
                  row.cod_avl +
                  "`, " +
                  id_wialon +
                  ", " +
                  id_wialon +
                  ", " +
                  id_speedgps +
                  ", 0, `" +
                  row.vehiculo +
                  '`)">' +
                  '<label for="estado' +
                  i +
                  '" class="form-check-label"></label><span></span>' +
                  "</div>";
              }

              return estado;
            },
          },
        ],
      });
    },
    error: function (data) {
      console.log("error");
    },
  });
  $("#modalListaVehiculo").modal("show");
}

function Todos(id_wialon, id_speedgps, estado_wialon, estado_speedgps, estado) {
  var id_wialon = id_wialon;
  var id_speedgps = id_speedgps;
  var estado_wialon = estado_wialon;
  var estado_speedgps = estado_speedgps;
  if (estado == 0) {
    var estadoUpdate = 1;
  }
  if (estado == 1) {
    var estadoUpdate = 0;
  }
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "setTodos",
      id_wialon: id_wialon,
      id_speedgps: id_speedgps,
      estado_wialon: estado_wialon,
      estado_speedgps: estado_speedgps,
      estado: estadoUpdate,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $(".toast-body").empty();
        $(".toast-body").text(registro.mensaje);
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();
      });
      CargaListaEstado();
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function Wialon(id_wialon, estado) {
  var id_wialon = id_wialon;
  if (estado == 0) {
    var estadoUpdate = 1;
  }
  if (estado == 1) {
    var estadoUpdate = 0;
  }
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "setWialon",
      id_wialon: id_wialon,
      estado: estadoUpdate,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $(".toast-body").empty();
        $(".toast-body").text(registro.mensaje);
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();
      });
      CargaListaEstado();
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function Speedgps(id_speedgps, estado) {
  var id_speedgps = id_speedgps;
  if (estado == 0) {
    var estadoUpdate = 1;
  }
  if (estado == 1) {
    var estadoUpdate = 0;
  }
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "setSpeedgps",
      id_speedgps: id_speedgps,
      estado: estadoUpdate,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $(".toast-body").empty();
        $(".toast-body").text(registro.mensaje);
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();
      });
      CargaListaEstado();
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function ActivacionVehiculo(
  vimei,
  vwialon,
  vcod_avl,
  vidwialon,
  id_wialon_cuenta,
  id_speedgps,
  estado,
  patente_speed
) {
  var id_vehiculo = vwialon;
  var imei = vimei;
  var cod_avl = vcod_avl;
  var id_wialon = vidwialon;

  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "setVehiculo",
      id_vehiculo: id_vehiculo,
      estado: estado,
      imei: imei,
      codigo_vehiculo: cod_avl,
      id_wialon: id_wialon,
      patente_speed: patente_speed,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $(".toast-body").empty();
        $(".toast-body").text(registro.mensaje);
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();
      });

      Detalle(id_wialon_cuenta, id_speedgps);
    },
    error: function (data) {
      console.log("error");
    },
  });
}

// --------------------- agregar Estado Cliente 

$("#btn-addEstadoCliente").click(function () {
  $("#modalAgregarEstadoCliente").modal('show')
})
$('#btn-agregar-cliente').click(function () {

  var existente = document.getElementById("existente");
  var speedgps = document.getElementById("speedgps");
  var wialon = document.getElementById("wialon");
  var nuevo = document.getElementById("nuevo");

  if (existente.classList.contains('active')) {
    var inputs = document.getElementsByClassName('form-add');

    var c = 0;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined) {
        inputs[i].reportValidity();
        return;
      } else {
        c++;

        if (inputs.length == c) {
          $("#btn-agregar-cliente").empty();
          $("#btn-agregar-cliente").append('<i class="fa fa-refresh fa-spin"></i> Agregar');
          AgregarCliente();
        }
      }
    }
  } else if (speedgps.classList.contains('active')) {
    var inputs = document.getElementsByClassName('form-add1');

    var c = 0;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined) {
        inputs[i].reportValidity();
        return;
      } else {
        c++;

        if (inputs.length == c) {
          $("#btn-agregar-cliente").empty();
          $("#btn-agregar-cliente").append('<i class="fa fa-refresh fa-spin"></i> Agregar');
          AgregarCliente();
        }
      }
    }
  } else if (wialon.classList.contains('active')) {
    var inputs = document.getElementsByClassName('form-add2');

    var c = 0;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined) {
        inputs[i].reportValidity();
        return;
      } else {
        c++;

        if (inputs.length == c) {
          if ($("#passWialon").hasClass("border-success")) {
            $("#btn-agregar-cliente").empty();
            $("#btn-agregar-cliente").append('<i class="fa fa-refresh fa-spin"></i> Agregar');
            AgregarCliente();
          } else {
            $.toast({
              text: 'Ingrese una contraseña valida.',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        }
      }
    }
  } else if (nuevo.classList.contains('active')) {
    var inputs = document.getElementsByClassName('form-add3');

    var c = 0;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined) {
        inputs[i].reportValidity();
        return;
      } else {
        c++;

        if (inputs.length == c) {
          if ($("#passNuevo").hasClass("border-success")) {
            $("#btn-agregar-cliente").empty();
            $("#btn-agregar-cliente").append('<i class="fa fa-refresh fa-spin"></i> Agregar');
            AgregarCliente();
          } else {
            $.toast({
              text: 'Ingrese una contraseña valida.',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        }
      }
    }
  }

});

$("#cerrarAgregarCliente").on('click', function () {
  $("#nombreEmpresaAntiguo").val('');
  $("#id_wialonAntiguo").val('');
  $("#id_speedgpsAntiguo").val('');

  $("#nombreEmpresaSpeed").val('');
  $("#usernameSpeed").val('');
  $("#passSpeed").val('');
  $("#emailSpeed").val('');
  $("#rutSpeed").val('');

  $("#nombreEmpresaWialon").val('');
  $("#usernameWialon").val('');
  $("#passWialon").val('');
  $("#planWialon").val('');
  $("#passWialon").removeClass('border-success');
  $("#passWialon").removeClass('border-danger');

  $("#nombreEmpresaNuevo").val('');
  $("#usernameNuevo").val('');
  $("#passNuevo").val('');
  $("#emailNuevo").val('');
  $("#rutNuevo").val('');
  $("#planNuevo").val('');
  $("#passNuevo").removeClass('border-success');
  $("#passNuevo").removeClass('border-danger');

  $('#existente').addClass('active');
  $('#speedgps').removeClass('active');
  $('#wialon').removeClass('active');
  $('#nuevo').removeClass('active');

  $('#nav_existente').addClass('active');
  $('#nav_speedgps').removeClass('active');
  $('#nav_wialon').removeClass('active');
  $('#nav_nuevo').removeClass('active');

})

function AgregarCliente() {

  var existente = document.getElementById("existente");
  var speedgps = document.getElementById("speedgps");
  var wialon = document.getElementById("wialon");
  var nuevo = document.getElementById("nuevo");

  if (existente.classList.contains('active')) {
    var nombre = $("#nombreEmpresaAntiguo").val();
    var id_wialon = $("#id_wialonAntiguo").val();
    var id_speedgps = $("#id_speedgpsAntiguo").val();
    $.ajax({
      type: 'POST',
      url: base_url,
      dataType: 'json',
      data: {
        call: 'agregarClienteAntiguo',
        nombre: nombre,
        id_wialon: id_wialon,
        id_speedgps: id_speedgps
      },
      success: function (data) {
        $('#modalAgregarCliente').modal('hide');
        $("#btn-agregar-cliente").empty();
        $("#btn-agregar-cliente").append('Agregar');
        $('#existente').addClass('active');
        $('#speedgps').removeClass('active');
        $('#wialon').removeClass('active');
        $('#nuevo').removeClass('active');

        $('#nav_existente').addClass('active');
        $('#nav_speedgps').removeClass('active');
        $('#nav_wialon').removeClass('active');
        $('#nav_nuevo').removeClass('active');
        $.each(data, function (key, registro) {
          if (registro.mensaje) {
            $.toast({
              text: '' + registro.mensaje + '',
              showHideTransition: 'slide',
              icon: 'success'
            })
          } else if (registro.error) {
            $.toast({
              text: '' + registro.error + '',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        });
        $("#nombreEmpresaAntiguo").val('');
        $("#id_wialonAntiguo").val('');
        $("#id_speedgpsAntiguo").val('');
        CargaListaClientes();
        CargaListaClienteWialon();
        CargaListaClienteSpeed();
      },
      error: function (data) {
        console.log('error');
      }
    });
  } else if (speedgps.classList.contains('active')) {
    var id = parseInt($("#nombreEmpresaSpeed").val());
    var nombre = $("#nombreEmpresaSpeed").val();
    var username = $("#usernameSpeed").val();
    var pass = $("#passSpeed").val();
    var email = $("#emailSpeed").val();
    var rut = $("#rutSpeed").val();
    $.ajax({
      type: 'POST',
      url: base_url,
      dataType: 'json',
      data: {
        call: 'agregarClienteSpeed',
        id: id,
        nombre: nombre,
        username: username,
        pass: pass,
        email: email,
        rut: rut,
      },
      success: function (data) {
        $('#modalAgregarCliente').modal('hide');
        $("#btn-agregar-cliente").empty();
        $("#btn-agregar-cliente").append('Agregar');
        $('#existente').addClass('active');
        $('#speedgps').removeClass('active');
        $('#wialon').removeClass('active');
        $('#nuevo').removeClass('active');

        $('#nav_existente').addClass('active');
        $('#nav_speedgps').removeClass('active');
        $('#nav_wialon').removeClass('active');
        $('#nav_nuevo').removeClass('active');
        $.each(data, function (key, registro) {
          if (registro.mensaje) {
            $.toast({
              text: '' + registro.mensaje + '',
              showHideTransition: 'slide',
              icon: 'success'
            })
          } else if (registro.error) {
            $.toast({
              text: '' + registro.error + '',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        });
        $("#nombreEmpresaSpeed").val('');
        $("#usernameSpeed").val('');
        $("#passSpeed").val('');
        $("#emailSpeed").val('');
        $("#rutSpeed").val('');
        CargaListaClientes();
        CargaListaClienteWialon();
        CargaListaClienteSpeed();
      },
      error: function (data) {
        console.log('error');
      }
    });
  } else if (wialon.classList.contains('active')) {
    var nombre = parseInt($("#nombreEmpresaWialon").val());
    var username = $("#usernameWialon").val();
    var pass = $("#passWialon").val();
    var plan = $("#planWialon").val();
    $.ajax({
      type: 'POST',
      url: base_url,
      dataType: 'json',
      data: {
        call: 'agregarClienteWialon',
        nombre: nombre,
        username: username,
        pass: pass,
        plan: plan,
      },
      success: function (data) {
        $('#modalAgregarCliente').modal('hide');
        $("#btn-agregar-cliente").empty();
        $("#btn-agregar-cliente").append('Agregar');
        $('#existente').addClass('active');
        $('#speedgps').removeClass('active');
        $('#wialon').removeClass('active');
        $('#nuevo').removeClass('active');

        $('#nav_existente').addClass('active');
        $('#nav_speedgps').removeClass('active');
        $('#nav_wialon').removeClass('active');
        $('#nav_nuevo').removeClass('active');
        $.each(data, function (key, registro) {
          if (registro.mensaje) {
            $.toast({
              text: '' + registro.mensaje + '',
              showHideTransition: 'slide',
              icon: 'success'
            })
          } else if (registro.error) {
            $.toast({
              text: '' + registro.error + '',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        });
        $("#nombreEmpresaWialon").val('');
        $("#usernameWialon").val('');
        $("#passWialon").val('');
        $("#planWialon").val('');
        CargaListaClientes();
        CargaListaClienteWialon();
        CargaListaClienteSpeed();
      },
      error: function (data) {
        console.log('error');
      }
    });
  } else if (nuevo.classList.contains('active')) {
    var nombre = $("#nombreEmpresaNuevo").val();
    var username = $("#usernameNuevo").val();
    var pass = $("#passNuevo").val();
    var email = $("#emailNuevo").val();
    var rut = $("#rutNuevo").val();
    var plan = $("#planNuevo").val();
    $.ajax({
      type: 'POST',
      url: base_url,
      dataType: 'json',
      data: {
        call: 'agregarClienteNuevo',
        nombre: nombre,
        username: username,
        pass: pass,
        email: email,
        rut: rut,
        plan: plan,
      },
      success: function (data) {
        $('#modalAgregarCliente').modal('hide');
        $("#btn-agregar-cliente").empty();
        $("#btn-agregar-cliente").append('Agregar');
        $('#existente').addClass('active');
        $('#speedgps').removeClass('active');
        $('#wialon').removeClass('active');
        $('#nuevo').removeClass('active');

        $('#nav_existente').addClass('active');
        $('#nav_speedgps').removeClass('active');
        $('#nav_wialon').removeClass('active');
        $('#nav_nuevo').removeClass('active');
        $.each(data, function (key, registro) {

          if (registro.mensaje) {
            $.toast({
              text: '' + registro.mensaje + '',
              showHideTransition: 'slide',
              icon: 'success'
            })
          } else if (registro.error) {
            $.toast({
              text: '' + registro.error + '',
              showHideTransition: 'slide',
              icon: 'error'
            })
          }
        });
        $("#nombreEmpresaNuevo").val('');
        $("#usernameNuevo").val('');
        $("#passNuevo").val('');
        $("#emailNuevo").val('');
        $("#rutNuevo").val('');
        $("#planNuevo").val('');
        CargaListaClientes();
        CargaListaClienteWialon();
        CargaListaClienteSpeed();
      },
      error: function (data) {
        console.log('error');
      }
    });
  }

}
