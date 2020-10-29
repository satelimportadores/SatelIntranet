<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>



<?php
  include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
 $user_id = $_SESSION["user_id"];
 $user_sap = $_SESSION["user_sap"];
   include_once('php/consultas_css.php');
?>

<?php

  //traer registro de clientes letra A
$letra = 'A';
if (isset($_REQUEST['letra'])) {
  $letra = $_REQUEST['letra'];
}
  

  $cliente = new Conexion;
  $sql01 = "SELECT cardcode,cardname,persona_contacto,sector,telefono,direccion FROM intranet_actualizacion_clientes WHERE cardname LIKE '$letra%' AND user_sap = \"$user_sap\" ORDER BY cardname ASC";
  $clientes = $cliente->query($sql01) or trigger_error($cliente->error);
  

$cliente->close();

//traer registro de clientes letra A

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

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <title>Cliente Satel Importadores </title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
<link href="css/impresion.css" rel="stylesheet" type="text/css" media="print">
  <script src="js/jquery.min.js"></script>
 <script src="js/menu.js"></script>
 <script src="js/consulta_menu.js"></script>
  <script src="js/notify/pnotify.core.js"></script>
  <script src="js/notify/pnotify.buttons.js"></script>
  <script src="js/notify/pnotify.nonblock.js"></script>

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
              <h3>Clientes Satel</h3>
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
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                      <ul class="pagination pagination-split" id="menuABC">
                          <!-- se carga desde php/consulta_menu.php y consulta_menu.js -->
                          
                      </ul>
                    </div>
                    <div class="clearfix"></div>





    
                    <!mostrar cliente -->





          <?php
              while ($r=$clientes->fetch_array()) {
                      echo "<div class='col-md-4 col-sm-4 col-xs-12 animated fadeInDown'>";
                      echo "<div class='well profile_view'>";
                      echo "<div class='col-sm-12'>";
                      echo "<div class='invisible'>$r[cardcode]</div>";
                      echo "<h2 class='brief'><i>$r[cardname]</i></h2>";
                      echo "<div class='left col-xs-8 '>";
                      
                        if ($r['persona_contacto'] != "") {
                          echo "<h6>$r[persona_contacto]</h6>";
                        }else{
                          echo "<h6>No existe persona de contacto</h6>";
                        }

                      echo "<strong>$r[sector]</strong> ";
                      echo "<ul class='list-unstyled'>";
                      echo "<li><i class='fa fa-phone'></i> $r[telefono] </li>";

                       if ($r['direccion'] != "") {
                          echo "<li><i class='fa fa-home'></i> $r[direccion] </li>";
                        }else{
                          echo "<h6>No existe dirección</h6>";
                        }
                      
                      echo "<li>_</li>";
                      echo "</ul>";
                      echo "</div>";
                      echo "<div class='right col-xs-4 text-center'>";

                      //contar los comentarios por comen
                        $comen = new Conexion;
                        $sql01 = "SELECT COUNT(id) as cant FROM intranet_actualizacion_clientes_comentarios WHERE cardcode = \"$r[cardcode]\" AND YEAR(fecha) = YEAR(now())";
                        $Rcomen = $comen->query($sql01) or trigger_error($comen->error);
                        $s=$Rcomen->fetch_array();
                        $cantidad = $s['cant'];

                            if ($cantidad <= 5) {
                                echo "<img src='images/user03.png' alt='' class='img-circle img-responsive'>";
                            }
                            if ($cantidad >= 6 && $cantidad < 10 ) {
                                echo "<img src='images/user02.png' alt='' class='img-circle img-responsive'>";
                            }
                            if ($cantidad >= 10) {
                                echo "<img src='images/user01.png' alt='' class='img-circle img-responsive'>";
                            }  
                      //contar los comentarios por comen



                      echo "</div>";
                      echo "</div>";
                      echo "<div class='col-xs-12 bottom text-center'>";
                      echo "<div class='col-xs-12 col-sm-6 emphasis'>";
                      //echo "<p class='ratings'>";
                      //echo "<a>4.0</a>";
                      //echo "<a href='#'><span class='fa fa-star'></span></a>";
                      //echo "<a href='#'><span class='fa fa-star'></span></a>";
                      //echo "<a href='#'><span class='fa fa-star'></span></a>";
                      //echo "<a href='#'><span class='fa fa-star'></span></a>";
                      //echo "<a href='#'><span class='fa fa-star-o'></span></a>";
                      //echo "</p>";
                      echo "</div>";
                      echo "<div class='col-xs-12 col-sm-6 col-sm-offset-6 emphasis'>";
                      echo "<a href='profile.php?cardcode=$r[cardcode]' class='btn btn-info btn-xs' role='button'>Ver perfil</a>";
                      echo "<a href='#myModal' data-codigo-id='$r[cardcode]' data-toggle='modal' class='btn btn-danger btn-xs' id='#ceder' role='button'>Ceder cliente</a>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";


              }
          ?>
                 
                    

                    <!mostrar cliente -->
  
                        


                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

       <!-- modal transmitir cliente -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form id="form1" action="">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Ceder Cliente</h4>
      </div>
      <div class="modal-body" id="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="save()" class="btn btn-primary">Enviar</button>
      </div>
      </form>
    </div>
  </div>
</div> 
<!-- modal transmitir cliente -->

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
  <!-- Ceder cliente -->
  <script src="js/ceder_cliente.js"></script>
  <!-- Ceder cliente -->

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
