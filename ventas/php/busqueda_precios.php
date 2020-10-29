
<?php header("Content-Type: text/html;charset=utf-8");


  include_once('class.conexion.php');

// Inicialisacion de variables globales //
$mensaje = '';
$text = "";
$fecha = "";
$adj = "";
$i=0;

// Filtro de productos por letras del abcedario //
if (isset($_REQUEST['letra'])) {
	$letra = $_REQUEST['letra'];

	$letras =  new Conexion;
	$query = "select * from productos where nombre_producto like '$letra%'";
	$Rletras = $letras->query($query) or trigger_error($letras->error);
	$letras->close();

	$rows = $Rletras->num_rows;
	if ($rows == 0) {
		$mensaje = 'El producto ingresado no existe';
	}else{
		while ($array = $Rletras->fetch_array()) {
			
			$nompro = $array['nombre_producto'];
			$codpro = $array['codigo_producto_var'];
			$stock = $array['stock'];
			$precio = $array['precio'];
			$precioformat = number_format((float)$precio);
			$precioiva = $precio*(1+0.16);
			$precioivaformat =   number_format((float)$precioiva);
			$mensaje .= "<p><strong>Producto:</strong> $nompro <br><strong>Codigo:</strong> $codpro <br><strong>stock:</strong>  $stock <br><strong>precio:</strong> $precioformat <br><strong>precio + IVA:</strong> $precioivaformat<br></p>";
		}
	}
	echo $mensaje;
}

// Filtro de productos por palabra en el campo de busqueda // 
if (isset($_POST['valor'])) {
	$valor = $_REQUEST['valor'];

	$valores = new Conexion;
	$buscar = "select * from productos where nombre_producto like '%$valor%' or codigo_producto_var like '%$valor%'";
	$Rvalores = $valores->query($buscar) or trigger_error($valores->error);	
	$valores->close();
	$rows = $Rvalores->num_rows;

	if ($rows == 0) {
		$mensaje = 'El producto no existe';
	}else{
		while ($array = $Rvalores->fetch_array()) {
			$nompro = $array['nombre_producto'];
			$codpro = $array['codigo_producto_var'];
			$stock = $array['stock'];
			$precio = $array['precio'];
			$precioformat = number_format((float)$precio);
			$precioiva = $precio *(1+0.16);
			$precioivaformat =   number_format((float)$precioiva);
			$mensaje .= "<p><strong>Producto:</strong> $nompro <br><strong>Codigo:</strong> $codpro <br><strong>stock:</strong>  $stock <br><strong>precio:</strong> $precioformat<br><strong>precio + IVA:</strong> $precioivaformat<br></p>";
		}
	}
	echo $mensaje;
}




 ?>