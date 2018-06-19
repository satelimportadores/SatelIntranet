<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}
?>

<?php
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 



		
	if (isset($_REQUEST['id']) && isset($_REQUEST['estado'])) {

		 include_once('class.conexion.php');

		$id = $_REQUEST['id'];
		$estado = $_REQUEST['estado'];

		if ($estado == 1) {
				
				//Actualizar estado 1
				$actcss = new Conexion ;
				$acentos = $actcss->query("SET NAMES 'utf8'");
				$sql01 = "UPDATE intranet_css_autorizaciones SET activo = 0 WHERE id = \"$id\"";
				$insert01 = $actcss->query($sql01) or trigger_error($actcss->error);
				//Actualizar estado 1
		}else{
				//Actualizar estado distinto
				$actcss = new Conexion ;
				$acentos = $actcss->query("SET NAMES 'utf8'");
				$sql01 = "UPDATE intranet_css_autorizaciones SET activo = 1 WHERE id = \"$id\"";
				$insert01 = $actcss->query($sql01) or trigger_error($actcss->error);
				//Actualizar estado distinto

		}

	}






?>