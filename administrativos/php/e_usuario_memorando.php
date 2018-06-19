<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../../index.php';</script>";
}
 function reenvio(){
	//reenvio de pagina
	
			echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			echo '<title>Registro de fallas</title>';
			print "<script>window.location='../usuarios_memorando_adjuntar.php';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';

	} 
?>



<?php

if (isset($_REQUEST)) {
	include_once('class.conexion.php');

	
	 $empleados =  $_REQUEST['empleados'];
	 $fecha = $_REQUEST['fecha'];
	 $fecha = date('Y-m-d', strtotime($fecha));
	 if ($_REQUEST['tipo_documento'] == 'otro') {
	 	$tipo_documento = strtoupper($_REQUEST['tipo_documento02']);
	 }else{
	 	$tipo_documento = strtoupper($_REQUEST['tipo_documento']);
	 }
	 
	 




//datos adjuntos hoja de vida 

$ruta_memo = '../usuarios_memorandos/'; //Decalaramos una variable con la ruta en donde almacenaremos los archivos

	$extension = end(explode(".", $_FILES['nadjunto']['name']));
	$NombreOri = $_FILES['nadjunto']['name'];//Obtenemos el nombre original del archivo
	$temporalFoto = $_FILES['nadjunto']['tmp_name']; //Obtenemos la ruta Original del archivo
	$NombreFoto = $ruta_memo.$tipo_documento.'-ID-'.$empleados.'.'.$extension;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
	$NombreFotoSQL = $tipo_documento.'-ID-'.$empleados.'.'.$extension;
	move_uploaded_file($temporalFoto, $NombreFoto); //Movemos el archivo temporal a la ruta especificada



  	//Insertar documentos en la base de datos

	
	if ($empleados == 'todos') {
						//si el documento va para todos
		//Consulta para todos añadiendo el 'Todos'
				         $consulta = new Conexion;
				         $sql01 = "SELECT id FROM intranet_usuarios WHERE activo = 1";
				         $Rconsulta = $consulta->query($sql01) or trigger_error($consulta->error);
				             
				     while ($s = $Rconsulta->fetch_array()) {
				     		$todos = $s['id'];
				     			 $sql02 = "INSERT INTO intranet_usuarios_documentos (user_id, nombre_adjunto, tipo_documento, fecha)	VALUES (\"$todos\", \"$NombreFotoSQL\", \"$tipo_documento\", \"$fecha\")";
									$consulta->query($sql02) or trigger_error($consulta->error);
				         }
				         $consulta->close();
        //si el documento va para todos
	}else{
			$docadj = new Conexion ;
			$acentos = $docadj->query("SET NAMES 'utf8'");
			$sql03 = "INSERT INTO intranet_usuarios_documentos (user_id, nombre_adjunto, tipo_documento, fecha)	VALUES (\"$empleados\", \"$NombreFotoSQL\", \"$tipo_documento\", \"$fecha\")";
			$docadj->query($sql03) or trigger_error($docadj->error);
			$docadj->close();

	}


  reenvio();

}

?>