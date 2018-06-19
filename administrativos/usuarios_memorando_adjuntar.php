<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
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

  <title>Formulario de memorandos </title>

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
 <script src="js/usuarios_memorando_adjuntar.js"></script>
 


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
            <a href="index.php" class="site_title"><i class="fa fa-line-chart"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
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
              <h3>Memorandos</h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de adjuntar memorando a trabajadores  </h2>
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
                <!-- formulario de actualizacion de clientes -->

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="php/e_usuario_memorando.php">

                    <div class="item form-group">
                      <label for="empleados" class="control-label col-md-3 col-sm-3 col-xs-12">Empleado</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="empleados form-control" required="" id="empleados" tabindex="-1" name="empleados">
                          

                                <!-- LLega los empleados por ajax consulta_usuarios_bodega-->

                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-xs-12" for="fecha">Fecha
                      </label>

                      <div class="col-md-6 col-xs-12">

                        <input type="text" id="fecha" name="fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("m/d/Y");?>" class="date-picker form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                        <label for="tipo_documento" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de documento</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="documentos form-control" required="required" id="tipo_documento" tabindex="-1" name="tipo_documento">
                                <option value="">Seleccione</option>
                                <option value="memorando">Memorando</option>
                                <option value="renuncia">Renuncia</option>
                                <option value="comunicado">Comunicado</option>
                                <option value="otro">Otro</option>
                            </select>
                          </div>
                        </div>

                    <div class="item form-group" id="tipo_documeto_oculto">
                      <label for="tipo_documento02" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de documento</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tipo_documento02" class="form-control" name="tipo_documento02">
                      </div>
                    </div>



                   <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="nombre_adjunto">Archivos adjuntos:</label>
                          <input placeholder="selecciona tu archivo" name="nadjunto" id="nadjunto" type="file" required="required"  accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-xs-offset-3">
                       
                        <button type="submit" class="btn btn-success">Guardar</button>
                      </div>
                    </div>
                    <div class="ln_solid"></div>

                            
           </form>
                        

                <!-- formulario de actualizacion de clientes -->

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

  <!-- <script src="js/custom.js"></script> -->

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script src="js/moment/moment.min.js"></script>
  <script src="js/datepicker/daterangepicker.js"></script>



</body>

</html>
