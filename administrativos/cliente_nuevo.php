<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include_once('php/class.conexion.php');
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

  <title>Clientes Nuevos</title>

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
              <h3>Cliente nuevo</h3>
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

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" method="POST" action="php/e_cliente_nuevo.php">

                    <div class="form-group">

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
                        <input type="text" id="name" name="cardname" data-parsley-minlength="4" placeholder="Satel Importadores / Pepito Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardcode" placeholder="C123456789" pattern="[cC]+[0-9]{5,10}" required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="persona_contacto">Persona de contacto
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="persona_contacto" name="persona_contacto" placeholder="Pepito Pérez" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label for="ciudad_new" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required="" tabindex="-1" name="ciudad_new">
                          <option value="">Seleccione</option>
                          <option value="Aguachica Cesar">Aguachica Cesar</option>
                          <option value="Apartadó Antioquia">Apartadó Antioquia</option>
                          <option value="Arauca">Arauca</option>
                          <option value="Armenia Quindío">Armenia Quindío</option>
                          <option value="Barrancabermeja Santander">Barrancabermeja Santander</option>
                          <option value="Barranquilla Atlántico">Barranquilla Atlántico</option>
                          <option value="Bello Antioquia">Bello Antioquia</option>
                          <option value="Bogotá Distrito Capital">Bogotá Distrito Capital</option>
                          <option value="Bucaramanga Santander">Bucaramanga Santander</option>
                          <option value="Buenaventura Valle del Cauca">Buenaventura Valle del Cauca</option>
                          <option value="Buga Valle del Cauca">Buga Valle del Cauca</option>
                          <option value="Cali Valle del Cauca">Cali Valle del Cauca</option>
                          <option value="Cartago Valle del Cauca">Cartago Valle del Cauca</option>
                          <option value="Cartagena Bolívar">Cartagena Bolívar</option>
                          <option value="Caucasia Antioquia">Caucasia Antioquia</option>
                          <option value="Cereté Córdoba">Cereté Córdoba</option>
                          <option value="Chia Cundinamarca">Chia Cundinamarca</option>
                          <option value="Ciénaga Magdalena">Ciénaga Magdalena</option>
                          <option value="Cúcuta Norte de Santander">Cúcuta Norte de Santander</option>
                          <option value="Dosquebradas Risaralda">Dosquebradas Risaralda</option>
                          <option value="Duitama Boyacá">Duitama Boyacá</option>
                          <option value="Envigado Antioquia">Envigado Antioquia</option>
                          <option value="Facatativá Cundinamarca">Facatativá Cundinamarca</option>
                          <option value="Florencia Caqueta">Florencia Caqueta</option>
                          <option value="Floridablanca Santander">Floridablanca Santander</option>
                          <option value="Fusagasugá Cundinamarca">Fusagasugá Cundinamarca</option>
                          <option value="Girardot Cundinamarca">Girardot Cundinamarca</option>
                          <option value="Girón Santander">Girón Santander</option>
                          <option value="Ibagué Tolima">Ibagué Tolima</option>
                          <option value="Ipiales Nariño">Ipiales Nariño</option>
                          <option value="Itagüí Antioquia">Itagüí Antioquia</option>
                          <option value="Jamundí Valle del Cauca">Jamundí Valle del Cauca</option>
                          <option value="Lorica Córdoba">Lorica Córdoba</option>
                          <option value="Los Patios Norte de Santander">Los Patios Norte de Santander</option>
                          <option value="Magangué Bolivar">Magangué Bolivar</option>
                          <option value="Maicao Guajira">Maicao Guajira</option>
                          <option value="Malambo Atlántico">Malambo Atlántico</option>
                          <option value="Manizales Caldas">Manizales Caldas</option>
                          <option value="Medellín Antioquia">Medellín Antioquia</option>
                          <option value="Melgar Tolima">Melgar Tolima</option>
                          <option value="Montería Córdoba">Montería Córdoba</option>
                          <option value="Neiva Huila">Neiva Huila</option>
                          <option value="Ocaña Norte de Santander">Ocaña Norte de Santander</option>
                          <option value="Paipa, Boyacá">Paipa, Boyacá</option>
                          <option value="Palmira Valle del Cauca">Palmira Valle del Cauca</option>
                          <option value="Pamplona Norte de Santander">Pamplona Norte de Santander</option>
                          <option value="Pasto Nariño">Pasto Nariño</option>
                          <option value="Pereira Risaralda">Pereira Risaralda</option>
                          <option value="Piedecuesta Santander">Piedecuesta Santander</option>
                          <option value="Pitalito Huila">Pitalito Huila</option>
                          <option value="Popayán Cauca">Popayán Cauca</option>
                          <option value="Quibdó Choco">Quibdó Choco</option>
                          <option value="Riohacha Guajira">Riohacha Guajira</option>
                          <option value="Rionegro Antioquia">Rionegro Antioquia</option>
                          <option value="Sabanalarga Atlántico">Sabanalarga Atlántico</option>
                          <option value="Sahagún Córdoba">Sahagún Córdoba</option>
                          <option value="San Andrés Isla">San Andrés Isla</option>
                          <option value="Santa Marta Magdalena">Santa Marta Magdalena</option>
                          <option value="Sincelejo Sucre">Sincelejo Sucre</option>
                          <option value="Soacha Cundinamarca">Soacha Cundinamarca</option>
                          <option value="Sogamoso Boyacá">Sogamoso Boyacá</option>
                          <option value="Soledad Atlántico">Soledad Atlántico</option>
                          <option value="Tibú Norte de Santander">Tibú Norte de Santander</option>
                          <option value="Tuluá Valle del Cauca">Tuluá Valle del Cauca</option>
                          <option value="Tumaco Nariño">Tumaco Nariño</option>
                          <option value="Tunja Boyacá">Tunja Boyacá</option>
                          <option value="Turbo Antioquia">Turbo Antioquia</option>
                          <option value="Valledupar Cesar">Valledupar Cesar</option>
                          <option value="Villa de leyva">Villa de leyva</option>
                          <option value="Villa del Rosario Norte de Santander">Villa del Rosario Norte de Santander</option>
                          <option value="Villavicencio Meta">Villavicencio Meta</option>
                          <option value="Yopal Casanare">Yopal Casanare</option>
                          <option value="Yumbo Valle del Cauca">Yumbo Valle del Cauca</option>
                          <option value="Zipaquirá Cundinamarca">Zipaquirá Cundinamarca</option>
                        </select>
                      </div>
                    </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="direccion" name="direccion" placeholder="Calle 13 # 26 - 57" data-parsley-minlength="8" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase  ">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono" name="telefono"  required="required" placeholder="3603299" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="movil_new">Celular
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="movil_new" name="movil_new"  placeholder="3115921575" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paginaweb">Pagina WEB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="paginaweb" name="paginaweb" placeholder="www.satelimportadores.com" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email_new" name="email_new" placeholder="ventas@satelimportadores.com" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                    <div class="item form-group">
                      <label for="sector" class="control-label col-md-3 col-sm-3 col-xs-12">Sector</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control select2_single select2_single01" required="" name="sector">
                        <option value="">Seleccione</option>
                          <option value="Comercio General">Comercio General</option>
                          <option value="constructores">Constructores</option>
                          <option value="Gaseras">Gaseras</option>
                          <option value="Indistriales">Industriales</option>
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


                  <?php 

     //traer cantidad de asesores   
          $asesores = new Conexion;
          $sql03 = "SELECT * FROM intranet_usuarios WHERE grupo_ventas_subgrupo = 'asesores' and activo =1";
          $Rasesores = $asesores->query($sql03) or trigger_error($asesores->error);
  //traer cantidad de asesores 


                   ?>

                    <div class="item form-group">
                      <label for="id" class="control-label col-md-3 col-sm-3 col-xs-12">Asesor comercial</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single02 form-control" required="" tabindex="-1" name="id">
                          <option value="">Seleccione</option>

                          <?php 

                              while ($r = $Rasesores->fetch_array()) {
                                echo "<option value='$r[id]'>$r[nombre] $r[apellido]</option>";
                              }


                           ?>

                        </select>
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
      $(".select2_single").select2({
        placeholder: "Seleccione ciudad"
      });
      $(".select2_single01").select2({
        placeholder: "Seleccione sector"
      });
    $(".select2_single02").select2({
        placeholder: "Seleccione asesor comercial asignado"
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

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>



</body>

</html>
