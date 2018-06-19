<?php 
include('class.conexion.php');

	if (isset($_REQUEST['EPS'])){
		$eps = new Conexion;
		$query = "SELECT * FROM intranet_empresas_salud WHERE grupo = 'EPS' ORDER BY nombre ASC";
		$Reps = $eps->query($query) or trigger_error($eps->error);
		$eps->close();
		echo "<option value=''>Seleccione...</option>";
			while ($row = $Reps->fetch_array()) {
				echo "<option value='$row[nombre]'>$row[nombre]</option>";
			};
		
	}

	if (isset($_REQUEST['ARL'])){
		$arl = new Conexion;
		$query = "SELECT * FROM intranet_empresas_salud WHERE grupo = 'ARL' ORDER BY nombre ASC";
		$Rarl = $arl->query($query) or trigger_error($arl->error);
		$arl->close();
		echo "<option value=''>Seleccione...</option>";
			while ($row = $Rarl->fetch_array()) {
				echo "<option value='$row[nombre]'>$row[nombre]</option>";
			}
		
	}
		if (isset($_REQUEST['AFP'])){
		$afp = new Conexion;
		$query = "SELECT * FROM intranet_empresas_salud WHERE grupo = 'AFP' ORDER BY nombre ASC";
		$Rafp = $afp->query($query) or trigger_error($afp->error);
		$afp->close();
		echo "<option value=''>Seleccione...</option>";
			while ($row = $Rafp->fetch_array()) {
				echo "<option value='$row[nombre]'>$row[nombre]</option>";
			}
		
	}
 ?>