<?php 

 function reenvio(){
	//reenvio de pagina
	
			echo '<!DOCTYPE html>';
			echo '<html lang="es">';
			echo '<head>';
			echo '<meta charset="UTF-8">';
			print "<script>window.location='../usuarios_entrega_ver.php';</script>";
			echo '</head>';
			echo '<body>';
			echo '</body>';
			echo '</html>';

	} 
	
	if (isset($_REQUEST['empleados'])) {

		$empleado = $_REQUEST['empleados'];
		$fecha =  $_REQUEST['fecha'];
		$cant_actual = $_REQUEST['cant_actual'];

		$registros = count($_REQUEST['id_inventario']);
		$id_inventario = $_REQUEST['id_inventario'];
		$cantidad = $_REQUEST['qty'];

			for ($i=0; $i < $registros; $i++) { 

				//insertar en tabla de dotaciones
					include_once('class.conexion.php');

          $entrega = new Conexion;
          $sql03 = "INSERT INTO intranet_dataciones_entrega (id_inv, user_id, cantidad, fecha) VALUES(\"$id_inventario[$i]\",\"$empleado\",\"$cantidad[$i]\",\"$fecha\");";
          $sql04 = "DELETE FROM intranet_dataciones_entrega WHERE cantidad = 0";
          $Rentrega = $entrega->query($sql03) or trigger_error($entrega->error);
          $Rupdate = $entrega->query($sql04) or trigger_error($entrega->error);

				//insertar en tabla de dotaciones

  		//Actualizar el inventario
          $quedan = $cant_actual[$i] - $cantidad[$i];
          $actualizar = new Conexion;
          $sql03 = " UPDATE intranet_dotaciones_inventario SET cantidad = \"$quedan\" WHERE id = \"$id_inventario[$i]\";";
          $Ractualizar = $actualizar->query($sql03) or trigger_error($actualizar->error);



        //Actualizar el inventario
        print "<script>alert(\"Registro ingresado!\");</script>";
          reenvio();
			}


reenvio();

	}

reenvio();

?>