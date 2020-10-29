<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>
<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 
	if (isset($_REQUEST['user_id'])) {
	$user_id = $_REQUEST['user_id'];
//-------tabla intranet_usuarios	
	$usuario = new conexion;
	$sql = "SELECT nombre,apellido,t_identificacion,cedula,ciudad,direccion,telefono,email,nivel_permisos,`password`,colorhex,comentarios,username,rh FROM intranet_usuarios WHERE id = \"$user_id\"";
	$rusuario = $usuario->query($sql) or trigger_error($usuario->error);
	$Nrusuario = $rusuario->num_rows;

	if ($Nrusuario > 0) { 

				while ($r=$rusuario->fetch_array()) {
			$nombre = $r['nombre'];
			$apellido = $r['apellido'];
			$t_identificacion = $r['t_identificacion'];
			$cedula = $r['cedula'];
			$rh = $r['rh'];
			$ciudad = $r['ciudad'];
			$direccion = $r['direccion'];
			$telefono = $r['telefono'];
			$email = $r['email'];
			$nivel_permisos = $r['nivel_permisos'];
			$username = $r['username'];
			switch ($nivel_permisos) {
				case '1':
					$departamento = "Administrativos";
					break;
				case '2':
					$departamento = "Contabilidad";
					break;
				case '3':
					$departamento = "Ventas";
					break;
				case '4':
					$departamento = "Bodega";
					break;
				case '5':
					$departamento = "Invitados";
					break;
				
				default:
					$departamento = "Ventas";
					break;
			}
			$password = $r['password'];
			$colorhex = $r['colorhex'];
			$comentarios = $r['comentarios'];

		}
//-------tabla intranet_usuarios
		?>
			    <script type="text/javascript">
	      			var user_id = <?php echo $_REQUEST['user_id']; ?>;
	    			</script>
	    <?php
	}



//-------tabla intranet_usuarios_sociodemografico
	$usuario02 = new conexion;
	$sql02 = "SELECT * FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
	$rusuario02 = $usuario02->query($sql02) or trigger_error($usuario02->error);
	$Nrusuario02 = $rusuario02->num_rows;

	if ($Nrusuario02 > 0 ) {
				while ($r=$rusuario02->fetch_array()) {

			//$ = $r[''];
			$fecha_nacimiento = $r['fecha_nacimiento'];

			$generotemp = $r['genero'];
				switch ($generotemp) {
					case 'M':
					 $genero = "Masculino";
						break;
					case 'F':
					$genero = "Femenino";
						break;
					}
			$estadociviltemp = $r['estado_civil'];
				switch ($estadociviltemp) {
						case 'Soltero':
						$estadocivil = "Soltero";
						break;
						case 'Union libre':
						$estadocivil = "Union libre";
						break;
						case 'Casado':
						$estadocivil = "Casado";
						break;
						case 'Separado':
						$estadocivil = "Separado";
						break;

						}
			$escolaridadtemp = $r['escolaridad'];

				switch ($escolaridadtemp) {

					case 'Sin escolaridad':
						$escolaridad = "Sin escolaridad";
						break;
					case 'Preescolar':
						$escolaridad = "Preescolar";
						break;
					case 'Primaria incompleta':
						$escolaridad = "Primaria incompleta";
						break;
					case 'Primaria completa':
						$escolaridad = "Primaria completa";
						break;
					case 'Bachillerato incompleto':
						$escolaridad = "Bachillerato incompleto";
						break;
					case 'Bachillerato completo':
						$escolaridad = "Bachillerato completo";
						break;
					case 'Estudios tecnicos o comerciales (en curso)':
						$escolaridad = "Estudios técnicos o comerciales (en curso)";
						break;
					case 'Estudios tecnicos o comerciales':
						$escolaridad = "Estudios técnicos o comerciales";
						break;
					case 'Profesional (en curso)':
						$escolaridad = "Profesional (en curso)";
						break;
					case 'Profesional':
						$escolaridad = "Profesional";
						break;
					case 'Posgrado':
						$escolaridad = "Posgrado";
						break;
					case 'Maestría':
						$escolaridad = "Maestría";
						break;
					case 'Doctorado':
						$escolaridad = "Doctorado"; 
						break;
					
						}
				$hijostemp = $r['hijos'];
					switch ($hijostemp) {
						case '0':
							$hijos = "0";
							break;
						case '1':
							$hijos = "1";
							break;
						case '2':
							$hijos = "2";
							break;
						case '3':
							$hijos = "3";
							break;
						case '4':
							$hijos = "4";
							break;
						case '5':
							$hijos = "5";
							break;
						case 'Mas':
							$hijos = "Mas de 6 hijos.";
							break;

						}
				$emer_nombre = $r['emer_nombre'];
				$emer_telefono = $r['emer_telefono'];
				$emer_celular = $r['emer_celular'];
				$alergias = $r['alergias'];
				$medicamentos = $r['medicamentos'];
				$enfermedades = $r['enfermedades'];
				$area = $r['area'];
				$cargo = $r['cargo'];
				$fecha_vinculacion = $r['fecha_vinculacion'];
				$t_vinculaciontemp = $r['t_vinculacion'];

					switch ($t_vinculaciontemp) {
						case 'Temporal':
								$t_vinculacion = "Temporal";
							break;
						case 'Directa':
								$t_vinculacion = "Directa";
							break;
						case 'Prestación de servicios':
								$t_vinculacion = "Prestación de servicios";
							break;
					}

				$eps = $r['eps'];	
				$afp = $r['afp'];	
				$arl = $r['arl'];	
				$documentos = new Conexion;
                $sql01 = "SELECT *  FROM intranet_usuarios_documentos WHERE user_id = $user_id and tipo_documento in ('cedula','seguridad_social','contrato','hoja_de_vida')";
                $rdocumentos = $documentos->query($sql01) or trigger_error($documentos->error);
                $documentos->close();

		}

		?>
		    <script type="text/javascript">
			      var eps = '<?php echo $eps; ?>';
			      var afp = '<?php echo $afp; ?>';
			      var arl = '<?php echo $arl; ?>';
    		</script>


		<?php

//-------tabla intranet_usuarios_sociodemografico	
	}

	

		
	}else{
		echo "No existe";
	}
?>




