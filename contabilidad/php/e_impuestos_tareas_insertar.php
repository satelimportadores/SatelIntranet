<?php 

	$con = new conexion;
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];



	if (isset($_POST['envio'])) {
		$impuesto = $_POST['impuesto'];
		$responsable = $_POST['responsable'];
		$tarea = $_POST['tarea'];
		$fechalim = $_POST['fecha'];
		$query = "INSERT INTO intranet_registros_imp(impuesto, user_resp, tarea, fecha_est) VALUES ($impuesto,'$responsable',$tarea,'$fechalim')";
		$con->query($query) or trigger_error($con->error);
		
	}

	if (isset($_POST['Upload'])) {
		$pru = $_POST['comentario'];
		$id	= $_POST['id'];
		$nomtarea = $_POST['nomtarea'];
		$imp = $_POST['imp'];
		$nomimp = $_POST['nomimpuesto'];

		$query = "SELECT comentario from intranet_registros_imp WHERE id=$id";
		$result = $con->query($query) or trigger_error($con->error);
		$ant = $result->fetch_array();
		if ($_POST['comentario']!=""){
		$com = "- ".$_POST['comentario']."<br>".$ant['0'];
		}else{
		$com = $ant['0'];
		}

		$files = $_FILES['image']['name'];
		$file = $_FILES['image']['tmp_name'];
		$query = "SELECT adjuntos FROM intranet_adjuntos_imp WHERE registro = $id && impuesto = $imp order by adjuntos desc";
		$result = $con->query($query) or trigger_error($con->error);
		$nrow = $result->num_rows;
		$rouw = $result->fetch_array();
		if ($nrow==0) {
		$j=0;
		}else{
		$x = explode("-", $rouw['0']);
		$j=$x[0]+1;
		}
		$num = count($files);
		for ($i=0; $i < $num; $i++) { 
			 $dir = "archivos_impuestos/";
			 $ex = explode(".",$files[$i]);
			 $ext = (count($ex))-1;
			 $archivo = "$j - $nomtarea - $nomimp - $fecha.$ex[$ext]";
			 $dir = $dir.$archivo;
			 $mover = move_uploaded_file($file[$i], $dir);
		if($mover){
			$insert = "INSERT INTO intranet_adjuntos_imp(adjuntos, registro, impuesto) VALUES ('$archivo',$id,$imp);";
			$con->query($insert) or trigger_error($con->error);
		}else{
		echo "Error al subir el archivo";
			}	
		$j++;
		}
		$chk = 0;
		if (isset($_POST['check'])) {
		$chk = $_POST['check'];
		}
		$query1 = "UPDATE intranet_registros_imp SET fecha='$fecha',comentario='$com',porcentaje = $chk WHERE id=$id";
		$con->query($query1) or trigger_error($con->error);
	}


	if (isset($_POST['revisar'])) {
		$chk = 0;
		if (isset($_POST['check'])) {
		$chk = $_POST['check'];
		}
		$id = $_POST['id'];
		$query1 = "SELECT comentario from intranet_registros_imp WHERE id=$id";
		$result = $con->query($query1) or trigger_error($con->error);
		$ant = $result->fetch_array();
		if ($_POST['comentario']!=""){
		$com = "- ".$_POST['comentario']."<br>".$ant['0'];
		}else{
		$com = $ant['0'];
		}
		$query = "UPDATE intranet_registros_imp SET fecha='$fecha',comentario='$com',porcentaje=$chk WHERE id=$id";
		$con->query($query) or trigger_error($con->error);
	}

	if (isset($_POST['eliminar'])) {
	if (isset($_POST['tareas'])){	
    if (is_array($_POST['tareas'])) {
        $query = '';
        $num_countries = count($_POST['tareas']);
        foreach ($_POST['tareas'] as $key => $value) {
                $query = "DELETE FROM intranet_registros_imp WHERE intranet_registros_imp.id = $value ;";
                $con->query($query) or trigger_error($con->error);
        }
      }
    }else {
        echo 'Debes seleccionar una tarea';
    	}
	}  

	if (isset($_POST['agregar'])) {
		$imp = $_POST['impuest'];
		$fechalim = $_POST['fechaimp'];
		$query1 = "INSERT INTO intranet_impuestos(impuesto, fecha_limite) VALUES ('$imp','$fechalim')";
		$con->query($query1) or trigger_error($con->error);
	}

	if (isset($_REQUEST['impuest'])) {
		$imp = $_REQUEST['nomimp'];
		$imp = strtoupper($imp);
		$descrip = $_REQUEST['descrip'];
		$query1 = "INSERT INTO intranet_tipo_impuesto(nom_imp, descripcion) VALUES ('$imp','$descrip')";
		$con->query($query1) or trigger_error($con->error);
	}
 ?>
