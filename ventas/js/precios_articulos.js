$( document ).ready(function() {
	SATEL();
      $( "#empresa" ).change(function() {
		   empresa = $('#empresa').val();
				switch(empresa) {
					  case "SATEL":
					     	SATEL();
					    break;
					  case "TRUST":
					    	TRUST();
					    break;
					  default:
					    SATEL();
				}
		   
	 });
});
//SATEL
function SATEL(){
	$('.cargando').fadeIn(1000);
		var table = $('#precios').DataTable({
		"destroy":true,
		"pageLength": 40,
		"lengthMenu": [[40, 80, 100, -1], [40, 80, 100, "All"]],
		"language": {
        "decimal": "",
        "emptyTable": "No hay información",
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
			"url": "php/consulta_precios_articulos.php?satel"
		},
		"columns":[
			{"data":"codigo_producto_var"},
			{"data":"nombre_producto"},
			{"data":"stock"},
			{"data":"precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$ ' )},
		]
	});
	$('.cargando').fadeOut(1000);		
};
//TRUST
function TRUST(){
	$('.cargando').fadeIn(1000);
		var table = $('#precios').DataTable({
		"destroy":true,
		"pageLength": 40,
		"lengthMenu": [[40, 80, 100, -1], [40, 80, 100, "All"]],
		"language": {
        "decimal": "",
        "emptyTable": "No hay información",
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
			"url": "php/consulta_precios_articulos.php?trust"
		},
		"columns":[
			{"data":"codigo_producto_var"},
			{"data":"nombre_producto"},
			{"data":"stock"},
			{"data":"precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$ ' )},
		]
	});
	$('.cargando').fadeOut(1000);
};