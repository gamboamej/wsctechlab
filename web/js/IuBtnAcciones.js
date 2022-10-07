$('#btn-id-reset-pass').click(function() {
    var id_reset_pass = $('input#id-reset-pass').val();
    var segmento = $('input#id-reset-pass').data('url');

    $.ajax({
        url: baseurl + segmento +"/repassword/" + id_reset_pass,
        data: {id: id_reset_pass},
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
                    timer: 2000,
                }).then(function() {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    text: data.mensaje,
                    timer: 2000,
                });
            }
        },
        error: function() {
          Swal.fire("Error!", "Error en el servidor", "error");
        }
    });
});

$('#btn-id-active').click(function() {
    var id_active = $('input#id-active').val();
    var segmento = $('input#id-del').data('url');
    $.ajax({
      url: baseurl + segmento +"/active/" + id_active,
      data: {id: id_active},
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
            timer: 2000,}).then(function(){location.reload();});
  
        } else {
          Swal.fire({
            icon: "error",
            text: data.mensaje,
            timer: 2000,
          });
        }
      },
      error: function() {
        Swal.fire("Error!", "Error en el servidor", "error");
      }
    });
  });
  
  $('#btn-id-inactive').click(function() {
    var id_inactive = $('input#id-inactive').val();
    var segmento = $('input#id-inactive').data('url');
    $.ajax({
      url: baseurl + segmento +"/inactive/" + id_inactive,
      data: {id: id_inactive},
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
            timer: 2000,}).then(function(){location.reload();});
  
        } else {
          Swal.fire({
            icon: "error",
            text: data.mensaje,
            timer: 2000,
          });
        }
      },
      error: function() {
        Swal.fire("Error!", "Error en el servidor", "error");
      }
    });
  });

$('#btn-del').click(function() {
  var id_del = $('input#id-del').val();
  var segmento = $('input#id-del').data('url');

  $.ajax({
    url: baseurl + segmento +"/del/" + id_del,
    data: {id: id_del},
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
          timer: 2000,}).then(function(){location.reload();});
      } else {
        Swal.fire({icon: "error",text: data.mensaje,timer: 2000,});
      }
    },
    error: function() {
      Swal.fire("Error!", "Error en el servidor", "error");
    }
  });
});

var success = $('#Frm-cambio-clave').validate({
  rules: {
  tx_clave: {required: true,minlength: 5,maxlength: 60},
  tx_clave_nueva: {required: true,minlength: 5,maxlength: 60},
  tx_clave_nueva_repetida:  { equalTo : "#tx_clave_nueva",required: true,minlength: 5,maxlength: 60},
    
  },
  messages: {
  tx_clave: {required: "Requerido",minlength: "Ingrese minino 5 caracteres",maxlength: "Ingrese maximo 60 caracteres"},
  tx_clave_nueva: {required: "Requerido",minlength: "Ingrese minino 5 caracteres",maxlength: "Ingrese maximo 60 caracteres"},
  tx_clave_nueva_repetida: { equalTo : "Confirme la nueva contraseña",required: "Requerido",minlength: "Ingrese minino 5 caracteres",maxlength: "Ingrese maximo 60 caracteres"},
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

$('#Frm-cambio-clave').submit(function(e) {
  e.preventDefault();
  if (success.errorList.length == 0) {
    $.ajax({
      url: baseurl + "change-password",
      data: $('#Frm-cambio-clave').serialize(),
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
            timer: 2000,
          }).then(function() {
            window.location.href = baseurl + "salir";
          });
        } else {
          Swal.fire({
            icon: "error",
            text: data.mensaje,
            timer: 2000,
          });
        }
      },
      error: function() {
        Swal.fire("Error!", "Error en el Servidor", "error");
      }
    });
  }
});