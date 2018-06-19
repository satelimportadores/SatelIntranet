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
	$sql = "SELECT nombre,apellido,t_identificacion,cedula,ciudad,direccion,telefono,email,nivel_permisos,`password`,colorhex,comentarios FROM intranet_usuarios WHERE id = \"$user_id\"";
	$rusuario = $usuario->query($sql) or trigger_error($usuario->error);
	$Nrusuario = $rusuario->num_rows;

		while ($r=$rusuario->fetch_array()) {
			$nombre = $r['nombre'];
			$apellido = $r['apellido'];
			$t_identificacion = $r['t_identificacion'];
			$cedula = $r['cedula'];
			$ciudad = $r['ciudad'];
			$direccion = $r['direccion'];
			$telefono = $r['telefono'];
			$email = $r['email'];
			$nivel_permisos = $r['nivel_permisos'];
			switch ($nivel_permisos) {
				case '1':
					$departamento = "<option value='1' selected='selected' >Administrativos</option>";
					break;
				case '2':
					$departamento = "<option value='2' selected='selected' >Contabilidad</option>";
					break;
				case '3':
					$departamento = "<option value='3' selected='selected' >Ventas</option>";
					break;
				case '4':
					$departamento = "<option value='4' selected='selected' >Bodega</option>";
					break;
				case '5':
					$departamento = "<option value='5' selected='selected' >Invitados</option>";
					break;
				
				default:
					$departamento = "<option value='3' selected='selected' >Ventas</option>";
					break;
			}
			$password = $r['password'];
			$colorhex = $r['colorhex'];
			$comentarios = $r['comentarios'];

		}
//-------tabla intranet_usuarios

//-------tabla intranet_usuarios_sociodemografico
	$usuario02 = new conexion;
	$sql02 = "SELECT * FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
	$rusuario02 = $usuario02->query($sql02) or trigger_error($usuario02->error);
	$Nrusuario02 = $rusuario02->num_rows;

		while ($r=$rusuario02->fetch_array()) {

			//$ = $r[''];
			$fecha_nacimiento = $r['fecha_nacimiento'];
			$generotemp = $r['genero'];
				switch ($generotemp) {
					case 'M':
					 $genero = "<option value='M' selected='selected' >Masculino</option>";
						break;
					case 'F':
					$genero = " <option value='F' selected='selected' >Femenino</option>";
						break;
					}
			$estadociviltemp = $r['estado_civil'];
				switch ($estadociviltemp) {
						case 'Soltero':
						$estadocivil = "<option value='Soltero' selected='selected' >Soltero</option>";
						break;
						case 'Union libre':
						$estadocivil = "<option value='Union libre' selected='selected' >Union libre</option>";
						break;
						case 'Casado':
						$estadocivil = "<option value='Casado' selected='selected' >Casado</option>";
						break;
						case 'Separado':
						$estadocivil = "<option value='Separado' selected='selected' >Separado</option>";
						break;

						}
			$escolaridadtemp = $r['escolaridad'];

				switch ($escolaridadtemp) {

					case 'Sin escolaridad':
						$escolaridad = "<option selected='selected' value='Sin escolaridad'>Sin escolaridad</option>";
						break;
					case 'Preescolar':
						$escolaridad = "<option selected='selected' value='Preescolar'>Preescolar</option>";
						break;
					case 'Primaria incompleta':
						$escolaridad = "<option selected='selected' value='Primaria incompleta'>Primaria incompleta</option>";
						break;
					case 'Primaria completa':
						$escolaridad = "<option selected='selected' value='Primaria completa'>Primaria completa</option>";
						break;
					case 'Bachillerato incompleto':
						$escolaridad = "<option selected='selected' value='Bachillerato incompleto'>Bachillerato incompleto</option>";
						break;
					case 'Bachillerato completo':
						$escolaridad = "<option selected='selected' value='Bachillerato completo'>Bachillerato completo</option>";
						break;
					case 'Estudios tecnicos o comerciales (en curso)':
						$escolaridad = "<option selected='selected' value='Estudios tecnicos o comerciales (en curso)'>Estudios técnicos o comerciales (en curso)</option>";
						break;
					case 'Estudios tecnicos o comerciales':
						$escolaridad = "<option selected='selected' value='Estudios tecnicos o comerciales'>Estudios técnicos o comerciales</option>";
						break;
					case 'Profesional (en curso)':
						$escolaridad = "<option selected='selected' value='Profesional (en curso)'>Profesional (en curso)</option>";
						break;
					case 'Profesional':
						$escolaridad = "<option selected='selected' value='Profesional'>Profesional</option>";
						break;
					case 'Posgrado':
						$escolaridad = "<option selected='selected' value='Posgrado'>Posgrado</option>";
						break;
					case 'Maestría':
						$escolaridad = "<option selected='selected' value='Maestría'>Maestría</option>";
						break;
					case 'Doctorado':
						$escolaridad = "<option selected='selected' value='Doctorado'>Doctorado</option>"; 
						break;
					
						}
				$hijostemp = $r['hijos'];
					switch ($hijostemp) {
						case '0':
							$hijos = "<option selected='selected' value='0'>0</option>";
							break;
						case '1':
							$hijos = "<option selected='selected' value='1'>1</option>";
							break;
						case '2':
							$hijos = "<option selected='selected' value='2'>2</option>";
							break;
						case '3':
							$hijos = "<option selected='selected' value='3'>3</option>";
							break;
						case '4':
							$hijos = "<option selected='selected' value='4'>4</option>";
							break;
						case '5':
							$hijos = "<option selected='selected' value='5'>5</option>";
							break;
						case 'Mas':
							$hijos = "<option selected='selected' value='Mas'>Mas de 6 hijos.</option>";
							break;

						}
				$emer_nombre = $r['emer_nombre'];
				$emer_telefono = $r['emer_telefono'];
				$emer_celular = $r['emer_celular'];
				$alergias = $r['alergias'];
				$medicamentos = $r['medicamentos'];
				$enfermedades = $r['enfermedades'];
				$fecha_vinculacion = $r['fecha_vinculacion'];
				$t_vinculaciontemp = $r['t_vinculacion'];

					switch ($t_vinculaciontemp) {
						case 'Temporal':
								$t_vinculacion = "<option selected='selected' value='Temporal'>Temporal</option>";
							break;
						case 'Directa':
								$t_vinculacion = "<option selected='selected' value='Directa'>Directa</option>";
							break;
						case 'Prestación de servicios':
								$t_vinculacion = "<option selected='selected' value='Prestación de servicios'>Prestación de servicios</option>";
							break;
					}

				$eps = $r['eps'];	
				$afp = $r['afp'];	
				$arl = $r['arl'];	

		}

//-------tabla intranet_usuarios_sociodemografico		

		
	}else{
		echo "No existe";
	}
?>