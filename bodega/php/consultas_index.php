<?php 

//consulta 01 total guias mes actual
  $pedmesactual = new Conexion;
  $sql01 = "SELECT COUNT(id) as id FROM intranet_registro_guias WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
  $guiasactuales = $pedmesactual->query($sql01) or trigger_error($pedmesactual->error);
  $r = $guiasactuales->fetch_array();
  $Cpedidosact = $r['id'];
  $pedmesactual->close();
//consulta 01 total guias mes actual

//consulta 01 total recibidos mes actual
  $recibidosactuales = new Conexion;
  $sql01 = "SELECT COUNT(id) as id FROM intranet_registro_recibidos WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
  $recibidosact = $recibidosactuales->query($sql01) or trigger_error($recibidosactuales->error);
  $r = $recibidosact->fetch_array();
  $Crecibidos = $r['id'];
  $recibidosactuales->close();
//consulta 01 total recibidos mes actual

  $totalmesactual = $Cpedidosact + $Crecibidos;

//consulta 01 total guias mes pasado
  $pedmespasado = new Conexion;
  $sql01 = "SELECT COUNT(id) as id FROM intranet_registro_guias WHERE (month(fecha) = month((curdate() + interval -(1) month)))";
  $guiaspasadas = $pedmespasado->query($sql01) or trigger_error($pedmespasado->error);
  $s = $guiaspasadas->fetch_array();
  $pedidospasados = $s['id'];
  $pedmespasado->close();
//consulta 01 total guias mes pasado


//consulta 01 total recibidos mes pasado
  $recibidospasados = new Conexion;
  $sql01 = "SELECT COUNT(id) as id FROM intranet_registro_recibidos WHERE (month(fecha) = month((curdate() + interval -(1) month)))";
  $Pedidos = $recibidospasados->query($sql01) or trigger_error($recibidospasados->error);
  $s = $Pedidos->fetch_array();
  $Crecibidospas = $s['id'];
  $recibidospasados->close();
//consulta 01 total recibidos mes pasado

  $totalmesanterior = $pedidospasados + $Crecibidospas;

if ($totalmesanterior == 0) {
  $totalmesanterior = 1;
}

//Calculo modulo 1
  $calculo01 = (($totalmesactual/$totalmesanterior)-1)*100;
  $calculo01 = round($calculo01,2);
//Calculo modulo 1

?>

<?php 
//Consulta 02 resultado 

  //consulta 02 pedidos guias mes actual
  $pedidosguiasfechaact = new Conexion;
  $sql01 = "SELECT SUM(DATEDIFF(irg.fecha,irp.fecha)* 24) as horas, COUNT(*) as cant01 FROM intranet_registro_pedido irp INNER JOIN intranet_registro_guias irg ON irp.numero_pedido = irg.numero_pedido WHERE DATE_FORMAT(irp.fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
  $Rpedidosguiasfechaact = $pedidosguiasfechaact->query($sql01) or trigger_error($pedidosguiasfechaact->error);
  $r = $Rpedidosguiasfechaact->fetch_array();
  $Cpedidosguiasfechaact = $r['horas'];
  $Cpedidosguiasfechaactcant = $r['cant01'];
  $pedidosguiasfechaact->close();
//consulta 02 pedidos guias mes actual

//consulta 02 pedidos recibidos mes actual
  $pedidosguiasfechapas = new Conexion;
  $sql01 = "SELECT SUM(DATEDIFF(irg.fecha,irp.fecha)* 24) as horas, COUNT(*) as cant02 FROM intranet_registro_pedido irp INNER JOIN intranet_registro_recibidos irg ON irp.numero_pedido = irg.numero_pedido WHERE DATE_FORMAT(irp.fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
  $Rpedidosguiasfechapas = $pedidosguiasfechapas->query($sql01) or trigger_error($pedidosguiasfechapas->error);
  $r = $Rpedidosguiasfechapas->fetch_array();
  $Cpedidosguiasfechapas = $r['horas'];
  $Cpedidosguiasfechapascant = $r['cant02'];
  $pedidosguiasfechapas->close();
//consulta 02 pedidos recibidos mes actual


$totalhorasmesact = $Cpedidosguiasfechaact + $Cpedidosguiasfechapas;



$totalcantmesact = $Cpedidosguiasfechaactcant + $Cpedidosguiasfechapascant;

if ($totalcantmesact == 0) {
  $totalcantmesact = 1;
}

