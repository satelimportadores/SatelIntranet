<?php 

    include_once('class.conexion.php');

    if (isset($_REQUEST['ref'])) {
      
             //traer distintas referencias de inventario de dotaciones  
          $souvenir = new Conexion;
          $sql01 = "SELECT DISTINCT(referencia) FROM intranet_souvenir_inventario ORDER BY referencia ASC";
          $Rsouvenir = $souvenir->query($sql01) or trigger_error($souvenir->error);
  //traer distintas referencias de inventario de dotaciones
          echo '<option value="">Seleccione</option>';
          echo '<option value="todo">Todo</option>';
          echo '<option value="seleccion" >Seleccionado</option>';
      while ($s = $Rsouvenir->fetch_array()) {
          echo "<option value='$s[referencia]'>$s[referencia]</option>";
        }

    }

    if (isset($_REQUEST['ref_entregados'])) {
      
             //traer distintas referencias de inventario de dotaciones  
          $souvenir = new Conexion;
          $sql01 = "SELECT DISTINCT(referencia) FROM intranet_souvenir_inventario ORDER BY referencia ASC";
          $Rsouvenir = $souvenir->query($sql01) or trigger_error($souvenir->error);
  //traer distintas referencias de inventario de dotaciones
          echo '<option value="">Seleccione</option>';
      while ($s = $Rsouvenir->fetch_array()) {
          echo "<option value='$s[referencia]'>$s[referencia]</option>";
        }

    }


?>