<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>

<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

 
<?php
 
$id = $_POST['id'];


 
	//Actualizar eventoo en la base de datos
	date_default_timezone_set('America/Bogota');

	$eventos = new Conexion ;
	$acentos = $eventos->query("SET NAMES 'utf8'");
	$sql02 = "DELETE FROM intranet_calendario WHERE id = \"$id\" ";
	

	$insert02 = $eventos->query($sql02) or trigger_error($eventos->error);
	if ($insert02) {
			//echo "Success! Row ID: {$eventos->insert_id}";
			
			$eventos->close();
	}
	//iActualizar evento en la base de datos

?>