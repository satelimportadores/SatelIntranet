<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>
<?php
  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 

//traer usuarios intranet
  $ceder = new Conexion;
  $sql01 = "SELECT id,CONCAT(nombre,' ',apellido)as nombre,cedula,username,colorhex, CASE nivel_permisos WHEN 1 THEN 'Administrativos' WHEN 2 THEN 'Contabilidad' WHEN 3 THEN 'Ventas' WHEN 4 THEN 'Bodega' WHEN 5 THEN 'Post venta' END as nivel_permisos, activo FROM intranet_usuarios";
  $rceder = $ceder->query($sql01) or trigger_error($recibido->error);
  $Nrceder = $ceder->affected_rows;
  $ceder->close();
//traer usuarios intranet

?>

<?php

if ($Nrceder >= '1') {
        //imprimir los registros
	$i = 0;
	
            while ($r=$rceder->fetch_array()) {
            	echo "<form id='form$i' name='form$i'>";
                echo "<tr class='even pointer'>";
                echo "<td class=' '>$r[id]</td>";
                $nombre = $r['nombre'];
                echo "<td class=' '>$nombre</td>";
                echo "<td class=' '>$r[cedula]</td>";
                echo "<td class=' '>$r[username]</td>";
                echo "<td class=' '>$r[nivel_permisos]</td>";
                
                //echo "<td class=' '><button type='submit' class='btn btn-warning'>Editar</button></td>";
                echo "<td class=' '><a href='usuarios_perfil.php?user_id=$r[id]' target='_blank' class='btn btn-info'>Ver perfil</a></td>";
                echo "<td class=' '><a href='usuarios_editar.php?user_id=$r[id]' target='_blank' class='btn btn-warning'>Editar</a></td>";
                echo "<td class=' '><button type='submit' data-toggle='modal' data-target='#ModalReset' data-cod-id='$r[id]' data-name-id='$nombre' class='btn btn-primary'>Reset</button></td>";
                $activo = $r['activo'];
                    if ($activo == 1) {
                      echo "<td class=' '><button type='submit' data-toggle='modal' data-target='#myModal' data-codigo-id='$r[id]' data-nombre-id='$nombre' data-accion-id='des' class='btn btn-danger'>Desactivar</button></td>";
                    }else{
                      echo "<td class=' '><button type='submit' data-toggle='modal' data-target='#myModal' data-codigo-id='$r[id]' data-nombre-id='$nombre' data-accion-id='act' class='btn btn-success'>Activar</button></td>";
                    }
                
                echo "</td>";
                echo "</tr>";
                echo "</form>";
            }


      //imprimir los registros
}



 ?>