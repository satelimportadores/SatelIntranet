$( document ).ready(function() {

	

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
