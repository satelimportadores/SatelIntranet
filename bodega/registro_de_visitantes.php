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

  <title>Registro de visitantes</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
<link href="css/impresion.css" rel="stylesheet" type="text/css" media="print">


  <script src="js/jquery.min.js"></script>
 <script src="js/menu.js"></script>

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
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Registro de visitantes</h3>
            </div>

              <form action="buscar.php">
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                
                  <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Ir!</button>
                        </span>
                  
                </div>
              </div>
            </div>
            </form>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de registro de visitantes:</h2>
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

                  <form id="demo-form2" data-parsley-validate novalidate enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="php/e_registro_de_visitantes.php">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha">Fecha 
                      </label>
                      <div class="col-md-4 col-xs-12">
                        <input type="text" id="fecha" name="fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <label class="control-label col-md-1 col-xs-12" for="ip">IP
                      </label>
                      <div class="col-md-4 col-xs-12">
                        <input type="text" id="ip" name="ip" required="required" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-cloud form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-2"></div>

                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre" name="nombre" data-parsley-minlength="4" placeholder="Pepito" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="apellido" name="apellido" data-parsley-minlength="4" placeholder="Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                     <div class="item form-group">
                      <label for="tipo_documento" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de documento</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required="" tabindex="-1" name="tipo_documento">
                          <option value="">Seleccione</option>
                                <option value="Cedula de ciudadanía">Cédula de ciudadanía</option>
                                <option value="Cedula de extranjería">Cédula de extranjería</option>
                                <option value="Licencia de conducción">Licencia de conducción</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="NIT">NIT</option>
                                <option value="Otro documento">Otro documento</option>

                        </select>
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_documento">Número de Documento
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="numero_documento" name="numero_documento"  required="required" placeholder="860528792" data-parsley-minlength="5" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="empresa" name="empresa" placeholder="Satel Importadores" data-parsley-minlength="5" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono" name="telefono"  required="required" placeholder="3603299" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email_new" name="email_new" placeholder="ventas@satelimportadores.com" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="file">Archivos adjuntos:</label>
                          <input placeholder="selecciona tu archivo" name="file[]" id="file" type="file" required='required' multiple accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" id="textarea" name="comentarios"></textarea>
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
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Seleccione tipo de documento de identidad"
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

 <!-- <script src="js/custom.js"></script> -->

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>



</body>

</html>