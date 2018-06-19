<?php 
	  include('class.conexion.php');
	  $con = new conexion;
      $query3 = "SELECT * FROM intranet_tipo_impuesto";
      $result3 = $con->query($query3) or trigger_error($con->error);
      while ($row3 = $result3->fetch_array()) {
        ?>
        <option value="<?php echo $row3['nom_imp']; ?>"><?php echo $row3['nom_imp']; ?></option>
        <?php 
      }
?>