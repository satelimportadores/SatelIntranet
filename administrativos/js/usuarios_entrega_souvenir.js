$( document ).ready(function() {

	          //cargar empleados  de bodega
          $( "#empleados" ).load( "php/consulta_usuarios_todos.php?todos" );
          //cargar empleados  de bodega
          //cargar inventario de dotaciones
          $( "#dataciones" ).load( "php/consulta_inventario_souvenir.php?souvenir" );
          //cargar inventario de dotaciones
          //cargar inventario de dotaciones
          $( "#referencias" ).load( "php/consulta_referencias_souvenir.php?ref" );
          //cargar inventario de dotaciones
          

                $(".empleados").select2({
                    placeholder: "Seleccione empleado de Satel"
                });

                $(".referencias").select2({
                    placeholder: "Seleccione referencia para filtrar"
                });

    $('#referencias').on('change', function(event) {
		    $("form :input[type='number']").each(function() {
		  		var input = ($(this).val()); 
		  		if (input > 0) {
		  			$(this).closest('tr').show();
		  			$(this).closest('tr').addClass('seleccion red');
		  			$(this).closest('tr').removeClass('esconder');
		  		}
		  		if(input==0){
		  			$(this).closest('tr').removeClass('seleccion red');
		  			$(this).closest('tr').addClass('esconder');
		  		}
			});
		var referencias = $(this).val();
    	$('.esconder').hide();
    	$('.'+referencias).show();

    });


     
}); 
