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
			print "<script>window.location='../usuarios_ver.php';</script>";
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

	 $apellido = $_REQUEST['apellido'];
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
	 $nombre = $_REQUEST['nombre'];
	 $numero_identificacion = $_REQUEST['numero_identificacion'];
	 
	 $t_identificacion = $_REQUEST['t_identificacion'];
	 $telefono = $_REQUEST['telefono'];
	 $color = '#'.$_REQUEST['color'];


	 if ($departamento == 3) {
	 	$grupo_ventas_subgrupo = 'asesores';
	 }else{
	 	$grupo_ventas_subgrupo = '';
	 }


$Nusuarios = 0;
if ($Nusuarios == 0) {

	$user_id = $_REQUEST['user_id'];
	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	if (isset($_REQUEST['password']) && $_REQUEST['password'] != '') {
		$password = md5($_REQUEST['password']);
		$sql01 = "UPDATE intranet_usuarios SET apellido = \"$apellido\", ciudad = \"$ciudad\", comentarios = \"$comentarios\", nivel_permisos = \"$departamento\", direccion = \"$direccion\", email = \"$email\", fecha = \"$fecha\", grupo_bodega = \"$grupo_bodega\", grupo_bodega_subgrupo = \"$grupo_bodega_subgrupo\", ip = \"$ip\", navegador = \"$navegador\", nombre = \"$nombre\", cedula = \"$numero_identificacion\", password = \"$password\", t_identificacion = \"$t_identificacion\", telefono = \"$telefono\", username = \"$nombre\", activo = 1, grupo_ventas_subgrupo = \"$grupo_ventas_subgrupo\", color = \"$color\", colorhex = \"$color\"	WHERE id = \"$user_id\"";
	}else{
		$sql01 = "UPDATE intranet_usuarios SET apellido = \"$apellido\", ciudad = \"$ciudad\", comentarios = \"$comentarios\", nivel_permisos = \"$departamento\", direccion = \"$direccion\", email = \"$email\", fecha = \"$fecha\", grupo_bodega = \"$grupo_bodega\", grupo_bodega_subgrupo = \"$grupo_bodega_subgrupo\", ip = \"$ip\", navegador = \"$navegador\", nombre = \"$nombre\", cedula = \"$numero_identificacion\", t_identificacion = \"$t_identificacion\", telefono = \"$telefono\", username = \"$nombre\", activo = 1, grupo_ventas_subgrupo = \"$grupo_ventas_subgrupo\", color = \"$color\", colorhex = \"$color\"	WHERE id = \"$user_id\"";
	}
	
	

	$insert01 = $registro_clientes->query($sql01) or trigger_error($registro_clientes->error);

	if ($insert01) {
			//$user_id = $registro_clientes->insert_id;
			//echo "Success! Row ID: {$registro_clientes->insert_id}";
			$registro_clientes->close();
			print "<script>alert(\"Usuario Editado!\");</script>";
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


//datos adjuntos hoja de vida 

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


if ($_FILES['filehv']) {  
    $uploads_dir = '../uploads/';
    $file_ary = reArrayFiles($_FILES['filehv']);

  
  
    foreach ($file_ary as $file) {
      //  print 'Nombre: ' . $file['name'];
     //   print 'Tipo: ' . $file['type'];
      //  print 'Tamaño: ' . $file['size'];
    
    
    $fichero_subidohv = $uploads_dir . 'HV' .'_'.$nombre.'_'.$apellido. $file['name'];
    $f_nombreshv = 'HV' .'_'.$nombre.'_'.$apellido. $file['name'];
    move_uploaded_file($file['tmp_name'],  $fichero_subidohv);
      }

  }


//datos adjuntos hoja de vida 

//datos adjuntos fotografias 

function reArrayFiles01(&$file_post) {

    $file_ary01 = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
               foreach ($file_keys as $key) {
            $file_ary01[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary01;
}


if ($_FILES['filefoto']) {  
    $uploads_dir = '../uploads/';
    $file_ary01 = reArrayFiles01($_FILES['filefoto']);

  
  
    foreach ($file_ary01 as $file) {
       // print 'Nombre: ' . $file['name'];
       // print 'Tipo: ' . $file['type'];
       // print 'Tamaño: ' . $file['size'];
    
    
    $fichero_subidofoto = $uploads_dir . 'FOTO' .'_'.$nombre.'_'.$apellido. $file['name'];
    $f_nombresfoto = 'FOTO' .'_'.$nombre.'_'.$apellido. $file['name'];
    move_uploaded_file($file['tmp_name'],  $fichero_subidofoto);
      }

  }


//datos adjuntos fotografias

  	//Insertar datos demograficos en la base de datos
	$demograficos = new Conexion ;
	$acentos = $demograficos->query("SET NAMES 'utf8'");
	$sql01 = "UPDATE intranet_usuarios_sociodemografico SET afp =  \"$afp\",alergias =\"$alergias\" ,arl =\"$arl\" ,cargo = \"$cargo\",emer_celular =\"$emer_celular\" ,emer_nombre = \"$emer_nombre\",emer_telefono = \"$emer_telefono\",enfermedades = \"$enfermedades\",eps = \"$eps\",escolaridad = \"$escolaridad\",estado_civil = \"$estado_civil\",fecha_nacimiento = \"$fecha_nacimiento\",fecha_vinculacion =\"$fecha_vinculacion \" ,genero = \"$genero\",hijos = \"$hijos\",medicamentos = \"$medicamentos\",t_vinculacion = \"$t_vinculacion\",adjuntos_hv = \"$f_nombreshv\",adjuntos_foto = \"$f_nombresfoto\",user_id = \"$user_id\",area = \"$area\" WHERE user_id = \"$user_id\"";

	$insert01 = $demograficos->query($sql01) or trigger_error($demograficos->error);

	if ($insert01) {
			//echo "Success! Row ID: {$demograficos->insert_id}";
			$demograficos->close();
			//print "<script>alert(\"Usuario Creado!\");</script>";
	}
//Insertar datos demograficos en la base de datos



//insertar datos en tabla intranet_usuarios_sociodemografico///////////////////////////////////////////

}


  reenvio();

}

?>