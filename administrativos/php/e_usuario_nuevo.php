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
			print "<script>window.location='../usuarios_resumen.php';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';

	} 
?>
<?php 
  if (!isset($_REQUEST['numero_identificacion']) || $_REQUEST['numero_identificacion'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='../contacts.php';</script>";
  }
 ?>


<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php

if (isset($_REQUEST)) {

	 $apellido = strtoupper ($_REQUEST['apellido']);
	 $ciudad = $_REQUEST['ciudad'];
	 $comentarios = $_REQUEST['comentarios'];
	 $departamento = $_REQUEST['departamento'];
	 $direccion = $_REQUEST['direccion'];
	 $email = $_REQUEST['email'];
	 $fecha = $_REQUEST['fecha'];
	 $grupo_bodega = $_REQUEST['grupo_bodega'];
	 $grupo_bodega_subgrupo = $_REQUEST['grupo_bodega_subgrupo'];
	 $ip = $_REQUEST['ip'];
	 $navegador = $_REQUEST['navegador'];
	 $nombre = strtoupper ($_REQUEST['nombre']);
	 $numero_identificacion = $_REQUEST['numero_identificacion'];
	 $rh = $_REQUEST['rh'];
	 $password = md5($_REQUEST['password']);
	 $t_identificacion = $_REQUEST['t_identificacion'];
	 $telefono = $_REQUEST['telefono'];
	 $color = '#'.$_REQUEST['color'];


			 if ($grupo_bodega == 1) {
			 	$bodega_revision = 1;
			 }else{
			 	$bodega_revision = 0;
			 }

			 if ($departamento == 3) {
			 	$grupo_ventas_subgrupo = 'asesores';
			 }else{
			 	$grupo_ventas_subgrupo = '';
			 }




	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "INSERT INTO intranet_usuarios (apellido, ciudad, comentarios, nivel_permisos, direccion, email, fecha, grupo_bodega, grupo_bodega_subgrupo, ip, navegador, nombre, cedula, password, t_identificacion, telefono, username, activo, grupo_ventas_subgrupo, color, colorhex,bodega_revision,rh)	VALUES ( \"$apellido\",\"$ciudad\",\"$comentarios\",\"$departamento\",\"$direccion\",\"$email\",\"$fecha\",\"$grupo_bodega\",\"$grupo_bodega_subgrupo\",\"$ip\",\"$navegador\",\"$nombre\",\"$numero_identificacion\",\"$password\",\"$t_identificacion\",\"$telefono\", \"$nombre\",1,\"$grupo_ventas_subgrupo\",\"$color\",\"$color\",\"$bodega_revision\",\"$rh\")";

	$insert01 = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert01) {
			$user_id = $registro_clientes->insert_id;
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
			print "<script>alert(\"Usuario Creado!\");</script>";
	}
//Insertar cliente en la base de datos


//insertar datos en tabla intranet_usuarios_sociodemografico///////////////////////////////////////////

$afp = $_REQUEST['afp']; 
$alergias = $_REQUEST['alergias']; 
$arl = $_REQUEST['arl'];
$area = $_REQUEST['area']; 
$cargo = $_REQUEST['cargo']; 
$emer_celular = $_REQUEST['emer_celular']; 
$emer_nombre = $_REQUEST['emer_nombre']; 
$emer_telefono = $_REQUEST['emer_telefono']; 
$enfermedades = $_REQUEST['enfermedades'];
$eps = $_REQUEST['eps']; 
$escolaridad = $_REQUEST['escolaridad']; 
$estado_civil = $_REQUEST['estado_civil']; 
$fecha_nacimiento = $_REQUEST['fecha_nacimiento']; 
$fecha_vinculacion = $_REQUEST['fecha_vinculacion']; 
$genero = $_REQUEST['genero']; 
$hijos = $_REQUEST['hijos']; 
$medicamentos = $_REQUEST['medicamentos']; 
$t_vinculacion = $_REQUEST['t_vinculacion'];
$talla_botas  = $_REQUEST['talla_botas'];
$talla_pantalon = $_REQUEST['talla_pantalon'];
$talla_camisa = $_REQUEST['talla_camisa'];
$sql02 = "";

//datos adjuntos hoja de vida 

$demograficos = new Conexion ;
	$acentos = $demograficos->query("SET NAMES 'utf8'");
	$num = $_REQUEST['cant_files'];
		$nom = $_REQUEST['nombre'];
		for ($i=0; $i < $num ; $i++) { 

		$tmpFilePath = $_FILES['file']['tmp_name'][$i];
  			//Make sure we have a filepath
		  if ($tmpFilePath != ""){
		    //Setup our new file path
		    	 $type_document = $_REQUEST[$i]; 
		    	 $destino = "../archivos/$type_document/";
			     $file_name = $_FILES['file']['name'][$i];
			     $sql02 .= "INSERT INTO intranet_usuarios_documentos (user_id, nombre_adjunto, tipo_documento, fecha) VALUES ($user_id,'$file_name','$type_document','$fecha');";
			     move_uploaded_file($tmpFilePath, $destino.$file_name);
			    //Upload the file into the temp dir
			   
			}
		}


//datos adjuntos fotografias

  	//Insertar datos demograficos en la base de datos
	

	$sql01 = "INSERT INTO intranet_usuarios_sociodemografico (talla_botas, talla_pantalon, talla_camisa, afp ,alergias ,arl ,cargo ,emer_celular ,emer_nombre ,emer_telefono ,enfermedades ,eps ,escolaridad ,estado_civil ,fecha_nacimiento ,fecha_vinculacion ,genero ,hijos ,medicamentos ,t_vinculacion,user_id,area)	VALUES (\"$talla_botas\",\"$talla_pantalon\",\"$talla_camisa\", \"$afp\", \"$alergias\", \"$arl\", \"$cargo\", \"$emer_celular\", \"$emer_nombre\", \"$emer_telefono\", \"$enfermedades\", \"$eps\", \"$escolaridad\", \"$estado_civil\", \"$fecha_nacimiento\", \"$fecha_vinculacion \", \"$genero\", \"$hijos\", \"$medicamentos\", \"$t_vinculacion\",\"$user_id\",\"$area\")";

	$insert01 = $demograficos->query($sql01) or trigger_error($demograficos->error);

	if ($insert01) {
			//echo "Success! Row ID: {$demograficos->insert_id}";
			$insert02 = $demograficos->multi_query($sql02) or trigger_error($demograficos->error);

			$demograficos->close();
			//print "<script>alert(\"Usuario Creado!\");</script>";
	}
//Insertar datos demograficos en la base de datos



//insertar datos en tabla intranet_usuarios_sociodemografico///////////////////////////////////////////

  reenvio();

}

?>