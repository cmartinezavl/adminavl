var base_url = "../../models/solicitud_servicios/solicitudServiciosModel.php";

let map;
let latLng;
let markers = [];
var count = 1;

var id_perfil = getCookie("id_perfil");
function getCookie(name) {
  let value = "; " + document.cookie;
  let parts = value.split("; " + name + "=");

  if (parts.length == 2) {
    return parts.pop().split(";").shift();
  }
}

$(document).ready(function(){
  if(id_perfil){
    VirtualSelect.init({
      ele: "#cliente",
      multiple: false,
      search: true,
    });
  }
  VirtualSelect.init({
    ele: "#empresa",
    multiple: false,
    search: true,
  });
})

calendario()
function calendario(){
  var calendarEl = document.getElementById("calendar2");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "es",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    defaultView: "dayGridMonth",
    weekends: false,
    
  });
  
  calendar.render();
  
  var myElement1 = document.getElementById("full-calendar-activity");
  new SimpleBar(myElement1, { autoHide: true });
}

function getClientes(){
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "getCliente",
    },
    success: function (data) {
      document.querySelector("#cliente").setOptions(data);
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function getEmpresas(){
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data: {
      call: "getEmpresa",
    },
    success: function (data) {
      $("#empresa").empty();
      $("#empresa").append("<option value='' selected disabled>Seleccione una empresa</option>");
      $.each(data, function (key, registro) {
        $("#empresa").append("<option value="+registro.id_empresa+">"+registro.nombre+"</option>");
      })
    },
    error: function (data) {
      console.log("error");
    },
  });
}

$("#btn-crear-solicitud").click(function () {
  count = 1;

  map.setCenter(new google.maps.LatLng(-36.807682484416645, -73.0062553876193));
  map.setZoom(9)
  clearMarkers()

  getClientes()

  $("#empresa").val("");
  $("#nombre").val("");
  $("#numero").val("");
  $("#coordenadas").val("");
  
  $("#btn-menos").prop('disabled', true)
  $("#contador").text(count)
  $(".contenido").empty();
  $(".contenido").append('<div class="accordion-item" id="fila'+count+'">'+
      '<h2 class="accordion-header" id="headingcustomicon'+count+'Two">'+
          '<button class="accordion-button collapsed" type="button"'+
              'data-bs-toggle="collapse" data-bs-target="#collapsecustomicon'+count+'Two"'+
              'aria-expanded="false" aria-controls="collapsecustomicon'+count+'Two">'+
              'Vehiculo #'+count+''+
          '</button>'+
      '</h2>'+
      '<div id="collapsecustomicon'+count+'Two" class="accordion-collapse collapse"'+
          'aria-labelledby="headingcustomicon'+count+'Two"'+
          'data-bs-parent="#accordioncustomicon1Example">'+
          '<div class="accordion-body">'+
            '<div class="row g-2">'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Patente</label>'+
                      '<input type="text" class="form-control form-add" id="patente'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Tipo Vehiculo</label>'+
                      '<input type="text" class="form-control form-add" id="vehiculo'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Marca</label>'+
                      '<input type="text" class="form-control form-add" id="marca'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Modelo</label>'+
                      '<input type="text" class="form-control form-add" id="modelo'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Año</label>'+
                      '<input type="text" class="form-control form-add" id="anio'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Tipo Dispositivo</label>'+
                      '<input type="text" class="form-control form-add" id="dispositivo'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">'+
                      '<label for="input-label" class="form-label">Servicio</label>'+
                      '<input type="text" class="form-control form-add" id="servicio'+count+'" required>'+
                    '</div>'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">'+
                      '<label for="input-label" class="form-label">Coordenadas</label>'+
                      '<div class="input-group">'+
                        '<input type="text" class="form-control form-add" id="coordenadas'+count+'" readonly required>'+
                        '<a href="javascript:void(0);" onclick="searchPointMap('+count+')" class="input-group-text">'+
                        '<i class="las la-map-marker-alt header-link-icon fs-18"></i></a>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
              '</div>'+
          '</div>'+
      '</div>');
     
  $("#modalAgregarSolicitud").modal("show");
});