$promediomesactual = $totalhorasmesact / $totalcantmesact;
$promediomesactual = round($promediomesactual, 2);


  //consulta 02 pedidos guias mes anterior
  $pedidosrecibidosact = new Conexion;
  $sql01 = "SELECT SUM(DATEDIFF(irg.fecha,irp.fecha)* 24) as horas, COUNT(*) as cant03 FROM intranet_registro_pedido irp INNER JOIN intranet_registro_guias irg ON irp.numero_pedido = irg.numero_pedido WHERE(month(irp.fecha) = month((curdate() + interval -(1) month)))";
  $Rpedidosrecibidosact = $pedidosrecibidosact->query($sql01) or trigger_error($pedidosrecibidosact->error);
  $r = $Rpedidosrecibidosact->fetch_array();
  $Cpedidosrecibidosact = $r['horas'];
  $Cpedidosrecibidosactcant = $r['cant03'];
  $pedidosrecibidosact->close();
//consulta 02 pedidos guias mes anterior

//consulta 02 pedidos recibidos mes anterior
  $pedidosrecibidospas = new Conexion;
  $sql01 = "SELECT SUM(DATEDIFF(irg.fecha,irp.fecha)* 24) as horas, COUNT(*) as cant04 FROM intranet_registro_pedido irp INNER JOIN intranet_registro_recibidos irg ON irp.numero_pedido = irg.numero_pedido WHERE (month(irp.fecha) = month((curdate() + interval -(1) month)))";
  $Rpedidosrecibidospas = $pedidosrecibidospas->query($sql01) or trigger_error($pedidosrecibidospas->error);
  $r = $Rpedidosrecibidospas->fetch_array();
  $Cpedidosrecibidospas = $r['horas'];
  $Cpedidosrecibidospascant = $r['cant04'];
  $pedidosrecibidospas->close();
//consulta 02 pedidos recibidos mes anterior

$totalhorasmespast = $Cpedidosrecibidosact + $Cpedidosrecibidospas;
$totalcantmespast = $Cpedidosrecibidosactcant + $Cpedidosrecibidospascant;

if ($totalcantmespast == 0) {
  $totalcantmespast = 1;
}

$promediomesanterior = $totalhorasmespast / $totalcantmespast;

//comparación de los meses
if ($promediomesanterior == 0) {
    $promediomesanterior = 1;
}

  $comparacionhoras = (($promediomesactual / $promediomesanterior) -1)*100;
  $comparacionhoras = round($comparacionhoras, 2);

//comparación de los meses


//Consulta 02 resultado 
 ?>


 <?php 
//Consulta 03

  $pedidospendientes = new Conexion;
  $sql01 = "SELECT COUNT(id) as pedidospend FROM intranet_registro_pedido WHERE zona = 'TRANSPORTADORA' AND entransito is NULL AND entregado is NULL";
  $Rpedidospendientes = $pedidospendientes->query($sql01) or trigger_error($pedidospendientes->error);
   $r = $Rpedidospendientes->fetch_array();
  $Cpedidospendientes = $r['pedidospend'];
  $pedidospendientes->close();

//Consulta 03
 ?>

  <?php 
//Consulta 04

  $pedidosretrasados = new Conexion;
  $sql01 = "SELECT count(id) as pedidosre FROM intranet_registro_pedido WHERE fecha < date_add(NOW(), INTERVAL -3 DAY) AND recibido is null";
  $Rpedidosretrasados = $pedidosretrasados->query($sql01) or trigger_error($pedidosretrasados->error);
   $r = $Rpedidosretrasados->fetch_array();
  $Cpedidosretrasados = $r['pedidosre'];
  $pedidosretrasados->close();

//Consulta 04
 ?>

 <?php 
//Consulta 05

  //traer pedidos para planeador rutas
  $guia = new Conexion;
  $sql02 = "SELECT COUNT(id) as pedidosporentre FROM intranet_registro_pedido WHERE zona <> 'TRANSPORTADORA' AND ( entransito IS NULL OR entregado IS NULL ) ORDER BY numero_pedido ASC";
  $guias = $guia->query($sql02) or trigger_error($guia->error);
   $r = $guias->fetch_array();
  $Cguias = $r['pedidosporentre'];
  $guia->close();
//traer pedidos para planeador rutas

//Consulta 05 
 ?>

 <?php 
//Consulta 06

  //traer pedidos para recibir

 $pedidos = new Conexion;
 $sql01 = "SELECT COUNT(id) as pedidosrecibir FROM intranet_registro_pedido WHERE zona <> 'TRANSPORTADORA' AND recibido is NULL AND fecha > '2016/05/25' AND entransito = '1' AND entregado = '1'";
 $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
  $r = $Rpedidos->fetch_array();
  $Cpedidos = $r['pedidosrecibir'];
 $pedidos->close();

//traer pedidos para recibir

//Consulta 06 
 ?>

 <?php 

//Compras mes actual
 $compras = new Conexion;
 $sql01 = "SELECT COUNT(id) as compras FROM intranet_orden_compra WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
 $Rcompras = $compras->query($sql01) or trigger_error($compras->error);
 $r = $Rcompras->fetch_array();
 $Ccompras = $r['compras'];
 $compras->close();
