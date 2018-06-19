<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>


<?php
  include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
   include_once('php/consultas_css.php');
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

  <title>Pedidos Satel Importadores</title>

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
              <h3>
                    Pedidos
                    <small>
                        Lista de pedidos Satel Importadores
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

            <div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-4"><h1>Resumen de pedidos</h1></div></div></div> 
<!-- PEDIDOS -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php 
$Npedidos = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_pedido = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $pedido = new Conexion;
  $sql01 = "SELECT fecha,cliente,numero_pedido,encargado_alistamiento,encargado_revision,observaciones,user_id FROM intranet_registro_pedido WHERE numero_pedido = \"$buscar_pedido\"";
  $Pedidos = $pedido->query($sql01) or trigger_error($pedido->error);
  $Npedidos = $pedido->affected_rows;
  $pedido->close();
//traer pedidos del usuario
}
?>
                  <h2>Pedidos encontrados
                  <?php 
                      if (isset($buscar_pedido)) {
                        echo ' de: ';
                      }
                   ?>
                   
                   <strong><?php
                   if (isset($buscar_pedido)) {
                     echo $buscar_pedido;
                   }
                     
                    ?>
                   </strong><small><?php echo $Npedidos; ?>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Cliente</th>
                        <th class="column-title">Alistamiento</th>
                        <th class="column-title">Revisión</th>
                        <th class="column-title">Observaciones</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Npedidos >= '1') {
        //imprimir los registros

            while ($r=$Pedidos->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[cliente]</td>";
               
                echo "<td class=' '>$r[encargado_alistamiento]</td>";
                echo "<td class=' '>$r[encargado_revision]</td>";
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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



<!-- GUIAS -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Nguias = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_guia = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $guia = new Conexion;
  $sql02 = "Select fecha, cliente, numero_pedido, encargado_despacho, numero_guia, transportadora,foto_guia, observaciones from intranet_registro_guias where numero_pedido = \"$buscar_guia\"";
  $guias = $guia->query($sql02) or trigger_error($guia->error);
  $Nguias = $guia->affected_rows;
  $guia->close();
//traer pedidos del usuario
}
?>
                  <h2>Guias encontradas: <small><?php echo $Nguias; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Cliente</th>
                        
                        <th class="column-title">Despacho</th>
                        <th class="column-title"># Guia</th>
                        <th class="column-title">Transportadora</th>
                        <th class="column-title">Foto</th>
                        <th class="column-title">Observaciones</th>
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
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[cliente]</td>";
                
                echo "<td class=' '>$r[encargado_despacho]</td>";
                echo "<td class=' '>$r[numero_guia]</td>";
                echo "<td class=' '>$r[transportadora]</td>";
                //echo "<td class=' '>$r[foto_guia]</td>";
                echo "<td><a target='_blank' href='../bodega/uploads/$r[foto_guia]'><i class='fa fa-eye'></i></a></td>";
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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


<!-- GUIAS -->

<!-- Rutas -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Nrutas = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_rutas = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $ruta = new Conexion;
  $sql03 = "Select id,fecha, cliente, numero_pedido, entransito, entregado, zona from intranet_registro_pedido where numero_pedido = \"$buscar_rutas\" and zona <> 'TRANSPORTADORA'";
  $rutas = $ruta->query($sql03) or trigger_error($ruta->error);
  $Nrutas = $ruta->affected_rows;
  $ruta->close();
//traer pedidos del usuario
}
?>
                  <h2>Rutas encontradas: <small><?php echo $Nrutas; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Cliente</th>
                        
                        <th class="column-title">En Transito  </th>
                        <th class="column-title">Entregado</th>
                        <th class="column-title">Zona</th>
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Nrutas >= '1') {
        //imprimir los registros

            while ($r=$rutas->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[cliente]</td>";

                if ($r['entransito'] == '1') {
                  echo "<td class=' '><input type='checkbox' class='flat' checked='checked' style='position: absolute; opacity: 0;''></td>";
                  
                }
                if ($r['entregado'] == '1') {
                  echo "<td class=' '><input type='checkbox' class='flat' checked='checked' style='position: absolute; opacity: 0;''></td>";
                }
               
                echo "<td class='a-right a-right '>$r[zona]</td>";
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


<!-- Rutas -->

<!-- Recibidos -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Nrecibidos = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_recibidos = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $recibido = new Conexion;
  $sql04 = "SELECT fecha, cliente, numero_pedido, encargado_transporte, fotos, observaciones FROM intranet_registro_recibidos WHERE numero_pedido = \"$buscar_recibidos\"";
  $recibidos = $recibido->query($sql04) or trigger_error($recibido->error);
  $Nrecibidos = $recibido->affected_rows;
  $recibido->close();
//traer pedidos del usuario
}
?>
                  <h2>Recibidos encontrados: <small><?php echo $Nrecibidos; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Cliente</th>
                        
                        <th class="column-title">Encargado transporte</th>
                        <th class="column-title">Foto</th>
                        <th class="column-title">Observaciones</th>
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Nrutas >= '1') {
        //imprimir los registros

            while ($r=$recibidos->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[cliente]</td>";
                
                echo "<td class=' '>$r[encargado_transporte]</td>";
                echo "<td><a target='_blank' href='../bodega/uploads/$r[fotos]'><i class='fa fa-eye'></i></a></td>";
                
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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


<!-- Recibidos -->       



<!-- Resumen de compras -->    
<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-4"><h1>Resumen de compras</h1></div></div></div> 


<!-- PEDIDOS -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Ncompras = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_compra = $_REQUEST['pedido'];
    //traer compras del usuario
  $compras = new Conexion;
  $sql01 = "SELECT * FROM intranet_orden_compra WHERE numero_pedido = \"$buscar_compra\"";
  $Pedidos = $compras->query($sql01) or trigger_error($compras->error);
  $Ncompras = $compras->affected_rows;
  $compras->close();
//traer compras del usuario
}
?>
                  <h2>Compras encontradas 
                 <?php
                  if (isset($buscar_compra)) {
                   echo ' de:';
                  }
                   ?>

                  <strong>
                  <?php
                  if (isset($buscar_compra)) {
                   echo $buscar_compra;
                  }
                   ?>
                  </strong><small><?php echo $Ncompras; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Fecha Entrega</th>
                        <th class="column-title">Proveedor</th>
                        <th class="column-title">Numero de Pedido</th>
                        <th class="column-title">Observaciones</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ncompras >= '1') {
        //imprimir los registros

            while ($r=$Pedidos->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[fecha_entrega]</td>";
               
                echo "<td class=' '>$r[cardname]</td>";
                echo "<td class=' '>$r[numero_pedido]</td>";
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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

<!-- GUIAS -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Ndomicilios = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_compra = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $domicilios = new Conexion;
  $sql02 = "SELECT * FROM intranet_recepcion_mercancia WHERE t_entrega = 'Domicilio' AND numero_pedido = \"$buscar_compra\"";
  $Rdomicilios = $domicilios->query($sql02) or trigger_error($domicilios->error);
  $Ndomicilios = $domicilios->affected_rows;
  $domicilios->close();
//traer pedidos del usuario
}
?>
                  <h2>Recibidos encontradas: <small><?php echo $Ndomicilios; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Nombre Domiciliario</th>
                        <th class="column-title">Documento Domiciliario</th>
                        <th class="column-title">Nombre receptor</th>
                        <th class="column-title">Numero pedido</th>
                        <th class="column-title">Observaciones</th>
                       
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ndomicilios >= '1') {
        //imprimir los registros

            while ($r=$Rdomicilios->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[cardname]</td>";
                
                echo "<td class=' '>$r[numero_identificacion]</td>";
                echo "<td class=' '>$r[Nombre_encargado]</td>";
                echo "<td class=' '>$r[numero_pedido]</td>";
               
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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


<!-- GUIAS -->

<!-- GUIAS -->
  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                <?php 
$Nrecogidas = '0';
if (isset($_REQUEST['pedido'])) {
  $buscar_compra = $_REQUEST['pedido'];
    //traer pedidos del usuario
  $recogidas = new Conexion;
  $sql02 = "SELECT * FROM intranet_recepcion_mercancia WHERE t_entrega = 'Recogida' AND numero_pedido = \"$buscar_compra\"";
  $Rrecogidas = $recogidas->query($sql02) or trigger_error($recogidas->error);
  $Nrecogidas = $recogidas->affected_rows;
  $recogidas->close();
//traer pedidos del usuario
}
?>
                  <h2>Domicilios encontradas: <small><?php echo $Nrecogidas; ?></small></h2>
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
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Orden de compra</th>
                        <th class="column-title">Encargado recogida</th>
                        <th class="column-title">Revisión</th>
                        <th class="column-title">Observaciones</th>
                       
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Nrecogidas >= '1') {
        //imprimir los registros

            while ($r=$Rrecogidas->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[fecha]</td>";
                echo "<td class=' '>$r[numero_orden_compra]</td>";
                
                echo "<td class=' '>$r[Nombre_encargado]</td>";
                echo "<td class=' '>$r[Nombre_revision]</td>";
               
                echo "<td class='a-right a-right '>$r[observaciones]</td>";
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


<!-- GUIAS -->

<!-- Resumen de compras -->





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