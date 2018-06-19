<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php
  include_once('php/class.conexion.php');
  include_once('php/consultas_index03.php');
 
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
      <!-- <div class="row"><div class="col-md-12 col-md-offset-5 col-xs-offset-5"><h2>Pedidos</h2></div></div> -->
        <!-- top tiles -->

        <!-- /top tiles -->


      <!-- <div class="row"><div class="col-md-12 col-md-offset-5 col-xs-offset-5"><h2>Compras</h2></div></div> -->

         <!-- Compras -->

        <!-- /Compras -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3><small></small> Post venta</h3>
                </div>
                <div class="col-md-6">
                  <div  class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    
                    <strong><?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?></strong>
                  </div>
                </div>
              </div>


              <!-- Grafica Mensual -->
              <div class="row">
              <div class="row x_title">
              <h3>
              <div id="impmes" class="col-md-12 col-md-offset-4 col-xs-12 col-xs-offset-2">Postventa del mes</div>
              </h3>
              </div>
              </div>
                <div>

                                <div class="">
                                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                                  <div style="width: 100%;">
                                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                                  </div>
                                </div>
                </div>
              <!-- Grafica Mensual -->                    

                  
              <!-- Grafica anual -->
              <br>

                            <div class="row">
              <div class="row x_title"><h3><div id="impmes" class="col-md-12 col-md-offset-4 col-xs-12 col-xs-offset-1"><strong>Gráfica Anual </strong>Post venta <i class="fa fa-comments green"></i> 
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

<!-- Alistamiento -->



          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Post venta mensual</h2>
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
                                  $Ccolor = $r['color'];
                                  if ($Ctotalalis == 0) {
                                      $Ctotalalis = 1;
                                  }
                                  $Cporcentajealis = ($Ccantalis / $Ctotalalis) * 100;
                                  $Cporcentajealis = round($Cporcentajealis,1);


                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolor'></i>$Cnombrealis</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajealis %</td>";
                              echo "</tr>"; 

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





          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Post venta anual</h2>
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
                                  $Ccolorreviso = $r['color'];
                                  if ($Ctotalreviso == 0) {
                                    $Ctotalreviso = 1;
                                  }
                                  $Cporcentajereviso = ($Ccantreviso / $Ctotalreviso) * 100;
                                  $Cporcentajereviso = round($Cporcentajereviso,1);


                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolorreviso'></i>$Cnombrereviso</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajereviso %</td>";
                              echo "</tr>"; 
        
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


<!-- Calificacion mensual -->





          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Calificación mensual</h2>
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
                      <canvas id="canvas3" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">


                      

                                   <?php 

                            while ($r = $Rcalificacionmensual->fetch_array()) {

                                  $Cnombrereviso = $r['nombre'];
                                  $Ccantreviso = $r['cant'];
                                  $Ctotalreviso = $r['total'];
                                  $Ccolorreviso = $r['color'];
                                  if ($Ctotalreviso == 0) {
                                    $Ctotalreviso = 1;
                                  }
                                  $Cporcentajereviso = ($Ccantreviso / $Ctotalreviso) * 100;
                                  $Cporcentajereviso = round($Cporcentajereviso,1);


                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolorreviso'></i>$Cnombrereviso</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajereviso %</td>";
                              echo "</tr>"; 
        
                            }



                           ?>



                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
<!-- Calificacion mensual -->

<!-- Calificacion anual -->





          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Calificación anual</h2>
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
                      <canvas id="canvas4" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">


                      

                                   <?php 

                            while ($r = $Rcalificacionmensual->fetch_array()) {

                                  $Cnombrereviso = $r['nombre'];
                                  $Ccantreviso = $r['cant'];
                                  $Ctotalreviso = $r['total'];
                                  $Ccolorreviso = $r['color'];
                                  if ($Ctotalreviso == 0) {
                                    $Ctotalreviso = 1;
                                  }
                                  $Cporcentajereviso = ($Ccantreviso / $Ctotalreviso) * 100;
                                  $Cporcentajereviso = round($Cporcentajereviso,1);


                              echo "<tr>";
                              echo "<td>";
                              echo "<p><i class='fa fa-square $Ccolorreviso'></i>$Cnombrereviso</p>";
                              echo "</td>";
                              echo "<td>$Cporcentajereviso %</td>";
                              echo "</tr>"; 
        
                            }



                           ?>



                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
