<?php 

if (isset($_REQUEST['user_id'])) {

      include_once('class.conexion.php');

    $user_id = $_REQUEST['user_id'];

     //traer inventario de dotaciones general   
          $dotacion = new Conexion;
          $sql03 = "SELECT ide.user_id,(SELECT CONCAT(nombre,' ',apellido) FROM intranet_usuarios WHERE id = ide.user_id ) as nombre, post_imagen, post_comentarios, ide.fecha FROM intranet_dataciones_entrega ide WHERE user_id = \"$user_id\" GROUP BY ide.user_id,ide.fecha";
          $Rdotacion = $dotacion->query($sql03) or trigger_error($dotacion->error);
  //traer inventario de dotaciones general 
          
      while ($s = $Rdotacion->fetch_array()) {

                
                echo "<tr class='even pointer'>";
                $user_id = $s['user_id'];
                $fecha = $s['fecha'];
                echo "<td class=' '>$user_id</td>";
                echo "<td class=' '>$s[nombre]</td>";
                echo "<td class=' '>$fecha</i></td>";
                echo "<td class=' '><a href='usuarios_entrega_dotacion_discriminado.php?user_id=$s[user_id]&fecha=$s[fecha]'><i class='fa fa-search-plus green'></i></a></td>";
                
                $post_imagen = $s['post_imagen'];
                if ($post_imagen <> '') {
                  echo "<td class=' '><a href='img_dotacion/$post_imagen' target='_blank'><i class='fa fa-search-plus blue'></i></a></td>";
               }else{
                  echo "<td class=' '><i class='fa fa-times red'></i></td>";
               }

               if ($post_imagen == '') {
                 echo "<td class=' '><a href='#myModal' data-toggle='modal' id='ceder' role='button' data-codigo-id='$user_id' data-fecha-id='$fecha' class='btn btn-primary'>+ Imagen</a></td>";
               }else{
                echo "<td class=' '><i class='fa fa-thumbs-o-up blue'></i></td>";
               }
                
                

                echo "</tr>";
        }
}



?>

