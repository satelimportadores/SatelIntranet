<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}
?>

<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 



		//si
	if (isset($_REQUEST['si'])) {
		
		$cardcode = $_REQUEST['cardcode'];
		$user_id = $_REQUEST['user_id_destino'];

			//Insertar Cliente en la base de datos actualizacion
				$act_cliente = new Conexion ;
				$acentos = $act_cliente->query("SET NAMES 'utf8'");
				$sql01 = "UPDATE intranet_actualizacion_clientes SET user_id = \"$user_id\" WHERE cardcode = \"$cardcode\"";
				
				$insert01 = $act_cliente->query($sql01) or trigger_error($act_cliente->error);

			//Insertar Cliente en la base de datos actualizacion
				$sql02 = "UPDATE intranet_transmitir_cliente SET transmitido = 1 WHERE cardcode = \"$cardcode\"";
				$insert02 = $act_cliente->query($sql02) or trigger_error($act_cliente->error);
				echo true;

	}

	//no

		if (isset($_REQUEST['no'])) {
		
		$cardcode = $_REQUEST['cardcode'];
		echo $cardcode;

			//Insertar Cliente en la base de datos actualizacion
				$act_cliente = new Conexion ;
				$acentos = $act_cliente->query("SET NAMES 'utf8'");
			//Insertar Cliente en la base de datos actualizacion
				$sql02 = "UPDATE intranet_transmitir_cliente SET transmitido = 1 WHERE cardcode = \"$cardcode\"";
				$insert02 = $act_cliente->query($sql02) or trigger_error($act_cliente->error);
				echo true;

	}





?>