<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>




<?php 
include_once('class.conexion.php');
	
if (isset($_REQUEST['user_id'])) {
		$user_id = $_REQUEST['user_id'];
		$usuarios_editar = new conexion;
		$sql = "SELECT * FROM intranet_usuarios iu INNER JOIN intranet_usuarios_sociodemografico ius ON iu.id = ius.user_id  WHERE iu.id = '$user_id'";
		$rusuario = $usuarios_editar->query($sql) or trigger_error($usuarios_editar->error);
		$Nrusuario = $rusuario->num_rows;

		if ($Nrusuario > 0) { 

			while ($r=$rusuario->fetch_array()) {
				$arreglo[] = array_map('utf8_encode', $r);

			}
			echo json_encode($arreglo);
						          	
		}else{
		 echo 0; 
		}	
}
		


 ?>