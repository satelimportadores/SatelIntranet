
function busqueda(){
	var _valor = $("#buscar").val();
		$.post('php/busqueda_precios.php', {valor: _valor}, function(data) {
			$("#content").html(data);
			
		});
	};
$(function () {
	$.post('php/busqueda_precios.php', {letra: 'A'}, function(ini) {
		$("#content").html(ini);
	});

	$("#letras a").on('click',function() {
	var vlu = $(this).text();
	console.log(vlu);
	$.post('php/busqueda_precios.php', {letra: vlu}, function(data) {
		$("#content").html(data);
	});
	});
});
