<?php 

    include_once('class.conexion.php');
     //traer precios   
          $precios = new Conexion;


    if (isset($_REQUEST['satel'])) {      
          $sql03 = "SELECT codigo_producto_var,nombre_producto,stock,precio FROM productos_satel";
          $Rprecios = $precios->query($sql03) or trigger_error($precios->error);
  //traer precios 
          
          if (!$Rprecios) {
           Die ('Error');
          }else{
            while ($data = $Rprecios->fetch_array()) {
              $arreglo['data'][] = array_map('utf8_encode', $data);
            }
            echo json_encode($arreglo);
//            $usuarios->free_result();
            $precios->close();
          }
    }
    
    if (isset($_REQUEST['trust'])) {      
          $sql03 = "SELECT codigo_producto_var,nombre_producto,stock,precio FROM productos_trust";
          $Rprecios = $precios->query($sql03) or trigger_error($precios->error);
  //traer precios 
          
          if (!$Rprecios) {
           Die ('Error');
          }else{
            while ($data = $Rprecios->fetch_array()) {
              $arreglo['data'][] = array_map('utf8_encode', $data);
            }
            echo json_encode($arreglo);
//            $usuarios->free_result();
            $precios->close();
          }
    }     


?>