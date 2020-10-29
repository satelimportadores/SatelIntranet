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
//traer tallas   
          $tallas = new Conexion;
          $sql01 = "SELECT id, CONCAT(nombre,' ',apellido) as nombres,talla_botas,talla_camisa,talla_pantalon FROM `Tallas de los empleados` WHERE (talla_botas <> '' OR talla_camisa <> '' OR talla_pantalon <> '') ORDER BY id";
          $Rtallas = $tallas->query($sql01) or trigger_error($tallas->error);
//traer tallas 
          
          if (!$Rtallas) {
           Die ('Error');
          }else{
            while ($data = $Rtallas->fetch_array()) {
              $arreglo['data'][] = array_map('utf8_encode', $data);
            }
            echo json_encode($arreglo);
            //$tallas->free_result();
            $tallas->close();
          }

?>
