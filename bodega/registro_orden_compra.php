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

 //traer pedidos
 $pedidos = new Conexion;
 $sql01 = "SELECT * FROM intranet_registro_pedido WHERE orden_compra = 0 AND orden_compra_realizada = 0 AND ( zona is NULL or zona = '')  ORDER BY numero_pedido ASC";
 $Rpedidos = $pedidos->query($sql01) or trigger_error($pedidos->error);
 $pedidos->close();
//traer pedidos

  //traer alistamiento
 $bodega = new Conexion;
 $sql01 = "SELECT * from intranet_usuarios where grupo_bodega = 1 AND activo = 1 ORDER BY nombre ASC";
 $Rcomerciales = $bodega->query($sql01) or trigger_error($bodega->error);
 $bodega->close();
//traer alistamiento

//traer zonas
 $zonas_despacho = new Conexion;
 $sql01 = "SELECT * FROM intranet_zonas_despacho WHERE zona <> 'TRANSPORTADORA' ORDER BY zona ASC";
 $Rzonas_despacho = $zonas_despacho->query($sql01) or trigger_error($zonas_despacho->error);
 $zonas_despacho->close();
//traer zonas
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

  <title>Orden de compra</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">

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



    <!--esconder divs -->
    <script>
    $(document).on('ready',function(){
          //escorder div al cargar pagina
                  $('.numero_pedido').css({'display':'none'});
                  $('.zonas').css({'display':'none'});
           //escorder div al cargar pagina


          //funcion esconder div numero pedido
          
            $("select[name=t_compra]").change(function(){
           var tcompra = $('select[name=t_compra]').val();
           //alert(tcompra);

                  switch (tcompra)
                  {
                      case 'Stock': 
                      $('.numero_pedido').css({'display':'none'});
                      $('#numero_pedido').removeAttr('required');

                      break;

                      case "Pedido":
                      $('.numero_pedido').css({'display':'block'});
                      $('#numero_pedido').attr('required', 'required');

                      break;

                      default:
                      $('.numero_pedido').css({'display':'none'});
                      $('#numero_pedido').removeAttr('required');
                      break;
                  }
            
        });
          //funcion esconder div numero pedido

          //funcion esconder div zonas
          
            $("select[name=t_entrega]").change(function(){
           var tzona = $('select[name=t_entrega]').val();
           //alert(tzona);

                  switch (tzona)
                  {
                      case 'Domicilio': 
                      $('.zonas').css({'display':'none'});

                      break;

                      case "Recogida":
                      $('.zonas').css({'display':'block'});

                      break;

                      default:
                      $('.zonas').css({'display':'none'});
                      break;
                  }
            
        });
          //funcion esconder div zonas

    });
    </script>

    <!-- fin de esconder divs-->
  

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
              <h3>Orden de compra</h3>
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

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de orden de compra:</h2>
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

                  <form id="demo-form2"  data-parsley-validate novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="php/e_registro_orden_compra.php">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha">Fecha 
                      </label>
                      <div class="col-md-5 col-xs-12">
                        <input type="text" id="fecha" name="fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <label class="control-label col-md-1 col-xs-12" for="ip">IP
                      </label>
                      <div class="col-md-5 col-xs-12">
                        <input type="text" id="ip" name="ip" required="required" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-cloud form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cardname">Razón social / nombre
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <!-- <input type="text" id="name" data-parsley-minlength="5" placeholder="Satel Importadores / Pepito Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase"> -->
                        <input type="text" id="autocomplete-custom-append" name="cardname" data-parsley-minlength="5" class="form-control col-md-7 col-xs-12 text-uppercase" required placeholder="Satel Importadores / Pepito Pérez" style="float: left;padding-left: 40px;" />
                        <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 0px;"></div>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="cardcode" name="cardcode" placeholder="P123456789" pattern="[pP]+[0-9]{5,10}" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_orden_compra"># Orden de compra
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="numero_orden_compra" name="numero_orden_compra"  required="required" placeholder="1234" data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label for="t_compra" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de compra</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single01 form-control" required="" id="t_compra" name="t_compra">

                          <option value="">Seleccione</option>
                            <option value="Stock">Stock</option>
                            <option value="Pedido">Pedido</option>
  
                        </select>
                      </div>
                    </div>


                    <div class="numero_pedido">
                      
                     <div class="item form-group">
                      <label for="numero_pedido" class="control-label col-md-3 col-sm-3 col-xs-12"># pedido</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single04 form-control" id="numero_pedido" name="numero_pedido">

                          <option value="">Seleccione</option>
                            <?php 
                                  while ($z=$Rpedidos ->fetch_array()) {
                                    echo "<option value='$z[numero_pedido]'>$z[numero_pedido] - $z[cod_cliente] - $z[cliente]</option>";

                                  }

                             ?>
                        </select>
                      </div>
                    </div>
                    </div>


                   <div class="item form-group">
                      <label for="t_entrega" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de entrega</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single02 form-control" required="" id="t_entrega" name="t_entrega">

                          <option value="">Seleccione</option>
                            <option value="Domicilio">Domicilio</option>
                            <option value="Recogida">Recogida</option>
  
                        </select>
                      </div>
                    </div>

                        <div class="zonas">
                                      <div class="item form-group">
                              <label for="zona" class="control-label col-md-3 col-sm-3 col-xs-12">Zona de recepción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single01 form-control" id="zona" name="zona">

                                  <option value="">Seleccione</option>
                                    <?php 
                                          while ($z=$Rzonas_despacho->fetch_array()) {
                                            echo "<option value='$z[zona]'>$z[zona]</option>";

                                          }
                                     ?>
                                </select>
                              </div>
                            </div>
                        </div>

                     <div class="item form-group">
                      <label for="N_encargado" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre encargado</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single03 form-control" required="" id="N_encargado" name="N_encargado">

                          <option value="">Seleccione</option>
                           <?php 
                                  while ($z=$Rcomerciales->fetch_array()) {
                                    echo "<option value='$z[id]'>$z[nombre] $z[apellido] </option>";


                                  }

                             ?>

  
                        </select>
                      </div>
                    </div>

                                          <div id="fecha">
                        <div class="item form-group">
                          <label for="fecha_suceso" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha estimada de entrega</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

                         <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="xdisplay_inputx form-group has-feedback">
                              <input type="date" class="form-control has-feedback-left" required='required' name="fecha_entrega" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>

                            </div>
                        </div>                     
                      </div>


 


                      <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="file">Archivos adjuntos:</label>
                          <input placeholder="selecciona tu archivo" name="file[]" id="file" type="file" multiple accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
                        </div>
                    </div>


                    <div class="item form-group">
                      <label for="observaciones" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" id="textarea" name="observaciones"></textarea>
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
      $(".select2_single01").select2({
        placeholder: "Seleccione tipo de compra"
      });
      $(".select2_single02").select2({
        placeholder: "Seleccione tipo de entrega"
      });
      $(".select2_single03").select2({
        placeholder: "Seleccione nombre del encargado de compras"
      });
      $(".select2_single04").select2({
        placeholder: "Seleccione numero de pedido"
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

<!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/cardname.js"></script>
  <script type="text/javascript" src="js/autocomplete/cardcode.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

  <script type="text/javascript">
    $(function() {
      'use strict';
      var cardnameArray = $.map(cardname, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: cardnameArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>




    <script type="text/javascript">
    $(function() {
      'use strict';
      var cardcodeArray = $.map(cardcode, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#cardcode').autocomplete({
        lookup: cardcodeArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>



</body>

</html>
