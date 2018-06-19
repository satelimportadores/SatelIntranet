//Variables globales
var id;
var nombre;
var activo;


$('#myModal').on('shown.bs.modal', function (e) {
  
  id = $(e.relatedTarget).data('codigo-id');
  nombre = $(e.relatedTarget).data('name-id');
  activo = $(e.relatedTarget).data('estado-id');


  $('#modal-body').html('Desea cambiar el estado de: '+nombre);



})

//salvar datos en la tabla 

function save() {

	//enviar formulario

	$.ajax({
			url: 'php/e_css_autorizar.php',
			type: 'post',
			data: {'id':id, 'estado':activo},
		})
		.done(function() {  //true
				new PNotify({
                                  title: 'El estado fue modificado.',
                                  text: '¡El estado: '+ nombre +' fue modificado!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
		$( ".tabla_autcss" ).load( "php/consulta_css_autorizaciones.php");
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
	$('#myModal').modal('hide');

}

function unsave() {

	//cerra modal
	$('#myModal').modal('hide');

}