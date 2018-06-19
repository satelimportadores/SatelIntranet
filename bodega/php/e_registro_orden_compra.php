<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
 function reenvio(){
    //reenvio de pagina
    
            echo '<!DOCTYPE html>';
            echo '<html lang="es">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<title>Registro de fallas</title>';
      print "<script>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA');window.location='../registro_orden_compra.php';</script>";
            echo '</head>';
            echo '<body>';
            echo '</body>';
            echo '</html>';

    } 
?>

<?php

if (isset($_REQUEST) || $_REQUEST['numero_orden_compra'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$N_encargado = $_REQUEST['N_encargado'];
$cardcode = $_REQUEST['cardcode'];
$cardcode =  strtoupper($cardcode);
//echo $cardcode;
$cardname = $_REQUEST['cardname'];
$cardname =  strtoupper($cardname);
$fecha = $_REQUEST['fecha'];
$fecha_entrega = $_REQUEST['fecha_entrega'];
$ip = $_REQUEST['ip'];
$numero_orden_compra = $_REQUEST['numero_orden_compra'];
$numero_pedido = $_REQUEST['numero_pedido'];
$observaciones = $_REQUEST['observaciones'];
$t_compra = $_REQUEST['t_compra'];
$t_entrega = $_REQUEST['t_entrega'];
$zona = $_REQUEST['zona'];
$user_id = $_SESSION["user_id"];



  //Subir Fichero
  
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
               foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


if ($_FILES['file']) {  
    $uploads_dir = '../uploads/';
    $file_ary = reArrayFiles($_FILES['file']);

  
  
    foreach ($file_ary as $file) {
   //     print 'Nombre: ' . $file['name'];
   //     print 'Tipo: ' . $file['type'];
  //      print 'Tamaño: ' . $file['size'];
    
        
    $fichero_subido = $uploads_dir . 'orden_compra - '.$numero_orden_compra.' - ' . $file['name'];

          if ($file['name'] == '') {
    $fichero_db = '';
    }else{
    $fichero_db = 'orden_compra - '.$numero_orden_compra.' - ' . $file['name'];
    }









    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

  }

   //datos adjuntos




//actualizar pedido orden de compra = 1



    $actualizacion_pedido = new Conexion ;
  $acentos = $actualizacion_pedido->query("SET NAMES 'utf8'");
  $sql01 = "UPDATE intranet_registro_pedido SET  orden_compra = 1 WHERE numero_pedido = \"$numero_pedido\"";
  
  $insert = $actualizacion_pedido->query($sql01) or trigger_error($actualizacion_pedido->error);

  if ($insert) {
  //    echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
      $actualizacion_pedido->close();
  }

//actualizar pedido orden de compra = 1

  //insertar orden de compra



    $ordencompra = new Conexion ;
  $acentos = $ordencompra->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_orden_compra (N_encargado ,cardcode ,cardname ,fecha ,fecha_entrega ,N_adjuntos,ip,numero_orden_compra ,numero_pedido ,observaciones ,t_compra ,t_entrega ,zona, user_id) VALUES  (\"$N_encargado\",\"$cardcode\",\"$cardname\",\"$fecha\",\"$fecha_entrega\",\"$fichero_db\",\"$ip\",\"$numero_orden_compra\",\"$numero_pedido\",\"$observaciones\",\"$t_compra\",\"$t_entrega\",\"$zona\",\"$user_id\")";
  
  $insert = $ordencompra->query($sql01) or trigger_error($ordencompra->error);

  if ($insert) {
   //   echo "Success! Row ID: {$ordencompra->insert_id}";
      $ordencompra->close();
  }

//insertar orden de compra


}

?>

<?php 


//Guardar en el calendario del comercial
 $idcomercial = new Conexion;
 $sql01 = "SELECT user_id FROM intranet_registro_pedido WHERE numero_pedido = \"$numero_pedido\" ";
 $Ridcomercial = $idcomercial->query($sql01) or trigger_error($idcomercial->error);
 $idcomercial->close();

    $r=$Ridcomercial->fetch_array();
    $user_id_comercial = $r['user_id'];

    if ($t_compra == 'Stock') {
      $user_id_comercial = $_SESSION["user_id"];
    }

                  //insertar orden de compra

                          $title = "Compra: $numero_orden_compra - pedido: $numero_pedido";

                          $calendario = new Conexion ;
                          $acentos = $calendario->query("SET NAMES 'utf8'");
                          $sql01 = "INSERT INTO intranet_calendario (title,start ,end ,user_id,color) VALUES  (\"$title\",\"$fecha_entrega\",\"$fecha_entrega\",\"$user_id_comercial\",'#66cccc')";
                          $insert = $calendario->query($sql01) or trigger_error($calendario->error);

                          if ($insert) {
                          //echo "Success! Row ID: {$calendario->insert_id}";
                          }

                          $calendario01 = new Conexion ;
                          $acentos = $calendario01->query("SET NAMES 'utf8'");
                          $sql02 = "INSERT INTO intranet_calendario (title,start ,end ,bodega, color) VALUES  (\"$title\",\"$fecha_entrega\",\"$fecha_entrega\",1,'#66cccc')";
                          $Rcalendario01 = $calendario01->query($sql02) or trigger_error($calendario01->error);

                          if ($Rcalendario01) {
                          //echo "Success! Row ID: {$calendario->insert_id}";
                          }

                  //insertar orden de compra
                          
//Guardar en el calendario del comercial




 ?>





 
<?php   
  
//reenvio de pagina

reenvio();

 ?>