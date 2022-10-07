var success = $('#Frm-Users').validate({
  rules: {
  nu_rut:{required: true,minlength: 1,maxlength: 20},  
  tx_nombre:{required: true,minlength: 1,maxlength: 160},
  tx_apellido:{required: true,minlength: 1,maxlength: 160},
  tx_correo:{required: true,email: true,minlength: 1,maxlength: 160},
  tx_password:{required: true,minlength: 1,maxlength: 160},
  in_status:{required: true},
  co_usuario_rol:{required: true},
  
  //userfile:  {required: true,extension: "jpg|jpeg|png|gif"},

  },
  messages: {
  nu_rut:{required: "Requerido",minlength: "Enter min 1 character",maxlength: "Ingrese maximo 20 caracteres"},  
  tx_nombre:{required: "Requerido",minlength: "Enter min 1 character",maxlength: "Ingrese maximo 20 caracteres"},
  tx_apellido:{required: "Requerido",minlength: "Enter min 1 character",maxlength: "Enter max 160 characters"},
  tx_correo:{required: "Requerido",minlength: "Enter min 1 character",maxlength: "Enter max 160 characters"},
  tx_password:{required: "Requerido"},
  co_usuario_rol:{required: "Requerido"},
  in_status:{required: "Requerido"},
  //userfile: {required: "Please upload Image.",extension: "format only (jpg, jpeg, png, gif)."},

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

$('#Frm-Users').submit(function(e) {
      e.preventDefault();
      var formData = new FormData($('#Frm-Users')[0]);
      if (success.errorList.length == 0) {
          $.ajax({
              url: baseurl + "personas-add",
              data: formData,
              type: "post",
              dataType: "json",
              mimeType: "multipart/form-data",
              contentType: false,
              cache: false,
              processData: false,
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
                          window.location.href = baseurl + "personas";
                      });
                      document.getElementById("Frm-Users").reset();
                  } else {

                      Swal.fire({
                          icon: "error",
                          text: data.mensaje,
                          timer: 2000,
                      });
                  }
              },
              error: function() {Swal.fire("Error!", "Server failure", "error");}
          });
      }
  });