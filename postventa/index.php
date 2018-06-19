<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php
  include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 
  //consulta 01 total de llamadas mes actual
  $user_id = $_SESSION["user_id"];
  $tllamadas = new Conexion;
  $sql01 = "SELECT COUNT(user_id)as llamadas FROM intranet_post_venta WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') AND user_id = \"$user_id\"";
  $Rtllamadas = $tllamadas->query($sql01) or trigger_error($tllamadas->error);
  $r = $Rtllamadas->fetch_array();
  $Ctllamadas = $r['llamadas'];
  $tllamadas->close();

//consulta 01 total de llamadas mes actual

  //consulta 01 total de llamadas mes anteriror

  $tantllamadas = new Conexion;
  $sql01 = "SELECT COUNT(user_id)as llamadas FROM intranet_post_venta WHERE (month(fecha) = month((curdate() + interval -(1) month))) AND user_id = \"$user_id\"";
  $Rtantllamadas = $tantllamadas->query($sql01) or trigger_error($tantllamadas->error);
  $r = $Rtantllamadas->fetch_array();
  $Ctantllamadas = $r['llamadas'];
  $tantllamadas->close();



 if ($Ctantllamadas <= 0) {
    $Ctantllamadas = 1;
  } 

 $calculo01 = (($Ctllamadas / $Ctantllamadas)-1)*100;
 //consulta 01 total de llamadas mes anteriror 

    //traer post ventas pendientes
 
 $postpendiente = new Conexion;
 $sql01 = "SELECT COUNT(id) as postpen FROM intranet_registro_pedido WHERE entransito = '1' AND entregado = '1' AND recibido = '1' AND post_venta IS NULL ";
 $Rpostpendiente = $postpendiente->query($sql01) or trigger_error($postpendiente->error);
   $r = $Rpostpendiente->fetch_array();
  $Cpostpendiente = $r['postpen'];
 $postpendiente->close();
//traer post ventas pendientes
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

  <title>Formulario de post venta</title>

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
  <script src="js/nprogress.js"></script>

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
              <a href="index.php" class="site_title"><i class="fa fa-pie-chart"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
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

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                  
                    <li><a href="index.php">Resumen Post venta</a></li>
                    <li><a href="post_venta.php">Post venta</a></li>
                    <li><a href="pqrsf.php">PQRSF</a></li>


                  </ul>
                </li>





              </ul>
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
      <div class="row"><div class="col-md-12 col-md-offset-5 col-xs-offset-5"><h2>Post venta</h2></div></div> 
        <!-- top tiles -->
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
              <span class="count_top"><i class="fa fa-shopping-cart"></i> PostVenta pendientes</span>
              <a href="post_venta.php"><div class="count"><?php echo $Cpostpendiente; ?></div></a>
              
            </div>
          </div>

        </div>
        <!-- /top tiles -->
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

  <script src="js/custom.js"></script>

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
  
<?php 

//traer datos para canvas de grafica

      $canvas = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, DAY(fecha) as dia, COUNT(error) as cant FROM intranet_post_venta_rerrores WHERE DATE_FORMAT(fecha,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') GROUP BY dia";
      $Rcanvas = $canvas->query($sql01) or trigger_error($canvas->error);
      $canvas->close();  

//traer datos para canvas de grafica

 ?>


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
  
<?php 

//traer datos para canvas de grafica

      $canvasanual = new Conexion;
      $sql01 = "SELECT YEAR(fecha) as year, MONTH(fecha) as mes, MONTH(fecha) as mes01, COUNT(error) as cant FROM intranet_post_venta_rerrores WHERE DATE_FORMAT(fecha,'%Y') = DATE_FORMAT(NOW(),'%Y') GROUP BY mes";
      $Rcanvasanual = $canvasanual->query($sql01) or trigger_error($canvasanual->error);
      $canvasanual->close();  

//traer datos para canvas de grafica

 ?>


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
 

  










  
 
  <!-- /footer content -->
</body>

</html>


