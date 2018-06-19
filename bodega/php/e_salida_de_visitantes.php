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

if (isset($_REQUEST) || $_REQUEST['salida'] == 'on') {

  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");

    //Guardar datos en la base de datos

$fecha_salida = $_REQUEST['fecha_salida'];
$id = $_REQUEST['id_visitante'];
$observaciones_salida = $_REQUEST['observaciones_salida'];
$salida = $_REQUEST['salida'];


//Guardar datos en la base de datos


  $salida_visitantes = new Conexion ;
  $acentos = $salida_visitantes->query("SET NAMES 'utf8'");
  $sql01 = "UPDATE intranet_registro_visitantes SET fecha_salida = \"$fecha_salida\",  estado = 1, observaciones_salida = \"$observaciones_salida\" WHERE  id = \"$id\"";
  
  $insert = $salida_visitantes->query($sql01) or trigger_error($salida_visitantes->error);

  if ($insert) {
     // echo "Success! Row ID: {$salida_visitantes->insert_id}";
      $salida_visitantes->close();
  }

    //Guardar datos en la base de datos

}

?>





 
<?php   
  
//reenvio de pagina

reenvio();

 ?>

