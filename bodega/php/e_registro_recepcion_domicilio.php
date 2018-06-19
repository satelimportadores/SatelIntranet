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
      print "<script>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA');window.location='../registro_recepcion_domicilios.php';</script>"; 
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
$cardname = $_REQUEST['cardname'];
$cardname =  strtoupper($cardname);
$fecha = $_REQUEST['fecha'];
$ip = $_REQUEST['ip'];
$numero_identificacion = $_REQUEST['numero_identificacion'];
$orden_compra = $_REQUEST['orden_compra'];
$t_identificacion = $_REQUEST['t_identificacion'];
$observaciones = $_REQUEST['observaciones'];
$user_id = $_SESSION["user_id"];

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
      //  print 'Nombre: ' . $file['name'];
      //  print 'Tipo: ' . $file['type'];
      //  print 'Tamaño: ' . $file['size'];
    
        
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
      //echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
      $actualizacion_pedido->close();
  }

//actualizar pedido recepcion de mercancias = 1




  //insertar recepcion de mercancias



    $recepcionmercancia = new Conexion ;
  $acentos = $recepcionmercancia->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_recepcion_mercancia (N_encargado, Nombre_encargado,N_adjunto,cardname,fecha,ip,numero_identificacion,observaciones,t_identificacion,numero_orden_compra,numero_pedido, T_entrega, user_id) VALUES    (\"$N_encargado\",\"$Nombre_encargado\", \"$fichero_db\", \"$cardname\", \"$fecha\", \"$ip\", \"$numero_identificacion\", \"$observaciones\", \"$t_identificacion\",\"$orden_compra\",\"$numero_pedido01\",'Domicilio', \"$user_id\")";
  
  $insert = $recepcionmercancia->query($sql01) or trigger_error($recepcionmercancia->error);

  if ($insert) {
      //echo "Success! Row ID: {$recepcionmercancia->insert_id}";
      $recepcionmercancia->close();
  }

//insertar recepcion de mercancias


}

?>





 
<?php   
  
//reenvio de pagina

reenvio();

 ?>