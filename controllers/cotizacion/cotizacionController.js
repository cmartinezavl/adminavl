var base_url = '../../models/cotizacion/cotizacionModel.php'


$("#cliente").change(function () {
    var clienteNombre = $(this).find(":selected").text();
    $("#clienteDoc").empty();
    $("#clienteDoc").append(clienteNombre);
});
CargarCliente();
function CargarCliente() {
    $.ajax({
        type: "POST",
        url: base_url,
        dataType: "json",
        data: {
            call: "getCliente",
        },
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#cliente_edit").append('<option value="' + registro.id_cliente + '">' + registro.nombre + '</option>');
                $("#cliente").append('<option value="' + registro.id_cliente + '">' + registro.nombre + '</option>');
            });
        },
        error: function (data) {
            console.log("error");
        },
    });
}
$("#modelo").change(function () {
    var modeloNombre = $(this).find(":selected").text();
    $("#modeloDoc").empty();
    $("#modeloDoc").append(modeloNombre);
    $("#modeloDoc2").empty();
    $("#modeloDoc2").append(modeloNombre);
});
CargarModelo();
function CargarModelo() {
    $.ajax({
        type: "POST",
        url: base_url,
        dataType: "json",
        data: {
            call: "getModelo",
        },
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#modelo_edit").append('<option value="' + registro.id_modelo + '">' + registro.nombre + '</option>');
                $("#modelo").append('<option value="' + registro.id_modelo + '">' + registro.nombre + '</option>');
            });
        },
        error: function (data) {
            console.log("error");
        },
    });
}
$(document).on("keyup", "#precioModeloSC, #precioRuralSC, #precioUrbanoSc, "+
    "#precioUrbanoC12, #precioRuralC12, #precioTrasladoC12, "+
    "#visitaUrbanoC24, #visitaRuralC24, #precioTrasladoC24, "+
    "#obdii, #cortaCorriente, #instalacionCC, "+
    " #servicioN, #servicioP ", function () {
    var inputId = $(this).attr('id');
    var inputValue = $(this).val();

    switch (inputId) {
        //sin Contrato
        case 'precioModeloSC':
            $("#precioModeloSCDoc").empty();
            $("#precioModeloSCDoc").append(inputValue);
            break;
        case 'precioRuralSC':
            $("#precioRuralSCDoc").empty();
            $("#precioRuralSCDoc").append(inputValue);
            break;
        case 'precioUrbanoSc':
            $("#precioUrbanoSCDoc").empty();
            $("#precioUrbanoSCDoc").append(inputValue);
            break;
        //contrato 12 Meses
        case 'precioUrbanoC12':
            $("#precioRuralDocC12").empty();
            $("#precioRuralDocC12").append(inputValue);
            break;
        case 'precioRuralC12':
            $("#precioUrbanoDocC12").empty();
            $("#precioUrbanoDocC12").append(inputValue);
            break;
        case 'precioTrasladoC12':
            $("#precioTrasladoDocC12").empty();
            $("#precioTrasladoDocC12").append(inputValue);
            break;
        //contrato 24 Meses
        case 'visitaUrbanoC24':
            $("#precioVisitaTecnicaDocC24").empty();
            $("#precioVisitaTecnicaDocC24").append(inputValue);
            break;
        case 'visitaRuralC24':
            $("#precioVisitaTecnicaUrbanoDocC24").empty();
            $("#precioVisitaTecnicaUrbanoDocC24").append(inputValue);
            break;
        case 'precioTrasladoC24':
            $("#precioTrasladoDocC24").empty();
            $("#precioTrasladoDocC24").append(inputValue);
            break;
        //Extras
        case 'obdii':
            $("#obdiiDoc").empty();
            $("#obdiiDoc").append(inputValue);
            break;
        case 'cortaCorriente':
            $("#cortaCorrienteDoc").empty();
            $("#cortaCorrienteDoc").append(inputValue);
            break;
        case 'instalacionCC':
            $("#instalacionCCDoc").empty();
            $("#instalacionCCDoc").append(inputValue);
            break;
        //Planes
        case 'servicioN':
            $("#servicioNDoc").empty();
            $("#servicioNDoc").append(inputValue);
            break;
        case 'servicioP':
            $("#servicioPDoc").empty();
            $("#servicioPDoc").append(inputValue);
            break;
    }
});