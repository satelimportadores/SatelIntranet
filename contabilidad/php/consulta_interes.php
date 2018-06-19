<?php 
include('class.conexion.php');
	$con = new conexion;
	$query = 'SELECT porcentaje, nom_porcentaje FROM intranet_cheques_porcentajes';
	$Rint = $con->query($query) or trigger_error($con->error);
	$con->close();
		while ($row = $Rint->fetch_array()) {
			echo "<option value='$row[porcentaje]'>$row[nom_porcentaje]</option>";
		}	
?>

