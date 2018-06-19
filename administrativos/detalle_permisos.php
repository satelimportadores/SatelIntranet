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
include('php/consultas_permisos_usuarios.php');
include("php/suma_horas_permisos_usuarios.php"); 
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

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  
  <script src="js/jquery.min.js"></script>
 <script src="js/menu.js"></script>
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
<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Amortización permisos empleados</h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

           <!-- contenido del documento -->

                    <!-- crea una tabla de amortizacion para el descuento de horas -->

                          <!-- tabla nueva -->
                                      <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><td colspan="6"><div align="center"><?php echo $nom['nombre']." ".$nom['apellido']; ?></div></td></h2>
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

                    <table class="table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Adjunto</th>
                            <th>Saldo inicial</th>
                            <th>Horas por pagar</th>
                            <th>Horas pagadas</th>
                            <th>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 
                            //la variable x me permite alternar entre cuando se deben quitar horas al saldo final y cuando no.
                            $x=0;
                            $inicial = '00:00';
                            $final = '00:00';
                            do{

                              if ($x==0) {
                                $query = "SELECT fecha_solicitud,historico,adjunto FROM intranet_permisos_usuarios where user_id = $id";
                              }else{
                                $query = "SELECT fecha_hpag,horas_pagadas FROM intranet_permisos_horas where user_id = $id";
                              }
                            $usuarios = new conexion;
                            $result = $usuarios->query($query) or trigger_error($usuarios->error);
                            $usuarios->close();
                            while ($row = $result->fetch_array()) {
                            //si x es igual a 0 el saldo final es igual a la suma de las horas pero si no, en vez de sumar resta.
                            if ($x==0) {  
                            $final = suma_horas($row['historico'],$inicial); 
                            ?>
                            <tr>

                              <td><?php echo $row['fecha_solicitud'] ?></td>
                              <td><a target="_blank" href="archivos/permisos/<?php echo $row['adjunto']; ?>">Descargar <i class="fa fa-search-plus green"></a></td>
                              <td><?php echo $inicial; ?></td>  
                              <td><?php echo $row['historico']; ?></td>
                              <td></td>
                              <td><?php echo $final; ?></td>
                            </tr>
                            <?php
                            }else{
                              $final = resta($row['horas_pagadas'],$inicial);
                            ?>
                              <tr>
                              <td><?php echo $row['fecha_hpag'] ?></td>
                              <td></td>
                              <td><?php echo $inicial; ?></td>  
                              <td></td>
                              <td><?php echo $row['horas_pagadas']; ?></td>
                              <td><?php echo $final; ?></td>
                            </tr>
                            <?php 
                              }
                            $inicial = $final;
                            }
                            $x++;
                            }while ($x<=1)
                         ?>

                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

            <!-- contenido del documento -->

    


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
