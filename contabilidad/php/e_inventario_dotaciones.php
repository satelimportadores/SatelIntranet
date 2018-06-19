<?php 
if (isset($_REQUEST['enviar'])) {
	$descripcion = $_REQUEST['tipo'];
	$referencia = $_REQUEST['lista'];
	$num = $_REQUEST['num'];
	$inventario = new Conexion;
	$query = "UPDATE intranet_dotaciones_inventario SET cantidad = cantidad+$num WHERE referencia = '$referencia' && descripcion = '$descripcion'";
	$result = $inventario->query($query) or trigger_error($inventario->error);
	$inventario->close();
	?>
	<script> alert("Datos Actualizados")</script>
	<?php 
}

if (isset($_REQUEST['restar'])) {
	$descripcion = $_REQUEST['tipo'];
	$referencia = $_REQUEST['lista'];
	$num = $_REQUEST['num'];
	$inventario = new Conexion;
	$query = "SELECT cantidad from intranet_dotaciones_inventario where referencia = '$referencia' && descripcion = '$descripcion'";
	$result = $inventario->query($query) or trigger_error($inventario->error);
	$row = $result->fetch_array();
	$num2 = $row[0];
	if ($num > $num2) {
	?>
	<script> alert("No hay suficientes productos en stock")</script>
	<?php 
	}else{
	$query = "UPDATE intranet_dotaciones_inventario SET cantidad = cantidad-$num WHERE referencia = '$referencia' && descripcion = '$descripcion'";
	$inventario->query($query) or trigger_error($inventario->error);
	$inventario->close();
	?>
	<script> alert("Datos Actualizados")</script>
	<?php 
	}
}

if (isset($_REQUEST['envio'])) {
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d H:i:s");

	//$fecha = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
	$ref = $_REQUEST['ref'];
	$des = $_REQUEST['des'];
	$can = $_REQUEST['can'];
	$tal = $_REQUEST['tal'];
	$est = $_REQUEST['estado'];
	$inventario = new Conexion;
	$query = "INSERT INTO intranet_dotaciones_inventario(referencia, descripcion, cantidad, talla, fecha, estado) VALUES ('$ref','$des',$can,'$tal','$fecha','$est')";
	$inventario->query($query) or trigger_error($inventario->error);
	$inventario->close();
	?>
	<script> alert("Datos Añadidos")</script>
	<?php 
}
 ?>