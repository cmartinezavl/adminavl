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

$("#btn-crear-solicitud").click(function () {
  count = 1;
  clearMarkers()
  $("#cliente").val("");
  $("#empresa").val("");
  $("#nombre").val("");
  $("#numero").val("");
  $("#coordenadas").val("");
  map.setCenter(new google.maps.LatLng(-36.807682484416645, -73.0062553876193));
  $("#btn-menos").prop('disabled', true)
  $("#contador").text(count)
  $(".contenido").empty();
  $(".contenido").append('<div class="accordion-item">'+
          '<h2 class="accordion-header" id="headingcustomicon'+count+'One">'+
              '<button class="accordion-button" type="button" data-bs-toggle="collapse"'+
                  'data-bs-target="#collapsecustomicon'+count+'One" aria-expanded="true"'+
                  'aria-controls="collapsecustomicon'+count+'One">'+
                  'Vehiculo #'+count+''+
              '</button>'+
          '</h2>'+
          '<div id="collapsecustomicon'+count+'One" class="accordion-collapse collapse show"'+
              'aria-labelledby="headingcustomicon'+count+'One"'+
              'data-bs-parent="#accordioncustomicon1Example">'+
              '<div class="accordion-body">'+
                  '<div class="row g-2">'+
                    '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">'+
                      '<label for="input-label" class="form-label">Patente</label>'+
                      '<div class="input-group">'+
                        '<input type="text" class="form-control form-add" id="patente'+count+'" required>'+
                        '<a href="javascript:void(0);" class="input-group-text">'+
                        '<i class="fe fe-search header-link-icon fs-18"></i></a>'+
                      '</div>'+
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
                  '</div>'+
              '</div>'+
          '</div>'+
      '</div>');
      
      let isClick = "click";

      map.addListener(isClick, function (event) {
        clearMarkers()
        let latitude = event.latLng.lat();
        let longitude = event.latLng.lng();
        $("#coordenadas").val(latitude+', '+longitude);
        
        let marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
        });

        markers.push(marker);
        map.setCenter(new google.maps.LatLng(latitude, longitude));
      })
     
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
                '<div class="input-group">'+
                  '<input type="text" class="form-control form-add" id="patente'+count+'" required>'+
                  '<a href="javascript:void(0);" class="input-group-text">'+
                  '<i class="fe fe-search header-link-icon fs-18"></i></a>'+
                '</div>'+
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
            '</div>'+
          '</div>'+
      '</div>'+
  '</div>');
})

$("#btn-menos").click(function(){
  if (count >= 2) {

    $("#fila"+count+"").remove();
    count--;
    $("#contador").text(count)

  }
  if (count == 1) {
    $("#btn-menos").prop('disabled', true)
  }
})

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

function PanTo(latLng, map) {
map.panTo(latLng);
map.setZoom(14);
}

function showArraysPolygon(event) {
infoWindow.setContent(this.content);
infoWindow.setPosition(event.latLng);
infoWindow.open(map);
}

function removePolygon() {
try {
  for (i = 0; i < poly.length; i++) {
  poly[i].setMap(null); //or line[i].setVisible(false);
  }
} catch (err) {
  //document.getElementById("demo").innerHTML = err.message;
}
}

window.initMap = initMap;
