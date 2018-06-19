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

//contar las letras dentro del comentario

    $('.comen1').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador1').html('');
    	}else{
    		$('.contador1').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen2').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador2').html('');
    	}else{
    		$('.contador2').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen3').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador3').html('');
    	}else{
    		$('.contador3').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen4').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador4').html('');
    	}else{
    		$('.contador4').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen5').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador5').html('');
    	}else{
    		$('.contador5').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen6').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador6').html('');
    	}else{
    		$('.contador6').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen7').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador7').html('');
    	}else{
    		$('.contador7').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen8').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador8').html('');
    	}else{
    		$('.contador8').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen9').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador9').html('');
    	}else{
    		$('.contador9').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});
    $('.comen10').keyup(function() {
    var keyed = $(this).val().length;
    	if (keyed == 0) {
    		$('.contador10').html('');
    	}else{
    		$('.contador10').html('<center>Ha digitado: '+'<font color="red">'+keyed+'</font> caracteres '+' de 150</center>');
    	};

    
	});



//contar las letras dentro del comentario

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