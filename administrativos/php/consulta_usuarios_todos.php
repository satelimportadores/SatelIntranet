<?php 

    include_once('class.conexion.php');

      if (isset($_REQUEST['todos'])) {

               //Consulta para todos
          $consulta = new Conexion;
          $sql01 = "SELECT id,nombre,apellido FROM intranet_usuarios WHERE activo = 1";
          $Rconsulta = $consulta->query($sql01) or trigger_error($consulta->error);
            
          echo '<option value="">Seleccione</option>';
      while ($s = $Rconsulta->fetch_array()) {
          echo "<option value='$s[id]'>$s[nombre] $s[apellido]</option>";
        }

      }



     if (isset($_REQUEST['todosdocumentos'])) {
          //Consulta para todos añadiendo el 'Todos'
          $consulta = new Conexion;
          $sql01 = "SELECT id,nombre,apellido FROM intranet_usuarios WHERE activo = 1";
          $Rconsulta = $consulta->query($sql01) or trigger_error($consulta->error);
             echo '<option value="">Seleccione</option>';
      while ($s = $Rconsulta->fetch_array()) {
          echo "<option value='$s[id]'>$s[nombre] $s[apellido]</option>";
        }
        echo '<option value="todos">Todos</option>';

      }



?>