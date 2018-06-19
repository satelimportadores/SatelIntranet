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

  <title>Post pendientes Satel Importadores</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

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
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                    Post Venta pendientes
                    <small>
                        Lista de post venta pendientes Satel Importadores
                    </small>
                </h3>
            </div>

        <form action="pedidos.php">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
          
            <input type="text" name="pedido" class="form-control" placeholder="Buscar pedido ...">
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

          
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Resumen de post venta pendientes</h1></div></div></div> 
<!-- PEDIDOS -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php 

//traer pedidos del usuario
  $postventa = new Conexion;
  $sql01 = "SELECT user_id,COUNT(id) as cant FROM intranet_registro_pedido WHERE entransito = '1' AND entregado = '1' AND recibido = '1' AND post_venta IS NULL GROUP BY user_id";
  $postventas = $postventa->query($sql01) or trigger_error($postventa->error);
  $Npostventas = $postventa->affected_rows;
  $postventa->close();
//traer pedidos del usuario

?>
                  <h2>Post venta pendiente
                   </strong><small><?php echo $Npostventas; ?>
                   </small></h2>
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

                  

<div class="table-responsive">
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">ID user</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Apellido</th>
                        <th class="column-title">Post venta pendiente</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Npostventas >= '1') {
        //imprimir los registros

            while ($r=$postventas->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[user_id]</td>";

//traer pedidos del usuario
  $usuario = new Conexion;
  $sql01 = "SELECT nombre,apellido FROM intranet_usuarios WHERE id = \"$r[user_id]\"";
  $usuarios = $usuario->query($sql01) or trigger_error($usuario->error);
  $usuario->close();
  $s=$usuarios->fetch_array();
//traer pedidos del usuario


                echo "<td class=' '>$s[nombre]</td>";
                echo "<td class=' '>$s[apellido]</td>";
                echo "<td class=' '>$r[cant]</td>";
                echo "</td>";
                echo "</tr>";
            }


      //imprimir los registros
}



 ?>


                    </tbody>

                  </table>



</div>


                </div>
              </div>
            </div>
<!-- PEDIDOS -->

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
