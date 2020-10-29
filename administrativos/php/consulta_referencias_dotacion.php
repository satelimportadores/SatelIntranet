<?php 

    include_once('class.conexion.php');
     //traer distintas referencias de inventario de dotaciones  
          $ref_dotaciones = new Conexion;
          $sql01 = "SELECT DISTINCT(referencia) FROM intranet_dotaciones_inventario WHERE cantidad >= 1 ORDER BY referencia ASC";
          $Rref_dotaciones = $ref_dotaciones->query($sql01) or trigger_error($ref_dotaciones->error);
  //traer distintas referencias de inventario de dotaciones
          echo '<option value="">Seleccione</option>';
          echo '<option value="todo">Todo</option>';
          echo '<option value="seleccion" >Seleccionado</option>';
      while ($s = $Rref_dotaciones->fetch_array()) {
          echo "<option value='$s[referencia]'>$s[referencia]</option>";
        }


?>