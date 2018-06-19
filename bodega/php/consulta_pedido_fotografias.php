<?php 
//traer imagenes de un pedido
include_once('class.conexion.php');

  if (isset($_REQUEST['numero_pedido'])) {
     $numero_pedido = $_REQUEST['numero_pedido'];

      $imagen = new Conexion;
		 $sql01 = "SELECT * FROM intranet_registro_pedido_imagenes WHERE numero_pedido = \"$numero_pedido\" AND nombre_imagen <> ''";
		 $Rimagen = $imagen->query($sql01) or trigger_error($imagen->error);
		 $total_registros = $imagen->affected_rows;

		 $imagen->close();

    	if ($total_registros > 0) {
    				echo"  <div class='row'>";

					    while ( $r=$Rimagen->fetch_array()) {
								
								echo"	<div class='col-sm-6 col-md-4'>";
								echo"	  <div class='thumbnail'>";
								echo"          <a target='_blank' href='fotos_pedidos/$r[nombre_imagen]'><img src='fotos_pedidos/$r[nombre_imagen]' alt='$r[nombre_imagen]'></a>";
								echo"		<div class='caption'>";
								echo"		  <h3>$r[nombre_imagen]</h3>";
								echo"		</div>";
								echo"	  </div>";
								echo"	</div>";
								
					    }
    				echo"   </div>";
    	}else{

		    echo"  <div class='row'>";
		    	echo "<span class='red'>No existen imagenes para el pedido: </span><span class='green'>$numero_pedido</span>";
   			echo"   </div>";
		   	 }

    


  }





//traer imagenes de un pedido

?>