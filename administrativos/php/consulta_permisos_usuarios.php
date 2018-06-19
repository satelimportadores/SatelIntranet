<?php 
include('class.conexion.php');

	if (isset($_REQUEST['user_id'])){

		$user_id = $_REQUEST['user_id'];

		  $consulta = new Conexion;
		  //Traer datos del usuario
		  $sql01 = "SELECT cargo,eps,afp,arl FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
		  $Rconsulta = $consulta->query($sql01) or trigger_error($consulta->error);
		  $r = $Rconsulta->fetch_array();
		  $consulta->close();
		 //Traer datos del usuario
		  				$data = array
		  					 (
	  					 	  0 => $cargo = $r['cargo'],
							  1 => $eps = $r['eps'],
							  2 => $afp = $r['afp'],
							  3 => $arl = $r['arl']
							  );

				echo json_encode($data);
	}

 ?>