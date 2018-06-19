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
      echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../pqrsf.php';</SCRIPT>";  
      echo '</head>';
      echo '<body>';
      echo '</body>';
      echo '</html>';

  } 
?>

<?php 
  if (!isset($_REQUEST['cardcode']) || $_REQUEST['cardcode'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='../contacts.php';</script>";
  }
 ?>

<?php
 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php

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
       // print 'Nombre: ' . $file['name'];
       // print 'Tipo: ' . $file['type'];
       // print 'Tamaño: ' . $file['size'];
    
    
    $fichero_subido = $uploads_dir . 'pqrsf - '.$file['name'];

    if ($file['name'] == '') {
      $name_fichero = '';
    }else{
     $name_fichero = 'pqrsf - '.$file['name'];
    }
    
    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

   $fecha = $_REQUEST['fecha'];
   $ip = $_REQUEST['ip'];
   $navegador = $_REQUEST['navegador'];
   $cardname = $_REQUEST['cardname'];
   $cardname = strtoupper($cardname);
   $cardcode = $_REQUEST['cardcode'];
   $cardcode = strtoupper($cardcode);
   $email_new = $_REQUEST['email_new'];
   $t_solicitud = $_REQUEST['t_solicitud'];
   $asunto = $_REQUEST['asunto'];
   $comentarios = $_REQUEST['comentarios'];
   $user_id = $_SESSION["user_id"];
   $t_documento = $_REQUEST['t_documento'];
   $numero_documento = $_REQUEST['numero_documento'];


    $registro_pqrsf = new Conexion ;
  $acentos = $registro_pqrsf->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_pqrsf (fecha, ip, navegador, cardname, cardcode, email_new, t_solicitud, asunto, comentarios, n_adjunto, user_id, t_documento, numero_documento) VALUES (\"$fecha\",\"$ip\",\"$navegador\",\"$cardname\",\"$cardcode\",\"$email_new\",\"$t_solicitud\",\"$asunto\",\"$comentarios\",\"$name_fichero\",\"$user_id\",\"$t_documento\",\"$numero_documento\")";
  
  $insert = $registro_pqrsf->query($sql01) or trigger_error($registro_pqrsf->error);

  if ($insert) {
      //echo "Success! Row ID: {$registro_pqrsf->insert_id}";
      $pqrsf_codigo = 'satel_pqrsf_'.$registro_pqrsf->insert_id;
      $registro_pqrsf->close();
  }
}
    //Guardar datos en la base de datos


?>

<?php 
  //envio del correo
  
  
  $email_from = 'servicioalcliente@satelimportadores.com';
  $email_to = "tienda@satelimportadores.com";
  $email_to_cliente = $email_new;
  $email_subject = "Solicitud de PQRSF" . " enviada por: " . $cardname;
  $email_message = "Gracias por la retroalimentaci&oacute;n, tu opini&oacute;n es muy importante para nosotros, la solicitud ha sido recibida satisfactoriamente el d&iacute;a ". $fecha . " y se ha radicado bajo el n&uacute;mero: " . "<strong>". $pqrsf_codigo ."</strong>" ."<br/> <br/> Un miembro de nuestro equipo de soporte se encuentra haciendo toda la gesti&oacute;n requerida por la solicitud presentada. Disponemos de quince (15) d&iacute;as h&aacute;biles para dar respuesta, la cual se har&aacute; por este mismo medio. <br/> <br/> ". "Recuerde que en caso de inconformidad con la respuesta recibida podr&aacute;s presentar un recurso de apelaci&oacute;n dentro de los siguientes diez (10) d&iacute;as a la emisi&oacute;n de la respuesta.";
  $email_client_name = $cardname;
   include_once('class.phpmailer.php');
        // Indica si los datos provienen del formulario

    
    $correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
 
//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom($email_from, "Satel Importadores");
 
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo($email_to,"Satel Importadores");
 
//Usamos el AddAddress para agregar un destinatario
$correo->AddAddress($email_to, "servicioalcliente@satelimportadores.com");

$correo->AddCC($email_to_cliente, $email_client_name);
 
//Ponemos el asunto del mensaje
$correo->Subject = $email_subject;
 
/*
 * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 * $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");
 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
$correo->MsgHTML($email_message);
 
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment


foreach ( $file_ary as $file) {
  $fichero = $uploads_dir . $file['name'];
$correo->addAttachment($fichero);
}

 
//Enviamos el correo
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  //echo "Mensaje enviado con exito.";
}
    
  
  
//reenvio de pagina
reenvio();

 ?>

