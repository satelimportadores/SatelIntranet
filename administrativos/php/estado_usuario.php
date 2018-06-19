<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}
?>



<?php 
	
	if (isset($_REQUEST['accion'])) {
		$accion = $_REQUEST['accion'];
		$user_id = $_REQUEST['user_id'];

		//Actualizar tabla usuarios

 include_once('class.conexion.php');



	$act_usuario = new Conexion ;
	$acentos = $act_usuario->query("SET NAMES 'utf8'");
	if ($accion == 'des') {
		$sql01 = "UPDATE intranet_usuarios SET activo = NULL WHERE id = \"$user_id\"";
	}
	if ($accion == 'act') {
		$sql01 = "UPDATE intranet_usuarios SET activo = 1 WHERE id = \"$user_id\"";
	}
	
	
	$insert = $act_usuario->query($sql01) or trigger_error($act_usuario->error);

	if ($insert) {
			echo true;
			$act_usuario->close();
	}


		//Actualizar tabla usuarios


	}else{
		echo false;
	}



 ?>