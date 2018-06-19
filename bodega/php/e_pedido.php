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
            print "<script>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../registro_pedido.php';</script>"; 
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
$encargado_alistamiento = $_REQUEST['encargado_alistamiento'];
$encargado_revision = $_REQUEST['encargado_revision'];
$fecha_bodega = $_REQUEST['fecha_bodega'];
$medio_transporte = $_REQUEST['medio_transporte'];
//echo $fecha_bodega;
//echo '</br>';
$ip = $_REQUEST['ip'];
$memorando = $_REQUEST['memorando'];
$n_cajas = $_REQUEST['n_cajas'];
$n_cajas =  strtoupper($n_cajas);
$zona = $_REQUEST['zona'];


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
    $uploads_dir = '../fotos_pedidos/';
    $file_ary = reArrayFiles($_FILES['file']);

  
  
    foreach ($file_ary as $file) {
       // print 'Nombre: ' . $file['name'];
        //print 'Tipo: ' . $file['type'];
        //print 'Tamaño: ' . $file['size'];
    
        
    $fichero_subido = $uploads_dir . 'pedido - '.$numero_pedido.' - ' . $file['name'];

    if ($file['name'] == '') {
      $fichero_db = '';
    }else{
      $fichero_db = 'pedido - '.$numero_pedido.' - ' . $file['name'];
    } 
    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);

        //insertar nombres de las imagenes en la base de datos intranet_registro_pedido_imagenes 


              $imagen = new Conexion ;
              $acentos = $imagen->query("SET NAMES 'utf8'");
              $sql01 = "INSERT INTO intranet_registro_pedido_imagenes (numero_pedido,nombre_imagen) VALUES(\"$numero_pedido\",\"$fichero_db\");";
              
              $insert = $imagen->query($sql01) or trigger_error($imagen->error);

              if ($insert) {
                  //echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
                  $imagen->close();
              }   


        //insertar nombres de las imagenes en la base de datos intranet_registro_pedido_imagenes $fichero_db

      }

  }

   //datos adjuntos




//Guardar datos en la base de datos


    $actualizacion_pedido = new Conexion ;
  $acentos = $actualizacion_pedido->query("SET NAMES 'utf8'");
  $sql02 = "UPDATE intranet_registro_pedido SET  fecha_bodega = \"$fecha_bodega\", observaciones =\"$observaciones\", encargado_alistamiento = \"$encargado_alistamiento\", encargado_revision = \"$encargado_revision\", memorando = \"$memorando\", n_cajas = \"$n_cajas\", zona = \"$zona\", fotos = \"$numero_pedido\", activo = 1, medio_transporte = \"$medio_transporte\" WHERE numero_pedido = \"$numero_pedido\"";
  
  $insert = $actualizacion_pedido->query($sql02) or trigger_error($actualizacion_pedido->error);

  if ($insert) {
      //echo "Success! Row ID: {$actualizacion_pedido->insert_id}";
      $actualizacion_pedido->close();
  }

    //Guardar datos en la base de datos


      if (isset($enviara) && $enviara <> '') {
        //envio de correo

  
                        $email_from = 'bodega@satelimportadores.com';
                        $email_to = $enviara;
                        $email_subject = "Registro de pedido" . " enviada por: " . $email_from;
                        $email_message = 'Cliente:'.$cardname.' Fecha de Radicado: '. $fecha_bodega . 'Alistado por:  ' . $encargado_revision;

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

