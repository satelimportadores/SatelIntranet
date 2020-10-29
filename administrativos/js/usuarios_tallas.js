//carga del documento
$( document ).ready(function() {

//Cargar Datatable
	datatable();
//Cargar Datatable

});
//carga del documento


function datatable(){

	//Cargar Datatable
		var table = $('#clientes').DataTable({
			"destroy":true,
			"pageLength": 20,
			"lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
			dom: 'Bfrtip',
			buttons: ['copy', 'csv', 'excel', 'pdf'],
			"language": {
	        "decimal": "",
	        "emptyTable": "No hay informaciÃ³n",
	        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
	        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
	        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
	    },
			"ajax":{
				"method":"POST",
				"url": "php/usuarios_tallas.php"
			},
			"columns":[
				{data:"id"},
				{data:"nombres"},
				{data:"talla_botas"},
				{data:"talla_camisa"},
				{data:"talla_pantalon"},
				{data: 'id', render: function (data) {
			   		return '<a class="btn btn-warning" target="_blank" href="usuarios_editar.php?user_id='+data+'"><i class="fa fa-edit"</i></a>';
       		 		}      
	      		},
			]
		});
	//Cargar Datatable


}


