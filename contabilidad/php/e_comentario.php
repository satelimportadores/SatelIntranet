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

	 $cardcode = $_REQUEST['cardcode'];
	 $cardcode = strtoupper($cardcode);
	 
	 $comentarios = $_REQUEST['comentarios'];
	 
	 $user_id = $_SESSION["user_id"];


	

	 	if (isset($_REQUEST['destinatario'])) {
	 		//echo $_REQUEST['destinatario'];
	 		$destinatario = $_REQUEST['destinatario'];
	 	}else{
	 		$destinatario = '';
	 	}
	 

	 		 //datos adjuntos

  //Subir Fichero
  
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
               foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


if ($_FILES['file']) { 
    $uploads_dir = '../uploads/';
    $file_ary = reArrayFiles($_FILES['file']);

  
  
    foreach ($file_ary as $file) {
       // print 'Nombre: ' . $file['name'];
       // print 'Tipo: ' . $file['type'];
       // print 'Tamaño: ' . $file['size'];
    
    
    $fichero_subido = $uploads_dir . $cardcode .'_'. $file['name'];

    if ($file['name'] == '') {
    $f_nombres = '';
    }else{
    $f_nombres = $cardcode .'_'. $file['name'];
    }


    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

  }

	 //datos adjuntos



	//insertar comentario en la base de datos
	date_default_timezone_set('America/Bogota');
	$fechacomentario = date("Y-m-d H:i:s");

	$comentarios_clientes = new Conexion ;
	$acentos = $comentarios_clientes->query("SET NAMES 'utf8'");
	$sql02 = "INSERT INTO intranet_actualizacion_clientes_comentarios (user_id,cardcode,comentarios,fecha,destinatario,n_adjunto) VALUES ( \"$user_id\",\"$cardcode\",\"$comentarios\",\"$fechacomentario\",\"$destinatario\",\"$f_nombres\")";

	$insert02 = $comentarios_clientes->query($sql02) or trigger_error($comentarios_clientes->error);
	if ($insert02) {
			//echo "Success! Row ID: {$comentarios_clientes->insert_id}";
			$comentarios_clientes->close();
			unset($fechacomentario);
			unset($sql02);
			unset($insert02);
						echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			echo '<title>Registro de fallas</title>';
			print "<script>window.location='../profile.php?cardcode=$cardcode';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';
	}
	//insertar comentario en la base de datos


}

?>