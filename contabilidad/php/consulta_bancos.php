<?php 
include('class.conexion.php');
	$con = new conexion;
	$query = 'SELECT id, nom_banco FROM intranet_bancos';
	$Rbancos = $con->query($query) or trigger_error($con->error);
	$con->close();
		while ($row = $Rbancos->fetch_array()) {
			echo "<option value='$row[id]'>$row[nom_banco]</option>";
		}	
?>

