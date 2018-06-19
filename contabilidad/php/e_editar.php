<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}

	



?>

<?php 
  if (!isset($_REQUEST['cardcode']) || $_REQUEST['cardcode'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='../contacts.php';</script>";
  }
 ?>

<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php

if (isset($_REQUEST)) {

	 $fecha = $_REQUEST['fecha'];
	 $ip = $_REQUEST['ip'];
	 $navegador = $_REQUEST['navegador'];
	 $cardname = $_REQUEST['cardname'];
	 $cardname = strtoupper($cardname);
	 $cardcode = $_REQUEST['cardcode'];
	 $cardcode = strtoupper($cardcode);
	 $persona_contacto = $_REQUEST['persona_contacto'];
	 $persona_contacto = strtoupper($persona_contacto);
	 $ciudad_new = $_REQUEST['ciudad_new'];
	 $direccion = $_REQUEST['direccion'];
	 $telefono = $_REQUEST['telefono'];
	 $movil_new = $_REQUEST['movil_new'];
	 $email_new = $_REQUEST['email_new'];
	 $sector = $_REQUEST['sector'];
	 $comentarios = $_REQUEST['comentarios'];
	 $forma_pago = $_REQUEST['forma_pago'];
	 $user_id = $_REQUEST['id'];
	 $paginaweb = $_REQUEST['paginaweb'];


//Insertar Cliente en la base de datos actualizacion
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "UPDATE intranet_actualizacion_clientes SET fecha = \"$fecha\", ip =\"$ip\", navegador =\"$navegador\", persona_contacto = \"$persona_contacto\", ciudad_new = \"$ciudad_new\", direccion = \"$direccion\", telefono = \"$telefono\", movil_new = \"$movil_new\", email_new = \"$email_new\", sector = \"$sector\", comentarios = \"$cardcode\", forma_pago = \"$forma_pago\", paginaweb = \"$paginaweb\",activo = 'si',user_id = \"$user_id\" WHERE cardcode = \"$cardcode\"";
	
	$insert = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert) {
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
	}

//Insertar Cliente en la base de datos actualizacion




}

?>

<?php   
  
//reenvio de pagina
			echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			echo '<title>Registro de fallas</title>';
			echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');document.location=('../profile.php?cardcode=$cardcode');</SCRIPT>";  
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';

 ?>