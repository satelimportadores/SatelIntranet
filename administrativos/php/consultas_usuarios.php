<?php 

//carga los usuarios sin permisos de nivel 1 por medio de un load en el select de permisos_usuarios.php
if (isset($_REQUEST['usuarios01'])) {
include('class.conexion.php');
$usuarios = new conexion;
$query = "select id,nombre,apellido from intranet_usuarios where activo = 1 AND id not in (9)";
$Rusuarios = $usuarios->query($query) or trigger_error($usuarios->error);

		while ($soli = $Rusuarios->fetch_array()) {	
		echo "<option value='$soli[id]' name='sol' >$soli[nombre] $soli[apellido]</option>";		
		}
$usuarios->close();
}

//carga los usuarios con nivel de permiso 1 por medio de un load en el select de permisos_usuarios.php
if (isset($_REQUEST['usuarios02'])) {
include('class.conexion.php');
$usuarios = new conexion;
$query2 = "select id,nombre,apellido from intranet_usuarios where activo = 1 AND id not in (9)";
$Rusuarios2 = $usuarios->query($query2) or trigger_error($usuarios->error); 

		while ($auto = $Rusuarios2->fetch_array()) {
		echo "<option value='$auto[id]' name='sol' >$auto[nombre] $auto[apellido]</option>";
		}

$usuarios->close();
}




 ?>