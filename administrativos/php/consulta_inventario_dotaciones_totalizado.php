<?php 

if (isset($_REQUEST['user_id'])) {

      include_once('class.conexion.php');

    $user_id = $_REQUEST['user_id'];

     //traer inventario de dotaciones general   
          $dotacion = new Conexion;
          $sql03 = "SELECT iu.id,CONCAT(iu.nombre,' ',iu.apellido) as nombre, ide.id_inv,idi.referencia,idi.descripcion,ide.cantidad,ide.fecha FROM intranet_usuarios iu INNER JOIN intranet_dataciones_entrega ide ON iu.id = ide.user_id INNER JOIN intranet_dotaciones_inventario idi ON ide.id_inv = idi.id WHERE iu.id = \"$user_id\"";
          $Rdotacion = $dotacion->query($sql03) or trigger_error($dotacion->error);
  //traer inventario de dotaciones general 
          
      while ($s = $Rdotacion->fetch_array()) {

                
                echo "<tr class='even pointer'>";
                    echo "<td class=' '>$s[id]</td>";
                    echo "<td class=' '>$s[nombre]</td>";
                    echo "<td class=' '>$s[id_inv]</td>";
                    echo "<td class=' '>$s[referencia]</td>";
                    echo "<td class=' '>$s[descripcion]</td>";
                    echo "<td class=' '>$s[cantidad]</td>";
                    echo "<td class=' '>$s[fecha]</td>";
                    echo "<td class=' '><a href='./usuarios_entrega_dotacion_totalizado.php?user_id=$s[id]' target='_blank'><i class='fa fa-print blue'></i></a></td>";
                echo "</tr>";
        }
}



?>

