<?php 
include('festivos.php');
if (isset($_REQUEST['fecha'])) {
	$fecha = $_REQUEST['fecha'];
	$ds = date("w",strtotime($fecha));
	$d = date("d",strtotime($fecha));
	$m = date("m",strtotime($fecha));
	$y = date("Y",strtotime($fecha));
	$festivos = new festivos($y);

	while($festivos->esFestivo($d,$m) || $ds==6 || $ds==0 ){
		$ds++;
		$d++;
		if ($ds>6) {
			$ds=0;
		}
	}	
	$fecha = "$d-$m-$y";
	echo date('Y-m-d', strtotime($fecha));
}
?>

