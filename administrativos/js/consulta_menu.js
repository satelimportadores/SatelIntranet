$( document ).ready(function() {
    busqueda();
});

function busqueda(){
	$.post('php/consulta_menu.php', function(data) {
			$("#menuABC").html(data);
		});
};