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

if (isset($_REQUEST)) {

$a_injusti = $_REQUEST['a_injusti'];
$comercial = $_REQUEST['comercial'];
$fecha = $_REQUEST['fecha'];
$gm = $_REQUEST['gm'];
$gr = $_REQUEST['gr'];
$ll_tarde = $_REQUEST['ll_tarde'];
$lm = $_REQUEST['lm'];
$lr = $_REQUEST['lr'];
$vm = $_REQUEST['vm'];
$vr = $_REQUEST['vr'];

	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "INSERT INTO intranet_vendedor_mes (a_injusti, comercial, fecha, gm, gr, ll_tarde, lm, lr, vm,vr) VALUES ( \"$a_injusti\",\"$comercial\",\"$fecha\",\"$gm\",\"$gr\",\"$ll_tarde\",\"$lm\",\"$lr\",\"$vm\",\"$vr\")";

	$insert01 = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert01) {
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
	}
//Insertar cliente en la base de datos



			echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			echo '<title>Registro de fallas</title>';
			print "<script>alert(\"Datos ingresados!\");window.location='../index.php';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';


}

?>