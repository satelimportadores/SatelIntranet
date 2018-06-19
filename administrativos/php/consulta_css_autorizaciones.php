<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>
<?php
  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 

//traer autorizaciones CSS
  $autcss = new Conexion;
  $sql01 = "SELECT * FROM intranet_css_autorizaciones";
  $rautcss = $autcss->query($sql01) or trigger_error($autcss->error);
  $Nrautcss = $autcss->affected_rows;
  $autcss->close();
//traer autorizaciones CSS

?>

<?php

if ($Nrautcss >= '1') {
        //imprimir los registros
	$i = 0;
	
            while ($r=$rautcss->fetch_array()) {
            	echo "<form id='form$i' name='form$i'>";
                echo "<tr class='even pointer'>";
                echo "<td class=' '>$r[id]</td>";
                echo "<td class=' '>$r[nombre]</td>";
                echo "<td class=' '>$r[descripcion]</td>";
                
                 if ($r['activo'] == 1) {
                   echo "<td class=' '><span class='label label-success'>Activo</span></td>";
                 } else{
                    echo "<td class=' '><span class='label label-danger'>Inactivo</span></td>";
                 }
                echo "<td class=' '><button type='submit' data-toggle='modal' data-target='#myModal' data-codigo-id='$r[id]' data-name-id='$r[nombre]' data-estado-id='$r[activo]' class='btn btn-success'>Autorizar</button></td>";
                echo "</td>";
                echo "</tr>";
                echo "</form>";
            }


      //imprimir los registros
}



 ?>