<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}

  



?>

<?php

if (isset($_REQUEST) || $_REQUEST['cardcode'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

   $cardcode = $_REQUEST['cardcode'];
   $cliente = $_REQUEST['cardname'];
   $cliente = strtoupper($cliente);
   $fecha = $_REQUEST['fecha'];
   $contacto = $_REQUEST['contacto'];
   $contacto = strtoupper($contacto);
   $telefono_contacto = $_REQUEST['telefono_contacto'];
   $ip = $_REQUEST['ip'];
   $numero_pedido = $_REQUEST['numero_pedido'];
   $user_id = $_SESSION["user_id"];
   $total_pedido = $_REQUEST['total_pedido'];
   $total_pedido = str_replace(',','',$total_pedido);
   $total_pedido = str_replace('$','',$total_pedido);
   $total_pedido = str_replace(' ','',$total_pedido);
   //echo $total_pedido;
   //echo "</br>";


  

    $registro_pedido = new Conexion ;
  $acentos = $registro_pedido->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_registro_pedido (fecha, ip, cliente, numero_pedido, user_id, total_pedido, cod_cliente, orden_compra, orden_compra_realizada) VALUES (\"$fecha\",\"$ip\",\"$cliente\",\"$numero_pedido\",\"$user_id\", \"$total_pedido\", \"$cardcode\",0,0)";
  
  $insert = $registro_pedido->query($sql01) or trigger_error($registro_pedido->error);

  if ($insert) {
     // echo "Success! Row ID: {$registro_pedido->insert_id}";
      $registro_pedido->close();
  }

    //Guardar datos en la base de datos

          //registro contacto del pedido

                $contacto_pedido = new Conexion ;
                $acentos = $contacto_pedido->query("SET NAMES 'utf8'");
                $sql01 = "INSERT INTO intranet_contactos (cardcode, nombre, telefono, user_id, fecha, numero_pedido, cardname) VALUES (\"$cardcode\",\"$contacto\",\"$telefono_contacto\",\"$user_id\",\"$fecha\",\"$numero_pedido\",\"$cliente\")";

                $insert = $contacto_pedido->query($sql01) or trigger_error($contacto_pedido->error);

                if ($insert) {
                // echo "Success! Row ID: {$contacto_pedido->insert_id}";
                $contacto_pedido->close();
                }


          //registro contacto del pedido


}

?>

 
<?php   
  
      echo '<!DOCTYPE html>';
      echo '<html lang="es">';
      echo '<head>';
      echo '<meta charset="UTF-8">';
      echo '<title>Registro de fallas</title>';
      echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../profile.php?cardcode=$cardcode';</SCRIPT>";  
      echo '</head>';
      echo '<body>';
      echo '</body>';
      echo '</html>';

 ?>

