<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}

?>

<?php	
if (isset($_REQUEST['cardcode']) && $_REQUEST['cardcode'] != '') {
	//librerias
		
		  include_once('class.conexion.php');
 		  header("Content-Type: text/html;charset=utf-8");

	//librerias
 		   //insertar comentarios

 		  $cardcode =  $_REQUEST['cardcode'];
 		  $fecha = $_REQUEST['fecha'];
 		  $comentarios = $_REQUEST['comentarios'];
 		  $user_id = $_SESSION["user_id"];

 		  	if ($comentarios != '') {

 		  		$Contarletras = strlen($comentarios);

 		  		if ($Contarletras >= 140) {
 		  			
 		  		 		  $inserar_comentarios = new Conexion ;
				 		  $acentos = $inserar_comentarios->query("SET NAMES 'utf8'");
				 		  $sql01 = "INSERT INTO intranet_actualizacion_clientes_comentarios (user_id,cardcode,comentarios,fecha,tarea) VALUES ( \"$user_id\",\"$cardcode\",\"$comentarios\",\"$fecha\",1)";
				 		  $insert = $inserar_comentarios->query($sql01) or trigger_error($inserar_comentarios->error);

				 		  //actulizar tarea en cliente

   		  		 		  $cliente = new Conexion ;
				 		  $acentos = $cliente->query("SET NAMES 'utf8'");
				 		  $sql01 = "UPDATE intranet_actualizacion_clientes SET tarea = 1 WHERE cardcode = \"$cardcode\"";
				 		  $insert01 = $cliente->query($sql01) or trigger_error($cliente->error);

				 		  //actulizar tarea en cliente


				echo true;
 		  		}
 		  		

	
 		  	}else{

 		  		echo false;
 		  	}


}else{

	echo false;
}
?>