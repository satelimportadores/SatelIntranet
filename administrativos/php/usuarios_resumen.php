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
//traer clientes   
          $clientes = new Conexion;
          $sql03 = "SELECT id,CONCAT(nombre,' ',apellido)as nombre,cedula,username, CASE nivel_permisos WHEN 1 THEN 'ADMINISTRATIVOS' WHEN 2 THEN 'CONTABILIDAD' WHEN 3 THEN 'VENTAS' WHEN 4 THEN 'BODEGA' WHEN 5 THEN 'POS VENTA' END as nivel_permisos, activo,(SELECT COUNT(user_id) FROM intranet_actualizacion_clientes WHERE tarea is NULL AND user_id = id) as tareas FROM intranet_usuarios";
          $Rclientes = $clientes->query($sql03) or trigger_error($clientes->error);
//traer clientes 
          
          if (!$Rclientes) {
           Die ('Error');
          }else{
            while ($data = $Rclientes->fetch_array()) {
              $arreglo['data'][] = array_map('utf8_encode', $data);
            }
            echo json_encode($arreglo);
            //$clientes->free_result();
            $clientes->close();
          }

?>
