
<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include_once('php/class.conexion.php');
include('php/e_impuestos_tareas_insertar.php');
$con = new conexion;
$x=0;
$query = "SELECT * from intranet_impuestos";
$result = $con->query($query) or trigger_error($con->error);


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

  <title>Indicador de rendimiento contabilidad</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>
 <script src="js/menu.js"></script>
 <script type="text/javascript" src="js/registro_cheques.js"></script>
 <link rel="stylesheet" href="css/registro_cheques.css">


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

                <div id="menu">
                  <!-- Se carga por menu.js y menu.php -->
                </div>


          </div>
        <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
           

            <a data-toggle="tooltip" data-placement="top" title="Salir" href="php/logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="WhatsApp Web" target="_blank" href="https://web.whatsapp.com/">
              <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
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
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Contabilidad</h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Cheques:</h2>
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
                
                <!-- contenido -->


              <form method="POST" enctype="multipart/form-data">
  <fieldset id="info">
  <legend>Informacion del cheque</legend>
    <label>Banco Emisor </label>
    <select name="bancos" id="bancos">
    </select><br>
    <label>Numero de Cheque </label>
    <input type="text" id="num_cheq" name="num_cheq"><br>
    <label>Beneficiario </label>
    <input type="text" id="benef" name="benef"><br>
    <label>Monto </label>
    <input type="number" id="monto" name="monto"><br>
    <label>Fecha Cheque </label>
    <input type="date" id="fecha_cheq" name="fecha_cheq"><br>
    <label>Fecha Consignacion</label>
    <input type="text" id="fecha_con" name="fecha_con" disabled><br>
    <label>Endoso </label>
    <input type="text" id="endoso" name="endoso" ><br>
    <input type="file" id="file" name="file[]" ><br>
    <br>  
    <input type="button" id="btn-1" value='Siguiente'>

  </fieldset>
  <fieldset id="calcu">
  <legend>Calculadora de cambio</legend>
    <label>Tasa de Interes </label>
    <select name="interes" id="interes">
    </select><br>
    <label>Numero de Dias </label>
    <input type="text" id="num_dias" name="num_dias" readonly><br>
    <label>Cuota Diaria </label>
    <input type="number" id="cuota_dia" name="cuota_dia" readonly><br>
    <label>Valor Interes </label>
    <input type="number" id="val_int" name="val_int" readonly><br>
    <label>Valor del Cheque a Girar </label>
    <input type="number" id="val_cheq" name="val_cheq" readonly><br>
    <label>Responsable </label>
    <input type="text" id="resp" name="resp"><br>
    <br>  
    <input type="button" id="btn-2" value='Anterior'> 
    <input type="button" id="btn-3" value='Siguiente'>
  </fieldset>
  <fieldset id="cheques">
  <legend>Simulador</legend>
    <div id="cheq_ingres" class="row center-block">
    <table   class="tabla col-md-5 col-xs-8 ">
      <tr>
        <td width="150" rowspan="2"><b><h4><div id="bank">Bancamia</div></h4></b></td>
        <td><b>Fecha:</b></td>
        <td><div id="fecha"></div></td>
        <td><b># Cheque:</b></td>
        <td><div id="cheq"></div></td>
      </tr>
      <tr>
        <td><b>COP</b></td>
        <td colspan="3"><div class="moneda"><i class="material-icons">attach_money</i>
        <div class='m' id="m"></div></div></td>
      </tr>
      <tr>
        <td class="izq"><b>Páguese A</b></td>
        <td class="izq" colspan="4"><div class="border" id="persona"></div></td>
      </tr>
      <tr>
        <td class="izq"><b>Valor en letras</b></td>
        <td class="izq" colspan="4"><div class="border" id="letras"></div></td>
      </tr>
      <tr>
        <td class="izq"><b>Firma</b></td>
        <td class="izq" colspan="4"><div class="border"></div></td>
      </tr>
    </table>
    </div>
    <br>
    <div id="cheq_egres" class="row center-block">
    <table   class="tabla2 col-md-5 col-xs-8">
      <tr>
        <td width="150" rowspan="2"><b><h4><div id="bank2">Bancamia</div></h4></b></td>
        <td><b>Fecha:</b></td>
        <td><div id="fecha2"></div></td>
        <td><b># Cheque:</b></td>
        <td><div>Chequera</div></td>
      </tr>
      <tr>
        <td><b>COP</b></td>
        <td colspan="3"><div class="moneda2"><i2 class="material-icons">attach_money</i2>
        <div class='m' id="m2"></div></div></td>
      </tr>
      <tr>
        <td class="izq"><b>Páguese A</b></td>
        <td class="izq" colspan="4"><div class="border2">Beneficiario...</div></td>
      </tr>
      <tr>
        <td class="izq"><b>Valor en letras</b></td>
        <td class="izq" colspan="4"><div class="border2" id="letras2"></div></td>
      </tr>
      <tr>
        <td class="izq"><b>Firma</b></td>
        <td class="izq" colspan="4"><div class="border2"></div></td>
      </tr>
    </table>
    </div>
  <br>
    <input type="button" id="btn-4" value='Anterior'>
    <input type="submit" id="envio" name="envio" value='Enviar'>
  </fieldset>
  </form>


      

                <!-- contenido -->

              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Satel Importadores de Ferretería SAS
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

        <script src="js/select/select2.full.js"></script>

    <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Seleccione asesor comercial"
      });

      
    });
  </script>

    <!-- form validation -->
 <script src="js/parsley/parsleysatel.js"></script>

  <!-- /select2 -->

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <!-- <script src="js/custom.js"></script>-->

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>



</body>

</html>
