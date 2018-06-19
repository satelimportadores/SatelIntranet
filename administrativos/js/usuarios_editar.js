$(document).ready(function() {


  //Cargar ciudades
  
  
  $.post('php/consulta_cargo.php', {areas: 'areas'}, function(data) { 
    $('#area').html(data);
    traer_datos();
  });

  $.post('php/consulta_ciudades.php', {ciudad: 'ciudad'}, function(data) {
    $('#ciudad').html(data);
  });

  
  $("#file").change(function (){
       $(".descripcion_files").empty();
       var count_files = $(this).get(0).files.length;
       //alert(count_files);
            $('#cant_files').val(count_files);
        for (var i = 0; i < count_files; i++) {
           $(".descripcion_files").append("<div class='item form-group'><label for='escolaridad' class='control-label col-md-3 col-sm-3 col-xs-12'>"+$(this).get(0).files[i].name+"</label><div class='col-md-6 col-sm-6 col-xs-12'>"+add_select(i)+"</div></div>");

        };
     }); 
  

});



//Traer datos del usuario
var traer_datos = function(){
  $.ajax({
    url: 'php/consulta_usuario_editar.php',
    type: 'POST',
    data: {'user_id': user_id},
  })
  .done(function(data) {
    //console.log("success=="+data);
    if (data != 0) {
            var datos_usuario = JSON.parse(data);
            org_usuario(datos_usuario);
    };
  })
  .fail(function(data) {
    console.log("error=="+data);
  })
}
//Traer datos del usuario 


//Funcion de organizar datos usuario
var org_usuario = function(datos_usuario){
          
          for(var i in datos_usuario){
  
               var n_usuario = datos_usuario[i].nombre;
                  $("#nombre").val(n_usuario);
               var a_usuario =  datos_usuario[i].apellido;
                  $("#n_usuario").html(n_usuario+" "+a_usuario);
                  $("#apellido").val(a_usuario);
               var t_identificacion =  datos_usuario[i].t_identificacion; 
                  $("#t_identificacion").val(t_identificacion);
               var cedula =  datos_usuario[i].cedula;
                  $("#numero_identificacion").val(cedula);
               var ciudad =  datos_usuario[i].ciudad;
                  $("#ciudad").val(ciudad);
               var direccion =  datos_usuario[i].direccion;
                  $("#direccion").val(direccion);
               var telefono =  datos_usuario[i].telefono;
                  $("#telefono").val(telefono);
               var email =  datos_usuario[i].email;
                  $("#email").val(email);   
               var departamento =  datos_usuario[i].nivel_permisos;
                  $("#departamento").val(departamento);    
               var grupo_bodega =  datos_usuario[i].grupo_bodega;
                  $("#grupo_bodega").val(grupo_bodega);   
               var grupo_bodega_subgrupo =  datos_usuario[i].grupo_bodega_subgrupo;
                  $("#grupo_bodega_subgrupo").val(grupo_bodega_subgrupo);    
               var username =  datos_usuario[i].username;
                 $("#username").val(username); 
               var color =  datos_usuario[i].color;
                 $("#color").val(color); 
               var fecha_nacimiento =  datos_usuario[i].fecha_nacimiento;
                 $("#fecha_nacimiento").val(fecha_nacimiento); 
               var genero =  datos_usuario[i].genero;
                 $("#genero").val(genero);
               var estado_civil =  datos_usuario[i].estado_civil;
                 $("#estado_civil").val(estado_civil); 
               var escolaridad =  datos_usuario[i].escolaridad;
                 $("#escolaridad").val(escolaridad);   
               var hijos =  datos_usuario[i].hijos;
                 $("#hijos").val(hijos);   
                     $.post('php/consulta_usuarios_documentos.php', {user_id: user_id}, function(data) {
                        $("#documentos").html(data)
                      }); 

               var emer_nombre =  datos_usuario[i].emer_nombre;
                 $("#emer_nombre").val(emer_nombre);
               var emer_telefono =  datos_usuario[i].emer_telefono;
                 $("#emer_telefono").val(emer_telefono);  
               var emer_celular =  datos_usuario[i].emer_celular;
                 $("#emer_celular").val(emer_celular);  
               var alergias =  datos_usuario[i].alergias;
                 $("#alergias").val(alergias);              
               var medicamentos =  datos_usuario[i].medicamentos;
                 $("#medicamentos").val(medicamentos); 
               var enfermedades =  datos_usuario[i].enfermedades;
                 $("#enfermedades").val(enfermedades); 
               var area =  datos_usuario[i].area;
                 $("#area").val(area);
               var t_vinculacion =  datos_usuario[i].t_vinculacion;
                 $("#t_vinculacion").val(t_vinculacion); 
               var comentarios =  datos_usuario[i].comentarios;
                 $("#textarea").val(comentarios);
               var talla_botas =  datos_usuario[i].talla_botas;
                 $("#talla_botas").val(talla_botas);
               var talla_camisa =  datos_usuario[i].talla_camisa;
                 $("#talla_camisa").val(talla_camisa);
               var talla_pantalon =  datos_usuario[i].talla_pantalon;
                 $("#talla_pantalon").val(talla_pantalon);


               var cargo =  datos_usuario[i].cargo;

               var fecha_vinculacion =  datos_usuario[i].fecha_vinculacion;
                 $("#fecha_vinculacion").val(fecha_vinculacion); 

                     $.post('php/consulta_cargo.php', {cargo: area}, function(data) {
                        $('#cargos').html(data);    
                        $("#cargos").val(cargo);  
                        $(".loader").fadeOut("slow"); 
                      });  
              
                var eps =  datos_usuario[i].eps;
                var arl =  datos_usuario[i].arl; 
                var afp =  datos_usuario[i].afp;  
                    
                $.post('php/consulta_salud.php', {EPS: 'eps'}, function(data) {
                        $('#eps').html(data);    
                        $("#eps").val(eps);   
                      });
                $.post('php/consulta_salud.php', {ARL: 'arl'}, function(data) {
                        $('#arl').html(data);    
                        $("#arl").val(arl);   
                      });
                $.post('php/consulta_salud.php', {AFP: 'afp'}, function(data) {
                        $('#afp').html(data);    
                        $("#afp").val(afp);   
                      });
                    
                  


          }
          
}
//Funcion de organizar datos usuario

//Funcion muestra un select al lado de cada Archivo con los tipos de documento

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
//Funcion muestra un select al lado de cada Archivo con los tipos de documento