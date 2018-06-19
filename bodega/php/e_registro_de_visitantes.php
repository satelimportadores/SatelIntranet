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

if (isset($_REQUEST) || $_REQUEST['nombre'] <> '') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$apellido = $_REQUEST['apellido'];
$apellido =  strtoupper($apellido);
$comentarios = $_REQUEST['comentarios'];
$email = $_REQUEST['email_new'];
$empresa = $_REQUEST['empresa'];
$empresa =  strtoupper($empresa);
$fecha = $_REQUEST['fecha'];
$nombre = $_REQUEST['nombre'];
$nombre =  strtoupper($nombre);
$numero_documento = $_REQUEST['numero_documento'];
$telefono = $_REQUEST['telefono'];
$ip = $_REQUEST['ip'];
$tipo_documento = $_REQUEST['tipo_documento'];
$user_id = $_SESSION["user_id"];
$observaciones = $_REQUEST['comentarios'];


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
    //    print 'Tipo: ' . $file['type'];
   //     print 'Tamaño: ' . $file['size'];
    
        
    $fichero_subido = $uploads_dir . 'visitante - ' . $file['name'];

    if ($file['name'] == '') {
    $fichero_db = '';
    }else{
    $fichero_db = 'visitante - ' . $file['name'];
    }



    

    
    move_uploaded_file($file['tmp_name'],  $fichero_subido);
      }

  }

   //datos adjuntos




//Guardar datos en la base de datos


  $entrada_visitante = new Conexion ;
  $acentos = $entrada_visitante->query("SET NAMES 'utf8'");
  $sql01 = "INSERT INTO intranet_registro_visitantes (fecha, ip, nombre, apellido, tipo_documento, numero_documento, empresa, email, telefono, foto_visitante, observaciones, user_id) VALUES (\"$fecha\",\"$ip\",\"$nombre\",\"$apellido\",\"$tipo_documento\",\"$numero_documento\",\"$empresa\",\"$email\",\"$telefono\",\"$fichero_db\",\"$observaciones\",\"$user_id\")";
  
  $insert = $entrada_visitante->query($sql01) or trigger_error($entrada_visitante->error);

  if ($insert) {
     // echo "Success! Row ID: {$entrada_visitante->insert_id}";
      $entrada_visitante->close();
  }

    //Guardar datos en la base de datos

}

?>





 
<?php   
  
//reenvio de pagina

reenvio();

 ?>

