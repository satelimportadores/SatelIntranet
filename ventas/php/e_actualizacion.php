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
	 $ciudad_new = strtoupper($ciudad_new);
	 $direccion = $_REQUEST['direccion'];
	 $direccion = strtoupper($direccion);
	 $telefono = $_REQUEST['telefono'];
	 $movil_new = $_REQUEST['movil_new'];
	 $email_new = $_REQUEST['email_new'];
	 $sector = $_REQUEST['sector'];
	 $comentarios = $_REQUEST['comentarios'];
	 $forma_pago = $_REQUEST['forma_pago'];
	 $user_id = $_SESSION["user_id"];
	 $paginaweb = $_REQUEST['paginaweb'];

//Insertar Cliente en la base de datos actualizacion
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "UPDATE intranet_actualizacion_clientes SET fecha = \"$fecha\", ip =\"$ip\", navegador =\"$navegador\", persona_contacto = \"$persona_contacto\", ciudad_new = \"$ciudad_new\", direccion = \"$direccion\", telefono = \"$telefono\", movil_new = \"$movil_new\", email_new = \"$email_new\", sector = \"$sector\", comentarios = \"$cardcode\", forma_pago = \"$forma_pago\", paginaweb = \"$paginaweb\",activo = '' WHERE cardcode = \"$cardcode\"";
	
	$insert = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert) {
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
	}

//Insertar Cliente en la base de datos actualizacion


	//insertar comentario en la base de datos
	date_default_timezone_set('America/Bogota');
	$fechacomentario = date("Y-m-d H:i:s");

	$comentarios_clientes = new Conexion ;
	$acentos = $comentarios_clientes->query("SET NAMES 'utf8'");
	$sql02 = "INSERT INTO intranet_actualizacion_clientes_comentarios (user_id,cardcode,comentarios,fecha) VALUES ( \"$user_id\",\"$cardcode\",\"$comentarios\",\"$fechacomentario\")";

	$insert02 = $comentarios_clientes->query($sql02) or trigger_error($comentarios_clientes->error);
	if ($insert02) {
			//echo "Success! Row ID: {$comentarios_clientes->insert_id}";
			$comentarios_clientes->close();
	}
	//insertar comentario en la base de datos
		    //reenvio de pagina
    
            echo '<!DOCTYPE html>';
            echo '<html lang="es">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<title>Registro de fallas</title>';
			print "<script>alert(\"Registro actualizado!\");window.location='../profile.php?cardcode=$cardcode';</script>";
            echo '</head>';
            echo '<body>';
            echo '</body>';
            echo '</html>';

}

?>