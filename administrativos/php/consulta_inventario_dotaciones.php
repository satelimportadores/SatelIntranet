<?php 

    include_once('class.conexion.php');
     //traer inventario de dotaciones   
          $dotacion = new Conexion;
          $sql03 = "SELECT * FROM intranet_dotaciones_inventario WHERE cantidad > 0 ORDER BY referencia ASC";
          $Rdotacion = $dotacion->query($sql03) or trigger_error($dotacion->error);
  //traer inventario de dotaciones 
          
      while ($s = $Rdotacion->fetch_array()) {

                echo "<tr class='even pointer $s[referencia] esconder todo'>";
                echo "<td class=' '>$s[id]</td>";
                echo "<td class=' '>$s[referencia]</td>";
                echo "<td class=' '>$s[descripcion]</i></td>";
                echo "<td class=' '>$s[cantidad]</td>";
                echo "<td class=' '>$s[talla]</td>";
                echo "<input type='hidden' name='id_inventario[]' value='$s[id]'>";
                echo "<input type='hidden' name='cant_actual[]' value='$s[cantidad]'>";
                echo "<td class='a-right a-right '><input type='number' class='a$s[referencia] form-control' min='0' max='$s[cantidad]' name='qty[]' value='0' data-parsley-max='$s[cantidad]' /></td>";

                
                echo "</td>";
                echo "</tr>";

        }


?>