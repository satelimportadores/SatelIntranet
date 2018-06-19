$(document).ready(function() {
	
        esconder();

      $(".select2_single").select2({
        placeholder: "Seleccione # pedido"
      });
      $(".select2_single01").select2({
        placeholder: "Seleccione zona de despacho"
      });
      $(".select2_single02").select2({
        placeholder: "Selecciones encargado de alistamiento"
      });
      $(".select2_single03").select2({
        placeholder: "Selecciones encargado de revisión"
      });
      $(".select2_single04").select2({
        placeholder: "Selecciones tipo de memorando"
      });
      $(".select2_single05").select2({
        placeholder: "Selecciones un medio de transporte"
      });

      $( "#zona" ).change(function() {
		   zona = $('#zona').val();
		     if (zona == 'TRANSPORTADORA') {
		   		$("#medio_transporte").append($('<option  value="transportadora" id="transportadora" selected="selected">Transportadora</option>'));
		   		$("#medio_transporte_div").hide();
		   } else{
				$("#medio_transporte_div").show();
				$("#transportadora").remove();
		   };
		   
	 });


});

//esconder divs de tipos de memorandos
	function esconder(){
		  document.getElementById('mostrar01').style.display="none";
		  document.getElementById('mostrar02').style.display="none";
		  document.getElementById('mostrar03').style.display="none";
		  document.getElementById('mostrar04').style.display="none";
		  document.getElementById('medio_transporte').style.display="none";
        }

//esconder divs de tipos de memorandos	

	//Tipos de memorandos
		function mostrar(){
			  var myselect = document.getElementById("memorando");
			  var myvalue = myselect.options[myselect.selectedIndex].value;
			  
			  switch (myvalue)
			            {
			               case '1': 
			         
			  document.getElementById('mostrar01').style.display="block";
			  document.getElementById('mostrar02').style.display="none";
			  document.getElementById('mostrar03').style.display="none";
			  document.getElementById('mostrar04').style.display="none";
			           
			               break;
			            
			               case "2":
			  
			  document.getElementById('mostrar02').style.display="block";
			  document.getElementById('mostrar01').style.display="none";
			  document.getElementById('mostrar03').style.display="none";
			  document.getElementById('mostrar04').style.display="none";

			         
			               break;
			            
			               case '3':
			        
			  document.getElementById('mostrar03').style.display="block";
			  document.getElementById('mostrar02').style.display="none";
			  document.getElementById('mostrar01').style.display="none";
			  document.getElementById('mostrar04').style.display="none";
			        
			               break;
			            
			               case '4':
			  document.getElementById('mostrar04').style.display="block";
			  document.getElementById('mostrar02').style.display="none";
			  document.getElementById('mostrar03').style.display="none";
			  document.getElementById('mostrar01').style.display="none";
			               break;
			           
			        default:
			            
			          esconder();
			          break;
			            }
			  
			}
	//Tipos de memorandos	