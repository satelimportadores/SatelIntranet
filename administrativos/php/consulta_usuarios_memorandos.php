<?php 

    include_once('class.conexion.php');
     //traer empleados bodega   
          $memorando = new Conexion;
          $sql03 = "SELECT DISTINCT(iud.user_id), (SELECT CONCAT(nombre,' ',apellido) as nombre FROM intranet_usuarios iu WHERE iu.id = iud.user_id) as nombre FROM intranet_usuarios_documentos iud";
          $Rmemorando = $memorando->query($sql03) or trigger_error($memorando->error);
  //traer empleados bodega 
          echo '<option value="">Seleccione</option>';
      while ($s = $Rmemorando->fetch_array()) {
          echo "<option value='$s[user_id]'>$s[nombre]</option>";
        }


?>