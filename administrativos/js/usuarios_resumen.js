//carga del documento
$( document ).ready(function() {

//Cargar Datatable
	datatable();
//Cargar Datatable

});
//carga del documento


function datatable(){

	//Cargar Datatable
		var table = $('#clientes').DataTable({
			"destroy":true,
			"pageLength": 20,
			"lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
			dom: 'Bfrtip',
			buttons: ['copy', 'csv', 'excel', 'pdf'],
			"language": {
	        "decimal": "",
	        "emptyTable": "No hay informaciÃ³n",
	        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
	        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
	        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
	    },
			"ajax":{
				"method":"POST",
				"url": "php/usuarios_resumen.php"
			},
			"columns":[
				{data:"id"},
				{data:"nombre"},
				{data:"cedula"},
				{data:"username"},
				{data:"nivel_permisos"},
				{data: 'id', render: function (data) {
			   		return '<a class="btn btn-primary" target="_blank" href="usuarios_perfil.php?user_id='+data+'"><i class="fa fa-eye"</i></a>';
       		 		}      
	      		},
				{data: 'id', render: function (data) {
			   		return '<a class="btn btn-warning" target="_blank" href="usuarios_editar.php?user_id='+data+'"><i class="fa fa-edit"</i></a>';
       		 		}      
	      		},
				{data: 'id', render: function (data,type,row) {
					nombre = "'"+row[1]+"'";
						if (row[6] < 10) {
							//console.log(row[6]);
						return '<button type="button" class="btn btn-danger" onclick="resetear('+data+','+nombre+')"><i class="fa fa-battery-half"></i></button>';
						}else{
				   		return '<button type="button" class="btn btn-success" onclick="resetear('+data+','+nombre+')"><i class="fa fa-battery-full"></i></button>';
	       		 		} 
       		 		}     
	      		},
				{data: 'id', render: function (data,type,row) {
					des = 'des';
					act = 'act';
					nombre = "'"+row[1]+"'";
					if (row[5] == 1) {
							return '<button type="button" class="btn btn-success" onclick="DesActivar('+data+','+des+','+nombre+')"><i class="fa fa-power-off"></i></button>';
							}else{
							return '<button type="button" class="btn btn-danger" onclick="DesActivar('+data+','+act+','+nombre+')"><i class="fa fa-plug"></i></button>';
						}
			   		
       		 		}      
	      		},
			]
		});
	//Cargar Datatable


}

function resetear(user_id,nombre) {

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
				datatable();
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

function DesActivar(user_id,accion,nombre) {


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
							                                  text: '¡El usuario '+ nombre +' fue modificado!',
							                                  type: 'info',
							                                  styling: 'bootstrap3'
							                              });
									datatable();
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
							                                  text: '¡El usuario '+ nombre +' fue modificado!',
							                                  type: 'info',
							                                  styling: 'bootstrap3'
							                              });
										datatable();
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

}








