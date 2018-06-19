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
            echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../registro_guia.php';</SCRIPT>";  
            echo '</head>';
            echo '<body>';
            echo '</body>';
            echo '</html>';

    } 
?>

<?php

if (isset($_REQUEST) || $_REQUEST['numero_pedido'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$numero_pedido = $_REQUEST['numero_pedido'];
$observaciones = $_REQUEST['observaciones'];
$encargado_despacho = $_REQUEST['encargado_despacho'];
$transportadora = $_REQUEST['transportadora'];
$numero_guia = $_REQUEST['numero_guia'];
$ip = $_REQUEST['ip'];
$fecha = $_REQUEST['fecha_bodega'];
$user_id = $_SESSION["user_id"];


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
                    //$enviara = $r['email_new'];
                    $cardname = $r['cardname'];

      //traer datos del cliente


//traer cardcode con el pedido


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
        //print 'Tipo: ' . $file['type'];
        //print 'Tamaño: ' . $file['size'];
    
    
    $fichero_subido = $uploads_dir . 'guia - '.$numero_guia.' - ' . $file['name'];


        if ($file['name'] == '') {
      $fichero_db = '';
    }else{
   $fichero_db = 'guia - '.$numero_guia.' - ' . $file['name'];
    }



 
    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

 
  }

   //datos adjuntos




//Guardar datos en la base de datos


    $insertar_guia = new Conexion ;
  $acentos = $insertar_guia->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_registro_guias (fecha, ip, numero_pedido, observaciones, encargado_despacho, transportadora, numero_guia, user_id, cod_cliente, cliente, foto_guia) VALUES (\"$fecha\", \"$ip\", \"$numero_pedido\", \"$observaciones\", \"$encargado_despacho\", \"$transportadora\", \"$numero_guia\", \"$user_id\", \"$cardcode\", \"$cardname\",\"$fichero_db\")";
  
  $insert = $insertar_guia->query($sql01) or trigger_error($insertar_guia->error);

  if ($insert) {
     // echo "Success! Row ID: {$insertar_guia->insert_id}";
      $insertar_guia->close();
  }

    //Guardar datos en la base de datos

         // Marcar en transito los pedidos:
          $update = new conexion;
          $sql04 = "UPDATE intranet_registro_pedido SET entransito = '1',entregado = '1',recibido = '1',fecha_entrega = \"$fecha\" WHERE  numero_pedido = \"$numero_pedido\"";
          $updatepedido = $update->query($sql04) or trigger_error($update->error);
           if ( $updatepedido ) {
        //  echo "Success! Row ID: {$update->insert_id}";
          
          } else {
            die("Error: {$update->errno} : {$update->error}");
          }
          
        // Marcar en transito los pedidos:


      if (isset($enviara) && $enviara <> '') {
        //envio de correo

  
                        $email_from = 'bodega@satelimportadores.com';
                        $email_to = $enviara;
                        $email_subject = "Registro de pedido" . " enviada por: " . $email_from;
                        $email_message = 'Cliente:'.$cardname.' Fecha de Radicado: '. $fecha . 'Alistado por:  ' . $encargado_despacho;

                         include_once('class.phpmailer.php');
                              // Indica si los datos provienen del formulario

                          
                          $correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
                       
                      //Usamos el SetFrom para decirle al script quien envia el correo
                      $correo->SetFrom($email_from, "Satel Importadores");
                       
                      //Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
                      $correo->AddReplyTo($email_to,"Satel Importadores");
                       
                      //Usamos el AddAddress para agregar un destinatario
                      $correo->AddAddress($email_to, $cardname);

                      $correo->AddCC($enviara, $cardname);
                       
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
                        $fichero = $uploads_dir . $fichero_db;
                      $correo->addAttachment($fichero);
                      }

                       
                      //Enviamos el correo
                      if(!$correo->Send()) {
                        echo "Hubo un error: " . $correo->ErrorInfo;
                      } else {
                       // echo "Mensaje enviado con exito.";
                      }

        //envio de correo
      }

}

?>





 
<?php   
  
//reenvio de pagina
reenvio();



 ?>

