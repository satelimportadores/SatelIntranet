
	$(document).ready(function() {

		$('#loading').hide();

          $("#lista").select2({
                placeholder: "Seleccione de referencia del articulo"
          });

			$( "#lista" ).load( "php/consulta_referencias_souvenir.php?ref" );

			$("#lista").on('change',function() {
				$('#loading').show();
				var ref = $("#lista").val();
				$.post('php/consulta_souvenires.php', {'ref': ref}, function(data) {
				$("#tipos").html(data);
				$('#loading').hide();
			});
			});
	});
	
