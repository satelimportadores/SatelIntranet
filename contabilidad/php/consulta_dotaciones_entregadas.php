<?php 

    



    include_once('class.conexion.php');
     //traer dotaciones entregadas   
          $entrega = new Conexion;
          $user_id = $_REQUEST['user_id'];
          $sql03 = "SELECT ide.id_inv,(SELECT idi.referencia FROM intranet_dotaciones_inventario idi WHERE ide.id_inv = idi.id ) as nombre,(SELECT idi.descripcion FROM intranet_dotaciones_inventario idi WHERE ide.id_inv = idi.id ) as descripcion,(SELECT idi.talla FROM intranet_dotaciones_inventario idi WHERE ide.id_inv = idi.id ) as talla,ide.cantidad,ide.fecha,ide.user_id,(SELECT CONCAT(nombre,' ',apellido) FROM intranet_usuarios WHERE ide.user_id = id) as empleado FROM intranet_dataciones_entrega ide WHERE ide.user_id = \"$user_id\"";
          $Rentrega = $entrega->query($sql03) or trigger_error($entrega->error);
  //traer dotaciones entregadas 
          
      while ($s = $Rentrega->fetch_array()) {

                echo "<tr class='even pointer'>";
                echo "<td class=' '>$s[user_id]</td>";
                echo "<td class=' '>$s[empleado]</td>";
                echo "<td class=' '>$s[fecha]</i></td>";
                echo "<td class=' '>$s[nombre]</td>";
                echo "<td class=' '>$s[descripcion]</td>";
                echo "<td class=' '>$s[talla]</td>";
                echo "<td class=' '>$s[cantidad]</td>";

                echo "</tr>";

        }


?>