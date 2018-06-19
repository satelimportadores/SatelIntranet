<?php 


function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUY
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}

date_default_timezone_set('America/Bogota');
include('class.conexion.php');
$con = new conexion;
if (isset($_REQUEST['envio'])) {
	$fecha =  date("Y-m-d");
	$banco = $_REQUEST['bancos'];
	$cheque = $_REQUEST['num_cheq'];
	$cheque = strtoupper($cheque);
	$beneficiario = $_REQUEST['benef'];
	$beneficiario = strtoupper($beneficiario);
	$monto = $_REQUEST['monto'];
	$fecha_cheq = $_REQUEST['fecha_cheq'];
	$endoso = $_REQUEST['endoso'];
	$endoso = strtoupper($endoso);
	$int = $_REQUEST['interes'];
	$dias = $_REQUEST['num_dias'];
	$val_int = $_REQUEST['val_int'];
	$val_cheq = $_REQUEST['val_cheq'];
	$file = $_FILES['file'];
	$resp = $_REQUEST['resp'];
	$ex = explode(".",$file['name'][0]);
	$ext = (count($ex))-1;
	$archivo = "$cheque-$endoso-$fecha_cheq.$ex[$ext]";
	$archivo = normaliza($archivo);
	$dir = "archivos/";
	$dir = $dir.$archivo;
	if(move_uploaded_file($file['tmp_name'][0], $dir)){	
		$query = "INSERT INTO intranet_cheques_info(fecha, banco_emisor, numero_cheque, beneficiario, monto, fecha_cheque, endoso, responsable, interes, dias, valor_interes, valor_girar, estado, adjunto) VALUES ('$fecha',$banco,'$cheque','$beneficiario',$monto,'$fecha_cheq','$endoso','$resp',$int,$dias,$val_int,$val_cheq,'por_consig', '$archivo')";
		$con->query($query) or trigger_error($con->error);
?>
	<script>
		alert("Datos enviados correctamente!");
	</script>
<?php 
	}else{
?>
	<script>
		alert("Error al subir el archivo");
	</script>
<?php 
	}
}
?>

