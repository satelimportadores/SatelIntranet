<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>


<?php
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 
// de este archivo dependen detalle_permisos.php, tabla_permisos.php, e_permisos_usuarios.php, consultas_usuarios.php  y permisos_usuarios.js
include('php/consultas_usuarios.php');
include('php/e_permisos_usuarios.php');
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

  <title>Permisos empleados Satel Importadores</title>

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
  <script type="text/javascript" src="js/permisos_usuarios.js"></script>


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
              <h3>
                    Permisos empleados
                    <small>
                        Satel Importadores
                    </small>
                </h3>
            </div>

          
          </div>
          <div class="clearfix"></div>


          <div class="row">

          
            <div class="clearfix"></div>
<!-- PEDIDOS -->
<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Permisos empleados</h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

<form method="POST" id="formulario" enctype="multipart/form-data" class="form-horizontal form-label-left">
        <div class="row">
                  <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="consecutivo">Consecutivo: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                          <input type="text" class="form-control" readonly value="<?php echo $codigo; ?>" name="consecutivo" />
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="fsol">Fecha de solicitud:</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                           <input id="fsol" class="form-control" name="fsol" type="date">
                        </div>

                </div>

                  <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="fsal">Fecha de salida: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                           <input id="fsal" class="form-control" name="fsal" type="date">
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="hsal">Hora de salida:</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                           <input id="hsal" class="form-control" name="hsal" type="time">
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="hlleg">Hora de llegada: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                           <input id="hlleg" class="form-control" name="hlleg" type="time">
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="sol">Solicitada por:</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                              <select name="sol" id="sol" class="form-control sol">
                                    <!-- $( "#sol" ).load( "php/consultas_usuarios.php?usuarios01" ); -->
                              </select>
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="auto">Autorizada por:</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                                  <select name="auto" id="auto" class="form-control auto">
                                        <!-- $( "#auto" ).load( "php/consultas_usuarios.php?usuarios02" ); -->
                                  </select>
                        </div>

                </div>

    <div class="form-group" id="loading">
              <div class="col-md-3 col-xs-6 control-label">
                   <i class="fa fa-spinner fa-spin fa-2x fa-fw blue"></i>
              </div>
    </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="cargo">Cargo</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                              <input type="text" id="cargo" name="cargo" readonly  required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                              <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                              
                        </div>

                </div>




        <!-- trae otras opciones mediante ajax al div de abajo desde permisos_usuarios.js --> 
          

                  <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="eps">EPS: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">

                              <input type="text" id="eps" name="eps" readonly  required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                              <span class="fa fa-life-buoy form-control-feedback left" aria-hidden="true"></span>
                        </div>

                </div>
        


        </div>


                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="arp">AFP: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                             <input type="text" id="afp" name="afp" readonly  required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                              <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
                        </div>

                </div>

                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="arp">ARL: </label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                             <input type="text" id="arl" name="arl" readonly required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                              <span class="fa fa-plus-circle form-control-feedback left" aria-hidden="true"></span>
                        </div>

                </div>


        <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="motivo">Motivo:</label>
                        </div>

                        <div class="col-md-4 col-xs-6">
                          <select name="motivo" id="motivo" class="form-control motivo">
                          <option value="">seleccione</option>
                              <option value="Personal">Personal</option>
                              <option value="Cita Medica">Cita Medica</option>
                              <option value="Otro">Otro</option>
                          </select>

                        </div>

                </div>

        <div id="tipo"></div>
        <div id="tipo2"></div>




                <div class="form-group">

                        <div class="col-md-3 col-xs-6 control-label">
                          <label for="area">Archivo adjunto</label>
                        </div>

                        <div class="col-md-5 col-xs-6">
                            <input type="file" name="file[]" id="file" class="form-control">
                        </div>

                </div>



        
        
        
                <div class="form-group">

                        <div class="col-md-5 col-xs-6 control-label">
                        <!-- envio de formulario por php a e_permisos_usuarios.php -->
                            <input type="submit" name="enviar" id="enviar" class="btn btn-success" value="Guardar">
                        </div>
                </div>


</form>



    


          </div>

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


      <!-- select2 -->
      <script src="js/select/select2.full.js"></script>
  <script>
    $(document).ready(function() {

      $(".select2_single").select2({
        placeholder: "Seleccione área de la empresa: "
      });
      $(".eps").select2({
        placeholder: "Seleccione la EPS: "
      });
      $(".arp").select2({
        placeholder: "Seleccione la ARP: "
      });
      $(".motivo").select2({
        placeholder: "Seleccione el motivo: "
      });
      $(".sol").select2({
        placeholder: "Solicitada por: "
      });
     $(".auto").select2({
        placeholder: "Autorizada por: "
      });

    });

  </script>


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
