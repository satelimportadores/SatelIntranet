    $(document).on('ready',function(){

//Consultar si existe la cedula en la base de datos
$( "#numero_identificacion" ).blur(function() {

          $("#error_cedula").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw green'></i>");
    
                  var cedula = $('#numero_identificacion').val();
                    $.ajax({
                      url: 'php/consulta_cedula_usuario_nuevo.php',
                      type: 'POST',
                      data: {'cedula': cedula},
                    })
                    .done(function(datos) {
                      if (datos == 1) {
                        $("#error_cedula").html("¡Ya existe un usuario con el número de cedula! = <span class='red'>"+cedula+'</span>'); 
                        $('#numero_identificacion').val('');
                        $('#numero_identificacion').focus();

                      }else{
                        $("#error_cedula").html("<i class='fa fa-check green'></i>");
                      }
                    })
                    .fail(function() {
                      console.log("error");
                    })
                    .always(function() {
                      console.log("complete");
                    });   
              });
//Consultar si existe la cedula en la base de datos
         //escorder div al cargar pagina
      $('.jefebodega').css({'display':'none'});
      
      $('#cargo').css({'display':'none'});
       //cargar areas de la empresa
      $("#select2_single11" ).load("php/consulta_cargo.php?areas");
      $("#ciudad" ).load("php/consulta_ciudades.php?ciudad");
      $("#eps" ).load("php/consulta_salud.php?EPS");
      $("#afp" ).load("php/consulta_salud.php?AFP");
      $("#arl" ).load("php/consulta_salud.php?ARL");


      $("#select2_single11").change(function(){


                    var cargo = $('#select2_single11').val();
                      $.ajax({
                        url: 'php/consulta_cargo.php',
                        type: 'POST',
                        data: {'cargo': cargo},
                      })
                      .done(function(data) {
                        $("#select2_single12" ).empty();
                        $("#select2_single12" ).append( data );
                        $('#cargo').css({'display':'block'});
                        $('#cargo').focus();
                      })
                   

      });


       
           //escorder div al cargar pagina
     // Funcion carga de select cuando input file cambia 
      $("#file").change(function (){
       $(".descripcion_files").empty();
       var count_files = $(this).get(0).files.length;
            $('#cant_files').val(count_files);
        for (var i = 0; i < count_files; i++) {
           $(".descripcion_files").append("<div class='item form-group'><label for='escolaridad' class='control-label col-md-3 col-sm-3 col-xs-12'>"+$(this).get(0).files[i].name+"</label><div class='col-md-6 col-sm-6 col-xs-12'>"+add_select(i)+"</div></div>");

        };
     }); 
    // Funcion carga de select cuando input file cambia
          //funcion esconder div numero pedido
          
            $("select[name=departamento]").change(function(){
           var departamento = $('select[name=departamento]').val();
           //alert(departamento);

                  switch (departamento)
                  {
                      case "4":
                      $('.jefebodega').css({'display':'block'});
                      $('select[name=grupo_bodega]').prop('required',true);
                      $('select[name=grupo_bodega_subgrupo]').prop('required',true);
                      break;

                      default:
                      $('.jefebodega').css({'display':'none'});
                      $('select[name=grupo_bodega]').prop('required',false);
                      $('select[name=grupo_bodega_subgrupo]').prop('required',false);
                      break;
                  }
            
        });
          //funcion esconder div numero pedido

          //select 2 single

              $(".select2_single").select2({
                placeholder: "Seleccione tipo de identificación"
              });
              $(".select2_single01").select2({
                placeholder: "Seleccione ciudad"
              });
              $(".select2_single03").select2({
                placeholder: "Seleccione departamento asignado"
              });
              $(".select2_single04").select2({
                placeholder: "Seleccione subgrupo bodega"
              });
              $(".select2_single05").select2({
                placeholder: "Seleccione departamento bodega"
              });
              $(".select2_single06").select2({
                placeholder: "Seleccione su genero"
              });
              $(".select2_single07").select2({
                placeholder: "Seleccione su estado civil"
              });
              $(".select2_single08").select2({
                placeholder: "Seleccione su escolaridad"
              });
             $(".select2_single09").select2({
                placeholder: "Seleccione la cantidad de hijos que tiene"
              });
              $(".select2_single10").select2({
                placeholder: "Seleccione tipo de vinculación con la empresa"
              });
              $(".select2_single11").select2({
                placeholder: "Seleccione area de la empresa"
              });
              $(".select2_single13").select2({
                placeholder: "Seleccione EPS"
              });
              $(".select2_single14").select2({
                placeholder: "Seleccione AFP"
              });
              $(".select2_single15").select2({
                placeholder: "Seleccione ARL"
              });
          //select 2 single


    });

    var add_select = function(i){
      var datos = "<select required class='select2_single08 form-control' name='"+i+"'> \
          <option value=''>Seleccione</option> \
          <option value='contrato'>contrato</option> \
          <option value='foto'>foto</option> \
          <option value='hoja_de_vida'>hoja de vida</option> \
          <option value='cedula'>cedula</option> \
          <option value='seguridad_social'>Seguridad social</option> \
      </select> \
      <br>";  
      return datos;
    }