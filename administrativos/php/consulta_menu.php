<?php
include('class.conexion.php');

//traer clientes   
          $clientes = new Conexion;
          $sql01 = "SELECT DISTINCT(SUBSTRING(cardname,1,1)) as iniciales FROM intranet_actualizacion_clientes ORDER BY iniciales ASC";
          $Rclientes = $clientes->query($sql01) or trigger_error($clientes->error);
//traer clientes 
          
          if (!$Rclientes) {
           Die ('Error');
          }else{
              while ($r = $Rclientes->fetch_array()) {
                 echo "<li><a href='contacts.php?letra=$r[iniciales]'>$r[iniciales]</a></li>";
              
            }
    $clientes->close();
          }
?>