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
      print "<script>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA');window.location='../index.php';</script>"; 
            echo '</head>';
            echo '<body>';
            echo '</body>';
            echo '</html>';

    } 
?>

<?php

if (isset($_REQUEST) || $_REQUEST['orden_compra'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$N_encargado = $_REQUEST['N_encargado'];
$N_revision = $_REQUEST['N_revision'];
$fecha = $_REQUEST['fecha'];
$ip = $_REQUEST['ip'];
$observaciones = $_REQUEST['observaciones'];
$orden_compra = $_REQUEST['orden_compra'];
$user_id =  $_SESSION["user_id"];

//traer pedido

 $numero_pedido = new Conexion;
 $sql01 = "SELECT numero_pedido FROM intranet_orden_compra WHERE numero_orden_compra = \"$orden_compra\" ";
 $Rtcardcode = $numero_pedido->query($sql01) or trigger_error($numero_pedido->error);
 $numero_pedido->close();

    $r=$Rtcardcode->fetch_array();

        $numero_pedido01 = $r['numero_pedido'];

        if ($numero_pedido01 <> '') {
        
        //actualizar pedido orden de compra = 0
                $actualizacion_pedido = new Conexion ;
                $acentos = $actualizacion_pedido->query("SET NAMES 'utf8'");
                $sql01 = "UPDATE intranet_registro_pedido SET  orden_compra = 0, orden_compra_realizada = 1 WHERE numero_pedido = \"$numero_pedido01\"";

                $insert = $actualizacion_pedido->query($sql01) or trigger_error($actualizacion_pedido->error);

                if ($insert) {
                   // echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
                $actualizacion_pedido->close();
                }
        //actualizar pedido orden de compra = 0

      }


//traer pedido


       //traer nombre encargado

 $encargado = new Conexion;
 $sql01 = "SELECT * FROM intranet_usuarios WHERE id = \"$N_encargado\" ";
 $Rencargado = $encargado->query($sql01) or trigger_error($encargado->error);
 $encargado->close();

    $r=$Rencargado->fetch_array();

        if ($r['nombre'] <> '') {
        $Nombre_encargado = $r['nombre'].' '.$r['apellido'];
      }else{
        $Nombre_encargado = '';
      }


//traer nombre encargado

       //traer nombre revision

 $revision = new Conexion;
 $sql01 = "SELECT * FROM intranet_usuarios WHERE id = \"$N_revision\" ";
 $Rrevision = $revision->query($sql01) or trigger_error($revision->error);
 $revision->close();

    $r=$Rrevision->fetch_array();

        if ($r['nombre'] <> '') {
        $Nombre_revision = $r['nombre'].' '.$r['apellido'];
      }else{
        $Nombre_revision = '';
      }


//traer nombre revision


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
    //    print 'Nombre: ' . $file['name'];
    //    print 'Tipo: ' . $file['type'];
    //    print 'Tamaño: ' . $file['size'];
    
        
    $fichero_subido = $uploads_dir . 'recepcion - '.$orden_compra .' - ' . $file['name'];



    if ($file['name'] == '') {
    $fichero_db = '';
    }else{
    $fichero_db = 'recepcion - '.$orden_compra .' - ' . $file['name'];
    } 
    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

  }

   //datos adjuntos





//actualizar pedido recepcion de mercancias = 1



    $actualizacion_pedido = new Conexion ;
  $acentos = $actualizacion_pedido->query("SET NAMES 'utf8'");
  $sql01 = "UPDATE intranet_orden_compra SET  recepcion_mercancia = 1,fecha_entrega = \"$fecha\" WHERE numero_orden_compra = \"$orden_compra\"";
  
  $insert = $actualizacion_pedido->query($sql01) or trigger_error($actualizacion_pedido->error);

  if ($insert) {
     // echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
      $actualizacion_pedido->close();
  }

//actualizar pedido recepcion de mercancias = 1





  //insertar recepcion de mercancias



    $recepcionmercancia = new Conexion ;
  $acentos = $recepcionmercancia->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_recepcion_mercancia (N_encargado,N_revision,fecha,ip,observaciones,numero_orden_compra,N_adjunto,numero_pedido,Nombre_encargado,Nombre_revision, T_entrega, user_id) VALUES  (\"$N_encargado\",\"$N_revision\",\"$fecha\",\"$ip\",\"$observaciones\",\"$orden_compra\", \"$fichero_db\", \"$numero_pedido01\",\"$Nombre_encargado\",\"$Nombre_revision\", 'Recogida',$user_id)";
  
  $insert = $recepcionmercancia->query($sql01) or trigger_error($recepcionmercancia->error);

  if ($insert) {
     // echo "Success! Row ID: {$recepcionmercancia->insert_id}";
      $recepcionmercancia->close();
  }

//insertar recepcion de mercancias


}

?>





 
<?php   
  
//reenvio de pagina

reenvio();


 ?>