<!-- Calificacion anual -->



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
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
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
        moment.locale('es');
        var mesactual = moment().format('MMMM');
        $('#impmes').html('Postventa de:'+ mesactual + ' <i class="fa fa-phone green"></i>');

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

  <!-- Canvas mensual -->



  <!-- Canvas anual -->
  <script>
  



    $(document).ready(function() {
        moment.locale('es');
        var mesactual = moment().format('MMMM');
        $('#impmes').html('Post venta: '+ mesactual+' <i class="fa fa-comments green"></i> ');

      var data01 = [

 <?php 
  while ($s = $Rcanvasanual->fetch_array()) {
      $Cyearanual = $s['year'];
      $Cmesanual = $s['mes'];
      $Cdiaanual = $s['mes01'];
      $Ccantanual = $s['cant'];
  echo "[gd($Cyearanual, $Cmesanual, $Cdiaanual),$Ccantanual],";
  }
?>
      ];

      $("#canvas_dahs02").length && $.plot($("#canvas_dahs02"), [
        data01
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
          tickSize: [1, "month"],
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

  <!-- Canvas anual -->



  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
 

  <!-- dashbord linegraph ALISTAMIENTO -->




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
             $sql01 = "select count(`ipv01`.`error`) AS `cant`,(select count(`ipv03`.`error`) from `intranet_post_venta_rerrores` `ipv03` where (date_format(`ipv03`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'))) AS `total` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `ipv01`.`error`";
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
 $sql01 = "select (select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `color` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `ipv01`.`error`";
 $Ralistograpcolor = $alistograpcolor->query($sql01) or trigger_error($alistograpcolor->error);
 $alistograpcolor->close();
  
//traer color encargados de alistamiento GRAP:
 while ($r = $Ralistograpcolor->fetch_array()) {

        $Ccolor = $r['color'];
        echo "'$Ccolor',";
 }
 ?>
        ],
        hoverBackgroundColor: [
//traer color hex
            <?php 

                //traer color encargados de alistamiento GRAP:
                $colorhex = new Conexion;
                $sql01 = "select (select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `hexcolor` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `ipv01`.`error`";
                $Rcolorhex = $colorhex->query($sql01) or trigger_error($colorhex->error);
                $colorhex->close();

                      //traer color encargados de alistamiento GRAP:
                      while ($r = $Rcolorhex->fetch_array()) {

                      $Ccolor = $r['hexcolor'];
                      echo "'$Ccolor',";
                      }
            ?>

//traer color hex
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

  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
                <?php 

            //traer encargados de revision GRAP:
              $revisograplabels = new Conexion;
             $sql01 = "select (select `ipv02`.`error` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `nombre` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `ipv01`.`error`";
             $Rrevisograplabels = $revisograplabels->query($sql01) or trigger_error($revisograplabels->error);
             $revisograplabels->close();
              
            //traer encargados de revision GRAP:

             ?>
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
             $sql01 = "select count(`ipv01`.`error`) AS `cant`,(select count(`ipv03`.`error`) from `intranet_post_venta_rerrores` `ipv03` where (date_format(`ipv03`.`fecha`,'%Y') = date_format(now(),'%Y'))) AS `total` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `ipv01`.`error`";
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
 $sql01 = "select (select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `color` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `ipv01`.`error`";
 $Rrevisograpcolor = $revisograpcolor->query($sql01) or trigger_error($revisograpcolor->error);
 $revisograpcolor->close();
  
//traer color encargados de revision GRAP:
 while ($r = $Rrevisograpcolor->fetch_array()) {
        $Ccolor = $r['color'];
        echo "'$Ccolor',";

 }
 ?>

        ],
        hoverBackgroundColor: [
//traer color hex
            <?php 

                //traer color encargados de alistamiento GRAP:
                $colorhex01 = new Conexion;
                $sql01 = "select (select `ipv02`.`hexcolor` from `intranet_post_venta_error` `ipv02` where (`ipv02`.`id` = `ipv01`.`error`)) AS `hexcolor` from `intranet_post_venta_rerrores` `ipv01` where (date_format(`ipv01`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `ipv01`.`error`";
                $Rcolorhex01 = $colorhex01->query($sql01) or trigger_error($colorhex01->error);
                $colorhex01->close();

                      //traer color encargados de alistamiento GRAP:
                      while ($r = $Rcolorhex01->fetch_array()) {

                      $Ccolor = $r['hexcolor'];
                      echo "'$Ccolor',";
                      }
            ?>

//traer color hex
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



  <!-- dashbord linegraph Calificacion mensual -->

  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
                <?php 

            //traer encargados de revision GRAP:
              $revisograplabels = new Conexion;
             $sql01 = "select `intranet_post_venta`.`calificacion` AS `nombre` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `intranet_post_venta`.`calificacion`";
             $Rrevisograplabels = $revisograplabels->query($sql01) or trigger_error($revisograplabels->error);
             $revisograplabels->close();
              
            //traer encargados de revision GRAP:

             ?>
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
             $sql01 = "select count(`intranet_post_venta`.`calificacion`) AS `cant`,(select count(`intranet_post_venta`.`calificacion`) from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'))) AS `total` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `intranet_post_venta`.`calificacion`";
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
 $sql01 = "select (case `intranet_post_venta`.`calificacion` when 1 then '#E74C3C' when 2 then '#ffa500' when 3 then '#8a2be2' when 4 then '#3498DB' when 5 then '#1ABB9C' end) AS `color` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `intranet_post_venta`.`calificacion`";
 $Rrevisograpcolor = $revisograpcolor->query($sql01) or trigger_error($revisograpcolor->error);
 $revisograpcolor->close();
  
//traer color encargados de revision GRAP:
 while ($r = $Rrevisograpcolor->fetch_array()) {
        $Ccolor = $r['color'];
        echo "'$Ccolor',";

 }
 ?>

        ],
        hoverBackgroundColor: [
//traer color hex
            <?php 

                //traer color encargados de alistamiento GRAP:
                $colorhex01 = new Conexion;
                $sql01 = "select (case `intranet_post_venta`.`calificacion` when 1 then '#E74C3C' when 2 then '#ffa500' when 3 then '#8a2be2' when 4 then '#3498DB' when 5 then '#1ABB9C' end) AS `hexcolor` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m')) group by `intranet_post_venta`.`calificacion`";
                $Rcolorhex01 = $colorhex01->query($sql01) or trigger_error($colorhex01->error);
                $colorhex01->close();

                      //traer color encargados de alistamiento GRAP:
                      while ($r = $Rcolorhex01->fetch_array()) {

                      $Ccolor = $r['hexcolor'];
                      echo "'$Ccolor',";
                      }
            ?>

//traer color hex
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas3"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph Calificacion mensual -->


    <!-- dashbord linegraph Calificacion anual -->

  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
                <?php 

            //traer encargados de revision GRAP:
              $revisograplabels = new Conexion;
             $sql01 = "select `intranet_post_venta`.`calificacion` AS `nombre` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `intranet_post_venta`.`calificacion`";
             $Rrevisograplabels = $revisograplabels->query($sql01) or trigger_error($revisograplabels->error);
             $revisograplabels->close();
              
            //traer encargados de revision GRAP:

             ?>
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
             $sql01 = "select count(`intranet_post_venta`.`calificacion`) AS `cant`,(select count(`intranet_post_venta`.`calificacion`) from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y'))) AS `total` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `intranet_post_venta`.`calificacion`";
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
 $sql01 = "select (case `intranet_post_venta`.`calificacion` when 1 then '#E74C3C' when 2 then '#ffa500' when 3 then '#8a2be2' when 4 then '#3498DB' when 5 then '#1ABB9C' end) AS `color` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `intranet_post_venta`.`calificacion`";
 $Rrevisograpcolor = $revisograpcolor->query($sql01) or trigger_error($revisograpcolor->error);
 $revisograpcolor->close();
  
//traer color encargados de revision GRAP:
 while ($r = $Rrevisograpcolor->fetch_array()) {
        $Ccolor = $r['color'];
        echo "'$Ccolor',";

 }
 ?>

        ],
        hoverBackgroundColor: [
//traer color hex
            <?php 

                //traer color encargados de alistamiento GRAP:
                $colorhex01 = new Conexion;
                $sql01 = "select (case `intranet_post_venta`.`calificacion` when 1 then '#E74C3C' when 2 then '#ffa500' when 3 then '#8a2be2' when 4 then '#3498DB' when 5 then '#1ABB9C' end) AS `hexcolor` from `intranet_post_venta` where (date_format(`intranet_post_venta`.`fecha`,'%Y') = date_format(now(),'%Y')) group by `intranet_post_venta`.`calificacion`";
                $Rcolorhex01 = $colorhex01->query($sql01) or trigger_error($colorhex01->error);
                $colorhex01->close();

                      //traer color encargados de alistamiento GRAP:
                      while ($r = $Rcolorhex01->fetch_array()) {

                      $Ccolor = $r['hexcolor'];
                      echo "'$Ccolor',";
                      }
            ?>

//traer color hex
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas4"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph Calificacion anual -->
 
  <!-- /footer content -->
</body>

</html>


