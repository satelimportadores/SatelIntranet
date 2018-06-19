<?php 
include('class.conexion.php');

	if (isset($_REQUEST['ref'])){
		$ref = $_REQUEST['ref'];
		$inventario = new Conexion;
		$query = "SELECT * from intranet_souvenir_inventario where referencia = '$ref'";
		$Rinventario = $inventario->query($query) or trigger_error($inventario->error);
		$inventario->close();
		while ($row = $Rinventario->fetch_array()) {
		echo "<input type='radio' name='tipo' value='".$row['id']."' required>".'<b> Tipo: </b>'.$row['descripcion'].'<b> Color: </b>'.$row['color'].'<b> Estado: </b>'.$row['estado'].'<b> Cantidad: </b>'.$row['cantidad'].'<br>';
		};
		
	}

 ?>