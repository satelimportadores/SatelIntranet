<?php 
include_once('class.conexion.php');
if (isset($_REQUEST['ref'])) {

      

    $ref = $_REQUEST['ref'];

     //traer souvenires entregados   
          $souvenir = new Conexion;
          $sql01 = "select `ise`.`id_inv` AS `id_inv`,(select `isi`.`referencia` from `intranet_souvenir_inventario` `isi` where (`isi`.`id` = `ise`.`id_inv`)) AS `referencia`,(select `isi`.`descripcion` from `intranet_souvenir_inventario` `isi` where (`isi`.`id` = `ise`.`id_inv`)) AS `descripcion`,`ise`.`cantidad` AS `cantidad`,`ise`.`fecha` AS `fecha`,`ise`.`user_id` AS `user_id`,(select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`ise`.`user_id` = `iu`.`id`)) AS `usuario`,`ise`.`comentarios` AS `comentarios` from `intranet_souvenir_entrega` `ise` where `ise`.`referencia` = \"$ref\"";
          $Rsouvenir = $souvenir->query($sql01) or trigger_error($souvenir->error);
  //traer souvenires entregados 
          
      while ($s = $Rsouvenir->fetch_array()) {

                
                echo "<tr class='even pointer'>";

                      echo "<td class=' '>$s[referencia]</td>";
                      echo "<td class=' '>$s[descripcion]</td>";
                      echo "<td class=' '>$s[cantidad]</i></td>";
                      echo "<td class=' '>$s[fecha]</i></td>";
                      echo "<td class=' '>$s[usuario]</i></td>";
                      echo "<td class=' '>$s[comentarios]</i></td>";
             
                echo "</tr>";
        }
}else{

       //traer souvenires entregados   
          $souvenir = new Conexion;
          $sql01 = "select `ise`.`id_inv` AS `id_inv`,(select `isi`.`referencia` from `intranet_souvenir_inventario` `isi` where (`isi`.`id` = `ise`.`id_inv`)) AS `referencia`,(select `isi`.`descripcion` from `intranet_souvenir_inventario` `isi` where (`isi`.`id` = `ise`.`id_inv`)) AS `descripcion`,`ise`.`cantidad` AS `cantidad`,`ise`.`fecha` AS `fecha`,`ise`.`user_id` AS `user_id`,(select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`ise`.`user_id` = `iu`.`id`)) AS `usuario`,`ise`.`comentarios` AS `comentarios` from `intranet_souvenir_entrega` `ise`";
          $Rsouvenir = $souvenir->query($sql01) or trigger_error($souvenir->error);
  //traer souvenires entregados 
          
      while ($s = $Rsouvenir->fetch_array()) {

                
                echo "<tr class='even pointer'>";

                      echo "<td class=' '>$s[referencia]</td>";
                      echo "<td class=' '>$s[descripcion]</td>";
                      echo "<td class=' '>$s[cantidad]</i></td>";
                      echo "<td class=' '>$s[fecha]</i></td>";
                      echo "<td class=' '>$s[usuario]</i></td>";
                      echo "<td class=' '>$s[comentarios]</i></td>";
             
                echo "</tr>";
        }


}



?>

