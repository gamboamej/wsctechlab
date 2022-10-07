var success = $('#frmingreso').validate({
  rules: {
    rutuser: {
      required: true,
      minlength: 1,
      maxlength: 20
    },
    tx_clave: {
      required: true,
      minlength: 1,
      maxlength: 100
    },
  },
  messages: {
    rutuser: {
      required: "RUT Requerido",
      minlength: "Ingresa entre 1 and 20 caracteres",
      maxlength: "Ingresa entre 1 and 20 caracteres"
    },
    tx_clave: {
      required: "Contraseña Requerida",
      minlength: "Ingresa entre 1 and 100 caracteres",
      maxlength: "Ingresa entre 1 and 100 caracteres"
    },
  },
  errorElement: 'span',
  errorPlacement: function(error, element) {
    error.addClass('invalid-feedback');
    element.closest('.form-group').append(error);
  },
  highlight: function(element, errorClass, validClass) {
    $(element).addClass('is-invalid');
  },
  unhighlight: function(element, errorClass, validClass) {
    $(element).removeClass('is-invalid');
  }
});

$('#frmingreso').submit(function(e) {
  e.preventDefault();
  event.preventDefault(e);
  if (success.errorList.length == 0) {
  $.ajax({
    url: baseurl + "ingreso",
    data: $('#frmingreso').serialize(),
    type: "post",
    dataType: "json",
    beforeSend: function() {
      Swal.fire({
      title: '<strong>Cargando...</strong>',
      html: '<img width:"100" height="100" src="web/img/logo_600.png"><span class="sr-only">Cargando...</span><h5 class="text-primary"><b>por favor espere...</b></h5>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false});
    },
    success: function(data) {
      if (data.resultado == true) {
        Swal.fire({
          icon: "success",
          text: data.mensaje,
          timer: 2000,}).then(function() {window.location.href = baseurl+"sesion";});
        document.getElementById("frmingreso").reset();
      } else {
        Swal.fire({
          icon: "error",
          text: data.mensaje,
          timer: 2000,}).then(function() {location.reload();});
      }
    },
    error: function() {
      Swal.fire("Error!", "Fallo la Conexion", "error").then(function() {
        location.reload();
      });
    }
  });
}
});