<?php

if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";


}
?>
<?php 

$user_id = $_SESSION["user_id"];

?>


<?php 


 //traer encargados de alistamiento:
  $alisto = new Conexion;
 $sql01 = "select (select `ipv02`.`error` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `nombre`,(select `ipv02`.`color` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `color`,(select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `hexcolor`,count(`ipv01`.`error`) AS `cant`,(select count(`ipv03`.`error`) from `intranet_post_venta_rerrores` `ipv03` where (date_format(`ipv03`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'))) AS `total` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `ipv01`.`error`";
 $Ralisto = $alisto->query($sql01) or trigger_error($alisto->error);
 $alisto->close();
  
//traer encargados de alistamiento:

?>

  <?php 

 //traer encargados de revisión:

 $reviso = new Conexion;
 $sql01 = "select (select `ipv02`.`error` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `nombre`,(select `ipv02`.`color` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `color`,(select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `hexcolor`,count(`ipv01`.`error`) AS `cant`,(select count(`ipv03`.`error`) from `intranet_post_venta_rerrores` `ipv03` where (date_format(`ipv03`.`fecha`,'%Y') = date_format(now(),'%Y'))) AS `total` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `ipv01`.`error`";
 $Rreviso = $reviso->query($sql01) or trigger_error($reviso->error);
 $reviso->close();
  
//traer encargados de revisión:


 ?>

   <?php 

 //traer calificacion y cantidad

 $calificacionmensual = new Conexion;
 $sql01 = "select `intranet_post_venta`.`calificacion` AS `nombre`,count(`intranet_post_venta`.`calificacion`) AS `cant`,(select count(`intranet_post_venta`.`calificacion`) from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'))) AS `total`,(case `intranet_post_venta`.`calificacion` when 1 then 'rojo' when 2 then 'orange' when 3 then 'violet' when 4 then 'blue' when 5 then 'green' end) AS `color` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `intranet_post_venta`.`calificacion`";
 $Rcalificacionmensual = $calificacionmensual->query($sql01) or trigger_error($calificacionmensual->error);
 $calificacionmensual->close();
  
//traer calificacion y cantidad




 ?>

   <?php 

 //traer calificacion y cantidad

 $calificacionmensual = new Conexion;
 $sql01 = "select `intranet_post_venta`.`calificacion` AS `nombre`,count(`intranet_post_venta`.`calificacion`) AS `cant`,(select count(`intranet_post_venta`.`calificacion`) from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y'))) AS `total`,(case `intranet_post_venta`.`calificacion` when 1 then 'rojo' when 2 then 'orange' when 3 then 'violet' when 4 then 'blue' when 5 then 'green' end) AS `color` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `intranet_post_venta`.`calificacion`";
 $Rcalificacionmensual = $calificacionmensual->query($sql01) or trigger_error($calificacionmensual->error);
 $calificacionmensual->close();
  
//traer calificacion y cantidad




 ?>

 <?php 

//traer datos para canvas de grafica

      $canvas = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(error) as cant FROM intranet_post_venta_rerrores WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY dia";
      $Rcanvas = $canvas->query($sql01) or trigger_error($canvas->error);
      $canvas->close();  

//traer datos para canvas de grafica

 ?>

 <?php 

//traer datos para canvas de grafica

      $canvasanual = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, MONTH(fecha) as mes01, COUNT(error) as cant FROM intranet_post_venta_rerrores WHERE DATE_FORMAT(fecha,'%Y') = DATE_FORMAT(NOW(),'%Y') GROUP BY mes";
      $Rcanvasanual = $canvasanual->query($sql01) or trigger_error($canvasanual->error);
      $canvasanual->close();  

//traer datos para canvas de grafica

 ?>

 <?php 

//traer encargados de alistamiento GRAP:
  $alistograplabels = new Conexion;
 $sql01 = "select (select `ipv02`.`error` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `nombre` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `ipv01`.`error`";
 $Ralistograplabels = $alistograplabels->query($sql01) or trigger_error($alistograplabels->error);
 $alistograplabels->close();
  
//traer encargados de alistamiento GRAP:

 ?>