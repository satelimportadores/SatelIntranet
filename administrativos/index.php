<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
if($_SESSION["user_permisos"] <> 1){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php 
$user_id = $_SESSION["user_id"];
  include_once('php/class.conexion.php');
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
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
  

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


<body class="nav-md">


  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-gears"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
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
        
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-phone"></i> Total llamadas</span>
              <div class="count"><?php echo $Ctllamadas; ?></div>
             <span class="count_bottom">
              <?php
                if ($Ctllamadas > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
              $calculo01 = round($calculo01,2);
               echo $calculo01; 
               ?> % </i> Mes anterior
               </span>
            </div>
          </div>

          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-file-powerpoint-o"></i>  Pedidos creados</span>
              <div class="count"><?php echo $Cpedidos ?></div>
              <span class="count_bottom">
              <?php
                if ($Cpedidos > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
                $calculo02 = round($calculo02,2);
               echo $calculo02; 
               ?> % </i> Mes anterior
               </span>
            </div>
          </div>

          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-calculator"></i> Tasa de conversión</span>
              <div class="count"><?php $calculo03 = round($calculo03,2); echo ($calculo03 * 100); ?> %</div>
            <span class="count_bottom">

              <?php
              $calculo03ant = round($calculo03ant,2);
                if ($calculo03ant > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }

               echo $calculo03ant; 
               ?> % </i> Mes anterior
               </span>
            </div>
          </div>

          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-pencil-square-o"></i> Tareas realizadas</span>
              <a href="tareas.php"><div class="count"><?php echo ($tareas_mes * 100) ?> %</div></a>
               <span class="count_bottom">
              <?php
                if ($tareas_mesant > 0) {
                 echo "<i class='green'><i class='fa fa-sort-asc'></i>";
                }else{
                  echo "<i class='red'><i class='fa fa-sort-desc'></i>";
                }
               echo $tareas_mesant; 
               ?> % </i> Mes anterior
               </span>
            </div>
          </div>

          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-pencil-square"></i> Tareas Pendientes</span>
              <a href="tareas.php"><div class="count"><?php echo $TareasPendientes; ?></div></a>
              
            </div>
          </div>

          <div class="animated flipInY col-md-2 col-sm-4 col-xs-10 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> PostVenta pendientes</span>
              <a href="post_venta.php"><div class="count"><?php echo $Cpostpendiente; ?></div></a>
              
            </div>
          </div>

        </div>
        <!-- /top tiles -->

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

              <div class="row">
              <div class="row x_title"><h3><div id="impmes" class="col-md-12 col-md-offset-3 col-xs-12 col-xs-offset-1">Total de llamadas <i class="fa fa-phone green"></i> - Total de pedidos <i class="fa fa-file-powerpoint-o blue"></i> 
              </div></h3>
              </div>
              </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                  <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                </div>
              </div>

              <!-- Grafica anual -->
              <br>

                            <div class="row">
              <div class="row x_title"><h3><div id="impmes" class="col-md-12 col-md-offset-2 col-xs-12 col-xs-offset-1"><strong>Grafica Anual </strong>Total de llamadas <i class="fa fa-phone green"></i> - Total de pedidos <i class="fa fa-file-powerpoint-o blue"></i> 
              </div></h3>
              </div>
              </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder66" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                  <div id="canvas_dahs02" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                </div>
              </div>

              <!-- Grafica anual -->


              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />

        <div class="row">

<!--primero -->
          <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="x_panel tile fixed_height_320">
                    <div>
                      <div class="x_title">
                        <h2>Top llamadas a clientes:</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                          <li><a href="#"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <ul class="list-unstyled top_profiles scroll-view">

                        <?php 


                                    while ($r = $Rtopllamadas->fetch_array()) {
                                          $topcant = $r['cant'];
                                          $topcardcode = $r['cardcode'];

                                              //Consulta datos del carcode

                                                        $concardname = new Conexion;
                                                        $sql01 = "SELECT * FROM intranet_actualizacion_clientes WHERE cardcode = \"$topcardcode\"";
                                                        $Rconcardname = $concardname->query($sql01) or trigger_error($concardname->error);
                                                        $s = $Rconcardname->fetch_array();
                                                        $cardname = $s['cardname'];
                                                        $cardcode = $s['cardcode'];
                                                        $concardname->close();

                                              //Consulta datos del carcode

                                        echo "<li class='media event'>";
                                        echo "<a class='pull-left border-green profile_thumb'><i class='fa fa-phone green'></i></a>";
                                        echo "<div class='media-body'>";
                                        echo "<a class='title' href='profile.php?cardcode=$cardcode'>$cardname</a>";
                                        echo "<p><strong>$topcant</strong> Llamadas realizadas.</p>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                         ?>

                      </ul>
                    </div>


                  </div>
          </div>
<!--primero -->


<!--segundo -->
          <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="x_panel tile fixed_height_320">
                                            <div>
                      <div class="x_title">
                        <h2>Top pedidos de clientes:</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                          <li><a href="#"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <ul class="list-unstyled top_profiles scroll-view">



                          <?php 


                                    while ($r = $Rtoppedidos->fetch_array()) {
                                          $topcantpedidos = $r['cant'];
                                          $topcardcodepedidos = $r['cod_cliente'];

                                              //Consulta datos del carcode

                                                        $concardname01 = new Conexion;
                                                        $sql01 = "SELECT * FROM intranet_actualizacion_clientes WHERE cardcode = \"$topcardcodepedidos\"";
                                                        $Rconcardname01 = $concardname01->query($sql01) or trigger_error($concardname01->error);
                                                        $s = $Rconcardname01->fetch_array();
                                                        $cardname01 = $s['cardname'];
                                                        $cardcode01 = $s['cardcode'];
                                                        $concardname01->close();

                                              //Consulta datos del carcode

                                        echo "<li class='media event'>";
                                        echo "<a class='pull-left border-blue profile_thumb'><i class='fa fa-file-powerpoint-o blue'></i></a>";
                                        echo "<div class='media-body'>";
                                        echo "<a class='title' href='profile.php?cardcode=$cardcode01'>$cardname01</a>";
                                        echo "<p><strong>$topcantpedidos</strong> Pedidos realizadas.</p>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                         ?>

                      </ul>
                    </div>


                  </div>
          </div>
<!--segundo -->

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
              <div class="x_title">
                <h2>Meta del mes</h2>
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
                


                  <div class="sidebar-widget">
                    <h4>Llamadas realizadas:</h4>
                    <canvas width="290" height="150" id="foo" class="" style="width: 310px; height: 190px;"></canvas>
                    <div class="goal-wrapper">
                      <span class="gauge-value pull-left"></span>
                      <span id="gauge-text" class="gauge-value pull-left">1</span>
                      <span id="goal-text" class="goal-value pull-right"><span class="green"><?php echo $meta; ?></span></span>
                    </div>
                  </div>
                </div>
            </div>
          </div>

        </div>


       <div class="row">

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


  <?php 
      if ($CLlamadasasesor == 0) {

        $CLlamadasasesor = 1;
      }
  ?>

  <script type="text/javascript"> 
  var inicial = <?php echo $CLlamadasasesor; ?> ;
      var opts = {
    lines: 12, // The number of lines to draw
    angle: 0, // The length of each line
    lineWidth: 0.4, // The line thickness
    pointer: {
        length: 0.75, // The radius of the inner circle
        strokeWidth: 0.042, // The rotation offset
        color: '#1D212A' // Fill color
    },
    limitMax: 'false', // If true, the pointer will not go past the end of the gauge
    colorStart: '#1ABC9C', // Colors
    colorStop: '#1ABC9C', // just experiment with them
    strokeColor: '#F0F3F3', // to see which ones work best for you
    generateGradient: true
};
var target = document.getElementById('foo'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = <?php echo $meta; ?>; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(inicial); // set actual value
gauge.setTextField(document.getElementById("gauge-text"));



  </script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <!--<!-- <script src="js/custom.js"></script> -->-->

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



  <!-- Canvas mensual -->
  <script>


    $(document).ready(function() {

      var data1 = [
 <?php 
  while ($r = $Rcanvas01->fetch_array()) {
      $Cyear = $r['year'];
      $Cmes = $r['mes'];
      $Cdia = $r['dia'];
      $Ccant = $r['cant'];
  echo "[gd($Cyear, $Cmes, $Cdia),$Ccant],";
  }
?>
      ];

      var data2 = [

  <?php 

//traer datos para canvas de grafica pedidos

      $canvas02 = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(id) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')  GROUP BY dia";
      $Rcanvas02 = $canvas02->query($sql01) or trigger_error($canvas02->error);
      $canvas02->close();

      while ($r = $Rcanvas02->fetch_array()) {
      $Cyear = $r['year'];
      $Cmes = $r['mes'];
      $Cdia = $r['dia'];
      $Ccant = $r['cant'];
  echo "[gd($Cyear, $Cmes, $Cdia),$Ccant],";
  }


//traer datos para canvas de grafica pedidos

 ?>

      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: true,
            fill: true
          },
          splines: {
            show: false,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
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
          tickSize: [1,'day'],
          //tickLength: 10,
          //axisLabel: "Date",
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
  <!-- Canvas mensual -->



  <!-- Canvas unual -->

          <script>


    $(document).ready(function() {

      var data01 = [
 <?php 
  while ($s = $Rcanvas01anual->fetch_array()) {
      $Cyearanual = $s['year'];
      $Cmesanual = $s['mes'];
      $Cdiaanual = $s['mes01'];
      $Ccantanual = $s['cant'];
  echo "[gd($Cyearanual, $Cmesanual, $Cdiaanual),$Ccantanual],";
  }
?>
      ];

      var data02 = [

  <?php 

//traer datos para canvas de grafica pedidos anual

      $canvas02anual = new Conexion;
      $sql02 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, MONTH(fecha) as mes01, COUNT(id) as cant FROM intranet_registro_pedido WHERE DATE_FORMAT(fecha,'%Y') = DATE_FORMAT(NOW(),'%Y')  GROUP BY mes01";
      $Rcanvas02anual = $canvas02anual->query($sql02) or trigger_error($canvas02anual->error);
      $canvas02anual->close();

      while ($t = $Rcanvas02anual->fetch_array()) {
      $Cyearanual = $t['year'];
      $Cmesanual = $t['mes'];
      $Cdiaanual = $t['mes01'];
      $Ccantanual = $t['cant'];
  echo "[gd($Cyearanual, $Cmesanual, $Cdiaanual),$Ccantanual],";
  }


//traer datos para canvas de grafica pedidos anual

 ?>

      ];
      $("#canvas_dahs02").length && $.plot($("#canvas_dahs02"), [
        data01, data02
      ], {
        series: {
          lines: {
            show: true,
            fill: true
          },
          splines: {
            show: false,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
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
          tickSize: [1,'month'],
          //tickLength: 10,
          //axisLabel: "Date",
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

  
 <!-- /footer content -->
</body>

</html>