//Compras mes actual

 //Compras mes anterior
 $compraant = new Conexion;
 $sql01 = "SELECT COUNT(id) as compras FROM intranet_orden_compra WHERE (month(fecha) = month((curdate() + interval -(1) month)))";
 $Rcompraant = $compraant->query($sql01) or trigger_error($compraant->error);
  $r = $Rcompraant->fetch_array();
  $Ccompraant = $r['compras'];
 $compraant->close();
//Compras mes anterior

 if ($Ccompraant == 0) {
   $Ccompraant = 1;
 }

//consulta 01 compras 
 $Consulta01compras = (($Ccompras/$Ccompraant)-1)*100;
//consulta 01 compras
 ?>

<?php

//compras horas mes actual

  $comprashorasact = new Conexion;
 $sql01 = "SELECT SUM(DATEDIFF(fecha_entrega,fecha)* 24) as horas,COUNT(id) as cant  FROM intranet_orden_compra WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
 $Rcomprashorasact = $comprashorasact->query($sql01) or trigger_error($comprashorasact->error);
  $r = $Rcomprashorasact->fetch_array();
  $Ccomprashorasact = $r['horas'];
  $Ccomprascantact = $r['cant'];
 $comprashorasact->close();

 if ($Ccomprascantact == 0) {
   $Ccomprascantact = 1;
 }

$promediotiempomesact = $Ccomprashorasact / $Ccomprascantact;
$promediotiempomesact = round($promediotiempomesact,2);
//compras horas mes actual

//compras horas mes anterior

  $comprashoraspast = new Conexion;
 $sql01 = "SELECT SUM(DATEDIFF(fecha_entrega,fecha)* 24) as horas,COUNT(id) as cant  FROM intranet_orden_compra WHERE (month(fecha) = month((curdate() + interval -(1) month)))";
 $Rcomprashoraspast = $comprashoraspast->query($sql01) or trigger_error($comprashoraspast->error);
  $r = $Rcomprashoraspast->fetch_array();
  $Ccomprashoraspast = $r['horas'];
  $Ccomprascantpast = $r['cant'];
 $comprashoraspast->close();

if ($Ccomprascantpast == 0) {
  $Ccomprascantpast = 1;
}

$promediotiempomespast = $Ccomprashoraspast / $Ccomprascantpast;
//compras horas mes anterior

$Consulta02compras = ($promediotiempomesact + $promediotiempomespast)/2;

//domicilios
  $domicilio = new Conexion;
 $sql01 = "SELECT COUNT(id) as domicilios FROM intranet_orden_compra WHERE t_entrega = 'Domicilio' AND recepcion_mercancia is NULL";
 $Rdomicilio = $domicilio->query($sql01) or trigger_error($domicilio->error);
  $r = $Rdomicilio->fetch_array();
  $Cdomicilio = $r['domicilios'];
 $domicilio->close();
  

//domicilios

 //recoger
  $recoger = new Conexion;
 $sql01 = "SELECT count(id) as recoger FROM intranet_orden_compra WHERE zona <> '' AND ( entransito IS NULL OR entregado IS NULL ) ORDER BY fecha_entrega ASC";
 $Rrecoger = $recoger->query($sql01) or trigger_error($recoger->error);
  $r = $Rrecoger->fetch_array();
  $Crecoger = $r['recoger'];
 $recoger->close();
  

//recoger

?>

<?php 

 //traer encargados de revisión:

 $reviso = new Conexion;
 $sql01 = "SELECT encargado_revision as nombre, COUNT(encargado_revision) as cant,(SELECT COUNT(encargado_revision) FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')) as total FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
 $Rreviso = $reviso->query($sql01) or trigger_error($reviso->error);
 $reviso->close();
  
//traer encargados de revisión:
 ?>
 <?php 

//traer datos para canvas de grafica

      $canvas = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(id) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND  recibido = 1 GROUP BY dia ";
      $Rcanvas = $canvas->query($sql01) or trigger_error($canvas->error);
      $canvas->close();  

//traer datos para canvas de grafica

 ?>
 <?php 

//traer encargados de alistamiento GRAP:
  $alistograplabels = new Conexion;
 $sql01 = "SELECT encargado_alistamiento as nombre, COUNT(encargado_alistamiento) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_alistamiento ORDER BY cant DESC";
 $Ralistograplabels = $alistograplabels->query($sql01) or trigger_error($alistograplabels->error);
 $alistograplabels->close();
  
//traer encargados de alistamiento GRAP:

 ?>
     <?php 

//traer encargados de revision GRAP:
  $revisograplabels = new Conexion;
 $sql01 = "SELECT encargado_revision as nombre, COUNT(encargado_revision) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
 $Rrevisograplabels = $revisograplabels->query($sql01) or trigger_error($revisograplabels->error);
 $revisograplabels->close();
  
//traer encargados de revision GRAP:

 ?>