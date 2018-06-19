//Variables globales
var user_id;
var nombre;
var accion;

//carga del documento
$( document ).ready(function() {
	
	$( ".tabla_usuarios" ).load( "php/usuarios_ver.php");

			$('#myModal').on('shown.bs.modal', function (e) {
			  
			  user_id = $(e.relatedTarget).data('codigo-id');
			  nombre = $(e.relatedTarget).data('nombre-id');
			  accion = $(e.relatedTarget).data('accion-id');

				if(accion == 'des') {
					$('#modal-body').html('Desea <strong>Desactivar</strong> el usuario: '+user_id+' - '+nombre);
				} 
				if(accion == 'act') {
					$('#modal-body').html('Desea <strong>Activar</strong> el usuario: '+user_id+' - '+nombre);
				}

			})

			$('#ModalReset').on('shown.bs.modal', function (e) {
			  
			  user_id = $(e.relatedTarget).data('cod-id');
			  nombre = $(e.relatedTarget).data('name-id');

			  $('#modal-body02').html('Desea resetear las tareas usuario: '+user_id+' - '+nombre);



			})


});
//carga del documento

		function save() {

			//Desactivar Usuario
				if(accion == 'des') {

							//enviar formulario

								$.ajax({
										url: 'php/estado_usuario.php',
										type: 'post',
										data: {'user_id':user_id,'accion':accion},
									})
									.done(function() {  //true
											new PNotify({
							                                  title: 'Usuario desactivado.',
							                                  text: '¡El usuario: '+ nombre +' fue modificado!',
							                                  type: 'info',
							                                  styling: 'bootstrap3'
							                              });
									$( ".tabla_usuarios" ).load( "php/usuarios_ver.php");
									})
									.fail(function() {  //false
											new PNotify({
							                                  title: '¡Oh No!',
							                                  text: 'La solicitud no pudo ser enviada.',
							                                  type: 'error',
							                                  styling: 'bootstrap3'
							                              });
									})
									.always(function() {
											//alert('siempre');
									});
							//enviar formulario
				} 

			//Desactivar Usuario

			//Activar Usuario
				if(accion == 'act') {

							//enviar formulario

								$.ajax({
										url: 'php/estado_usuario.php',
										type: 'post',
										data: {'user_id':user_id,'accion':accion},
									})
									.done(function() {  //true
											new PNotify({
							                                  title: 'Usuario Activado.',
							                                  text: '¡El usuario: '+ nombre +' fue modificado!',
							                                  type: 'info',
							                                  styling: 'bootstrap3'
							                              });
										$( ".tabla_usuarios" ).load( "php/usuarios_ver.php");
									})
									.fail(function() {  //false
											new PNotify({
							                                  title: '¡Oh No!',
							                                  text: 'La solicitud no pudo ser enviada.',
							                                  type: 'error',
							                                  styling: 'bootstrap3'
							                              });
									})
									.always(function() {
											//alert('siempre');
									});
							//enviar formulario
				} 

			//Activar Usuario


			//cerra modal
			$('#myModal').modal('hide');

		}

		function resetear() {

			//enviar formulario

			$.ajax({
					url: 'php/reset_tareas_usuario.php',
					type: 'post',
					data: {'user_id':user_id},
				})
				.done(function() {  //true
						new PNotify({
		                                  title: 'Tareas reseteadas.',
		                                  text: '¡Las tareas del usuario '+ nombre +' fueron reiniciadas!',
		                                  type: 'info',
		                                  styling: 'bootstrap3'
		                              });
				$( ".tabla_usuarios" ).load( "php/usuarios_ver.php");
				})
				.fail(function() {  //false
						new PNotify({
		                                  title: '¡Oh No!',
		                                  text: 'La solicitud no pudo ser enviada.',
		                                  type: 'error',
		                                  styling: 'bootstrap3'
		                              });
				})
				.always(function() {
						//alert('siempre');
				});

			//enviar formulario

			//cerra modal
			$('#ModalReset').modal('hide');

		}

		function unsave() {

			//cerra modales
			$('#myModal').modal('hide');
			$('#ModalReset').modal('hide');

		}




