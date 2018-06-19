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
	 $persona_contacto = $_REQUEST['persona_contacto'];
	 $persona_contacto = strtoupper($persona_contacto);
	 $ciudad_new = $_REQUEST['ciudad_new'];
	 $direccion = $_REQUEST['direccion'];
	 $direccion = strtoupper($direccion);
	 $telefono = $_REQUEST['telefono'];
	 $movil_new = $_REQUEST['movil_new'];
	 $email_new = $_REQUEST['email_new'];
	 $sector = $_REQUEST['sector'];
	 
	 $forma_pago = $_REQUEST['forma_pago'];
	 $user_id = $_REQUEST['id'];
	 $paginaweb = $_REQUEST['paginaweb'];


				//buscar cliente en la base de datos
						$cliente = new Conexion;
						$sql01 = "SELECT COUNT(*) as cant FROM intranet_actualizacion_clientes WHERE cardcode = \"$cardcode\"";
						$clientes = $cliente->query($sql01) or trigger_error($cliente->error);

                        $s=$clientes->fetch_array();
                        $Nclientes = $s['cant'];

						if ($Nclientes >= 1) {
							print "<script>alert(\"Ya existe un cliente con ese código cliente!\");window.location='../profile.php?cardcode=$cardcode';</script>";
							$cliente->close();
						}

				//buscar cliente en la base de datos

if ($Nclientes == 0) {
	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "INSERT INTO intranet_actualizacion_clientes (fecha,ip,navegador,cardname,cardcode,persona_contacto,ciudad_new,direccion,telefono,movil_new,email_new,sector,comentarios,forma_pago,user_id,paginaweb) VALUES ( \"$fecha\",\"$ip\",\"$navegador\",\"$cardname\",\"$cardcode\",\"$persona_contacto\",\"$ciudad_new\",\"$direccion\",\"$telefono\",\"$movil_new\",\"$email_new\",\"$sector\",\"$cardcode\",\"$forma_pago\",\"$user_id\",\"$paginaweb\")";

	$insert01 = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert01) {
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
	}
//Insertar cliente en la base de datos

}

			echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			echo '<title>Registro de fallas</title>';
			print "<script>alert(\"Cliente creado!\");window.location='../profile.php?cardcode=$cardcode';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';


}

?>