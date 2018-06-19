    $(document).ready(function() {
          //cargar empleados  de bodega
          $( "#empleados" ).load( "php/consulta_usuarios_memorandos.php" );
          $('.load').hide();
          //cargar empleados  de bodega

          $( "#empleados" ).change(function() {

              $('.load').show('slow');

                  var empleado =  $(this).val();
                  //alert(empleado);
                    //cargar inventario de dotaciones
                      $( "#dataciones" ).load( "php/consulta_usuarios_memorandos_detalle.php?user_id="+empleado);
                      //cargar inventario de dotaciones
              $('.load').hide('slow');

           });

                $(".select2_single").select2({
                    placeholder: "Seleccione empleado"
                });


    });