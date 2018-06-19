<?php 
include('class.conexion.php');
include('suma_horas_permisos_usuarios.php');

//funcion que quita las tildes y los acentos de una cadena para normalizarla 
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUY
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

$usuarios = new conexion;
if(isset($_POST['consecutivo'])){
	$consecutivo = $_POST['consecutivo'];
	$fsol = $_POST['fsol'];
	$fsal = $_POST['fsal'];
	$hsal = $_POST['hsal'];
	$hlleg = $_POST['hlleg'];

	//funcion que me permite restar dos variables que almasenan horas
	function resta($inicio, $fin)
	  {
	  $dif=date("H:i", strtotime("00:00") + strtotime($fin) - strtotime($inicio) );
	  return $dif;
	  }
	$hrep = resta($hsal,$hlleg);
	$area = $_POST['area'];
	$cargo = $_POST['cargo'];
	$eps = $_POST['eps'];
	$arp = $_POST['arp'];

	if($eps == 'Otro'){
		$eps = $_POST['epsn'];
	}

	if($arp == 'Otro'){
		$arp = $_POST['arpn'];
	}

	if ($_POST['motivo']=='Personal') {
		if($_POST['tip']=='otro'){
			$motivo = $_POST['motivo']."-".$_POST['otr'];
		}else{
			$motivo = $_POST['motivo']."-".$_POST['tip'];
		}
	};

	if ($_POST['motivo']=='Cita Medica') {
		$hrep = 0;
		if($_POST['tip']=='Enfermedad'){
			$motivo = $_POST['motivo']."-".$_POST['tip']." adquirida ".$_POST['tip2'];
		}else{
			$motivo = $_POST['motivo']."-".$_POST['tip'];
		}
	};

	if ($_POST['motivo']=='Otro') {
		$motivo = $_POST['motivo']."-".$_POST['otro'];
	}
	$sol = $_POST['sol'];
	$auto = $_POST['auto'];

	//Trae el nombre y el apellido que pertenecen al id de solicitud
	
	$query = "SELECT nombre,apellido FROM `intranet_usuarios` WHERE id = $sol";
	$Rusuarios = $usuarios->query($query) or trigger_error($usuarios->error);
	$nom = $Rusuarios->fetch_array();



	$causa = explode("-", $motivo);
	$causa = $causa[0]."-".$causa[1];

	//guardado del archivo adjunto
	$file = $_FILES['file'];
	if(($file['name'][0])==''){
			echo "Recuerde subir el archivo";
		}else{	
	$ex = explode(".",$file['name'][0]);
	$ext = (count($ex))-1;
	$archivo = "$consecutivo-$nom[0]_$nom[1].$ex[$ext]";
	$archivo = normaliza($archivo);
	$dir = "archivos/permisos/";
	$dir = $dir.$archivo;
	$mov = move_uploaded_file($file['tmp_name'][0], $dir);

if($mov){
	echo "El archivo fue subido con exito";
	$insert = "INSERT INTO intranet_permisos_usuarios(codigo,fecha_solicitud,fecha_salida,hora_salida,hora_llegada,horas_rep, historico, area, cargo, eps, arp, user_id, motivo, autoriza, adjunto) VALUES ('$consecutivo','$fsol','$fsal','$hsal','$hlleg','$hrep','$hrep','$area','$cargo','$eps','$arp','$sol','$motivo','$auto','$archivo')";
	$res = $usuarios->query($insert) or trigger_error($usuarios->error);

}else{
	echo "Error al subir el archivo";
	}
	}
}

//trae el ultimo codigo que fue subido y le suma 1 para saber el siguiente consecutivo
$query3 = "select codigo from intranet_permisos_usuarios ORDER by codigo DESC";
$result3 = $usuarios->query($query3) or trigger_error($usuarios->error);
$num = $result3->fetch_array();
$codigo = $num[0] + 1;
$codigo = str_pad($codigo, 9, '0', STR_PAD_LEFT);
$usuarios->close();

 ?>