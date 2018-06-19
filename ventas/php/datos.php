<?php

include_once('class.conexion.php');

$idpedido = $_REQUEST['idpedido'];



//sacar datos
 $datos = new Conexion;
 $sql01 = "SELECT * FROM intranet_contactos where numero_pedido = \"$idpedido\"";
 $Rdatos = $datos->query($sql01) or trigger_error($datos->error);

 while ($z=$Rdatos->fetch_array()) {


 					echo '<div class="item form-group">';
 					echo "<label for='cardcode' class='control-label col-md-3 col-sm-3 col-xs-12'>Codigo</label>";
 					echo '<div class="col-md-6 col-sm-6 col-xs-12">';
					echo "<input type='text' size='74%' class='form-control col-md-3 col-xs-12' id='cardcode' value='$z[cardcode]' name='cardcode' readonly>";
					echo '</div>';
					echo '</div>';


					echo'<div class="item form-group">';
					echo "<label for='cadname' class='control-label col-md-3 col-sm-3 col-xs-12'>Empresa</label>";
					echo '<div class="col-md-6 col-sm-6 col-xs-12">';
					echo "<input type='text' size='74%' class='form-control col-md-3 col-xs-12' id='cardname' value='$z[cardname]' name='cardname' readonly>";
					echo '</div>';
					echo '</div>';

					echo'<div class="item form-group">';
					echo "<label for='nombre' class='control-label col-md-3 col-sm-3 col-xs-12'>Nombre</label>";
					if ($z['nombre'] <> '') {
						echo '<div class="col-md-6 col-sm-6 col-xs-12">';
						echo "<input type='text'  size='74%' id='nombre' value='$z[nombre]' name='nombre' readonly class='form-control col-md-3 col-xs-12 text-uppercase'>";
						echo '</div>';
					}else{
						echo '<div class="col-md-6 col-sm-6 col-xs-12">';
						echo "<input type='text' size='74%' id='nombre' name='nombre' class='form-control col-md-3 col-xs-12 text-uppercase'>";
						echo '</div>';
					}
					echo '</div>';

					echo'<div class="item form-group">';
					echo "<label for='telefono' class='control-label col-md-3 col-sm-3 col-xs-12'>Telefono</label>";
					if ($z['telefono'] <> '') {
						echo '<div class="col-md-6 col-sm-6 col-xs-12">';
						echo "<input type='text' size='74%' id='telefono' value='$z[telefono]' name='telefono' readonly class='form-control col-md-3 col-xs-12 text-uppercase'>";
						echo '</div>';
					}else{
						echo '<div class="col-md-6 col-sm-6 col-xs-12">';
						echo "<input type='text' size='74%' id='telefono' name='telefono' class='form-control col-md-3 col-xs-12 text-uppercase'>";
						echo '</div>';
					}
					echo '</div>';


 }
 
 $datos->close();
//sacar datos


 ?>