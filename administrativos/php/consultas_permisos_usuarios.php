<?php 

include('class.conexion.php');
$usuarios = new conexion;
$query = "SELECT DISTINCT user_id FROM intranet_permisos_usuarios";
$exec = $usuarios->query($query) or trigger_error($usuarios->error);

//funsion para restar horas
function resta($inicio, $fin)
  {
  $dif=date("H:i", strtotime("00:00") + strtotime($fin) - strtotime($inicio) );
  return $dif;
  }


 function suma($inicio, $fin)
  {
  $dif=date("H:i", strtotime("00:00") + strtotime($fin) + strtotime($inicio) );
  return $dif;
  } 

if (isset($_POST['id'])) {
$id = $_POST['id'];
$rep = $_POST['rep'];
$hoy = $_POST['hoy'];

//inserta el historico de cuando se han qutado horas y cuantas se han quitado
$query = "INSERT INTO intranet_permisos_horas (user_id, fecha_hpag, horas_pagadas) VALUES ('$id','$hoy','$rep')";
echo $query;
$usuarios->query($query) or trigger_error($usuarios->error);
$query2 = "SELECT horas_rep FROM intranet_permisos_usuarios WHERE user_id = $id && horas_rep <> 0";
$result = $usuarios->query($query2) or trigger_error($usuarios->error);
$horas = $result->fetch_array();
$horas = $horas[0];

//si las horas repuestas son mayores a las horas que hay en el historico, se calcula cuantas horas falta por restar y sigue restando del siguiente historico 
while ($rep > $horas) {
	$temp = resta($horas,$rep);
	$query = "UPDATE intranet_permisos_usuarios SET horas_rep= '0' WHERE horas_rep = '$horas' && user_id=$id LIMIT 1";
  $usuarios->query($query) or trigger_error($usuarios->error);
	$query2 = "SELECT horas_rep FROM intranet_permisos_usuarios WHERE user_id = $id && horas_rep <> 0";
	$result = $usuarios->query($query2) or trigger_error($usuarios->error);
	$horas = $result->fetch_array();
	$horas = $horas[0];
	$rep = $temp;
}
$horat = resta($rep,$horas);
$query3 = "UPDATE intranet_permisos_usuarios SET `horas_rep`= '$horat' WHERE horas_rep = '$horas' && user_id=$id LIMIT 1";

print_r($hoy);
$usuarios->query($query3) or trigger_error($usuarios->error);
//echo 'hora input '.$rep.' hora resta '.$horas.' Temp '.$temp.'result'. $horat ;
//echo $query2;
}


if (isset($_GET['cod'])) {
$id = $_GET['cod'];
$query4 = "SELECT nombre,apellido from intranet_usuarios where id = $id";
$dat = $usuarios->query($query4) or trigger_error($usuarios->error);
$nom = $dat->fetch_array();
$usuarios->close();


}

 ?>