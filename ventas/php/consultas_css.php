<?php 
include_once('class.conexion.php');
						//traer consulta CSS			
						  $con_css01 = new Conexion;
						  $sql01 = "SELECT activo FROM intranet_css_autorizaciones WHERE nombre = 'precios_ventas'";
						  $Rcon_css01 = $con_css01->query($sql01) or trigger_error($con_css01->error);
						  $con_css01->close();
						  $r=$Rcon_css01->fetch_array();
						  $precios_ventas = $r['activo'];
						//traer consulta CSS
						  

?>