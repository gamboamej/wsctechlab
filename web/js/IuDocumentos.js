	$(function() {
	var tbldocumentos =	$('#documentos').DataTable({
			"autoWidth": false,
			"responsive": true,
			//dom: 'Bfrtip',
			//buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
			"order": [],
			"scrollY":"270px",
			"scrollCollapse": true,
			"paging": true,
			"ordering": true,
			"info": false,
			"pagingType": "simple",
			"language": {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla",
				"sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		});

		$('#documentos tbody').on('click', 'tr', function() {
			var data = tbldocumentos.row(this).data();
			$('#id-del').val(data[1]);
			$('#id-del').attr("data-url","documentos");
			$('#id-documento').val(data[1]);
			$('#id-documento').attr("data-url","documentos");

		});
	});

	var success = $('#frm-cargar-documento').validate({
		rules: {
	  userfile:{ required:true},
      tx_nombre_documento: {required: true,minlength: 1,maxlength: 160},
      
		},
		messages: {

	  userfile: {required: "Seleccione un documento",extension: "Solo formato (pdf, doc, docx, jpg)."},
      tx_nombre_documento: {required: "Requerido",minlength: "Enter min 1 character",maxlength: "Enter max 160 caracteres"},
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

	$('#frm-cargar-documento').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($('#frm-cargar-documento')[0]);
		if (success.errorList.length == 0) {
			$.ajax({
				url: baseurl + "documentos/add",
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
							window.location.href = baseurl + "documentos";
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

	var frm_per_doc = $('#frm-permisar-documento').validate({
		rules: {
	  nu_rut: {required: true,minlength: 1,maxlength: 60},
      
		},
		messages: {
	  nu_rut: {required: "Requerido",minlength: "Ingrese minimo 1 caracter",maxlength: "Ingrese maximo 60 caracteres"},
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

	$('#frm-permisar-documento').submit(function(e) {
		e.preventDefault();
		if (frm_per_doc.errorList.length == 0) {
			$.ajax({
				url: baseurl + "documentos/permisar",
				data: $('#frm-permisar-documento').serialize(),
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
							window.location.href = baseurl + "documentos";
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



