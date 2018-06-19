$(document).ready(function() {
	$('#impuest').load('php/impuestos_consulta.php')
     $('button[id ^= adjuntos]').on('click',function() {
		var id = $(this).val();
		$('div[id=respuesta'+id+']').load( "php/impuestos_tareas_adjuntos.php?id="+id);
	});;
	

	var imp = $("#imp option:selected").val();
	$.post('php/impuestos_tareas_consulta.php', {imp: imp}, function(data) {
		$("#result").html(data);
	});

   $("#imp").on('change', function() {
	var imp = $("#imp option:selected").val();
	$.post('php/impuestos_tareas_consulta.php', {imp: imp}, function(data) {
		$("#result").html(data);
	});
});

})