
	$(document).ready(function() {

			$( "#lista" ).load( "php/consulta_dotaciones.php?carga" );

			$("#lista").on('change',function() {
				var ref = $("#lista").val();
				$.post('php/consulta_dotaciones.php', {ref: ref}, function(data) {
				$("#tipos").html(data);
			});
			});
	});
	
