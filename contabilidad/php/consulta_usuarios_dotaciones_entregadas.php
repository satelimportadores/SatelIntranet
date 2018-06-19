<?php 

    include_once('class.conexion.php');
     //traer empleados bodega   
          $bodega = new Conexion;
          $sql03 = "SELECT id,nombre,apellido FROM intranet_usuarios WHERE id in (SELECT DISTINCT(user_id) FROM intranet_dataciones_entrega)AND nivel_permisos in (4,3)";
          $Rbodega = $bodega->query($sql03) or trigger_error($bodega->error);
  //traer empleados bodega 
          echo '<option value="">Seleccione</option>';
      while ($s = $Rbodega->fetch_array()) {
          echo "<option value='$s[id]'>$s[nombre] $s[apellido]</option>";
        }


?>