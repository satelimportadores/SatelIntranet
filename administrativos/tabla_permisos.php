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
include('php/consultas_permisos_usuarios.php');
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
<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Detalle permisos empleados</h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">

           <!-- contenido del documento -->


              <!-- Tabla nueva --> 
                            <div class="col-md-12 col-sm-112 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permisos</h2>
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
                          <th>Nombre</th>
                          <th>Horas por pagar</th>
                          <th>Detalle</th>
                          <th>Reponer horas</th>
                          <th>Reponer</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 
                            //exec viene desde consultas_permisos_usuarios.php trae los usuarios que deben horas sin repetir
                            while ($reg = $exec->fetch_array()) {
                            $id = $reg['user_id'];
                            $query = "SELECT nombre,apellido FROM intranet_usuarios where id = $id";
                            $r = $usuarios->query($query) or trigger_error($usuarios->error);
                            $query2 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_rep))) AS hours FROM intranet_permisos_usuarios WHERE user_id = $id";
                            $h = $usuarios->query($query2) or trigger_error($usuarios->error);    
                            $horas = $h->fetch_array();
                            $nombre = $r->fetch_array();
                            $nombrec = $nombre[0]." ".$nombre[1];
                            ?>
                            <tr>

                                  <td><?php echo $nombrec; ?></td>

                                  <td id="<?php echo $id ?>"><?php echo $horas[0]; ?></td>

                                  <td><a target="_blank" href="detalle_permisos.php?cod=<?php echo $id; ?>">ver <i class="fa fa-search-plus green"></i></a></td>

                                  
                                  <!-- si las horas son iguales a 0 desactiva el boton de reponer -->
                                  <?php if ($horas[0]==0){ ?>
                                  <td>
                                  <input type="time" class="form-control" id="<?php echo $id; ?>" disabled>
                                  </td>

                                  <td>
                                    <button class="btn btn-success" onclick="myFunction(<?php echo $id; ?>);" disabled>Reponer</button>
                                  </td>
                                  
                                   

                                  <?php }else{ ?>

                                  <td><input type="time" class="form-control" id="<?php echo $id; ?>"></td>
                                  <!-- el boton de reponer envia por ajax el id las horas a reponer y las horas que estan en el input a el archivo permisos_usuarios.js-->
                                  <td><button  class="btn btn-success" onclick="myFunction(<?php echo $id; ?>);">Reponer</button></td>
                                  <?php } ?>
                              </tr>
                          <?php
                          }
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
