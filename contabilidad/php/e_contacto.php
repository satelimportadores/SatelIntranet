<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}

  



?>

<?php 
  if (!isset($_REQUEST['cardcode']) || $_REQUEST['cardcode'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='../contacts.php';</script>";
  }
 ?>

<?php

if (isset($_REQUEST) || $_REQUEST['cardcode'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

   $cardcode = $_REQUEST['cardcode'];
   $cardcode = strtoupper($cardcode);
   $apellido = $_REQUEST['apellido'];
   $ciudad_new = $_REQUEST['ciudad_new'];
   $email_new = $_REQUEST['email_new'];
   $fecha = $_REQUEST['fecha'];
   $ip = $_REQUEST['ip'];
   $movil_new = $_REQUEST['movil_new'];
   $navegador = $_REQUEST['navegador'];
   $nombre = $_REQUEST['nombre'];
   $obra = $_REQUEST['obra'];
   $obra  = strtoupper($obra);
   $telefono = $_REQUEST['telefono'];
   $user_id = $_SESSION["user_id"];

    $registro_contacto = new Conexion ;
  $acentos = $registro_contacto->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_contactos (cardcode, nombre, apellido, ciudad, telefono, movil, email, obra, user_id, fecha, ip, navegador) VALUES (\"$cardcode\", \"$nombre\",\"$apellido\",\"$ciudad_new\",\"$telefono\",\"$movil_new\",\"$email_new\",\"$obra\",\"$user_id\",\"$fecha\",\"$ip\",\"$navegador\")";
  
  $insert = $registro_contacto->query($sql01) or trigger_error($registro_contacto->error);

  if ($insert) {
     // echo "Success! Row ID: {$registro_contacto->insert_id}";
      $registro_contacto->close();
  }

    //Guardar datos en la base de datos
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

