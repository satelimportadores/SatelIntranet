<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php 
  if (!isset($_REQUEST['tipo_falla']) || $_REQUEST['tipo_falla'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='../index.php';</script>";
  }
 ?>


<?php


header("Content-Type: text/html;charset=utf-8");
require('class.conexion.php');

  function reenvio(){
    //reenvio de pagina
    
            echo '<!DOCTYPE html>';
            echo '<html lang="es">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<title>Registro de fallas</title>';
            echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../index.php';</SCRIPT>";
            echo '</head>';
            echo '<body>';
            echo '</body>';
            echo '</html>';

    }  

                switch ($_POST['tipo_falla']) {
                  case 'Gestión':
                    $calificacion = '-0.2';
                    break;

                  case 'Seguridad':
                    $calificacion = '-0.15';
                    break;

                  case 'Accidente':
                    $calificacion = '-0.2';
                      break;

                  case 'Quejas_Clientes':
                    $calificacion = '-0.3';
                      break;

                  default:
                    $calificacion = '0';
                    break;
                }


if ($_POST['falla_tipo_bonificacion'] == 'Comunal' and $_POST['falla_operacion'] == 'Toda_el_area') {
//INSERTAR COMUNAL TODA EL AREA ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $todaelarea = new Conexion;
            //$sql01 = 'SELECT * FROM intranet_usuarios WHERE  grupo_bodega = 2 ORDER BY nombre ASC';
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega IS NOT NULL';

            $query01 = $todaelarea->query($sql01);
            $acentos = $todaelarea->query("SET NAMES 'utf8'");



                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, tipo_falla, razon_falla, descripcion_falla, consecuencias, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[falla_fecha]\", \"$_POST[falla_ip]\", \"$_POST[falla_tipo_bonificacion]\", 'Falla', \"$_POST[falla_operacion]\", \"$r[nombre]\", \"$_POST[falla_jefe_inmediato]\",  \"$_POST[falla_fecha_suceso]\",  \"$_POST[tipo_falla]\" , \"$_POST[falla_razon]\", \"$_POST[descripcion_falla]\", \"$_POST[consecuencias]\", \"$_POST[falla_observaciones]\", \"$calificacion\", \"$r[id]\", \"$_SESSION[user_id]\" )"; 
                   $insert = $todaelarea->query($sql02);

                          // Print response from MySQL
                            if ( $insert ) {
                            //echo "Success! Row ID: {$todaelarea->insert_id}";
                            } else {
                              die("Error: {$todaelarea->errno} : {$todaelarea->error}");
                            }

                 }
 
            // Close our connection
            $todaelarea->close();
reenvio();

// FIN INSERTAR COMUNAL TODA EL AREA ---//
}elseif ($_POST['falla_tipo_bonificacion'] == 'Comunal' and $_POST['falla_operacion'] == 'Almacenamiento') {

//INSERTAR COMUNAL ALMACENAMIENTO ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $almacenamiento= new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "almacenamiento"';

            $query01 = $almacenamiento->query($sql01);
            $acentos = $almacenamiento->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, tipo_falla, razon_falla, descripcion_falla, consecuencias, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[falla_fecha]\", \"$_POST[falla_ip]\", \"$_POST[falla_tipo_bonificacion]\", 'Falla', \"$_POST[falla_operacion]\", \"$r[nombre]\", \"$_POST[falla_jefe_inmediato]\",  \"$_POST[falla_fecha_suceso]\",  \"$_POST[tipo_falla]\" , \"$_POST[falla_razon]\", \"$_POST[descripcion_falla]\", \"$_POST[consecuencias]\", \"$_POST[falla_observaciones]\", \"$calificacion\", \"$r[id]\" , \"$_SESSION[user_id]\")";  
                   $insert = $almacenamiento->query($sql02);

                          // Print response from MySQL
                            if ( $insert ) {
                            //echo "Success! Row ID: {$almacenamiento->insert_id}";
                            } else {
                              die("Error: {$almacenamiento->errno} : {$almacenamiento->error}");
                            }

                 }
 
            // Close our connection
            $almacenamiento->close();
reenvio();

