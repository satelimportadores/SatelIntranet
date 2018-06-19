<?php 
include('class.conexion.php');
$con = new conexion;
	if (isset($_REQUEST['a'])) {
		$query = 'SELECT id, dias, numero_cheque, beneficiario, monto, fecha_cheque, adjunto FROM intranet_cheques_info where estado = "por_consig"';
		$Rbancos = $con->query($query) or trigger_error($con->error);
			while ($row = $Rbancos->fetch_array()) {
				if ($row['dias'] < 10 ) { //el rango de dias para mostrar cheques por defecto proximos 10 dias
					?>
					<div class="col-md-2"><b># Cheque </b><?php echo $row['numero_cheque']?></div>
					<div class="col-md-2"><b>Beneficiario </b><?php echo $row['beneficiario'] ?></div>
					<div class="col-md-2"><b>Monto </b><?php echo $row['monto'] ?></div>
					<div class="col-md-2"><b>fecha </b><?php echo $row['fecha_cheque'] ?></div>
					<div class="col-md-2"><a href='archivos/<?php echo $row['adjunto'] ?>'><span class='bg-primary'>Adjunto <i class="fa fa-search-plus white"></i></span></a></div>
					<div class="col-md-2"><button class="btn btn-primary" data-codigo-id="<?php echo $row['id'] ?>" data-cheque="<?php echo $row['numero_cheque']?>" data-operacion="consig" data-toggle="modal" data-target="#myModal" >Consignado</button></div>
					<?php
				}
			}
		}
	if (isset($_REQUEST['b'])) {
		$query = 'SELECT id, dias, numero_cheque, beneficiario, monto, fecha_cheque, adjunto FROM intranet_cheques_info where estado = "consignado"';
		$Rbancos = $con->query($query) or trigger_error($con->error);
			while ($row = $Rbancos->fetch_array()) {
				if ($row['dias'] < 10 ) { //el rango de dias para mostrar cheques por defecto proximos 10 dias
					?>
					<div class="col-md-2"><b># Cheque </b><?php echo $row['numero_cheque']?></div>
					<div class="col-md-2"><b>Beneficiario </b><?php echo $row['beneficiario'] ?></div>
					<div class="col-md-2"><b>Monto </b><?php echo $row['monto'] ?></div>
					<div class="col-md-2"><b>fecha </b><?php echo $row['fecha_cheque'] ?></div>
					<div class="col-md-2"><a href='archivos/<?php echo $row['adjunto'] ?>'><span class='bg-primary'>Adjunto <i class="fa fa-search-plus white"></i></span></a></div>
					<div class="col-md-1"><button class="btn btn-danger" data-codigo-id="<?php echo $row['id'] ?>" data-cheque="<?php echo $row['numero_cheque']?>" data-operacion="devuelt" data-toggle="modal" data-target="#myModal" >Devuelto</button></div>
					<div class="col-md-1"><button class="btn btn-success" data-codigo-id="<?php echo $row['id'] ?>" data-cheque="<?php echo $row['numero_cheque']?>" data-operacion="efect" data-toggle="modal" data-target="#myModal" >Efectivo</button></div>
					<?php
				}
			}
		}

	if (isset($_REQUEST['c'])) {
		$query = 'SELECT id, dias, numero_cheque, beneficiario, monto, fecha_cheque, adjunto FROM intranet_cheques_info where estado = "devuelto"';
		$Rbancos = $con->query($query) or trigger_error($con->error);
			while ($row = $Rbancos->fetch_array()) {
				if ($row['dias'] < 10 ) { //el rango de dias para mostrar cheques por defecto proximos 10 dias
					?>
					<div class="col-md-2"><b># Cheque </b><?php echo $row['numero_cheque']?></div>
					<div class="col-md-2"><b>Beneficiario </b><?php echo $row['beneficiario'] ?></div>
					<div class="col-md-2"><b>Monto </b><?php echo $row['monto'] ?></div>
					<div class="col-md-2"><b>fecha </b><?php echo $row['fecha_cheque'] ?></div>
					<div class="col-md-2"><a href='archivos/<?php echo $row['adjunto'] ?>'><span class='bg-primary'>Adjunto <i class="fa fa-search-plus white"></i></span></a></div>
					<div class="col-md-2"><button class="btn btn-danger" data-codigo-id="<?php echo $row['id'] ?>" data-cheque="<?php echo $row['numero_cheque']?>" data-operacion="cambio" data-toggle="modal" data-fecha="<?php echo $row['fecha_cheque'] ?>" data-target="#myModal" >Cambiar Fecha</button></div>
					<?php
				}
			}
		}

	if (isset($_REQUEST['d'])) {
		$query = 'SELECT id, dias, numero_cheque, beneficiario, monto, fecha_cheque, adjunto FROM intranet_cheques_info where estado = "efectivo"  LIMIT 0, 5' ;
		$Rbancos = $con->query($query) or trigger_error($con->error);
			while ($row = $Rbancos->fetch_array()) {
				if ($row['dias'] < 10 ) { //el rango de dias para mostrar cheques por defecto proximos 10 dias
					?>
					<div class="col-md-2 col-md-offset-1"><b># Cheque </b><?php echo $row['numero_cheque']?></div>
					<div class="col-md-2"><b>Beneficiario </b><?php echo $row['beneficiario'] ?></div>
					<div class="col-md-2"><b>Monto </b><?php echo $row['monto'] ?></div>
					<div class="col-md-2"><b>fecha </b><?php echo $row['fecha_cheque'] ?></div>
					<div class="col-md-2"><a href='archivos/<?php echo $row['adjunto'] ?>'><span class='bg-primary'>Adjunto <i class="fa fa-search-plus white"></i></span></a></div>
					<?php
				}
			}
		}


	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
		$query = "UPDATE intranet_cheques_info SET estado='consignado' WHERE id = $id";
		$Rbancos = $con->query($query) or trigger_error($con->error);
		$con->close();
	}
	if (isset($_REQUEST['id2'])) {
		$id = $_REQUEST['id2'];
		$query = "UPDATE intranet_cheques_info SET estado='devuelto' WHERE id = $id";
		$Rbancos = $con->query($query) or trigger_error($con->error);
		$con->close();
	}
	if (isset($_REQUEST['id3'])) {
		$id = $_REQUEST['id3'];
		$query = "UPDATE intranet_cheques_info SET estado='efectivo' WHERE id = $id";
		$Rbancos = $con->query($query) or trigger_error($con->error);
		$con->close();
	}
	if (isset($_REQUEST['id4'])) {
		$id = $_REQUEST['id4'];
		$fecha = $_REQUEST['fecha'];
		$query = "SELECT * FROM intranet_cheques_info where id = $id";
		$Rbancos = $con->query($query) or trigger_error($con->error);
			while ($row = $Rbancos->fetch_array()) {
				$int_dia = $row['valor_interes'];
				$fecha_ant = $row['fecha_cheque'];
				$fecha2 = new DateTime($fecha);
				$fecha_ant = new DateTime($fecha_ant);
				$interval = $fecha_ant->diff($fecha2);
				$dias = $interval->format('%a');
				$valor_interes = $row['valor_int_mora']+($dias*$int_dia);	
				$query2 = "UPDATE intranet_cheques_info SET fecha_cheque = '$fecha', valor_int_mora = $valor_interes, estado='por_consig' WHERE id = $id";
				$con->query($query2) or trigger_error($con->error);
				$con->close();
			}
	}
?> 