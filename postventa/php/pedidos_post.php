<?php 


 include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");


//traer pedidos
 $user_id = $_SESSION['user_id'];
 $pedidos = new Conexion;
 $sql01 = "SELECT * FROM intranet_registro_pedido WHERE entransito = '1' AND entregado = '1' AND recibido = '1' AND post_venta IS NULL";
 $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
 $pedidos->close();
//traer pedidos
echo '<option value="">Seleccione</option>';
while ($z=$Rpedidos ->fetch_array()) {

	echo "<option value='$z[numero_pedido]'>$z[numero_pedido] - $z[cod_cliente] - $z[cliente] - $z[n_cajas]</option>";

}

 ?>