<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>
<?php 
include("php/busqueda_precios.php");
?>
<html lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script type="text/javascript" src="js/precios.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<title></title>
</head>
<body>
<form method="POST">
<div id="letras">
	<?php 
	for($i=65; $i<=90; $i++) {  
    $letra = chr($i);  
    echo "<a id='$letra' >$letra</a> | ";  
} 
	 ?>
</div>
	<label>Buscar:</label>
	<input type="text" name="buscar" id="buscar" autocomplete="off" onkeyup="busqueda();">
</form>
<div id="content"></div>
</body>
</html>


