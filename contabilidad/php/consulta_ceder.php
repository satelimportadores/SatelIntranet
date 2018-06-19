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

//traer pendientes por ceder
  $ceder = new Conexion;
  $sql01 = "select `itc`.`fecha` AS `fecha`,`itc`.`user_id_origen` AS `user_id_origen`,(select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`itc`.`user_id_origen` = `iu`.`id`)) AS `origen`,`itc`.`cardcode` AS `cardcode`,(select `iac`.`cardname` from `intranet_actualizacion_clientes` `iac` where (`itc`.`cardcode` = `iac`.`cardcode`)) AS `cliente`,`itc`.`user_id_destino` AS `user_id_destino`,(select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`itc`.`user_id_destino` = `iu`.`id`)) AS `destino` from `intranet_transmitir_cliente` `itc` where isnull(`itc`.`transmitido`)";
  $rceder = $ceder->query($sql01) or trigger_error($ceder->error);
  $Nrceder = $ceder->affected_rows;
  $ceder->close();
//traer pendientes por ceder

?>

<?php

if ($Nrceder >= '1') {
        //imprimir los registros
	$i = 0;
	
            while ($r=$rceder->fetch_array()) {
            	echo "<form id='form$i' name='form$i'>";
                echo "<tr class='even pointer'>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[user_id_origen]</td>";
                echo "<td class=' '>$r[origen]</td>";
                echo "<td class=' '>$r[cardcode]</td>";
                echo "<td class=' '>$r[cliente]</td>";
                echo "<td class=' '>$r[user_id_destino]</td>";
                 if ($r['destino'] == '') {
                   $r['destino'] = 'INACTIVO';
                 } 
                echo "<td class=' '>$r[destino]</td>";

                echo "<td class=' '><button type='submit' data-toggle='modal' data-target='#myModal' data-codigo-id='$r[cardcode]' data-userd-id='$r[user_id_destino]' data-cliente-id='$r[cliente]' data-destino-id='$r[destino]' class='btn btn-success'>Autorizar</button></td>";
                echo "</td>";
                echo "</tr>";
                echo "</form>";
            }


      //imprimir los registros
}



 ?>