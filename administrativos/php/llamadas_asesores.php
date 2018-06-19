<?php 


  include_once('class.conexion.php');

?>

<?php 
$user_id =  $_REQUEST['comercial'];

//consulta 01 total de llamadas mes anteriror

  $tantllamadas = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE (month(fecha) = month((curdate() + interval -(1) month))) AND user_id = \"$user_id\" ";
  $Rtantllamadas = $tantllamadas->query($sql01) or trigger_error($tantllamadas->error);
  $r = $Rtantllamadas->fetch_array();
  $Ctantllamadas = $r['llamadas'];
  echo $Ctantllamadas;

  $tantllamadas->close();

//consulta 01 total de llamadas mes anteriror 

 ?>