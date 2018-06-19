<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}

?>

<?php

if (isset($_REQUEST) || $_REQUEST['numero_pedido'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$calificacion = $_REQUEST['calificacion'];
$observaciones = $_REQUEST['comentarios'];
$fecha = $_REQUEST['fecha'];
$ip = $_REQUEST['ip'];
$numero_pedido = $_REQUEST['numero_pedido'];
$user_id = $_SESSION["user_id"];

$materiales = '';

//checkbox--//////------

  if (isset($_REQUEST['post_error'])) {

    foreach ($_REQUEST['post_error'] as $posterror){

   $material[$i]=$posterror;
   
   $materiales="".$material[$i].", ".$materiales."";
   

   //insertar en tabla secundaria los errores
        $in_errores = new Conexion ;
  $acentos = $in_errores->query("SET NAMES 'utf8'");
  $numero = $material[$i];
  echo $numero;
  $sql02 = "INSERT INTO intranet_post_venta_rerrores (fecha, numero_pedido, user_id, error) VALUES  (\"$fecha\", \"$numero_pedido\",\"$user_id\",\"$numero\")";
  
  $insert = $in_errores->query($sql02) or trigger_error($in_errores->error);

  if ($insert) {
      //echo "Success! Row ID: {$in_errores->insert_id}";
      $in_errores->close();
  }
//insertar en tabla secundaria los errores  
  $i++; 

}
  }
//checkbox--//////------



if (isset($_REQUEST['pqrsf'])) {
    $pqrsf = 1;
}else{
  $pqrsf = 0;
}


//traer cardcode con el pedido

 $tcardcode = new Conexion;
 $sql01 = "SELECT cod_cliente FROM intranet_registro_pedido WHERE numero_pedido = \"$numero_pedido\" ";
 $Rtcardcode = $tcardcode->query($sql01) or trigger_error($tcardcode->error);
 $tcardcode->close();

    $r=$Rtcardcode->fetch_array();

    $cardcode = $r['cod_cliente'];

      //traer datos del cliente
               $dcliente = new Conexion;
               $sql01 = "SELECT * FROM intranet_actualizacion_clientes WHERE cardcode = \"$cardcode\"";
               $Rdcliente = $dcliente->query($sql01) or trigger_error($dcliente->error);
               $dcliente->close();

                   $r=$Rdcliente->fetch_array();
                    $enviara = $r['email_new'];
                    $cardname = $r['cardname'];

      //traer datos del cliente


//traer cardcode con el pedido



//Guardar datos en la base de datos


    $insertar_Pventa = new Conexion ;
  $acentos = $insertar_Pventa->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_post_venta (fecha, ip, numero_pedido, cardcode, cardname, calificacion, observaciones,enviada_pqrsf, user_id, error) VALUES  (\"$fecha\", \"$ip\", \"$numero_pedido\", \"$cardcode\", \"$cardname\", \"$calificacion\", \"$observaciones\", \"$pqrsf\", \"$user_id\", \"$materiales\")";
  
  $insert = $insertar_Pventa->query($sql01) or trigger_error($insertar_Pventa->error);

  if ($insert) {
      //echo "Success! Row ID: {$insertar_Pventa->insert_id}";
      $insertar_Pventa->close();
  }

    //Guardar datos en la base de datos

         // Marcar post_venta los pedidos:
          $update = new conexion;
          $sql04 = "UPDATE intranet_registro_pedido SET post_venta = '1' WHERE  numero_pedido = $numero_pedido";
          $updatepedido = $update->query($sql04) or trigger_error($update->error);
           if ( $updatepedido ) {
         // echo "Success! Row ID: {$update->insert_id}";
          
          } else {
            die("Error: {$update->errno} : {$update->error}");
          }
          
        // Marcar post_venta los pedidos:

}

?>





 
<?php  
if ($pqrsf == 1) {

        echo '<!DOCTYPE html>';
      echo '<html lang="es">';
      echo '<head>';
      echo '<meta charset="UTF-8">';
      echo '<title>Registro de fallas</title>';
      echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../pqrsf.php?cardname=$cardname&numero_pedido=$numero_pedido&cardcode=$cardcode&documento=pedido&comentarios=$observaciones';</SCRIPT>";
      echo '</head>';
      echo '<body>';
      echo '</body>';
      echo '</html>';  
}else{

      echo '<!DOCTYPE html>';
      echo '<html lang="es">';
      echo '<head>';
      echo '<meta charset="UTF-8">';
      echo '<title>Registro de fallas</title>';
      echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../post_venta.php';</SCRIPT>";  
      echo '</head>';
      echo '<body>';
      echo '</body>';
      echo '</html>';
}



  

 ?>

