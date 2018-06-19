<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>

<?php
include_once('php/class.conexion.php');
?>

<?php
$user_id = $_SESSION["user_id"];
  include_once('php/consultas_css.php');
?>

<?php

//consulta maximo


 $clientemax = new Conexion;
 $sql02 = "SELECT COUNT(id_cliente) as clientemax FROM intranet_actualizacion_clientes WHERE activo = 'si' AND user_id = \"$user_id\"";
 $Nclientemin = $clientemax->query($sql02) or trigger_error($clientemax->error);
$b=$Nclientemin->fetch_array();
 $idultima = $b['clientemax'] - 1;
  if (($idultima + 1) <= 0) {
   print "<script>alert(\"No hay registros para procesar\");window.location='index.php';</script>";
 }
 unset($b);

 
 $clientemax->close();


//consulta maximo


 if (isset($_REQUEST['pagina'])) {
   $pagina =$_REQUEST['pagina'];
 }else{
    $pagina = 'pinicial';
 }

 switch ($pagina) {
   case 'pinicial':
     $limit = 0;
      break;

    case 'pfinal':
      $limit = $idultima;
      break;

    case 'panterior':
        $nregistro = $_REQUEST['nregistro'];
          if ($nregistro <= 0) {
            $limit = 0;
          }else{
            $limit = $nregistro - 1;
          }
      break;

        case 'psiguiente':
        
        $nregistro = $_REQUEST['nregistro'];

          if ($nregistro >= $idultima) {
            $limit = $idultima;
          }else{
            $limit = $nregistro + 1;
          }
      break;
   
   default:
     $limit = 1;
     break;
 }


?>

<?php
//traer registro de cliente

  $rcliente = new Conexion;
  $sql03 = "SELECT *  FROM intranet_actualizacion_clientes WHERE activo = 'si' AND user_id = \"$user_id\" LIMIT $limit,1";
  $registro_cliente = $rcliente->query($sql03) or trigger_error($rcliente->error);
  $r=$registro_cliente->fetch_array();



$rcliente->close();

//traer registro de cliente
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

  <title>Actualización de Clientes</title>

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
              <h3>Actualización de clientes</h3>
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

                  <form id="demo-form2" novalidate class="form-horizontal form-label-left" data-parsley-validate method="POST" action="php/e_actualizacion.php">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha" >Fecha 
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
                        <input type="text" id="name" name="cardname" value="<?php echo $r['cardname']; ?>" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardcode" value="<?php echo $r['cardcode']; ?>" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="persona_contacto">Persona de contacto
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="persona_contacto"  name="persona_contacto" value="<?php echo $r['persona_contacto']; ?>" placeholder="Pepito Pérez"  required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label for="ciudad_new" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required tabindex="-1" name="ciudad_new">
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
                        <input type="text" id="direccion" name="direccion" value="<?php echo $r['direccion']; ?>"  data-parsley-minlength="8" placeholder="Calle 13 # 26 - 57" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono" name="telefono"  value="<?php echo $r['telefono']; ?>" required="required"  data-parsley-minlength="7" placeholder="3603299" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="movil_new">Celular
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="movil_new" name="movil_new" value="<?php echo $r['movil_new']; ?>"  placeholder="3115921575"  class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paginaweb">Pagina WEB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="paginaweb" name="paginaweb" value="<?php echo $r['paginaweb']; ?>" placeholder="www.satelimportadores.com" class="form-control col-md-7 col-xs-12 has-feedback-left">
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
                              <textarea class="col-xs-12" data-parsley-minlength='75' required="required" id="textarea" name="comentarios"></textarea>
                          </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-xs-offset-3">
                        
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                        </div></form>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
          <div class="row">
              <div class="col-md-4"></div>

              <div class="col-md-7">
                          <div class="bs-glyphicons">
            
                                 <ul class="bs-glyphicons-list">
                                    <a href="actualizacion.php?pagina=pinicial">
                                      <li>
                                        <span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span>
                                        <span class="glyphicon-class">Primer Registro</span>
                                      </li>
                                    </a>

                                      <a href="actualizacion.php?pagina=panterior&nregistro=<?php echo $limit; ?>">  
                                      <li>
                                        <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
                                        <span class="glyphicon-class">Registro Anterior</span>
                                      </li>
                                      </a>
                                      <a href="actualizacion.php?pagina=psiguiente&nregistro=<?php echo $limit; ?>">
                                          <li>
                                            <span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span>
                                            <span class="glyphicon-class">Siguiente Registro</span>
                                          </li>
                                      </a>
                                      <a href="actualizacion.php?pagina=pfinal">
                                          <li>
                                            <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span>
                                            <span class="glyphicon-class">Ultimo Registro</span>
                                          </li>
                                      </a>


                                       </ul>

                    </div>
              </div>



          </div>
                            
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
    });
  </script>
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

  <!-- form validation -->
  <script src="js/parsley/parsleysatel.js"></script>
 


</body>

</html>
