<?php 
if (isset($_REQUEST['fech'])) {
	$fecha = $_REQUEST['fech'];
	$hoy = getdate(); 
	$hoy = "$hoy[year]-$hoy[mon]-$hoy[mday]";
	$fecha = new DateTime($fecha);
	$hoy = new DateTime($hoy);
	$interval = $hoy->diff($fecha);
	if ($hoy>$fecha) {
		echo $interval->format('-%a');
	}else {
		echo $interval->format('%a');
	}
	
}

?>