$("#btn-mas").click(function(){
  count++;
  if(count > 1){
    $("#btn-menos").prop('disabled', false)
  }
  $("#contador").text(count)
  $(".contenido").append('<div class="accordion-item" id="fila'+count+'">'+
      '<h2 class="accordion-header" id="headingcustomicon'+count+'Two">'+
          '<button class="accordion-button collapsed" type="button"'+
              'data-bs-toggle="collapse" data-bs-target="#collapsecustomicon'+count+'Two"'+
              'aria-expanded="false" aria-controls="collapsecustomicon'+count+'Two">'+
              'Vehiculo #'+count+''+
          '</button>'+
      '</h2>'+
      '<div id="collapsecustomicon'+count+'Two" class="accordion-collapse collapse"'+
          'aria-labelledby="headingcustomicon'+count+'Two"'+
          'data-bs-parent="#accordioncustomicon1Example">'+
          '<div class="accordion-body">'+
            '<div class="row g-2">'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Patente</label>'+
                '<input type="text" class="form-control form-add" id="patente'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Tipo Vehiculo</label>'+
                '<input type="text" class="form-control form-add" id="vehiculo'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Marca</label>'+
                '<input type="text" class="form-control form-add" id="marca'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Modelo</label>'+
                '<input type="text" class="form-control form-add" id="modelo'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Año</label>'+
                '<input type="text" class="form-control form-add" id="anio'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                '<label for="input-label" class="form-label">Tipo Dispositivo</label>'+
                '<input type="text" class="form-control form-add" id="dispositivo'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">'+
                '<label for="input-label" class="form-label">Servicio</label>'+
                '<input type="text" class="form-control form-add" id="servicio'+count+'" required>'+
              '</div>'+
              '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">'+
                '<label for="input-label" class="form-label">Coordenadas</label>'+
                '<div class="input-group">'+
                  '<input type="text" class="form-control form-add" id="coordenadas'+count+'" readonly required>'+
                  '<a href="javascript:void(0);" onclick="searchPointMap('+count+')" class="input-group-text">'+
                  '<i class="las la-map-marker-alt header-link-icon fs-18"></i></a>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>'+
      '</div>'+
  '</div>');
})

$("#btn-menos").click(function(){
  if (count >= 2) {

    $("#fila"+count+"").remove();
    markers.forEach(element => {
      if(element.markerId == "Vehiculo "+count+""){
        element.setMap(null);
      }
    });
    count--;
    $("#contador").text(count)

  }
  if (count == 1) {
    $("#btn-menos").prop('disabled', true)
  }
})

function searchPointMap(number){
  let isClick = "rightclick";
	const toastLiveExample = document.getElementById('liveToast')
	const toast = new bootstrap.Toast(toastLiveExample)
	toast.show()
  map.addListener(isClick, function (event) {

    markers.forEach(element => {
      if(element.markerId == "Vehiculo "+number+""){
        element.setMap(null);
      }
    });
    
    
    let latitude = event.latLng.lat();
    let longitude = event.latLng.lng();
    $("#coordenadas"+number+"").val(latitude+', '+longitude);
    
    let marker = new google.maps.Marker({
      position: event.latLng,
      map: map,
      markerId: 'Vehiculo '+number+''
    });

    const infoWindow = new google.maps.InfoWindow();

    marker.addListener("mouseover", () => {
      infoWindow.close();
      infoWindow.setContent(
        "<span style='color:black;font-weight: bold;'>Vehículo "+number +"</span>"
      );
      infoWindow.open(marker.getMap(), marker);
    });

    marker.addListener("mouseout", () => {
      infoWindow.close();
      infoWindow.opened = false;
    });
    
    markers.push(marker);

    google.maps.event.clearListeners(map, 'rightclick')
  })
}

function initMap() {
  const myLatLng = { lat: -36.807682484416645, lng: -73.0062553876193 };
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 9,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.HYBRID,
  });
}

function clearMarkers() {
  setMapOnAll(null);
}

function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

window.initMap = initMap;
