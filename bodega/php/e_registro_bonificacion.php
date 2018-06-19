<body bgcolor="#454A57">

<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php 
  if (!isset($_REQUEST['tipo_bonificacion']) || $_REQUEST['tipo_bonificacion'] == '') {
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
          echo '<title>Registro de Bonificaciones</title>';
          echo "<SCRIPT LANGUAGE='javascript'>alert('¡Tu solicitud ha sido enviada! - SATEL IMPORTADORES DE FERRETERÍA - ');window.location='../index.php';</SCRIPT>";
          echo '</head>';
          echo '<body>';
          echo '</body>';
          echo '</html>';

    }   


if ($_POST['tipo_bonificacion'] == 'Comunal' and $_POST['operacion'] == 'Toda_el_area') {
//INSERTAR COMUNAL TODA EL AREA ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $todaelarea = new Conexion;
            //$sql01 = 'SELECT * FROM intranet_usuarios WHERE  grupo_bodega = 2 ORDER BY nombre ASC';
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega IS NOT NULL';

            $query01 = $todaelarea->query($sql01);
            $acentos = $todaelarea->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, razon, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[fecha]\", \"$_POST[ip]\", \"$_POST[tipo_bonificacion]\", 'Bonificación', \"$_POST[operacion]\", \"$r[nombre]\", \"$_POST[jefe_inmediato]\",  \"$_POST[fecha_suceso]\",  \"$_POST[razon]\" , \"$_POST[observaciones]\", '0.15', \"$r[id]\", \"$_SESSION[user_id]\" )"; 
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
}elseif ($_POST['tipo_bonificacion'] == 'Comunal' and $_POST['operacion'] == 'Almacenamiento') {

//INSERTAR COMUNAL ALMACENAMIENTO ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $almacenamiento= new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "almacenamiento"';

            $query01 = $almacenamiento->query($sql01);
            $acentos = $almacenamiento->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, razon, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[fecha]\", \"$_POST[ip]\", \"$_POST[tipo_bonificacion]\", 'Bonificación', \"$_POST[operacion]\", \"$r[nombre]\", \"$_POST[jefe_inmediato]\",  \"$_POST[fecha_suceso]\",  \"$_POST[razon]\" , \"$_POST[observaciones]\", '0.15', \"$r[id]\", \"$_SESSION[user_id]\" )"; 
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


}elseif ($_POST['tipo_bonificacion'] == 'Comunal' and $_POST['operacion'] == 'Distribucion') {
  
   //INSERTAR COMUNAL DISTRIBUCION ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $distribucion = new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "distribucion"';

            $query01 = $distribucion->query($sql01);
            $acentos = $distribucion->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, razon, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[fecha]\", \"$_POST[ip]\", \"$_POST[tipo_bonificacion]\", 'Bonificación', \"$_POST[operacion]\", \"$r[nombre]\", \"$_POST[jefe_inmediato]\",  \"$_POST[fecha_suceso]\",  \"$_POST[razon]\" , \"$_POST[observaciones]\", '0.15', \"$r[id]\", \"$_SESSION[user_id]\" )"; 
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

}elseif ($_POST['tipo_bonificacion'] == 'Comunal' and $_POST['operacion'] == 'Mensajeria') {

       //INSERTAR COMUNAL MENSAJERIA ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $mensajeria = new Conexion;
            $sql01 = 'SELECT * FROM intranet_usuarios WHERE grupo_bodega_subgrupo = "mensajeria"';

            $query01 = $mensajeria->query($sql01);
            $acentos = $mensajeria->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, operacion, colaborador, jefe_inmediato, fecha_suceso, razon, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[fecha]\", \"$_POST[ip]\", \"$_POST[tipo_bonificacion]\", 'Bonificación', \"$_POST[operacion]\", \"$r[nombre]\", \"$_POST[jefe_inmediato]\",  \"$_POST[fecha_suceso]\",  \"$_POST[razon]\" , \"$_POST[observaciones]\", '0.15', \"$r[id]\", \"$_SESSION[user_id]\" )"; 
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


}elseif ($_POST['tipo_bonificacion'] == 'Individual') {
  

           //INSERTAR INDIVIDUAL ---//
  
  // insertar datos en la base de datos
  

    //Traer datos

            $individual = new Conexion;
            $sql01 = "SELECT * FROM intranet_usuarios WHERE id = \"$_POST[colaborador]\" " ;

            $query01 = $individual->query($sql01);
            $acentos = $individual->query("SET NAMES 'utf8'");

                 while ($r=$query01->fetch_array()) {
                   $sql02 = "INSERT INTO intranet_bonificaciones (fecha, ip, tipo_bonificacion, tipo_reporte, colaborador, jefe_inmediato, fecha_suceso, observaciones, calificacion, id_user_notificacion, user_id) VALUES (\"$_POST[fecha]\", \"$_POST[ip]\", \"$_POST[tipo_bonificacion]\", 'Bonificación', \"$r[nombre]\", \"$_POST[jefe_inmediato]\",  \"$_POST[fecha_suceso]\", \"$_POST[observaciones]\", '0.15', \"$r[id]\", \"$_SESSION[user_id]\" )"; 
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