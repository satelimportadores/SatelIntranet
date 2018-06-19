$(document).ready(function() {

	$('#por_consig').load('php/consulta_cheques.php?a=1');

	$('#consig1').on('click', function() {
		alert('hola');
	});

	$('#bancos').load('php/consulta_bancos.php');
	$('#interes').load('php/consulta_interes.php');
	$('#fecha_cheq').on('change',function(){
		var fecha = $('#fecha_cheq').val();
		$('#fecha').text(fecha);
		$.post('php/consulta_fechas.php', {fecha: fecha}, function(data) {
		$('#fecha_con').val(data);
		var con = $('#fecha_con').val();
		$('#fecha2').text(con);
			$.post('php/consulta_fechas_dif.php', {fech: con}, function(data) {
			$('#num_dias').val(data);
			});
		});
	});

	$('#calcu').hide();
	$('#cheques').hide();
	$('#info').show();

	$('#btn-1').on('click',function() {
		$('#info').hide();
		$('#calcu').show();
		$('#cheques').hide();
	});
	$('#btn-4').on('click',function() {
		$('#info').hide();
		$('#calcu').show();
		$('#cheques').hide();
	});
	$('#btn-2').on('click',function() {
		$('#info').show();
		$('#calcu').hide();
		$('#cheques').hide();
	});
	$('#btn-3').on('click',function() {
		$('#info').hide();
		$('#calcu').hide();
		$('#cheques').show();
	});

	$('#bancos').on('change', function() {
		$('#bank').text($('#bancos option:selected').text());
		$('#bank2').text($('#bancos option:selected').text());
	});

	$('#num_cheq').on('keyup', function() {
		var str = $(this).val();
		str = str.toUpperCase();
		$('#cheq').text(str);
	});

	$('#benef').on('keyup', function() {
		$('#endoso').val($(this).val());
		$('#persona').text($(this).val());
	});

	$('#monto,#interes,#btn-1').on('change click', function() {
		var int = parseFloat($('#interes').val());
		var val = parseInt($('#monto').val());
		var dia = parseInt($('#num_dias').val());
		var cuot = +(val*int)/30;
		cuot = cuot.toFixed();
		var valint = +(dia*cuot);
		valint = valint.toFixed();
		var valcheq = val-valint;
		valcheq = valcheq.toFixed();
		$('#cuota_dia').val(cuot);
		$('#val_int').val(valint);
		$('#val_cheq').val(valcheq);

		$('#letras').load('php/numeros_letras.php?monto='+val);
		$('#m').text(val);
		$('#letras2').load('php/numeros_letras.php?monto='+valcheq);
		$('#m2').text(valcheq);
	});




	
	
});