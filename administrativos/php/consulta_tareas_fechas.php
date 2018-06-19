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
  if (isset($_REQUEST['s_fecha_dia'])) {


            $tdias = new Conexion;
                if ($_REQUEST['s_fecha_dia'] == '') {
                    $sql01 = "select `iacc`.`user_id` AS `user_id`,(select `iu`.`nombre` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `nombre`,(select `iu`.`apellido` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `apellido`,count(`iacc`.`id`) AS `cant`,(10 - count(`iacc`.`id`)) AS `falta` from `intranet_actualizacion_clientes_comentarios` `iacc` where ((date_format(`iacc`.`fecha`,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')) and (`iacc`.`tarea` = 1)) group by `iacc`.`user_id`";
                }else{
                    $fecha = $_REQUEST['s_fecha_dia'];
                    $sql01 = "select `iacc`.`user_id` AS `user_id`,(select `iu`.`nombre` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `nombre`,(select `iu`.`apellido` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `apellido`,count(`iacc`.`id`) AS `cant`,(10 - count(`iacc`.`id`)) AS `falta` from `intranet_actualizacion_clientes_comentarios` `iacc` where ((date_format(`iacc`.`fecha`,'%Y-%m-%d') = date_format(\"$fecha\",'%Y-%m-%d')) and (`iacc`.`tarea` = 1)) group by `iacc`.`user_id`";
                }
            
            $rtdias = $tdias->query($sql01) or trigger_error($tdias->error);
            $tdias->close();

                $row_cnt = $rtdias->num_rows;

            if ($row_cnt > 0) {
                $ttareas = 0;
                while ($r=$rtdias->fetch_array()) {
                    echo "<tr class='even pointer'>";
                        echo "<td class='a-center '>";
                            echo "<input type='checkbox' class='flat' name='table_records'>";
                            echo "</td>";
                            echo "<td class=' '>$r[user_id]</td>";
                            echo "<td class=' '>$r[nombre]</td>";
                            echo "<td class=' '>$r[apellido]</td>";
                            $ttareas = $ttareas + $r['cant'];
                            echo "<td class=' '>$r[cant]</td>";
                            echo "<td class=' '>$r[falta]</td>";
                        echo "</td>";
                    echo "</tr>";

                }
                echo '<tr>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td>Total:</td>';
                  echo "<td><strong class='green'>$ttareas</strong></td>";
                echo '</tr>';
            }else{
                echo 'No existen registros para esa fecha...';
            }

    }
?>

<?php 
  if (isset($_REQUEST['s_fecha_mes'])) {


            $tmes = new Conexion;
            if ($_REQUEST['s_fecha_mes'] == '') {
                $sql02 = "select `iacc`.`user_id` AS `user_id`,(select `iu`.`nombre` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `nombre`,(select `iu`.`apellido` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `apellido`,count(`iacc`.`id`) AS `cant` from `intranet_actualizacion_clientes_comentarios` `iacc` where ((date_format(`iacc`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) and (`iacc`.`tarea` = 1)) group by `iacc`.`user_id`";
            }else{
                $fecha = $_REQUEST['s_fecha_mes'];
                $sql02 = "select `iacc`.`user_id` AS `user_id`,(select `iu`.`nombre` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `nombre`,(select `iu`.`apellido` from `intranet_usuarios` `iu` where (`iacc`.`user_id` = `iu`.`id`)) AS `apellido`,count(`iacc`.`id`) AS `cant` from `intranet_actualizacion_clientes_comentarios` `iacc` where ((date_format(`iacc`.`fecha`,'%Y-%m') = date_format(\"$fecha\",'%Y-%m')) and (`iacc`.`tarea` = 1)) group by `iacc`.`user_id`";
            }
            
            $rtmes = $tmes->query($sql02) or trigger_error($tmes->error);
            $tmes->close();

                $row_cnt = $rtmes->num_rows;

                if ($row_cnt > 0) {
                    $ttareas = 0;
                    while ($r=$rtmes->fetch_array()) {
                        echo "<tr class='even pointer'>";
                            echo "<td class='a-center '>";
                            echo "<input type='checkbox' class='flat' name='table_records'>";
                            echo "</td>";
                            echo "<td class=' '>$r[user_id]</td>";
                           echo "<td class=' '>$r[nombre]</td>";
                            echo "<td class=' '>$r[apellido]</td>";
                            $ttareas = $ttareas + $r['cant'];
                            echo "<td class=' '><strong class='red'>$r[cant]</strong></td>";
                            echo "</td>";
                        echo "</tr>";
                    }
                        echo '<tr>';
                          echo '<td></td>';
                          echo '<td></td>';
                          echo '<td></td>';
                          echo '<td>Total:</td>';
                          echo "<td><strong class='green'>$ttareas</strong></td>";
                        echo '</tr>';

                }else{
                    echo 'No existen registros para esa fecha...';
                }



    }
?>