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
  if (!isset($_REQUEST['cardcode']) || $_REQUEST['cardcode'] == '') {
    print "<script>alert(\"No hay Registros!\");window.location='contacts.php';</script>";
  }
 ?>

 <?php 



    //traer cliente
       $cardcode = $_REQUEST['cardcode'];
       $cliente = new Conexion;
       $sql01 = "SELECT * FROM intranet_actualizacion_clientes WHERE cardcode = \"$cardcode\"";
       $Rcliente = $cliente->query($sql01) or trigger_error($cliente->error);
       $Nclientes = $Rcliente->num_rows;
       if ($Nclientes == 0) {

           print "<script>alert(\"No hay registros!\");window.location='contacts.php';</script>";
       }
       $r=$Rcliente->fetch_array();
       $cliente->close();
 
    //traer cliente

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

  <title>Edición de Clientes</title>

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

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php">Resumen</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Ventas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li><a href="contacts.php">Clientes</a></li>
                    <li><a href="actualizacion.php">Actualización de clientes</a></li>
                    <li><a href="cliente_nuevo.php">Cliente nuevo</a></li>
                    <li><a href="tareas.php">Tareas</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-phone-square"></i>Post venta<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                  <li><a href="post_venta.php">Llamadas post venta</a></li>
                  <li><a href="pqrsf.php">PQRSF</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-search"></i>Consultas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li><a href="pedidos.php">Pedidos</a>
                    <li><a href="calender.php">Calendario</a></li>

                  </ul>
                </li>

              </ul>
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
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
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
              <h3>Edición de clientes</h3>
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

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de actualización de clientes:</h2>
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

                  <form id="demo-form2" novalidate class="form-horizontal form-label-left" method="POST" data-parsley-validate action="php/e_editar.php">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha" data-parsley-trigger="change">Fecha 
                      </label>
                      <div class="col-md-3 col-xs-12">
                        <input type="text" id="fecha" name="fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <label class="control-label col-md-1 col-xs-12" for="ip">IP
                      </label>
                      <div class="col-md-3 col-xs-12">
                        <input type="text" id="ip" name="ip" required="required" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-cloud form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <label class="control-label col-md-1 col-xs-12" for="navegador">Navegador
                      </label>
                      <div class="col-md-3 col-xs-12">
                        <input type="text" id="navegador" name="navegador" value="<?php echo $_SERVER['HTTP_USER_AGENT'];?>" readonly="readonly" required="required" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-desktop form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>




                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cardname">Razón social / nombre
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardname" value="<?php echo $r['cardname']; ?>" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardcode" value="<?php echo $r['cardcode']; ?>" readonly="readonly" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="persona_contacto">Persona de contacto
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="persona_contacto" data-parsley-minlength="8" name="persona_contacto" value="<?php echo $r['persona_contacto']; ?>" placeholder="Pepito Pérez"  required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label for="ciudad_new" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required tabindex="-1" name="ciudad_new">
                          <option value="">Seleccione</option>
                          <option value="Bogotá">Bogotá</option>
                          <option value="Bucaramanga">Bucaramanga</option>
                          <option value="Cali">Cali</option>
                          <option value="Medellin">Medellín</option>
                          <?php 
                              if ( $r['ciudad_new'] != '') {
                                echo "<option value='$r[ciudad_new]' selected='selected'>$r[ciudad_new]</option>";
                              }

                           ?>
                        </select>
                      </div>
                    </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="direccion" name="direccion" value="<?php echo $r['direccion']; ?>" data-parsley-minlength="8" placeholder="Calle 13 # 26 - 57" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono" name="telefono"  value="<?php echo $r['telefono']; ?>" data-parsley-minlength="7"  required="required" placeholder="3603299" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="movil_new">Celular
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="movil_new" name="movil_new" value="<?php echo $r['movil_new']; ?>" data-parsley-length="[10,10]" placeholder="3115921575" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paginaweb">Pagina WEB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="paginaweb" name="paginaweb" value="<?php echo $r['paginaweb']; ?>" placeholder="www.satelimportadores.com" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email_new" name="email_new" value="<?php echo $r['email_new']; ?>" placeholder="ventas@satelimportadores.com" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                    <div class="item form-group">
                      <label for="sector" class="control-label col-md-3 col-sm-3 col-xs-12">Sector</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control select2_single select2_single01" required="" name="sector">
                        <option value="">Seleccione</option>
                          <option value="CLIENTES COM GENERAL">CLIENTES COM GENERAL</option>
                          <option value="COMPRESORES">COMPRESORES</option>
                          <option value="CLIENTES CONSTRUCTOR">CLIENTES CONSTRUCTOR</option>
                          <option value="CLIENTES GASERAS">CLIENTES GASERAS</option>
                            <?php 
                              if ( $r['sector'] != '') {
                                echo "<option value='$r[sector]' selected='selected'>$r[sector]</option>";
                              }

                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de pago</label>
                      <div class="item col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_group form-control" required="" name="forma_pago">
                          <optgroup label="Contado">
                            <option value="">Seleccione</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Contra entrega">Contra entrega</option>
                            <option value="Cheque al día">Cheque al día</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Cheque al día confirmado">Cheque al día confirmado</option>
                          </optgroup>
                          <optgroup label="Crédito">
                            <option value="15 días">15 días</option>
                            <option value="30 días">30 días</option>
                            <option value="45 días">45 días</option>
                            <option value="60 días">60 días</option>
                            <option value="30 días - Covifactura">30 días - Covifactura</option>
                            <option value="Cheque 30 días">Cheque 30 días</option>
                            <option value="Cheque 30 días confirmado">Cheque 30 días confirmado</option>
                            <option value="Cheque 60 días confirmado">Cheque 60 días confirmado</option>
                            <option value="Cheque posfechado 60 días">Cheque posfechado 60 días</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="comentarios"></textarea>
                          </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
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
          <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>

    <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Seleccione ciudad"
      });
      $(".select2_single01").select2({
        placeholder: "Seleccione sector"
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

  <script src="js/custom.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

    <!-- form validation -->
  <script src="js/parsley/parsleysatel.js"></script>


</body>

</html>
