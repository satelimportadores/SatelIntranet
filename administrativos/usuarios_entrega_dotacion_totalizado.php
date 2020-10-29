<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Impresión de Entrega de dotación</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
	


			<div class="col-md-12">
				<img src="images/header_satel_datacion.png" alt="">
			</div>

			<div class="col-md-12">
				<h3>SATEL IMPORTADORES DE FERRETERÍA S.A.S.</h3>
			</div>

			<div class="col-md-12">
				<?php 
					if (isset($_REQUEST['user_id'])) {
						include_once('php/class.conexion.php');
					}
				?>
			</div>

			<div class="col-md-12">
				Señor(a):
			</div>

			<div class="col-md-12">
				<?php 
					if (isset($_REQUEST['user_id'])) {
						$user_id = $_REQUEST['user_id'];
							//traer inventario de dotaciones general   
								$usuario = new Conexion;
								$sql01 = "SELECT CONCAT(nombre,' ',apellido) as nombre FROM intranet_usuarios WHERE id = \"$user_id\"";
								$Rusuario = $usuario->query($sql01) or trigger_error($usuario->error);
							//traer inventario de dotaciones general
							$s = $Rusuario->fetch_array();	
							echo '<strong>'.$s['nombre'].'</strong>';
					}
				?>
			</div>

			<div class="col-md-12">
				<p>E.S.M</p>
			
			</div>

			<div class="col-md-12">
				<p><strong>Ref.: Entrega de Dotación</strong></p> 
				<div class="col-md-5">
					<p class="text-justify">Por medio de la presente acta, se hace entrega de la siguiente dotación que corresponden a la dotación anual:</p>
				</div>
			</div>

			<div class="col-md-12">
				<?php 
					if (isset($_REQUEST['user_id'])) {
						$user_id = $_REQUEST['user_id'];
						//traer inventario de dotaciones general   
						$dotacion = new Conexion;
						$sql03 = "SELECT ide.id_inv,idi.referencia,idi.talla,idi.descripcion,ide.cantidad,ide.fecha FROM intranet_usuarios iu INNER JOIN intranet_dataciones_entrega ide ON iu.id = ide.user_id INNER JOIN intranet_dotaciones_inventario idi ON ide.id_inv = idi.id WHERE iu.id = \"$user_id\"";
						$Rdotacion = $dotacion->query($sql03) or trigger_error($dotacion->error);
						//traer inventario de dotaciones general 
						echo "<ul>";
							while ($s = $Rdotacion->fetch_array()) {
								
								echo "<li class=''><strong>$s[id_inv]</strong> - $s[referencia] - $s[descripcion]-Talla: $s[talla] - <strong>Cantidad:</strong> $s[cantidad] - Fecha: $s[fecha]</li>";
								}
						echo "</ul>";	
					}

				 ?>
			</div>

			<div class="col-md-12">
				<p><strong>El trabajador manifiesta que:</strong></p>
				<div class="col-md-5">
					<p class="text-justify">La dotación que aquí se entrega es y será de la empresa en todo momento, en caso de terminación del contrato de trabajo o la entrega de una nueva dotación, me comprometo a hacer la devolución de la dotación si la empresa me lo solicita.</p>
				</div>
			</div>

			<div class="col-md-12">
					<div class="col-md-5">
					<p class="text-justify">En caso de daño de la dotación o parte de ella, el trabajador debe devolverla a la empresa.</p>
				</div>
			</div>

			<div class="col-md-12">
					<div class="col-md-5">
						<p class="text-justify">El trabajador autoriza expresamente a la empresa mediante este documento a descontar de salarios y liquidación de prestaciones los valores de la dotación cuando en cualquiera de los casos anteriores no la devuelve al empleador.</p>
						<p>Atentamente,</p>
						<p><br></p>
						<p><br></p>
						<p>-------------------------</p>
						<p>C.C.:</p>
					</div>

			</div>

			<div class="col-md-12">
				<img src="images/footer_satel_datacion.png" alt="">
			</div>



	
</body>
</html>