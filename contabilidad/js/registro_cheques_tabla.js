var id;
var operacion;
var cheque;
var fecha;

$(document).ready(function() {
	
	$('#por_consig').load('php/consulta_cheques.php?a');
	$('#consig').load('php/consulta_cheques.php?b');
	$('#efect').load('php/consulta_cheques.php?d');
	$('#dev').load('php/consulta_cheques.php?c');

	$('#myModal').on('show.bs.modal', function (e) {
  	id = $(e.relatedTarget).data('codigo-id');
	operacion = $(e.relatedTarget).data('operacion');
	cheque = $(e.relatedTarget).data('cheque');
	fecha = $(e.relatedTarget).data('fecha');
	switch (operacion) {
		case 'consig':
			$(".modal-title").html("Consignar Cheque");
			$(".modal-body").html("Esta seguro que desea mover el cheque <b>"+cheque+"</b> al estado 'Consignado'?");
			$("#btn").html("No");
			$("#btn2").html("Si");
			break;
		case 'devuelt':
			$(".modal-title").html("Cheque Devuelto");
			$(".modal-body").html("Esta seguro que desea mover el cheque <b>"+cheque+"</b> al estado 'Devueltos'?");
			$("#btn").html("No");
			$("#btn2").html("Si");
		break;
		case 'efect':
			$(".modal-title").html("Cheque Efectivo");
			$(".modal-body").html("Esta seguro que desea mover el cheque <b>"+cheque+"</b> al estado 'Efectivos'?");
			$("#btn").html("No");
			$("#btn2").html("Si");
			break;
		case 'cambio':
			$(".modal-title").html("Cambiar Fechas");
			$(".modal-body").html("La fecha actual del cheque <b>"+cheque+"</b> es: "+fecha+"<br><br><b>Nueva fecha <input type='date' id='nueva' min='"+fecha+"' value='"+fecha+"'>");
			$("#btn").html("Cancelar");
			$("#btn2").html("Cambiar");
			break;
		default:
			// statements_def
			break;
	}
	
	})
});

function save(){
	switch (operacion) {
		case 'consig':
			$.post('php/consulta_cheques.php', {id: id}, function(data) {
			$('#por_consig').load('php/consulta_cheques.php?a');
			$('#consig').load('php/consulta_cheques.php?b');
			$('#efect').load('php/consulta_cheques.php?d');
			$('#dev').load('php/consulta_cheques.php?c');

			$("#myModal").modal('hide');
			});
			break;
		case 'devuelt':
		$.post('php/consulta_cheques.php', {id2: id}, function(data) {
		 	$('#por_consig').load('php/consulta_cheques.php?a');
			$('#consig').load('php/consulta_cheques.php?b');
			$('#efect').load('php/consulta_cheques.php?d');
			$('#dev').load('php/consulta_cheques.php?c');

		 	$("#myModal").modal('hide');
		 	});
		break;
		case 'efect':
			$.post('php/consulta_cheques.php', {id3: id}, function(data) {
		 	$('#por_consig').load('php/consulta_cheques.php?a');
			$('#consig').load('php/consulta_cheques.php?b');
			$('#efect').load('php/consulta_cheques.php?d');
			$('#dev').load('php/consulta_cheques.php?c');

		 	$("#myModal").modal('hide');
		 	});
			break;
		case 'cambio':
			fecha = $("#nueva").val()
			$.post('php/consulta_cheques.php', {id4: id, fecha: fecha}, function(data) {
			$('#por_consig').load('php/consulta_cheques.php?a');
			$('#consig').load('php/consulta_cheques.php?b');
			$('#efect').load('php/consulta_cheques.php?d');
			$('#dev').load('php/consulta_cheques.php?c');

		 	$("#myModal").modal('hide');
			});
			break;
		default:
			// statements_def
			break;
	}
}

