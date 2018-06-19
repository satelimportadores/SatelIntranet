<?php 	
	include('class.conexion.php');
	$con = new conexion;	
	if (isset($_REQUEST['imp'])) {
		$imp = $_REQUEST['imp'];
		$query = "SELECT * from intranet_registros_imp INNER JOIN intranet_tareas on intranet_registros_imp.tarea=intranet_tareas.id where impuesto = $imp";
		$result = $con->query($query) or trigger_error($con->error);
		while ($row = $result->fetch_array()) {
			?>
		<input type="checkbox" name="tareas[]" value="<?php echo $row['0'];?>"><?php echo $row['nomtarea'] ?><br>
		<?php 
		}
	}

	//envio de correo automatico pruebas...
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$query = "SELECT * from intranet_registros_imp INNER JOIN intranet_tareas on intranet_registros_imp.tarea=intranet_tareas.id";
	$result = $con->query($query) or trigger_error($con->error);
	while ($row = $result->fetch_array()) {
	$segundos=strtotime($row['fecha_est']) - strtotime($fecha);
	$diferencia_dias=intval($segundos/60/60/24);
	if ($diferencia_dias == 1){
		if($row['recordatorio']!=$fecha){
			$correo = "andressvx@gmail.com";

			$mail = "Prueba de mensaje";
			//Titulo
			$titulo = "PRUEBA DE TITULO";
			//cabecera
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//dirección del remitente 
			$headers .= "From: Geeky Theory < $correo >\r\n";
			//Enviamos el mensaje a tu_dirección_email 
			$bool = mail($correo,$titulo,$mail,$headers);

			$query2 = "UPDATE `intranet_registros_imp` SET recordatorio = $fecha WHERE id = $row[0]";
			//mysql_query($query2);
			}
		}
	}
	//recordar enviar a un php a parte y hacer include en el index.
 ?>