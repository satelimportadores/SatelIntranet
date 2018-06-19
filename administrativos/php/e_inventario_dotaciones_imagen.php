<?php 
	
	if (isset($_REQUEST)) {

	$comentarios = $_REQUEST['comentarios'];
	$user_id = $_REQUEST['user_id'];
	$fecha = $_REQUEST['fecha'];

	$file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $carpeta = '../img_dotacion/';
   	$src = $carpeta.$nombre[0];
   	$post_imagen = $nombre[0];
     $ruta_provisional = $ruta_provisional[0];

     move_uploaded_file($ruta_provisional, $src);
     	//actualizar la tabla de entregas con la imagen 
     		include_once('class.conexion.php');
          $dotaciones_image = new Conexion;
          $sql01 = "UPDATE intranet_dataciones_entrega SET post_imagen = \"$post_imagen\",post_comentarios = \"$comentarios\" WHERE user_id = \"$user_id\" and fecha = \"$fecha\"";
          $Rdotaciones_image = $dotaciones_image->query($sql01) or trigger_error($dotaciones_image->error);
          //actualizar la tabla de entregas con la imagen
     }


  			 
 ?>