<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}

include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
 $user_id = $_SESSION["user_id"];
 include_once('php/consultas_css.php');

//traer tareas hechas
    $tarea = new Conexion;
    $sql03 = "SELECT * FROM intranet_actualizacion_clientes_comentarios WHERE tarea = 1 AND DATE_FORMAT(fecha,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') AND user_id = \"$user_id\"";
    $Rtareas = $tarea->query($sql03) or trigger_error($tarea->error);
    $Ntareas = $tarea->affected_rows;
    //echo $Ntareas;
    $numero_tares = 10;

      if ($Ntareas >= $numero_tares) {
        print "<script>alert('Las tareas ya han sido completadas hoy!');window.location='contacts.php';</script>";
      }
      if ($Ntareas == 0){
         $limit = $numero_tares;
      }else{
         $limit = $numero_tares - $Ntareas;
      }
      
//traer tareas hechas

//echo "</br>";
//echo $limit;

?>

<?php
//traer registro de cliente
  $rcliente = new Conexion;
  $sql03 = "SELECT *  FROM intranet_actualizacion_clientes WHERE activo = 'si' AND user_id = \"$user_id\" AND tarea IS NULL LIMIT $limit";
  $registro_cliente = $rcliente->query($sql03) or trigger_error($rcliente->error);
  $Nclientes = $rcliente->affected_rows;
  //echo $Nclientes;
  

$rcliente->close();

//traer registro de cliente
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

  <title>Tareas Satel Importadores</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

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
              <h3>Tareas del día</h3>
            </div>


          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Llamadas pendientes</h2>
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


              



                  <h2>Tareas programadas a: <?php echo $_SESSION["user_nombre"];?> </h2>
                  <!-- Tabs -->
                  <div id="wizard_verticle" class="form_wizard wizard_verticle">
                    <ul class="list-unstyled wizard_steps">
                        <?php 

                          
                          for ($x = 1; $x <= $limit; $x++) {
                              echo "<li><a href='#step-$x'><span class='step_no'>$x</span></a></li>";
                          } 
                          

                         ?>
                    </ul>
                      
                      <!-- array de divs -->


                          <?php 
                                      date_default_timezone_set('America/Bogota');
                                      $datetime =date('Y-m-d H:i:s');
                                      $y = 1;
                                      while ($r=$registro_cliente->fetch_array()) {
                                        
                                        

                                        //array divs
                                                    echo "<div id='step-$y' style='height: 560px;'>";
                                                    echo "<h2 class='StepTitle'>Paso $y</h2>";
                                                    echo "<form id='form$y' name='form$y' novalidate class='form-horizontal form-label-left' data-parsley-validate>";
                                                    echo "<div class='form-group'>";

                                                    echo "<label class='control-label col-md-2 col-xs-12' for='fecha' >Fecha ";
                                                    echo "</label>";
                                                    echo "<div class='col-md-4 col-xs-12'>";
                                                    echo "<input type='text' id='fecha' name='fecha' required='required' value='$datetime' readonly='readonly' class='form-control col-md-3 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";

                                                    echo "<label class='control-label col-md-2 col-xs-12' for='ip'>IP";
                                                    echo "</label>";
                                                    echo "<div class='col-md-4 col-xs-12'>";
                                                    echo "<input type='text' id='ip' required='required' value='$_SERVER[REMOTE_ADDR]' readonly='readonly' class='form-control col-md-3 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-cloud form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12' for='cardname'>Razón social / nombre";
                                                    echo "</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='text' id='name' value='$r[cardname]' readonly='readonly'class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'for='cardcode'>Código cliente";
                                                    echo "</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='text' id='cardcode' name='cardcode' value='$r[cardcode]' readonly='readonly'class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-shield form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label for='ciudad' class='control-label col-md-3 col-sm-3 col-xs-12'>Ciudad</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='text' id='ciudad' value='$r[ciudad_new]' readonly='readonly'class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-building form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12' for='telefono'>Teléfono";
                                                    echo "</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='number' id='telefono' value='$r[telefono]' readonly='readonly' required='required' placeholder='3603299' class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-phone form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12' for='movil_new'>Celular";
                                                    echo "</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='number' id='movil_new' value='$r[movil_new]'readonly='readonly'placeholder='3115921575'class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-mobile-phone form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12' for='email_new'>Correo / email";
                                                    echo "</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<input type='email' id='email_new' value='$r[email_new]'readonly='readonly' placeholder='ventas@satelimportadores.com' class='form-control col-md-7 col-xs-12 has-feedback-left'>";
                                                    echo "<span class='fa fa-envelope-o form-control-feedback left' aria-hidden='true'></span>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                    echo "<label for='comentarios' class='control-label col-md-3 col-sm-3 col-xs-12'>Comentarios</label>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                    echo "<textarea class='col-xs-12 comen$y' required='required' data-parsley-minlength='150' rows='3'id='comentarios' name='comentarios'></textarea>";
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='item form-group'>";
                                                      echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
                                                        echo "<div class='contador$y'></div>";
                                                      echo "</div>";
                                                    echo "</div>";

                                                    echo "<div class='ln_solid'></div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-xs-offset-3'>";
                                                    echo "<button id='boton$y' class='btn btn-success'>Actualizar</button>";
                                                    echo "<div class='esconder'><i class='fa fa-refresh fa-spin'></i> </div>";
                                                    echo "<span class='resultado$y'></span>";
                                                  
                                                    echo "</div>";
                                                    echo "</div>";

                                                    echo "</form>";
                                                    echo "</div>";

                                                    
                                                    $y++;

                                        //array divs

                                      }

                           ?>


                      <!-- array de divs -->





                  </div>

                  <!-- End SmartWizard Content -->
                    

                </div>

              </div>
            </div>

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
  <script src="js/satel_tareas.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

 <!-- <script src="js/custom.js"></script> -->
  <!-- form wizard -->
  <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

    <!-- form validation -->
  <script src="js/parsley/parsleysatel.js"></script>

</body>

</html>
