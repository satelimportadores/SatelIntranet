
$( document ).ready(function() {

		   //cargar referencias de souvenir
          $( "#referencia" ).load( "php/consulta_referencias_souvenir.php?ref_entregados" );
          //cargar referencias de souvenir

				$( "#souvenires" ).load( "php/consulta_souvenir_entregados.php");

          $( "#referencia" ).change(function() {
            var ref =  $(this).val();
            //alert(empleado);
              //cargar inventario de dotaciones
                $( "#souvenires" ).load( "php/consulta_souvenir_entregados.php?ref="+ref);
                //cargar inventario de dotaciones

          });

                $(".select2_single").select2({
                    placeholder: "Seleccione referencia del souvenir"
                });

});

//salvar datos en la tabla 

