<?php 
	  include('class.conexion.php');
	  $con = new conexion;
	  $id = $_REQUEST['id'];
      $query3 = "SELECT adjuntos FROM intranet_adjuntos_imp WHERE registro = $id order by adjuntos asc";
      $result3 = $con->query($query3) or trigger_error($con->error);
      while ($row3 = $result3->fetch_array()) {
        ?>
        <a href="archivos_impuestos/<?php echo $row3['adjuntos'];?>" target="_blank"><?php echo $row3['adjuntos'];?></a><br>
        <?php 
      }
?>