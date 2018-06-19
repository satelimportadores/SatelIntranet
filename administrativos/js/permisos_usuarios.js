$(document).ready(function() {
	$( "#sol" ).load( "php/consultas_usuarios.php?usuarios01" );
	$( "#auto" ).load( "php/consultas_usuarios.php?usuarios02" );
	$('#loading').hide();

	$("#sol").on('change', function() {

  			var user_id = $(this).val();
  			$('#loading').show();
	  			$.ajax({
	  				url: 'php/consulta_permisos_usuarios.php',
	  				type: 'POST',
	  				data: {'user_id': user_id},
	  			})
	  			.done(function(data) {
	  				console.log("success");
	  				var valores = eval(data);
	  					var cargo   = valores[0];
	  					var eps   = valores[1];
	  					var afp   = valores[2];
	  					var arl   = valores[3];
	  						$('#cargo').val(cargo);
	  						$('#eps').val(eps);
	  						$('#afp').val(afp);
	  						$('#arl').val(arl);
	  						$('#loading').hide();
	  			})
	  			.fail(function() {
	  				console.log("error");
	  			})
	  			.always(function() {
	  				console.log("complete");
	  			});
	  			
	});



$("#motivo").on('change', function() {
	if ($(this).val()=='Personal') {
		$("#tipo").html("<div class='form-group'>  <div class='col-md-3 col-xs-6 control-label'> <label for='cargo'>Tipo: </label> </div>  <div class='col-md-4 col-xs-6'> <select id='cargo' class='form-control' name='cargo'> <option value='Familiar'>Familiar</option><option value='otro'>Otro</option> </select> </div>  </div>");
	};
	if ($(this).val()=='Cita Medica') {
		
		$("#tipo").html("<div class='form-group'>  <div class='col-md-3 col-xs-6 control-label'><label for='cargo'>Tipo: </label> </div>  <div class='col-md-4 col-xs-6'> <select id='cargo' class='form-control' name='cargo'><option value='Control'>Control</option><option value='Enfermedad'>Enfermedad</option> </select> </div>  </div>");
	};
	if ($(this).val()=='Otro') {
		$("#tipo").html("<div class='form-group'>  <div class='col-md-3 col-xs-6 control-label'> <label for='cargo'>Cual:  </label> </div>  <div class='col-md-4 col-xs-6'> <input type='text' class='form-control' name='otro' id='otro'> </div>  </div>");
		$("#tipo2").html("");
	};


	$("#tip").on('change', function() {
			if($(this).val()=='otro'){
				$("#tipo2").html("<div class='form-group'>  <div class='col-md-3 col-xs-6 control-label'> <label for='cargo'>Cual:  </label> </div>  <div class='col-md-4 col-xs-6'> <input type='text' class='form-control' name='otr' id='otr'> </div>  </div>");
			}else {
				$("#tipo2").html('');
			}
			if($(this).val()=='Enfermedad'){
				$("#tipo2").html("<div class='form-group'>  <div class='col-md-3 col-xs-6 control-label'> <label for='cargo'>Adquirida: </label> </div>  <div class='col-md-4 col-xs-6'> <select id='cargo' class='form-control' name='cargo'><option value='En el trabajo'>En el trabajo</option><option value='Fuera del trabajo'>Fuera del trabajo</option> </select> </div>  </div>");
			}
	});
});

//evita que se envie el archivo hasta que las validaciones se cumplan
$('form').submit(function(e){
    e.preventDefault();
	var hsal = $("#hsal").val()
	var hlleg =  $("#hlleg").val()
	var cargo = $("#cargo").val()
	var motivo = $("#tip").val()
	var adjunto = $("#file").val()

	if (hsal>=hlleg) {
		alert("La hora de llegada debe ser mayor a la hora de salida");
	}else if(cargo == null) {
		alert("Seleccione un cargo")
	}else if(adjunto == "") {
		alert("Aun no se adjunta el comprobante")
	}else {
		$('form').unbind('submit').submit();
	}	
	console.log(adjunto)
});


});
//recibe de tabla_permisos id, el valor del input, y las horas a reponer. 
function myFunction(id){
	var f = new Date();
	var hoy =(f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate()); 
	var rep = $("input[id=" + id + "]").val();
	alert(rep);
	var horas = $("td[id=" + id + "]").text();
	console.log(horas);

// si el valor del input es mayor a las horas totales, no permite el envio del formulario
	if (rep>horas) {
		alert("Las horas repuestas no pueden ser mayores a las horas que se deben")
	}else{
	$.post('php/consultas_permisos_usuarios.php', {id: id, rep: rep, hoy: hoy}, function(data) {
	window.location.reload();
	//console.log(hoy);
	});
	}
}
