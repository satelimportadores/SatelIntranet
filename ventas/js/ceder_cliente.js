//Variables globales
var codigo;

$('#myModal').on('shown.bs.modal', function (e) {
  $( "#modal-body" ).load( "php/consulta_vendedores.php");
  codigo = $(e.relatedTarget).data('codigo-id');
  console.log('El codigo es: '+codigo);
})

//salvar datos en la tabla 

function save() {

	//enviar datos
		//formulario 1

	
		var asesor = $('#asesor').val();
		
		$.ajax({
			url: 'php/e_ceder_cliente.php',
			type: 'post',
			data: {'cardcode':codigo, 'user_id_destino':asesor},
		})
		.done(function() {  //true
				new PNotify({
                                  title: 'Enviado.',
                                  text: '¡La solicitud ha sido enviada!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
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
		

//formulario 1

	//cerra modal
	$('#myModal').modal('hide');
}

//salvar datos en la tabla 

