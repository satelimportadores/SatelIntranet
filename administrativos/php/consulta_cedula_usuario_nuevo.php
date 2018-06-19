<?php 
include('class.conexion.php');

	if (isset($_REQUEST['cedula'])){

		$cedula = $_REQUEST['cedula'];
				//buscar cliente en la base de datos
						$usuario = new Conexion;
						$sql01 = "SELECT COUNT(*) as cant FROM intranet_usuarios WHERE cedula = \"$cedula\"";
						$usuarios = $usuario->query($sql01) or trigger_error($usuario->error);

                        $s=$usuarios->fetch_array();
                        $Nusuarios = $s['cant'];

						if ($Nusuarios >= 1) {
							echo true;
							$usuario->close();
						}

				//buscar cliente en la base de datos
		
	}

 ?>