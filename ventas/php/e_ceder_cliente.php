<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}

 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

?>

<?php	
	if (isset($_REQUEST['cardcode'])) {

		//insertar datos en la BD
			//variables
				$user_id_origen = $_SESSION["user_id"];
				$cardcode = $_REQUEST['cardcode'];
				$user_id_destino = $_REQUEST['user_id_destino'];
				date_default_timezone_set('America/Bogota');
				$fecha = date("Y-m-d H:i:s");
			//variables

			  $insert_cliente = new Conexion ;
	 		  $acentos = $insert_cliente->query("SET NAMES 'utf8'");
	 		  $sql01 = "INSERT INTO intranet_transmitir_cliente (user_id_origen, cardcode, user_id_destino, fecha) VALUES ( \"$user_id_origen\",\"$cardcode\",\"$user_id_destino\",\"$fecha\")";
	 		  $insert = $insert_cliente->query($sql01) or trigger_error($insert_cliente->error);

		//insertar datos en la BD
		
		echo true;

	}else{

		echo false;
	}
?>