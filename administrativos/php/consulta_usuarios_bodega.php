<?php 

    include_once('class.conexion.php');
     //traer empleados bodega   
          $bodega = new Conexion;
          $sql03 = "SELECT * FROM intranet_usuarios WHERE  activo = '1'  and id not in (9)";
          $Rbodega = $bodega->query($sql03) or trigger_error($bodega->error);
  //traer empleados bodega 
          echo '<option value="">Seleccione</option>';
      while ($s = $Rbodega->fetch_array()) {
          echo "<option value='$s[id]'>$s[nombre] $s[apellido]</option>";
        }


?>