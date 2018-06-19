<?php 

if (isset($_REQUEST['user_id'])) {

      include_once('class.conexion.php');

    $user_id = $_REQUEST['user_id'];

     //traer inventario de dotaciones general   
          $memorandos = new Conexion;
          $sql03 = "SELECT iud.user_id, (SELECT CONCAT(nombre,' ',apellido) FROM intranet_usuarios iu WHERE iu.id = iud.user_id) as nombre, iud.nombre_adjunto,iud.tipo_documento,iud.fecha FROM intranet_usuarios_documentos iud WHERE iud.user_id = \"$user_id\" AND iud.tipo_documento not in ('cedula','seguridad_social','contrato','hoja_de_vida')";
          $Rmemorandos = $memorandos->query($sql03) or trigger_error($memorandos->error);
  //traer inventario de dotaciones general 
          
      while ($s = $Rmemorandos->fetch_array()) {

                
                echo "<tr class='even pointer'>";
                  echo "<td class=' '>$s[user_id]</td>";
                  echo "<td class=' '>$s[nombre]</td>";
                  $namead = $s['nombre_adjunto'];
                  echo "<td class=' '><a target='_blank' href='usuarios_memorandos/$namead'><i class='fa fa-search-plus green'> $namead</i></td>";
                  echo "<td class=' '>$s[tipo_documento]</td>";
                  echo "<td class=' '>$s[fecha]</td>";
                echo "</tr>";
        }
}



?>

