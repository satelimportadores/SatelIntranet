<?php 
include('class.conexion.php');

	if (isset($_REQUEST['ref'])){
		$ref = $_REQUEST['ref'];
		$inventario = new Conexion;
		$query = "SELECT descripcion, cantidad, talla, estado from intranet_dotaciones_inventario where referencia = '$ref'";
		$Rinventario = $inventario->query($query) or trigger_error($inventario->error);
		$inventario->close();
		while ($row = $Rinventario->fetch_array()) {
		echo "<input type='radio' name='tipo' value='".$row['descripcion']."' required>".'<b> Tipo: </b>'.$row['descripcion'].'<b> Talla: </b>'.$row['talla'].'<b> Estado: </b>'.$row['estado'].'<b> Cantidad: </b>'.$row['cantidad'].'<br>';
		};
		
	}
	if (isset($_REQUEST['carga'])){
		$inventario = new Conexion;
		$query = "SELECT distinct referencia from intranet_dotaciones_inventario";
		$Rinventario = $inventario->query($query) or trigger_error($inventario->error);
		$inventario->close();
		echo "<option value=''>Seleccione...</option>";
		while ($row = $Rinventario->fetch_array()) {
		echo "<option value='$row[referencia]'>$row[referencia] </option>";
		}
		
	}
 ?>