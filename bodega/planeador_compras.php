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
if (isset($_REQUEST['id'])) {

      $postcompras = $_REQUEST['id'];

      if (isset($_REQUEST['check01'])) {
    

    $updatepedido = new Conexion;
    $sql = ("UPDATE intranet_orden_compra SET entransito = 1 WHERE  id = $postcompras");
    $Rupdatepedido = $updatepedido->query($sql) or trigger_error($updatepedido->error);
    unset($_REQUEST['id']);
    unset($_REQUEST['check01']);
    unset($_REQUEST['check02']);
    unset($postcompras);
    unset($Rupdatepedido);
    $updatepedido->close();
    }

    //
      if (isset($_REQUEST['check02'])) {
    
    
    $updatepedido02 = new Conexion;
    $sql02 = ("UPDATE intranet_orden_compra SET entregado = 1 WHERE  id = $postcompras");
    $Rupdatepedido02 = $updatepedido02->query($sql02) or trigger_error($updatepedido02->error);
    unset($_REQUEST['id']);
    unset($_REQUEST['check01']);
    unset($_REQUEST['check02']);
    unset($postcompras);
    unset($Rupdatepedido02);
    $updatepedido02->close();
    
    
  }



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

  <title>Planeador de compras Satel Importadores</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
<link href="css/impresion.css" rel="stylesheet" type="text/css" media="print">

  <link href="css/custom.css" rel="stylesheet">
  



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
              <h3>
                    Compras
                    <small>
                        Planeador rutas compras
                    </small>
                </h3>
            </div>

<!-- buscar compras -->
        <form action="compras.php">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
          
            <input type="text" name="compra" class="form-control" placeholder="Buscar compra ...">
            <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Ir!</button>
                  </span>
            
          </div>
        </div>
      </div>
      </form>

<!-- buscar compras -->  
            
          </div>
          <div class="clearfix"></div>


          <div class="row">

          
            <div class="clearfix"></div>


<!-- GUIAS -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Nguias = '0';
   //traer pedidos del usuario
  $guia = new Conexion;
  $sql02 = "SELECT * FROM intranet_orden_compra WHERE zona <> '' AND ( entransito IS NULL OR entregado IS NULL ) ORDER BY fecha_entrega ASC";
  $guias = $guia->query($sql02) or trigger_error($guia->error);
  $Nguias = $guia->affected_rows;
  //echo $Nguias;
  //echo '</br>';
  $guia->close();
//traer pedidos del usuario

?>
                  <h2>Compras encontradas: <small><?php echo $Nguias; ?></small></h2>
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

                  <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

<div class="table-responsive">
                          <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Fecha entrega</th>
                        
                        <th class="column-title">Proveedor</th>
                        <th class="column-title">Tipo  de compra</th>
                        <th class="column-title">Orden compra</th>
                        <th class="column-title">Numero de pedido</th>
                        <th class="column-title">Zona</th>
                        <th class="column-title">En-transito</th>
                        <th class="column-title">Recibida</th>
                        <th class="column-title">Actualizar</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Nguias >= '1') {
        //imprimir los registros

            while ($r=$guias->fetch_array()) {
                $id = $r['id'];
                echo "<form action='planeador_compras.php' name='form$id' method='POST'>";
                echo "<input type='hidden'name='id' value='$id'>";
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[fecha_entrega]</td>";
                
                echo "<td class=' '>$r[cardname]</td>";
                echo "<td class=' '>$r[t_compra]</td>";
                echo "<td class=' '>$r[numero_orden_compra]</td>";
                echo "<td class=' '>$r[numero_pedido]</td>";
                echo "<td class=' '>$r[zona]</td>";

                    if ($r['entransito'] == '') {
                      echo "<td>";
                      echo "<input type='checkbox' id='check01' name='check01'>";
                      echo "</td>";
                    }else{
                      echo "<td>";
                      echo "<input type='checkbox' id='check01' checked='checked'>";
                      echo "</td>";
                    }

                    if ($r['entregado'] == '') {
                      echo "<td>";
                      echo "<input type='checkbox' name='check02' id='check02'>";
                      echo "</td>";
                    }else{
                      echo "<td>";
                      echo "<input type='checkbox' id='check02' checked='checked'>";
                      echo "</td>";
                    }

               
                
                echo "<td><button type='button' onclick='document.form$id.submit();' class='btn btn-round btn-success'><li class='fa fa-refresh'></li></button></td>";
                echo "</td>";
                echo "</tr>";
                echo "</form>";
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


<!-- GUIAS -->





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
