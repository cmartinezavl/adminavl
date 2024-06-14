var base_url_config = "http://localhost/adminavl_v3/"; //desa

// var base_url_config = 'https://webapp.avlchile.cl/adminavl_v3/'

var id_usuario = getCookie("id");

datos();

function getCookie(name) {
  let value = "; " + document.cookie;
  let parts = value.split("; " + name + "=");

  if (parts.length == 2) {
    return parts.pop().split(";").shift();
  }
}

function datos() {
  $.ajax({
    type: "POST",
    url: base_url_config + "models/configuracion/configuracionModel.php",
    dataType: "json",
    data: {
      call: "cargaDatos",
      id_usuario: id_usuario,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $("#nombreUsuario").val(registro.nombre);
        $("#apellidoUsuario").val(registro.apellido);
      });
    },
    error: function (data) {
      console.log("error");
    },
  });
}

$(document).on("keyup", "#password_old", function () {
  var password_old = $("#password_old").val();
  $.ajax({
    type: "POST",
    url: base_url_config + "models/configuracion/configuracionModel.php",
    dataType: "json",
    data: {
      call: "verificarContraseña",
      pass: password_old,
      id_usuario: id_usuario,
    },
    success: function (data) {
      $("#password_old").removeClass("is-valid");
      $("#password_old").removeClass("is-invalid");
      if (data[0].verificado == 1) {
        $("#password_old").addClass("is-valid");
      } else {
        $("#password_old").addClass("is-invalid");
      }
    },
    error: function (data) {
      console.log("error");
    },
  });
});

$(document).on("click", "#btn-guardar-configuracion", function () {
  var item = document.getElementById("perfil-vertical-link");
  var item2 = document.getElementById("contraseña-vertical-link");

  if (item.classList.contains("active")) {
    var nombre = $("#nombreUsuario").val();
    var apellido = $("#apellidoUsuario").val();
    if (nombre != "" && apellido != "") {
      actualizarDatos(nombre, apellido);
    }
  } else if (item2.classList.contains("active")) {
    var password_old = document.getElementById("password_old");
    var password_new = document.getElementById("password_nuevo");
    var password_confirm = document.getElementById("confirm_password");

    if (password_old.value == "" || password_old.value == null) {
      $(".toast-body").empty();
      $(".toast-body").text("Ingrese actual contraseña");
      const bottomlefttoastExample =
        document.getElementById("bottomleft-Toast");
      const toast = new bootstrap.Toast(bottomlefttoastExample);
      toast.show();
    } else if (password_new.value == "" || password_new.value == null) {
      $(".toast-body").empty();
      $(".toast-body").text("Ingrese nueva contraseña");
      const bottomlefttoastExample =
        document.getElementById("bottomleft-Toast");
      const toast = new bootstrap.Toast(bottomlefttoastExample);
      toast.show();
    } else if (password_new.value.length < 6) {
      $(".toast-body").empty();
      $(".toast-body").text("La contraseña debe tener como minimo 6 dígitos");
      const bottomlefttoastExample =
        document.getElementById("bottomleft-Toast");
      const toast = new bootstrap.Toast(bottomlefttoastExample);
      toast.show();
    } else if (password_confirm.value == "" || password_confirm.value == null) {
      $(".toast-body").empty();
      $(".toast-body").text("Confirme la contraseña");
      const bottomlefttoastExample =
        document.getElementById("bottomleft-Toast");
      const toast = new bootstrap.Toast(bottomlefttoastExample);
      toast.show();
    } else {
      if (password_new.value == password_confirm.value) {
        if (password_old.classList.contains("is-valid")) {
          if (password_old.value != password_new.value) {
            actualizarContrasena(password_new.value);
          } else {
            $("#password_nuevo").removeClass("is-valid");
            $("#password_nuevo").removeClass("is-invalid");
            $("#password_nuevo").addClass("is-invalid");
            setTimeout(() => {
              $("#password_nuevo").removeClass("is-valid");
              $("#password_nuevo").removeClass("is-invalid");
            }, 2000);
            $(".toast-body").empty();
            $(".toast-body").text("La nueva contraseña es igual a la actual");
            const bottomlefttoastExample =
              document.getElementById("bottomleft-Toast");
            const toast = new bootstrap.Toast(bottomlefttoastExample);
            toast.show();
          }
        } else {
          $(".toast-body").empty();
          $(".toast-body").text("La contraseña actual es invalida");
          const bottomlefttoastExample =
            document.getElementById("bottomleft-Toast");
          const toast = new bootstrap.Toast(bottomlefttoastExample);
          toast.show();
        }
      } else {
        $(".toast-body").empty();
        $(".toast-body").text(
          "La confirmación no coincide con la nueva contraseña"
        );
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();
      }
    }
  }
});

function actualizarDatos(nombre, apellido) {
  $.ajax({
    type: "POST",
    url: base_url_config + "models/configuracion/configuracionModel.php",
    dataType: "json",
    data: {
      call: "actualizarDatos",
      nombre: nombre,
      apellido: apellido,
      id_usuario: id_usuario,
    },
    success: function (data) {
      $.each(data, function (key, registro) {
        $(".toast-body").empty();
        $(".toast-body").text(registro);
        const bottomlefttoastExample =
          document.getElementById("bottomleft-Toast");
        const toast = new bootstrap.Toast(bottomlefttoastExample);
        toast.show();

        document.cookie =
          "nombre=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/adminavl_v3;";

        document.cookie = "nombre=" + nombre + "; path=/adminavl_v3;";

        document.cookie =
          "apellido=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/adminavl_v3;";

        document.cookie = "apellido=" + apellido + "; path=/adminavl_v3;";

        $("#nombreNav").text(nombre+' '+apellido);
        
      });
    },
    error: function (data) {
      console.log("error");
    },
  });
}

function actualizarContrasena(password_new) {
  $.ajax({
    type: "POST",
    url: base_url_config + "models/configuracion/configuracionModel.php",
    dataType: "json",
    data: {
      call: "actualizarContrasena",
      password_new: password_new,
      id_usuario: id_usuario,
    },
    success: function (data) {
      if (data.mensaje) {
        location.href = "" + base_url_config + "logout.php";
      }
    },
    error: function (data) {
      console.log("error");
    },
  });
}

let createpassword = (type, ele) => {
  document.getElementById(type).type =
    document.getElementById(type).type == "password" ? "text" : "password";
  let icon = ele.childNodes[0].classList;
  let stringIcon = icon.toString();
  if (stringIcon.includes("ri-eye-line")) {
    ele.childNodes[0].classList.remove("ri-eye-line");
    ele.childNodes[0].classList.add("ri-eye-off-line");
  } else {
    ele.childNodes[0].classList.add("ri-eye-line");
    ele.childNodes[0].classList.remove("ri-eye-off-line");
  }
};

$(document).on("click", "#cerrar-configuracion", function () {
  $("#perfil-vertical-link").removeClass("active");
  $("#contraseña-vertical-link").removeClass("active");
  $("#btn-tab-perfil").removeClass("active");
  $("#btn-tab-contraseña").removeClass("active");

  $("#perfil-vertical-link").addClass("active");
  $("#btn-tab-perfil").addClass("active");

  $("#password_old").removeClass("is-valid");
  $("#password_old").removeClass("is-invalid");

  $("#password_nuevo").removeClass("is-valid");
  $("#password_nuevo").removeClass("is-invalid");

  $("#password_old").val("");
  $("#password_nuevo").val("");
  $("#confirm_password").val("");
});
