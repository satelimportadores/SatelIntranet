//Variables globales
var cardcode;
var userd;
var cliente;
var destino;
var si = 'si';
var no = 'no';

$('#myModal').on('shown.bs.modal', function (e) {
  
  cardcode = $(e.relatedTarget).data('codigo-id');
  userd = $(e.relatedTarget).data('userd-id');
  cliente = $(e.relatedTarget).data('cliente-id');
  destino = $(e.relatedTarget).data('destino-id');

  $('#modal-body').html('Desea cambiar el cliente: '+cliente+' al asesor: '+destino);



})

//salvar datos en la tabla 

function save() {

	//enviar formulario

	$.ajax({
			url: 'php/e_ceder_cliente.php',
			type: 'post',
			data: {'cardcode':cardcode, 'user_id_destino':userd,'si':si},
		})
		.done(function() {  //true
				new PNotify({
                                  title: 'Usuario modificado.',
                                  text: '¡El usuario: '+ cliente +' fue modificado!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
		$( ".tabla_ceder" ).load( "php/consulta_ceder.php");
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

	//enviar formulario

	$.ajax({
			url: 'php/e_ceder_cliente.php',
			type: 'post',
			data: {'cardcode':cardcode, 'user_id_destino':userd,'no':no},
		})
		.done(function() {  //true
				new PNotify({
                                  title: 'Enviado.',
                                  text: '¡El usuario: '+ cliente +' fue INACTIVADO!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
			$( ".tabla_ceder" ).load( "php/consulta_ceder.php");
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