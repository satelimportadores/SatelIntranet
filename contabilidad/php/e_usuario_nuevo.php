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
			print "<script>window.location='../index.php';</script>";
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
	 $password = md5($_REQUEST['password']);
	 $t_identificacion = $_REQUEST['t_identificacion'];
	 $telefono = $_REQUEST['telefono'];
	 $color = '#'.$_REQUEST['color'];


	 if ($departamento == 3) {
	 	$grupo_ventas_subgrupo = 'asesores';
	 }else{
	 	$grupo_ventas_subgrupo = '';
	 }


				//buscar cliente en la base de datos
						$usuario = new Conexion;
						$sql01 = "SELECT COUNT(*) as cant FROM intranet_usuarios WHERE cedula = \"$numero_identificacion\"";
						$usuarios = $usuario->query($sql01) or trigger_error($usuario->error);

                        $s=$usuarios->fetch_array();
                        $Nusuarios = $s['cant'];

						if ($Nusuarios >= 1) {
							print "<script>alert(\"Ya existe un usuario con este numero de cedula!\");</script>";
							$usuario->close();
						}

				//buscar cliente en la base de datos

if ($Nusuarios == 0) {
	//Insertar cliente en la base de datos
	$registro_clientes = new Conexion ;
	$acentos = $registro_clientes->query("SET NAMES 'utf8'");
	$sql01 = "INSERT INTO intranet_usuarios (apellido, ciudad, comentarios, nivel_permisos, direccion, email, fecha, grupo_bodega, grupo_bodega_subgrupo, ip, navegador, nombre, cedula, password, t_identificacion, telefono, username, activo, grupo_ventas_subgrupo, color, colorhex)	VALUES ( \"$apellido\",\"$ciudad\",\"$comentarios\",\"$departamento\",\"$direccion\",\"$email\",\"$fecha\",\"$grupo_bodega\",\"$grupo_bodega_subgrupo\",\"$ip\",\"$navegador\",\"$nombre\",\"$numero_identificacion\",\"$password\",\"$t_identificacion\",\"$telefono\", \"$nombre\",1,\"$grupo_ventas_subgrupo\",\"$color\",\"$color\")";

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
	$sql01 = "INSERT INTO intranet_usuarios_sociodemografico (afp ,alergias ,arl ,cargo ,emer_celular ,emer_nombre ,emer_telefono ,enfermedades ,eps ,escolaridad ,estado_civil ,fecha_nacimiento ,fecha_vinculacion ,genero ,hijos ,medicamentos ,t_vinculacion,adjuntos_hv,adjuntos_foto,user_id,area)	VALUES (\"$afp\", \"$alergias\", \"$arl\", \"$cargo\", \"$emer_celular\", \"$emer_nombre\", \"$emer_telefono\", \"$enfermedades\", \"$eps\", \"$escolaridad\", \"$estado_civil\", \"$fecha_nacimiento\", \"$fecha_vinculacion \", \"$genero\", \"$hijos\", \"$medicamentos\", \"$t_vinculacion\",\"$f_nombreshv\",\"$f_nombresfoto\",\"$user_id\",\"$area\")";

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