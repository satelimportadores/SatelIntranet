    $(document).ready(function() {
        $('#tipo_documeto_oculto').hide();
        $("#tipo_documento02").prop('required',false);
          //cargar empleados  de bodega
          $( "#empleados" ).load( "php/consulta_usuarios_todos.php?todosdocumentos" );
                    //cargar empleados  de bodega      

                $(".empleados").select2({
                    placeholder: "Seleccione empleado"
                });

                $(".documentos").select2({
                    placeholder: "Seleccione tipo de documento"
                });
    $('#fecha').daterangepicker({
          singleDatePicker: true,
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
    $( "#tipo_documento" ).change(function() {
        Tdocuento = $( "#tipo_documento" ).val();
            if (Tdocuento == 'otro') {
                $('#tipo_documeto_oculto').show();
                $("#tipo_documento02").prop('required',true);
            }else{
                $('#tipo_documeto_oculto').hide();
                $("#tipo_documento02").prop('required',false);
            }
    });


    });