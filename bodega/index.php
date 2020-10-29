<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
$ip = $_SERVER['REMOTE_ADDR'];
$ipsatel = '186.154.217.122';

 //impedir acceso a ventas y bodega si no es la IP de Satel  
 //if ($ip  != $ipsatel) {
 //print "<script>alert(\"Acceso desde una dirección IP invalida!\");window.location='php/logout.php';</script>";
 //}  
 //impedor acceso a ventas y bodega si no es la IP de Satel  
?>

<?php
  include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
   include_once('php/consultas_index.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Intranet Ventas Satel Importadores</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
<link href="css/impresion.css" rel="stylesheet" type="text/css" media="print">
  

  <script src="js/jquery.min.js"></script>
   <script src="js/menu.js"></script>
  <!--<script src="js/nprogress.js"></script>-->

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md nover">


  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-truck"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="../avatar/<?php echo $_SESSION["user_id"];?>.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido</span>
              <h2><?php echo $_SESSION["user_nombre"];?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

                <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                <div id="menu">
                  <!-- Se carga por menu.js y menu.php -->
                </div>


          </div>
        <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="Logout" href="php/logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../avatar/<?php echo $_SESSION["user_id"];?>.jpg" alt=""><?php echo $_SESSION["user_nombre"];?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="php/logout.php"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                  </li>
                </ul>
              </li>



            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
<div class="row"><div class="col-md-12 col-md-offset-5 col-xs-offset-5"><h2>Pedidos</h2></div></div>
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-file-powerpoint-o"></i> Total pedidos procesados</span>
              <div class="count"><?php echo $totalmesactual; ?></div>
              <span class="count_bottom">

              <?php
                if ($calculo01 > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
               echo $calculo01; 
               ?> % </i> Mes anterior</span>

            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-clock-o"></i> Tiempo promedio</span>
              <div class="count"><?php echo $promediomesactual; ?> hrs</div>
              <span class="count_bottom">
              <?php
              if ($comparacionhoras > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
               echo $comparacionhoras; 
               ?> % </i> Mes anterior</span>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-truck"></i> Pendientes de guía</span>
              <a href="registro_guia.php"><div class="count"><?php echo $Cpedidospendientes ?></div></a>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-truck"></i> Pedidos con retraso</span>

              <a href="pedidos_retrasados.php"><div class="count"><?php echo $Cpedidosretrasados; ?></div></a>
              <span class="count_bottom">Mayor a <i class="red"><i class="fa fa-sort-asc"></i>  3 </i>días</span>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-truck"></i> Pedidos por entregar</span>
              <a href="planeador_rutas.php"><div class="count"><?php echo $Cguias; ?></div></a>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-toggle-on"></i> Registro recibidos</span>
              <a href="registro_recibido.php"><div class="count"><?php echo $Cpedidos; ?></div></a>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>

        </div>
        <!-- /top tiles -->


      <div class="row"><div class="col-md-12 col-md-offset-5 col-xs-offset-5"><h2>Compras</h2></div></div>

         <!-- Compras -->
        <div class="row tile_count">
          <div class="animated flipInY col-md-3 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Total compras</span>
              <div class="count"><?php echo $Ccompras; ?></div>

              <span class="count_bottom"> <?php
              if ($Consulta01compras > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
               echo $Consulta01compras; 
               ?> % </i> Mes anterior</span>
            </div>
          </div>
          <div class="animated flipInY col-md-3 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-clock-o"></i> Tiempo promedio</span>
              <div class="count"><?php $promediotiempomesact = round($promediotiempomesact,2); echo $promediotiempomesact; ?> hrs</div>
                            <span class="count_bottom"> <?php
              if ($Consulta02compras > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
                $Consulta02compras = round($Consulta02compras);
               echo $Consulta02compras; 
               ?> % </i> Mes anterior</span>
            </div>
          </div>
          <div class="animated flipInY col-md-3 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-truck"></i>  Domicilios pendientes</span>
              <a href="registro_recepcion_domicilios.php"><div class="count"><?php echo $Cdomicilio; ?></div></a>

              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>
          <div class="animated flipInY col-md-3 col-sm-4 col-xs-12 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-truck"></i> Pedidos por recoger</span>
              <a href="planeador_compras.php"><div class="count"><?php echo $Crecoger; ?></div></a>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
          </div>

        </div>
        <!-- /Compras -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3><small>Bienvenido </small><?php echo strtoupper($_SESSION["user_nombre"]); ?></h3>
                </div>
                <div class="col-md-6">
                  <div  class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    
                    <strong><?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?></strong>
                  </div>
                </div>
              </div>

              <div class="row"><div class="row x_title"><h3><div id="impmes" class="col-md-12 col-md-offset-5 col-xs-12 col-xs-offset-3">Pedidos del mes</div></h3></div></div>
              
              
                <div>

                                <div class="">
                                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                                  <div style="width: 100%;">
                                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                                  </div>
                                </div>



                </div>
                                  

                  



              


 
              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />

        <div class="row">

<!-- Alistamiento -->


<?php 


 //traer encargados de alistamiento:
  $alisto = new Conexion;
 $sql01 = "SELECT encargado_alistamiento as nombre, COUNT(encargado_alistamiento) as cant,(SELECT COUNT(encargado_alistamiento) FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ) as total FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')   GROUP BY encargado_alistamiento ORDER BY cant DESC";
 $Ralisto = $alisto->query($sql01) or trigger_error($alisto->error);
 $alisto->close();
  
//traer encargados de alistamiento:

?>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Alistamiento</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">
                      <p>Top 5</p>
                    </th>
                    <th>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <p class="">Nombre:</p>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <p class="">Porcentaje:</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">

                          <?php 

                            while ($r = $Ralisto->fetch_array()) {

                                  $Cnombrealis = $r['nombre'];
                                  $Ccantalis = $r['cant'];
                                  $Ctotalalis = $r['total'];
                                  if ($Ctotalalis == 0) {
                                    $Ctotalalis = 1;
                                  }
                                  $Cporcentajealis = ($Ccantalis / $Ctotalalis) * 100;
                                  $Cporcentajealis = round($Cporcentajealis,1);

//traer color del 

        $color = new Conexion;
        $sql01 = "SELECT color FROM intranet_usuarios WHERE nombre = \"$Cnombrealis\"";
        $Rcolor = $color->query($sql01) or trigger_error($color->error);
        $c = $Rcolor->fetch_array();
        $Ccolor = $c['color'];
        //echo $Ccolor;
        

//traer color del 

                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolor'></i>$Cnombrealis</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajealis %</td>";
                              echo "</tr>"; 
        $color->close();
                            }



                           ?>

                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
<!-- Alistamiento -->



<!-- Revisión -->


<?php 

 //traer encargados de revisión:

 $reviso = new Conexion;
 $sql01 = "SELECT encargado_revision as nombre, COUNT(encargado_revision) as cant,(SELECT COUNT(encargado_revision) FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')) as total FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
 $Rreviso = $reviso->query($sql01) or trigger_error($reviso->error);
 $reviso->close();
  
//traer encargados de revisión:




 ?>


          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Revisión</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">
                      <p>Top 5</p>
                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Nombre:</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Porcentaje:</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                      

                                   <?php 

                            while ($r = $Rreviso->fetch_array()) {

                                  $Cnombrereviso = $r['nombre'];
                                  $Ccantreviso = $r['cant'];
                                  $Ctotalreviso = $r['total'];
                                  if ($Ctotalreviso == 0) {
                                    $Ctotalreviso = 1;
                                  }
                                  $Cporcentajereviso = ($Ccantreviso / $Ctotalreviso) * 100;
                                  $Cporcentajereviso = round($Cporcentajereviso,1);

//traer color del 

        $colorreviso = new Conexion;
        $sql01 = "SELECT color FROM intranet_usuarios WHERE nombre = \"$Cnombrereviso\"";
        $Rcolorreviso = $colorreviso->query($sql01) or trigger_error($colorreviso->error);
        $c = $Rcolorreviso->fetch_array();
        $Ccolorreviso = $c['color'];
        //echo $Ccolor;
        

//traer color del 

                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolorreviso'></i>$Cnombrereviso</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajereviso %</td>";
                              echo "</tr>"; 
        $colorreviso->close();
                            }



                           ?>



                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
<!-- Revisión -->



        </div>


        <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">Satel Importadores de Ferrateria SAS
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/moment/localte.js"></script>
 

  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

 <!-- <script src="js/custom.js"></script> -->

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
  
<?php 

//traer datos para canvas de grafica

      $canvas = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(id) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND  recibido = 1 GROUP BY dia ";
      $Rcanvas = $canvas->query($sql01) or trigger_error($canvas->error);
      $canvas->close();  

//traer datos para canvas de grafica

 ?>


    $(document).ready(function() {
        moment.locale('es');
        var mesactual = moment().format('MMMM');
        $('#impmes').html('Pedidos de: '+ mesactual);

      var data1 = [ 

 <?php 
  while ($r = $Rcanvas->fetch_array()) {
      $Cyear = $r['year'];
      $Cmes = $r['mes'];
      $Cdia = $r['dia'];
      $Ccant = $r['cant'];
  echo "[gd($Cyear, $Cmes, $Cdia),$Ccant],";
  }
?>
      ];

      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1
      ], {
        series: {
          lines: {
            show: true,
            fill: true
          },
          splines: {
            //show: false,//graficas redondas
            show: false,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            //radius: 2,//ancho de la bola
            radius: 2,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 3,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 10,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 10,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
 

  <!-- dashbord linegraph ALISTAMIENTO -->

<?php 

//traer encargados de alistamiento GRAP:
  $alistograplabels = new Conexion;
 $sql01 = "SELECT encargado_alistamiento as nombre, COUNT(encargado_alistamiento) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_alistamiento ORDER BY cant DESC";
 $Ralistograplabels = $alistograplabels->query($sql01) or trigger_error($alistograplabels->error);
 $alistograplabels->close();
  
//traer encargados de alistamiento GRAP:

 ?>


  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };



    var data = {
      labels: [
      <?php 
          while ($r = $Ralistograplabels->fetch_array()) {
            $Cnombrealis = $r['nombre'];
            echo "'$Cnombrealis',";
          }


       ?>
      ],
      datasets: [{
        data: [

        <?php 
        //traer encargados de alistamiento GRAP:
              $alistograpporcent = new Conexion;
             $sql01 = "SELECT COUNT(encargado_alistamiento) as cant,(SELECT COUNT(encargado_alistamiento) FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ) as total FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_alistamiento ORDER BY cant DESC";
             $Ralistograpporcent = $alistograpporcent->query($sql01) or trigger_error($alistograpporcent->error);
             $alistograpporcent->close();
  
      //traer encargados de alistamiento GRAP:
               while ($r = $Ralistograpporcent->fetch_array()) {

                                  
                                  $Ccantalis = $r['cant'];
                                  $Ctotalalis = $r['total'];
                                  $Cporcentajealis = ($Ccantalis / $Ctotalalis) * 100;
                                  $Cporcentajealis = round($Cporcentajealis,1);

                                    echo "$Cporcentajealis,";
                                }
                                


         ?>

        ],
        backgroundColor: [

<?php 

//traer color encargados de alistamiento GRAP:
  $alistograpcolor = new Conexion;
 $sql01 = "SELECT encargado_alistamiento as nombre, COUNT(encargado_alistamiento) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_alistamiento ORDER BY cant DESC";
 $Ralistograpcolor = $alistograpcolor->query($sql01) or trigger_error($alistograpcolor->error);
 $alistograpcolor->close();
  
//traer color encargados de alistamiento GRAP:
 while ($r = $Ralistograpcolor->fetch_array()) {
      $Cnombrealis = $r['nombre'];

//traer color del 

        $color = new Conexion;
        $sql01 = "SELECT colorhex FROM intranet_usuarios WHERE nombre = \"$Cnombrealis\"";
        $Rcolor = $color->query($sql01) or trigger_error($color->error);
        $c = $Rcolor->fetch_array();
        $Ccolor = $c['colorhex'];
        echo "'$Ccolor',";
 }
 ?>
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph ALISTAMIENTO -->






    <!-- dashbord linegraph Revision -->


    <?php 

//traer encargados de revision GRAP:
  $revisograplabels = new Conexion;
 $sql01 = "SELECT encargado_revision as nombre, COUNT(encargado_revision) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
 $Rrevisograplabels = $revisograplabels->query($sql01) or trigger_error($revisograplabels->error);
 $revisograplabels->close();
  
//traer encargados de revision GRAP:

 ?>


  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [

            <?php 
                  while ($r = $Rrevisograplabels->fetch_array()) {
                  $Cnombrereviso = $r['nombre'];
                  echo "'$Cnombrereviso',";
                  }
            ?>

      ],
      datasets: [{
        data: [


                  <?php 
        //traer encargados de revision GRAP:
              $revisograpporcent = new Conexion;
             $sql01 = "SELECT COUNT(encargado_revision) as cant,(SELECT COUNT(encargado_revision) FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') ) as total FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
             $Rrevisograpporcent = $revisograpporcent->query($sql01) or trigger_error($revisograpporcent->error);
             $revisograpporcent->close();
  
      //traer encargados de revision GRAP:
               while ($r = $Rrevisograpporcent->fetch_array()) {

                                  
                                  $Ccantreviso = $r['cant'];
                                  $Ctotalreviso = $r['total'];
                                  $Cporcentajereviso = ($Ccantreviso / $Ctotalreviso) * 100;
                                  $Cporcentajereviso = round($Cporcentajereviso,1);

                                    echo "$Cporcentajereviso,";
                                }
                                


         ?>


        ],
        backgroundColor: [

          <?php 

//traer color encargados de revision GRAP:
  $revisograpcolor = new Conexion;
 $sql01 = "SELECT encargado_revision as nombre, COUNT(encargado_revision) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY encargado_revision ORDER BY cant DESC";
 $Rrevisograpcolor = $revisograpcolor->query($sql01) or trigger_error($revisograpcolor->error);
 $revisograpcolor->close();
  
//traer color encargados de revision GRAP:
 while ($r = $Rrevisograpcolor->fetch_array()) {
      $Cnombreviso = $r['nombre'];

//traer color del 

        $color = new Conexion;
        $sql01 = "SELECT colorhex FROM intranet_usuarios WHERE nombre = \"$Cnombreviso\"";
        $Rcolor = $color->query($sql01) or trigger_error($color->error);
        $c = $Rcolor->fetch_array();
        $Ccolor = $c['colorhex'];
        echo "'$Ccolor',";
 }
 ?>

        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas2"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph Revision -->
 
  <!-- /footer content -->
</body>

</html>


