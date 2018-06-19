<?php 

	if (isset($_REQUEST['prueba'])) {

		$pedido = $_REQUEST['prueba'];
			include_once('class.conexion.php');

				//traer pedidos			
				  $pedidos = new Conexion;
				  $sql01 = "SELECT COUNT(numero_pedido) as numero_pedido FROM intranet_registro_pedido WHERE numero_pedido = \"$pedido\"";
				  $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
				  $pedidos->close();
				  $r=$Rpedidos->fetch_array();
				  $Npedidos = $r['numero_pedido'];
				//traer pedidos
				  if ($Npedidos >= 1) {
				  	echo true;
				  }
  

	}else{
	echo false;
	}
  

 ?>