<?php 
//consulta 01 total de llamadas mes actual

  $tllamadas = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND user_id = \"$user_id\"";
  $Rtllamadas = $tllamadas->query($sql01) or trigger_error($tllamadas->error);
  $r = $Rtllamadas->fetch_array();
  $Ctllamadas = $r['llamadas'];
  $tllamadas->close();

//consulta 01 total de llamadas mes actual

//consulta 01 total de llamadas mes anteriror

  $tantllamadas = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE (month(fecha) = month((curdate() + interval -(1) month))) AND user_id = \"$user_id\"";
  $Rtantllamadas = $tantllamadas->query($sql01) or trigger_error($tantllamadas->error);
  $r = $Rtantllamadas->fetch_array();
  $Ctantllamadas = $r['llamadas'];
  $tantllamadas->close();

//consulta 01 total de llamadas mes anteriror 

 if ($Ctantllamadas <= 0) {
    $Ctantllamadas = 1;
  } 

 $calculo01 = (($Ctllamadas / $Ctantllamadas)-1)*100;
 ?>


 <?php 
//Consulta total de pedidos mes actual

  $pedidos = new Conexion;
  $sql01 = "SELECT COUNT(id) as pedidos FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND user_id = \"$user_id\"";
  $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
  $r = $Rpedidos->fetch_array();
  $Cpedidos = $r['pedidos'];
  $pedidos->close();

//Consulta total de pedidos mes actual

//Consulta total de pedidos mes anteriror

  $pedidosant = new Conexion;
  $sql01 = "SELECT COUNT(id) as pedidos FROM intranet_registro_pedido WHERE (month(fecha) = month((curdate() + interval -(1) month))) AND user_id = \"$user_id\"";
  $Rpedidosant = $pedidosant->query($sql01) or trigger_error($pedidosant->error);
  $r = $Rpedidosant->fetch_array();
  $Cpedidosant = $r['pedidos'];
  $pedidosant->close();

//Consulta total de pedidos mes anteriror 
  if ($Cpedidosant <= 0) {
    $Cpedidosant = 1;
  }
 $calculo02 = (($Cpedidos / $Cpedidosant)-1)*100;
  ?>

  <?php 
//consulta 03
  if ($Ctllamadas <= 0) {
    $Ctllamadas = 1;
  }
  $calculo03 =  $Cpedidos / $Ctllamadas;

//mes anteriror
  if ($Ctantllamadas <= 0) {
    $Ctantllamadas = 1;
  }
  $calculo03ant = $Cpedidosant / $Ctantllamadas;
//consulta 03
  ?>

  <?php 
//traer tareas hechas mes actual
    $tarea = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND user_id = \"$user_id\"";
    $Rtareas = $tarea->query($sql03) or trigger_error($tarea->error);
    $r = $Rtareas->fetch_array();
    $Ctareas = $r['tareas'];
    $tarea->close();
    //echo $Ntareas;
    $numero_tares = 10;

    $tareas_mes = $Ctareas / $numero_tares;

    $tareas_mes = round($tareas_mes,2);
//traer tareas hechas mes actual

//traer tareas hechas mes anterior
    $tareaant = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND (month(fecha) = month((curdate() + interval -(1) month))) AND user_id = \"$user_id\"";
    $Rtareasant = $tareaant->query($sql03) or trigger_error($tareaant->error);
    $r = $Rtareasant->fetch_array();
    $Ctareasant = $r['tareas'];
    $tareaant->close();
    //echo $Ntareas;
    
    $tareas_mesant = $Ctareasant / $numero_tares;
  
//traer tareas hechas mes anterior

//traer tareas pendientes
    $tarea_pen = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas01 FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND DATE_FORMAT(fecha,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') AND user_id = \"$user_id\"";
    $Rtareas_pen = $tarea_pen->query($sql03) or trigger_error($tarea_pen->error);
    $r = $Rtareas_pen->fetch_array();
    $Ctareas01 = $r['tareas01'];
   $TareasPendientes = $numero_tares - $Ctareas01;
          

//traer tareas pendientes

  ?>

  <?php 

  //traer post ventas pendientes
 
 $postpendiente = new Conexion;
 $sql01 = "SELECT COUNT(id) as postpen FROM intranet_registro_pedido WHERE entransito = '1' AND entregado = '1' AND recibido = '1' AND post_venta IS NULL AND user_id = \"$user_id\"";
 $Rpostpendiente = $postpendiente->query($sql01) or trigger_error($postpendiente->error);
   $r = $Rpostpendiente->fetch_array();
  $Cpostpendiente = $r['postpen'];
 $postpendiente->close();
//traer post ventas pendientes

  ?>

  <?php
//Consulta top de Llamadas

      $topllamadas = new Conexion;
      $sql01 = "SELECT COUNT(iacc.cardcode) as cant,iacc.cardcode,iac.cardname FROM intranet_actualizacion_clientes_comentarios iacc INNER JOIN intranet_actualizacion_clientes iac ON iacc.cardcode = iac.cardcode WHERE iacc.user_id = \"$user_id\" AND YEAR(iacc.fecha) = YEAR(now()) GROUP BY iacc.cardcode ORDER BY cant DESC LIMIT 4";
      $Rtopllamadas = $topllamadas->query($sql01) or trigger_error($topllamadas->error);
      $topllamadas->close();

//Consulta top de Llamadas
  ?>

  <?php
//Consulta top de Pedidos

      $toppedidos = new Conexion;
      $sql01 = "SELECT COUNT(irp.cod_cliente) as cant,irp.cod_cliente,iac.cardname FROM intranet_registro_pedido irp INNER JOIN intranet_actualizacion_clientes iac on irp.cod_cliente = iac.cardcode WHERE irp.user_id = \"$user_id\" AND YEAR(irp.fecha) = YEAR(now()) GROUP BY irp.cod_cliente ORDER BY cant DESC LIMIT 4";
      $Rtoppedidos = $toppedidos->query($sql01) or trigger_error($toppedidos->error);
      $toppedidos->close();

//Consulta top de Pedidos

  ?>

