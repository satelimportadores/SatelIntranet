//Variables globales
var user_id;
var fecha;
var datos;


$( document ).ready(function() {
		 $('#myModal').on('shown.bs.modal', function (e) {
		  
			  user_id = $(e.relatedTarget).data('codigo-id');
			  fecha = $(e.relatedTarget).data('fecha-id');
			  $('#user_id').val(user_id);
			  $('#fecha').val(fecha);
		 
		})
});

//salvar datos en la tabla 

function save() {

	var formData = new FormData($("#formimagen")[0]);
	//enviar formulario

	$.ajax({
			url: 'php/e_inventario_dotaciones_imagen.php',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
		})
		.done(function(data) {  //true
			console.log(data);
				new PNotify({
                                  title: 'Imagen ingresada.',
                                  text: '¡La imagen fue enviada!',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
		var empleado =  $("#empleados").val();
		$( "#dataciones" ).load( "php/consulta_inventario_dotaciones_general.php?user_id="+empleado);
		$("#formimagen")[0].reset();

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