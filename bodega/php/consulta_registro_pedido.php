<?php
//traer pedidos
 $pedidos = new Conexion;
 if (isset($_REQUEST['np'])) {
 	$np = $_REQUEST['np'];
 	$sql01 = "SELECT * FROM intranet_registro_pedido WHERE  (zona is NULL or zona = '') AND orden_compra = 0 AND numero_pedido = \"$np\"";
 }else{
 	$sql01 = "SELECT * FROM intranet_registro_pedido WHERE  (zona is NULL or zona = '') AND orden_compra = 0 ORDER BY numero_pedido ASC";	
 }
 
 $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
 $pedidos->close();
//traer pedidos

//traer zonas
 $zonas_despacho = new Conexion;
 $sql01 = "SELECT * FROM intranet_zonas_despacho ORDER BY zona ASC";
 $Rzonas_despacho = $zonas_despacho->query($sql01) or trigger_error($zonas_despacho->error);
 $zonas_despacho->close();
//traer zonas

 //traer alistamiento
 $encargado_alistamiento = new Conexion;
 $sql01 = "SELECT nombre,apellido from intranet_usuarios where grupo_bodega = 2 AND activo = 1 ORDER BY nombre ASC";
 $Rencargado_alistamiento = $encargado_alistamiento->query($sql01) or trigger_error($encargado_alistamiento->error);
 $encargado_alistamiento->close();
//traer alistamiento

  //traer revisión
 $encargado_revision = new Conexion;
 $sql01 = "SELECT nombre,apellido from intranet_usuarios where bodega_revision = 1 AND activo = 1 ORDER BY nombre ASC";
 $Rencargado_revision = $encargado_revision->query($sql01) or trigger_error($encargado_revision->error);
 $encargado_revision->close();
//traer revisión

  //traer tipos memorandos
 $memorandos = new Conexion;
 $sql01 = "SELECT * from intranet_memorandos ORDER BY titulo ASC";
 $Rmemorandos = $memorandos->query($sql01) or trigger_error($memorandos->error);
 $memorandos->close();
//traer tipos memorandos
 ?>