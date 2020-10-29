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
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php

if (isset($_REQUEST)) {

	 $nombre = strtoupper ($_REQUEST['nombre']);
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
	 $numero_identificacion = $_REQUEST['numero_identificacion'];
	 $rh = $_REQUEST['rh'];
	 $t_identificacion = $_REQUEST['t_identificacion'];
	 $telefono = $_REQUEST['telefono'];
	 $username = $_REQUEST['username'];
	 
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

	$user_id = $_REQUEST['user_id'];
	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	if (isset($_REQUEST['password']) && $_REQUEST['password'] != '') {
		$password = md5($_REQUEST['password']);
		$sql01 = "UPDATE intranet_usuarios SET apellido = \"$apellido\", ciudad = \"$ciudad\", comentarios = \"$comentarios\", nivel_permisos = \"$departamento\", direccion = \"$direccion\", email = \"$email\", fecha = \"$fecha\", grupo_bodega = \"$grupo_bodega\", grupo_bodega_subgrupo = \"$grupo_bodega_subgrupo\", ip = \"$ip\", navegador = \"$navegador\", nombre = \"$nombre\", cedula = \"$numero_identificacion\", password = \"$password\", t_identificacion = \"$t_identificacion\", telefono = \"$telefono\", username = \"$username\", activo = 1, grupo_ventas_subgrupo = \"$grupo_ventas_subgrupo\", color = \"$color\", colorhex = \"$color\", bodega_revision = \"$bodega_revision\", rh = \"$rh\"	WHERE id = \"$user_id\"";
	}else{
		$sql01 = "UPDATE intranet_usuarios SET apellido = \"$apellido\", ciudad = \"$ciudad\", comentarios = \"$comentarios\", nivel_permisos = \"$departamento\", direccion = \"$direccion\", email = \"$email\", fecha = \"$fecha\", grupo_bodega = \"$grupo_bodega\", grupo_bodega_subgrupo = \"$grupo_bodega_subgrupo\", ip = \"$ip\", navegador = \"$navegador\", nombre = \"$nombre\", cedula = \"$numero_identificacion\", t_identificacion = \"$t_identificacion\", telefono = \"$telefono\", username = \"$username\", activo = 1, grupo_ventas_subgrupo = \"$grupo_ventas_subgrupo\", color = \"$color\", colorhex = \"$color\" , bodega_revision = \"$bodega_revision\", rh = \"$rh\"	WHERE id = \"$user_id\"";
	}
	
	

	$insert01 = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert01) {
			//$user_id = $registro_clientes->insert_id;
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
			//print "<script>alert(\"Usuario Editado!\");</script>";
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

	//verificar si exite o no el usuario en la tabla intranet_usuarios_sociodemografico
  	$verificar = new Conexion ;
	$sqlv = "SELECT * FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
	$Rverificar = $verificar->query($sqlv) or trigger_error($verificar->error);
	$Ncantidad = $Rverificar->num_rows;
		if ($Ncantidad > 0) {
			$sql01 = "UPDATE intranet_usuarios_sociodemografico SET talla_botas = \"$talla_botas\",talla_camisa = \"$talla_camisa\",talla_pantalon = \"$talla_pantalon\", afp =  \"$afp\",alergias =\"$alergias\" ,arl =\"$arl\" ,cargo = \"$cargo\",emer_celular =\"$emer_celular\" ,emer_nombre = \"$emer_nombre\",emer_telefono = \"$emer_telefono\",enfermedades = \"$enfermedades\",eps = \"$eps\",escolaridad = \"$escolaridad\",estado_civil = \"$estado_civil\",fecha_nacimiento = \"$fecha_nacimiento\",fecha_vinculacion =\"$fecha_vinculacion \" ,genero = \"$genero\",hijos = \"$hijos\",medicamentos = \"$medicamentos\",t_vinculacion = \"$t_vinculacion\",user_id = \"$user_id\",area = \"$area\" WHERE user_id = \"$user_id\"";
		}else{
			$sql01 = "INSERT INTO intranet_usuarios_sociodemografico (talla_botas, talla_pantalon, talla_camisa, afp ,alergias ,arl ,cargo ,emer_celular ,emer_nombre ,emer_telefono ,enfermedades ,eps ,escolaridad ,estado_civil ,fecha_nacimiento ,fecha_vinculacion ,genero ,hijos ,medicamentos ,t_vinculacion ,user_id ,area) VALUES ( \"$talla_botas\",\"$talla_pantalon\",\"$talla_camisa\", \"$afp\",\"$alergias\" ,\"$arl\" , \"$cargo\",\"$emer_celular\" , \"$emer_nombre\", \"$emer_telefono\", \"$enfermedades\", \"$eps\", \"$escolaridad\", \"$estado_civil\", \"$fecha_nacimiento\",\"$fecha_vinculacion \" , \"$genero\", \"$hijos\", \"$medicamentos\", \"$t_vinculacion\", \"$user_id\", \"$area\")";
		}
	//verificar si exite o no el usuario en la tabla intranet_usuarios_sociodemografico

  	//Insertar datos demograficos en la base de datos
	$demograficos = new Conexion ;
	$acentos = $demograficos->query("SET NAMES 'utf8'");
	$insert01 = $demograficos->query($sql01) or trigger_error($demograficos->error);
	$insert02 = $demograficos->multi_query($sql02) or trigger_error($demograficos->error);
	if ($insert01) {
			//echo "Success! Row ID: {$demograficos->insert_id}";
			$demograficos->close();
			//print "<script>alert(\"Usuario Creado!\");</script>";
	}
//Insertar datos demograficos en la base de datos



//insertar datos en tabla intranet_usuarios_sociodemografico///////////////////////////////////////////

  reenvio();

}

?>