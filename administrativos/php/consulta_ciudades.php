<?php 
include('class.conexion.php');

	if (isset($_REQUEST['ciudad'])){

		
				//buscar ciudades en la base de datos
						$ciudad = new Conexion;
						$sql01 = "SELECT municipio_cod,municipio_nom FROM intranet_colombia_ciudades ORDER BY municipio_nom";
						$Rciudades = $ciudad->query($sql01) or trigger_error($ciudad->error);

								echo '<option value="">Seleccione</option>';

                        while ($s=$Rciudades->fetch_array()) {
                         		echo "<option value='$s[municipio_cod]'>$s[municipio_nom]</option>";
                        }

				//buscar ciudades en la base de datos
		
	}

 ?>