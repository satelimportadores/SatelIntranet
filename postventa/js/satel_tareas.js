$(document).ready(function() {

$('.esconder').hide();

//$('#wizard_verticle').smartWizard();

$('#wizard_verticle').smartWizard({

    enableFinishButton: false, // makes finish button enabled always
   // includeFinishButton : false,   // Add the finish button
    onFinish:onFinishCallback
}); 

function onFinishCallback() {
	//$('#wizard_verticle').smartWizard('showMessage', 'Finish Clicked');
	alert('Tareas terminada con éxito');
	window.location='contacts.php';
}


//formulario 1

	$('#form1').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado1').html("Comentario insertado correctamente.");
			$('#boton1').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado1').html("Comentario <strong>NO</strong> ha sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 1

//formulario 2

	$('#form2').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado2').html("Comentario insertado correctamente.");
			$('#boton2').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado2').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 2

//formulario 3

	$('#form3').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado3').html("Comentario insertado correctamente.");
			$('#boton3').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado3').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 3

//formulario 4

	$('#form4').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado4').html("Comentario insertado correctamente.");
			$('#boton4').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado4').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 4

//formulario 5

	$('#form5').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado5').html("Comentario insertado correctamente.");
			$('#boton5').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado5').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 5

//formulario 6

	$('#form6').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado6').html("Comentario insertado correctamente.");
			$('#boton6').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado6').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 6

//formulario 7

	$('#form7').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado7').html("Comentario insertado correctamente.");
			$('#boton7').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado7').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 7


//formulario 8

	$('#form8').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado8').html("Comentario insertado correctamente.");
			$('#boton8').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado8').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 8

//formulario 9

	$('#form9').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado9').html("Comentario insertado correctamente.");
			$('#boton9').attr('disabled', true);
		})
		.fail(function() {  //false
			$('.resultado9').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 9

//formulario 10

	$('#form10').submit(function(e) {
		e.preventDefault();

		var data = $(this).serializeArray();
		

		$.ajax({
			url: 'php/e_tareas.php',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function() {
				$('.esconder').css('display','inline');
			}
		})
		.done(function() {  //true
			$('.resultado10').html("Comentario insertado correctamente.");
			$('#boton10').attr('disabled', true);
			onFinishCallback();
		})
		.fail(function() {  //false
			$('.resultado10').html("Comentario <strong>NO</strong> a sido guardado.");
		})
		.always(function() {
			
			setTimeout(function() {

				$('.esconder').hide();

			}, 1000);
		});
		
	})

//formulario 10

})