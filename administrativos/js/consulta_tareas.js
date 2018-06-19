$(document).ready(function() {

$('.load_dia').hide();
$('.load_mes').hide();


$( "#t_dias" ).load( "php/consulta_tareas_fechas.php?s_fecha_dia" );
$( "#t_mes" ).load( "php/consulta_tareas_fechas.php?s_fecha_mes" );	
		//CalendarioDia
	$('#s_fecha_dia').daterangepicker({
          singleDatePicker: true,
          format: 'YYYYMMDD',
          calender_style: "picker_1"
        }, function(start, end, label) {
        	$('.load_dia').show();
        	fecha_dia = $('#s_fecha_dia').val(),
		        		$.ajax({
				        			url: 'php/consulta_tareas_fechas.php',
				        			type: 'POST',
				        			data: {'s_fecha_dia': fecha_dia},
				        		})
				        		.done(function(Data) {
				        			$( "#t_dias" ).html(Data);
				        			//console.log("Success");
				        			$('.load_dia').hide();
				        		})
				        		.fail(function() {
				        			console.log("error");
				        		})
				        		.always(function() {
				        			//console.log("complete");
		        		});
        		
                });
		//CalendarioDia

		//CalendarioMes
	$('#s_fecha_mes').daterangepicker({
          singleDatePicker: true,
          format: 'YYYYMMDD',
          calender_style: "picker_1"
        }, function(start, end, label) {
        	$('.load_mes').show();
        	fecha_mes = $('#s_fecha_mes').val(),
	        		$.ajax({
			        			url: 'php/consulta_tareas_fechas.php',
			        			type: 'POST',
			        			data: {'s_fecha_mes': fecha_mes},
			        		})
			        		.done(function(Data) {
			        			$( "#t_mes" ).html(Data);
			        			//console.log("Success");
			        			$('.load_mes').hide();
			        		})
			        		.fail(function() {
			        			console.log("error");
			        		})
			        		.always(function() {
			        			//console.log("complete");
	        		});
                });
		//CalendarioMes


});