
<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include_once('php/class.conexion.php');
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

  <title>Formularios </title>

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
              <h3>Vendedor del mes</h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de vendedor del mes:</h2>
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

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" method="POST" action="php/e_vendedor_mes.php">

                    <div class="item form-group">
                      <label for="comercial" class="control-label col-md-3 col-sm-3 col-xs-12">Asesor comercial</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required="" id="comercial" tabindex="-1" name="comercial">
                          <option value="">Seleccione</option>

                     <?php 

                           //traer asesores   
                                $asesores = new Conexion;
                                $sql03 = "SELECT * FROM intranet_usuarios WHERE grupo_ventas_subgrupo = 'asesores' and activo =1";
                                $Rasesores = $asesores->query($sql03) or trigger_error($asesores->error);
                        //traer asesores 

                            while ($s = $Rasesores->fetch_array()) {
                                echo "<option value='$s[id]'>$s[nombre] $s[apellido]</option>";
                              }


                   ?>

                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-xs-12" for="fecha">Fecha 
                      </label>
                      <div class="col-md-6 col-xs-12">
                        <input type="text" id="fecha" name="fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("Y-m-d",strtotime("-1 month"));?>"  class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>



                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="vr">Ventas Reales
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="vr" name="vr" placeholder="123456789" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                     <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="vm">Meta de ventas
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="vm" name="vm" placeholder="123456789" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="gr">Ganancia bruta real
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="gr" name="gr" placeholder="123456789" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="gm">Meta de ganancia bruta
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="gm" name="gm" placeholder="123456789" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                    
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lr">Llamadas reales
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="lr" name="lr"  required="required" placeholder="9" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lm">Meta de llamadas
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="lm" name="lm"  required="required" placeholder="9" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ll_tarde">Llegadas tarde
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="ll_tarde" name="ll_tarde"  required="required" placeholder="9" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-taxi form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="a_injusti">Ausencias injustificadas
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="a_injusti" name="a_injusti"  required="required" placeholder="9" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-frown-o form-control-feedback left" aria-hidden="true"></span>
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
        placeholder: "Seleccione asesor comercial"
      });

      $('#comercial').change(function(){  
           var user_id = $(this).val();  
           $.ajax({ 
                url:"php/llamadas_asesores.php",  
                method:"POST",  
                data:{'comercial':user_id},  
                success:function(data){  
                     $('#lr').val(data);
                     $('#lr').attr('readonly', true);
                }  
           });  
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
