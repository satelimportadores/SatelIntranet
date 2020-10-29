<?php

if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";


}
?>
<?php 

$user_id = $_SESSION["user_id"];
  
?>


<?php 
//consulta 01 total de llamadas mes actual

  $tllamadas = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')";
  $Rtllamadas = $tllamadas->query($sql01) or trigger_error($tllamadas->error);
  $r = $Rtllamadas->fetch_array();
  $Ctllamadas = $r['llamadas'];
  $tllamadas->close();

//consulta 01 total de llamadas mes actual

//consulta 01 total de llamadas mes anteriror

  $tantllamadas = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE (month(fecha) = month((curdate() + interval -(1) month))) ";
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
  $sql01 = "SELECT COUNT(id) as pedidos FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ";
  $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
  $r = $Rpedidos->fetch_array();
  $Cpedidos = $r['pedidos'];
  $pedidos->close();

//Consulta total de pedidos mes actual

//Consulta total de pedidos mes anteriror

  $pedidosant = new Conexion;
  $sql01 = "SELECT COUNT(id) as pedidos FROM intranet_registro_pedido WHERE (month(fecha) = month((curdate() + interval -(1) month))) ";
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
 //traer cantidad de asesores   
          $asesores = new Conexion;
          $sql03 = "SELECT COUNT(id) as asesores FROM intranet_usuarios WHERE grupo_ventas_subgrupo = 'asesores' and activo =1";
          $Rasesores = $asesores->query($sql03) or trigger_error($asesores->error);
          $r = $Rasesores->fetch_array();
          $Casesores = $r['asesores'];
  //traer cantidad de asesores 


//traer tareas hechas mes actual
    $tarea = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ";
    $Rtareas = $tarea->query($sql03) or trigger_error($tarea->error);
    $r = $Rtareas->fetch_array();
    $Ctareas = $r['tareas'];
    //echo $Ntareas;
    $numero_tares = 10;

    $tareas_mes = $Ctareas / (10 * $Casesores);
    $tareas_mes = round($tareas_mes,2);



  
//traer tareas hechas mes actual

//traer tareas hechas mes anterior
    $tareaant = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND (month(fecha) = month((curdate() + interval -(1) month))) ";
    $Rtareasant = $tareaant->query($sql03) or trigger_error($tareaant->error);
    $r = $Rtareasant->fetch_array();
    $Ctareasant = $r['tareas'];
    //echo $Ntareas;
    
    $tareas_mesant = $Ctareasant / (10 * $Casesores);
  
//traer tareas hechas mes anterior

//traer tareas pendientes
    $tarea_pen = new Conexion;
    $sql03 = "SELECT COUNT(id) as tareas FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND DATE_FORMAT(fecha,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')";
    $Rtareas_pen = $tarea_pen->query($sql03) or trigger_error($tarea_pen->error);
    $r = $Rtareas_pen->fetch_array();
    $Ctareaspen = $r['tareas'];


      $TareasPendientes = ($Casesores *  $numero_tares) - $Ctareaspen;


//traer tareas pendientes





  ?>

  <?php 

  //traer post ventas pendientes
 
 $postpendiente = new Conexion;
 $sql01 = "SELECT COUNT(id) as postpen FROM intranet_registro_pedido WHERE entransito = '1' AND entregado = '1' AND recibido = '1' AND post_venta IS NULL";
 $Rpostpendiente = $postpendiente->query($sql01) or trigger_error($postpendiente->error);
   $r = $Rpostpendiente->fetch_array();
  $Cpostpendiente = $r['postpen'];
 $postpendiente->close();
//traer post ventas pendientes

  ?>

  <?php 
        //Consulta top de Llamadas

          $topllamadas = new Conexion;
          $sql01 = "SELECT COUNT(cardcode) as cant,cardcode FROM intranet_actualizacion_clientes_comentarios WHERE YEAR(fecha) = YEAR(CURDATE()) GROUP BY cardcode ORDER BY cant DESC LIMIT 4";
          $Rtopllamadas = $topllamadas->query($sql01) or trigger_error($topllamadas->error);
          $topllamadas->close();

    //Consulta top de Llamadas

   ?>

   <?php 
        //Consulta top de Pedidos

        $toppedidos = new Conexion;
        $sql01 = "SELECT COUNT(cod_cliente) as cant,cod_cliente FROM intranet_registro_pedido WHERE YEAR(fecha) = YEAR(CURDATE()) GROUP BY cod_cliente ORDER BY cant DESC LIMIT 4";
        $Rtoppedidos = $toppedidos->query($sql01) or trigger_error($toppedidos->error);
        $toppedidos->close();

  //Consulta top de Pedidos

    ?>

    <?php 
//Llamadas del asesor

  $Llamadasasesor = new Conexion;
  $sql01 = "SELECT COUNT(id) as llamadas FROM intranet_actualizacion_clientes_comentarios WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ";
  $RLlamadasasesor = $Llamadasasesor->query($sql01) or trigger_error($Llamadasasesor->error);
  $r = $RLlamadasasesor->fetch_array();
  $CLlamadasasesor = $r['llamadas'];
  $Llamadasasesor->close();
//Llamadas del asesor
$meta = 1000;

 ?>


   <?php 

//traer datos para canvas de grafica llamadas

      $canvas01 = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(id) as cant FROM intranet_actualizacion_clientes_comentarios WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY dia";
      $Rcanvas01 = $canvas01->query($sql01) or trigger_error($canvas01->error);
      $canvas01->close();  

//traer datos para canvas de grafica llamadas

 ?>

   <?php 

//traer datos para canvas de grafica llamadas anual

      $canvas01anual = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, MONTH(fecha) as mes01, COUNT(id) as cant FROM intranet_actualizacion_clientes_comentarios WHERE DATE_FORMAT(fecha,'%Y') = DATE_FORMAT(NOW(),'%Y')  GROUP BY mes01";
      $Rcanvas01anual = $canvas01anual->query($sql01) or trigger_error($canvas01anual->error);
      $canvas01anual->close();  

//traer datos para canvas de grafica llamadas anual

 ?>