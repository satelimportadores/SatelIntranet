<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php 
if (isset($_REQUEST['numero_pedido'])) {
  $cardname = $_REQUEST['cardname'];
  $numero_pedido = $_REQUEST['numero_pedido'];
  $cardcode = $_REQUEST['cardcode'];
  $documento = $_REQUEST['documento'];
  $comentarios = $_REQUEST['comentarios'];
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

  <title>Radicación del PQRSF - Satel Importadores de Ferretería SAS</title>

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

<script type="text/javascript">
function mostrar(){
  var myselect = document.getElementById("t_solicitud");
  var myvalue = myselect.options[myselect.selectedIndex].value;
  
  switch (myvalue)
            {
               case 'Peticion': 
         
  document.getElementById('mostrar01').style.display="block";
  document.getElementById('mostrar02').style.display="none";
  document.getElementById('mostrar03').style.display="none";
  document.getElementById('mostrar04').style.display="none";
  document.getElementById('mostrar05').style.display="none";
  
         
               break;
            
               case 'Queja':
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar03').style.display="none";
  document.getElementById('mostrar04').style.display="none";
  document.getElementById('mostrar02').style.display="block";
  document.getElementById('mostrar05').style.display="none";

         
               break;
            
               case 'Reclamo':
        
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar02').style.display="none";
  document.getElementById('mostrar04').style.display="none";
  document.getElementById('mostrar03').style.display="block";
  document.getElementById('mostrar05').style.display="none";
        
               break;
            
               case 'Sugerencia':
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar02').style.display="none";
  document.getElementById('mostrar03').style.display="none";
  document.getElementById('mostrar04').style.display="block";
  document.getElementById('mostrar05').style.display="none";
               break;
            
               case 'Felicitacion':
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar02').style.display="none";
  document.getElementById('mostrar03').style.display="none";
  document.getElementById('mostrar04').style.display="none";
  document.getElementById('mostrar05').style.display="block";
        break;

            default:

            esconder();
            break;
         
            }
  
}
</script>




        <script type="text/javascript">
function esconder(){
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar01').style.display="none";
  document.getElementById('mostrar02').style.display="none";
  document.getElementById('mostrar03').style.display="none";
  document.getElementById('mostrar04').style.display="none";
  document.getElementById('mostrar05').style.display="none";
  
}
</script>


</head>


<body class="nav-md" onload="esconder()">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-pie-chart"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
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
                  
                    <li><a href="index.php">Resumen Post venta</a></li>
                    <li><a href="post_venta.php">Post venta</a></li>
                    <li><a href="pqrsf.php">PQRSF</a></li>


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
              <h3>Radicación de PQRSF</h3>
            </div>

              <form action="buscar.php">
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <!-- Buscar-->
              </div>
            </div>
            </form>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de radicación de PQRSF:</h2>
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
<!-- data-parsley-validate -->
                  <form id="demo-form2" data-parsley-validate  novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="php/e_pqrsf.php">

                    <div class="item form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha">Fecha 
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

                        <input type="text" id="name" name="cardname" value="<?php if (isset($cardname)) {echo $cardname;} ?>" <?php if (isset($cardname)) {echo "readonly";} ?> data-parsley-minlength="5" placeholder="Satel Importadores / Pepito Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardcode" value="<?php if (isset($cardcode)) {echo $cardcode;} ?>" <?php if (isset($cardcode)) {echo "readonly";} ?> placeholder="C123456789" pattern="[cC]+[0-9]{5,10}" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email_new" name="email_new" placeholder="ventas@satelimportadores.com" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                      <label for="t_solicitud" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de solicitud:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control select2_single01" onchange="mostrar()" required="" tabindex="-1" id="t_solicitud" name="t_solicitud">
                          <option value="">Seleccione</option>
                              <option value="Peticion">Petici&oacute;n</option>
                              <option value="Queja">Queja</option>
                              <option value="Reclamo">Reclamo</option>
                              <option value="Sugerencia">Sugerencia</option>
                              <option value="Felicitacion">Felicitaci&oacute;n</option>

                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                            <div class="col-md-12">
                            <div id="mostrar01"><h1>Petici&oacute;n:</h1>Es la solicitud, de manera respetuosa, bien sea de informaci&oacute;n de inter&eacute;s general o particular, o de obtener una pronta resoluci&oacute;n a una solicitud ya presentada ante <b><font color="red">S</font>atel</b> de forma verbal o escrita.</div>
                            <div id="mostrar02"><h1>Queja:</h1>Es la expresi&oacute;n de una inconformidad en relaci&oacute;n con el actuar de <b><font color="red">S</font>atel</b>, o de alguno de sus representantes, al desarrollo del servicio prestado. En esta solicitud se espera una respuesta o resoluci&oacute;n ya sea de manera expl&iacute;cita o impl&iacute;cita.</div>
                            <div id="mostrar03"><h1>Reclamo: </h1>Es la exigencia que formula un cliente, manifestando su insatisfacci&oacute;n frente a un producto o un servicio recibido, en donde se demanda cumplimiento por parte de <b><font color="red">S</font>atel</b> y del personal a su servicio. En esta solicitud se espera una respuesta o resoluci&oacute;n ya sea de manera expl&iacute;cita o impl&iacute;cita</div>
                            <div id="mostrar04"><h1>Sugerencia: </h1>Es una propuesta o recomendaci&oacute;n para el mejoramiento de la atenci&oacute;n del cliente frente al servicio prestado por <b><font color="red">S</font>atel</b>.</div>
                            <div id="mostrar05"><h1>Felicitaci&oacute;n: </h1>Es la manifestaci&oacute;n de la satisfacci&oacute;n que un cliente experimenta al recibir un servicio eficiente y eficaz, fruto del empeño, dedicaci&oacute;n, esfuerzo y pasi&oacute;n que <b><font color="red">S</font>atel</b> entrega en cada soluci&oacute;n que da.</div>
                        </div>



                    </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="asunto">Asunto
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="asunto" name="asunto" placeholder="Asunto" data-parsley-minlength="5" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label for="t_documento" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de documento:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control select2_single02" tabindex="-1" id="t_documento" name="t_documento">
                          <option value="">Seleccione</option>

                                  <option value="Cotizacion">Cotización</option>
                                  <?php 
                                   if (isset($numero_pedido)) {
                                    echo "<option value='Pedido' selected >Pedido</option>";
                                    }else{
                                    echo "<option value='Pedido'>Pedido</option>";
                                    }
                                  ?>

                                   ?>
                                  <option value="Pedido">Pedido</option>
                                  <option value="Entrega">Entrega</option>
                                  <option value="Factura">Factura</option>
                                  <option value="Devolución">Devolución</option>
                        </select>
                      </div>
                    </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_documento"># documento
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="numero_documento" value="<?php if (isset($numero_pedido)) {echo $numero_pedido;} ?>" <?php if (isset($numero_pedido)) {echo "readonly";} ?> name="numero_documento"  placeholder="1234" data-parsley-minlength="2" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                   <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" data-parsley-minlength='150' id="textarea" name="comentarios"><?php if (isset($comentarios)) {print $comentarios;}?></textarea>
                          </div>
                    </div>

                    <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="file">Archivos adjuntos:</label>
                          <input placeholder="selecciona tu archivo" name="file[]" id="file" type="file" multiple accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
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
          <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>

    <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single01").select2({
        placeholder: "Seleccione tipo de solicitud"
      });
            $(".select2_single02").select2({
        placeholder: "Seleccione tipo de documento"
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

  <script src="js/custom.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>



</body>

</html>
