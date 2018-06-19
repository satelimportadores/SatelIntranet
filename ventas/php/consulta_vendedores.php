<?php 


  include_once('class.conexion.php');

?>


<?php 

	//consulta vendedor mes


		
	$sql = "SELECT id, nombre, apellido FROM intranet_usuarios WHERE activo = 1 AND grupo_ventas_subgrupo = 'asesores'";
	$vendedor = new conexion;
	$rvendedor = $vendedor->query($sql) or trigger_error($vendedor->error);
	$Nrvendedor = $rvendedor->num_rows;
	//consulta vendedor mes
	
	if ($Nrvendedor>0) {
		
        echo "<select name='asesor' id='asesor' class='form-control'>";
        	echo    "<option value=''>Selecciona asesor comercial</option>";
			while ($r=$rvendedor->fetch_array()) {

                    echo    "<option value='$r[id]'>$r[nombre] $r[apellido]</option>";
                    
            }
        	echo    "<option value='1000'>Inactivar</option>";
        echo "</select>";
        
	}else{

		echo 'No existen registros de asesores comerciales';
	}


	

	

 ?>