// FIN INSERTAR COMUNAL ALMACENAMIENTO ---//


}elseif ($_POST['falla_tipo_bonificacion'] == 'Comunal' and $_POST['falla_operacion'] == 'Distribucion') {
  
   //INSERTAR COMUNAL DISTRIBUCION ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $distribucion = new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "distribucion"';

            $query01 = $distribucion->query($sql01);
            $acentos = $distribucion->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, tipo_falla, razon_falla, descripcion_falla, consecuencias, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[falla_fecha]\", \"$_POST[falla_ip]\", \"$_POST[falla_tipo_bonificacion]\", 'Falla', \"$_POST[falla_operacion]\", \"$r[nombre]\", \"$_POST[falla_jefe_inmediato]\",  \"$_POST[falla_fecha_suceso]\",  \"$_POST[tipo_falla]\" , \"$_POST[falla_razon]\", \"$_POST[descripcion_falla]\", \"$_POST[consecuencias]\", \"$_POST[falla_observaciones]\", \"$calificacion\", \"$r[id]\", \"$_SESSION[user_id]\" )"; 
                   $insert = $distribucion->query($sql02);

                          // Print response from MySQL
                            if ( $insert ) {
                            //echo "Success! Row ID: {$distribucion->insert_id}";
                            } else {
                              die("Error: {$distribucion->errno} : {$distribucion->error}");
                            }

                 }
 
            // Close our connection
            $distribucion->close();
reenvio();

// FIN INSERTAR COMUNAL DISTRIBUCION ---// 

}elseif ($_POST['falla_tipo_bonificacion'] == 'Comunal' and $_POST['falla_operacion'] == 'Mensajeria') {

       //INSERTAR COMUNAL MENSAJERIA ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $mensajeria = new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "mensajeria"';

            $query01 = $mensajeria->query($sql01);
            $acentos = $mensajeria->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, tipo_falla, razon_falla, descripcion_falla, consecuencias, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[falla_fecha]\", \"$_POST[falla_ip]\", \"$_POST[falla_tipo_bonificacion]\", 'Falla', \"$_POST[falla_operacion]\", \"$r[nombre]\", \"$_POST[falla_jefe_inmediato]\",  \"$_POST[falla_fecha_suceso]\",  \"$_POST[tipo_falla]\" , \"$_POST[falla_razon]\", \"$_POST[descripcion_falla]\", \"$_POST[consecuencias]\", \"$_POST[falla_observaciones]\", \"$calificacion\", \"$r[id]\", \"$_SESSION[user_id]\" )"; 
                   $insert = $mensajeria->query($sql02);

                          // Print response from MySQL
                            if ( $insert ) {
                            //echo "Success! Row ID: {$mensajeria->insert_id}";
                            } else {
                              die("Error: {$mensajeria->errno} : {$mensajeria->error}");
                            }

                 }
 
            // Close our connection
            $mensajeria->close();
reenvio();

// FIN INSERTAR COMUNAL MENSAJERIA ---// 


}elseif ($_POST['falla_tipo_bonificacion'] == 'Individual') {
  

           //INSERTAR INDIVIDUAL ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $individual = new Conexion;
            $sql01 = "SELECT * FROM intranet_usuarios WHERE id = \"$_POST[falla_colaborador]\" " ;

            $query01 = $individual->query($sql01);
            $acentos = $individual->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, colaborador, jefe_inmediato, fecha_suceso, tipo_falla, razon_falla, descripcion_falla, consecuencias, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[falla_fecha]\", \"$_POST[falla_ip]\", \"$_POST[falla_tipo_bonificacion]\", 'Falla', \"$r[nombre]\", \"$_POST[falla_jefe_inmediato]\",  \"$_POST[falla_fecha_suceso]\",  \"$_POST[tipo_falla]\" , \"$_POST[falla_razon]\", \"$_POST[descripcion_falla]\", \"$_POST[consecuencias]\", \"$_POST[falla_observaciones]\", \"$calificacion\", \"$r[id]\", \"$_SESSION[user_id]\" )"; 
                   $insert = $individual->query($sql02);

                          // Print response from MySQL
                            if ( $insert ) {
                            //echo "Success! Row ID: {$individual->insert_id}";
                            } else {
                              die("Error: {$individual->errno} : {$individual->error}");
                            }

                 }
 
            // Close our connection
            $individual->close();
reenvio();

// FIN INSERTAR INDIVIDUAL ---// 


}else{

  echo 'no se a seleccionado nada';

}


?>