<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}
?>



<?php 
	
	if (isset($_REQUEST['user_id'])) {
		$user_id = $_REQUEST['user_id'];

		//Actualizar tabla clientes tareas

 include_once('class.conexion.php');



	$act_usuario = new Conexion ;
	$acentos = $act_usuario->query("SET NAMES 'utf8'");
	$sql01 = "UPDATE intranet_actualizacion_clientes SET tarea = null WHERE user_id = \"$user_id\" AND tarea = 1";
	
	
	$insert = $act_usuario->query($sql01) or trigger_error($act_usuario->error);

	if ($insert) {
			echo true;
			$act_usuario->close();
	}


		//Actualizar tabla clientes tareas


	}else{
		echo false;
	}



 ?>