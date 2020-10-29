<?php
session_start();
$user_id = $_SESSION["user_id"];
$user_sap = $_SESSION["user_sap"];


//consulta clientes para datatable
if (isset($_REQUEST['dt'])) {
  //traer clientes
          include('class.conexion.php');
          $clientes = new Conexion;
          $sql03 = "SELECT cardcode,cardname,persona_contacto,direccion,telefono,movil_new,cardcode FROM intranet_actualizacion_clientes WHERE activo = 'si' AND user_sap = \"$user_sap\"";
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
  }        
//consulta clientes para datatable

?>