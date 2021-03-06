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

  <title>Resumen de pedidos alistados Satel Importadores</title>

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
                    Resumen de pedidos alistados
                    <small>
                        Satel Importadores
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




 
<!-- Pedidos realizadas mes -->

<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Resumen de pedidos alistados del <strong class="green">mes</strong></h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php 

//traer pedidos del usuario
  $tareames = new Conexion;
  $sql01 = "select count(`intranet_registro_pedido`.`id`) AS `cantidad`,`intranet_registro_pedido`.`encargado_alistamiento` AS `encargado_alistamiento` from `intranet_registro_pedido` where ((`intranet_registro_pedido`.`encargado_alistamiento` <> '') and (date_format(`intranet_registro_pedido`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'))) group by `intranet_registro_pedido`.`encargado_alistamiento` order by count(`intranet_registro_pedido`.`id`) desc";
  $tareamess = $tareames->query($sql01) or trigger_error($tareames->error);
  $Ntareamess = $tareames->affected_rows;
  $tareames->close();
//traer pedidos del usuario

?>
                  <h2>Resumen de pedidos
                   </strong><small><?php echo $Ntareamess; ?>
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

                        <th class="column-title">Nombre</th>
                        <th class="column-title">Cantidad</th>

                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ntareamess >= '1') {
        //imprimir los registros
            $totalpedidos = 0;
            while ($t=$tareamess->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$t[encargado_alistamiento]</td>";
                echo "<td class=' '><strong class='red'> $t[cantidad]</strong></td>";
                echo "</tr>";
                $totalpedidos = $totalpedidos + $t['cantidad'];
                

            }


      //imprimir los registros
}



 ?>


                    </tbody>
                          <tr>
                              <td></td>
                              <td>Total de pedidos alistados:</td>
                              <td><strong class='green'><?php echo $totalpedidos  ?></strong></td>
                          </tr>


                  </table>



</div>


                </div>
              </div>
            </div>
<!-- Pedidos realizadas mes -->


<!-- Pedidos realizadas mes Anterior-->

<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-2"><h1>Resumen de pedidos alistados del <strong class="green">mes anterior</strong></h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php 

//traer pedidos del usuario
  $tareamesant = new Conexion;
  $sql01 = "select count(`intranet_registro_pedido`.`id`) AS `cantidad`,`intranet_registro_pedido`.`encargado_alistamiento` AS `encargado_alistamiento` from `intranet_registro_pedido` where ((`intranet_registro_pedido`.`encargado_alistamiento` <> '') AND YEAR(fecha) = YEAR(CURDATE()) and (month(fecha) = month((curdate() + interval -(1) month)))) group by `intranet_registro_pedido`.`encargado_alistamiento` order by count(`intranet_registro_pedido`.`id`) desc";
  $tareamessant = $tareamesant->query($sql01) or trigger_error($tareamesant->error);
  $Ntareamessant = $tareamesant->affected_rows;
  $tareamesant->close();
//traer pedidos del usuario

?>
                  <h2>Resumen de pedidos
                   </strong><small><?php echo $Ntareamessant; ?>
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
                        
                        <th class="column-title">Nombre</th>                       
                        <th class="column-title">Cantidad</th>
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ntareamessant >= '1') {
        //imprimir los registros
            $totalpedidosant = 0;
            while ($s=$tareamessant->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$s[encargado_alistamiento]</td>";
                echo "<td class=' '><strong class='red'> $s[cantidad]</strong></td>";
                $totalpedidosant = $totalpedidosant + $s['cantidad'];
                echo '</td>';
                echo "</tr>";
                

            }


      //imprimir los registros
}



 ?>


                    </tbody>
                                              <tr>
                              <td></td>
                              <td>Total de pedidos alistados:</td>
                              <td><strong class='green'><?php echo $totalpedidosant  ?></strong></td>
                          </tr>

                  </table>



</div>


                </div>
              </div>
            </div>
<!-- Pedidos realizadas mes Anterior-->


<!-- Pedidos realizadas año-->

<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-3"><h1>Resumen de pedidos alistados del <strong class="green">año</strong></h1></div></div></div> 
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php 

//traer pedidos del usuario
  $tareaano = new Conexion;
  $sql01 = "select count(`intranet_registro_pedido`.`id`) AS `cantidad`,`intranet_registro_pedido`.`encargado_alistamiento` AS `encargado_alistamiento` from `intranet_registro_pedido` where ((`intranet_registro_pedido`.`encargado_alistamiento` <> '')) AND intReportes <> 0 group by `intranet_registro_pedido`.`encargado_alistamiento` order by count(`intranet_registro_pedido`.`id`) desc";
  $tareamano = $tareaano->query($sql01) or trigger_error($tareaano->error);
  $Ntareamano = $tareaano->affected_rows;
  $tareaano->close();
//traer pedidos del usuario

?>
                  <h2>Resumen de pedidos
                   </strong><small><?php echo $Ntareamano; ?>
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

                        <th class="column-title">Nombre</th>
                        <th class="column-title">Cantidad</th>
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ntareamano >= '1') {
        //imprimir los registros
            $totalpedidosano = 0;
            while ($u=$tareamano->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$u[encargado_alistamiento]</td>";
                echo "<td class=' '><strong class='red'> $u[cantidad]</strong></td>";
                $totalpedidosano = $totalpedidosano + $u['cantidad'];
                echo "</tr>";
                

            }


      //imprimir los registros
}



 ?>


                    </tbody>
                          <tr>
                              <td></td>
                              <td>Total de pedidos alistados:</td>
                              <td><strong class='green'><?php echo $totalpedidosano  ?></strong></td>
                          </tr>


                  </table>



</div>


                </div>
              </div>
            </div>
<!-- Pedidos realizadas año-->


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
