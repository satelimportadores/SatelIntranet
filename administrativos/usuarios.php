<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
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

  <title>Usuario nuevo</title>

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
 <script src="js/usuarios.js"></script>
  <script src="js/parsley/parsleysatel.js"></script>

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
              <h3>Usuario nuevo</h3>
            </div>


          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de creación de usuarios:</h2>
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

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="php/e_usuario_nuevo.php">

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
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre" name="nombre" data-parsley-minlength="4" placeholder="Pepito" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="apellido" name="apellido" data-parsley-minlength="4" placeholder="Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label for="t_identificacion" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de identificación</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" required="" tabindex="-1" name="t_identificacion">
                          <option value="">Seleccione</option>
                          <option value="Cedula de ciudadania">Cedula de ciudadanía</option>
                          <option value="Cedula de extranjeria">Cedula de extranjería</option>
                          <option value="pasaporte">pasaporte</option>
                        </select>
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_identificacion"># Identificación
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="numero_identificacion" required="" name="numero_identificacion"  placeholder="860528792" data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div id="error_cedula"></div>
                   </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rh">Tipo de Sangre RH
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rh" required="" name="rh"  placeholder="0+" data-parsley-minlength="2" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-superscript form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div id="error_rh"></div>
                   </div>


                   <div class="item form-group">
                      <label for="ciudad" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single01 form-control" required="" tabindex="-1" id="ciudad" name="ciudad">
              <!--TRAE LAS CIUDADES DE  php/consulta_ciudades.php -->
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" placeholder="ventas@satelimportadores.com" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                    <div class="item form-group">
                      <label for="departamento" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single03 form-control" required="" tabindex="-1" name="departamento">
                          <option value="">Seleccione</option>
                          <option value="1">Administrativos</option>
                          <option value="2">Contabilidad</option>
                          <option value="3">Ventas</option>
                          <option value="4">Bodega</option>
                          <option value="5">Invitados</option>
                          <option value="6">Servicios</option>
                        </select>
                      </div>
                    </div>


                    <div class="jefebodega">

                     <div class="item form-group">
                      <label for="grupo_bodega" class="control-label col-md-3 col-sm-3 col-xs-12">Subgrupo Bodega</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single04 form-control" tabindex="-1" name="grupo_bodega">
                          <option value="">Seleccione</option>
                          <option value="2">Usuario normal</option>
                          <option value="1">Usuario jefe bodega</option>
                        </select>
                      </div>
                      </div>

                     <div class="item form-group">
                          <label for="grupo_bodega_subgrupo" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento Bodega</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single05 form-control" tabindex="-1" name="grupo_bodega_subgrupo">
                              <option value="">Seleccione</option>
                              <option value="almacenamiento">Almacenamiento</option>
                              <option value="distribucion">Distribución</option>
                              <option value="mensajeria">Mensajería</option>
                            </select>
                          </div>
                        </div>
            
                    </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" data-parsley-minlength="4" placeholder="" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-asterisk form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Color</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name='color' value="#0084b6" class="form-control jscolor" />
                          
                        </div>
                      </div>
                    


                       <div id="falla_fecha">
                        <div class="item form-group">
                          <label for="fecha_nacimiento" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <input type="date" class="form-control has-feedback-left" required='required' name="fecha_nacimiento" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                          </div>
                        </div>
                        </div>                   
                     
                      
                      <div class="item form-group">
                          <label for="genero" class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single06 form-control" tabindex="-1" name="genero">
                              <option value="">Seleccione</option>
                              <option value="M">Masculino</option>
                              <option value="F">Femenino</option>
                              
                            </select>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label for="estado_civil" class="control-label col-md-3 col-sm-3 col-xs-12">Estado civil</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single07 form-control" tabindex="-1" name="estado_civil">
                              <option value="">Seleccione</option>
                              <option value="Soltero">Soltero</option>
                              <option value="Union libre">Unión libre</option>
                              <option value="Casado">Casado</option>
                              <option value="Separado">Separado</option>
                            </select>
                          </div>
                        </div>

                      <div class="item form-group">
                        <label for="escolaridad" class="control-label col-md-3 col-sm-3 col-xs-12">Escolaridad</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single08 form-control" tabindex="-1" name="escolaridad">
                              <option value="">Seleccione</option>
                              <option value="Sin escolaridad">Sin escolaridad</option>
                              <option value="Preescolar">Preescolar</option>
                              <option value="Primaria incompleta">Primaria incompleta</option>
                              <option value="Primaria completa">Primaria completa</option>
                              <option value="Bachillerato incompleto">Bachillerato incompleto</option>
                              <option value="Bachillerato completo">Bachillerato completo</option>
                              <option value="Estudios tecnicos o comerciales (en curso)">Estudios técnicos o comerciales (en curso)</option>
                              <option value="Estudios tecnicos o comerciales">Estudios técnicos o comerciales</option>
                              <option value="Profesional (en curso)">Profesional (en curso)</option>
                              <option value="Profesional">Profesional</option>
                              <option value="Posgrado">Posgrado</option>
                              <option value="Maestría">Maestría</option>
                              <option value="Doctorado">Doctorado</option>
                            </select>
                          </div>
                        </div>

                    <div class="item form-group">
                        <label for="hijos" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de hijos</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single09 form-control" tabindex="-1" name="hijos">
                                <option value="">Seleccione</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="Mas">Mas de 6 hijos.</option>
                            </select>
                          </div>
                        </div>

                   <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="file">Archivos hoja de vida:</label>
                          <input placeholder="selecciona tu archivo" name="file[]" multiple id="file" type="file"  accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
                          
                          <input type="hidden" id="cant_files" name="cant_files" value="">
                        </div>
                    </div>

                    <div class="descripcion_files">
                      
                    </div>

                    <div class="item form-group">
                      <hr>
                      <div class="col-md-12 col-md-offset-4"><h2>Datos Sociodemograficos</h2></div>
                    </div>
                    
                  <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_nombre">En caso de emergencia llamar a
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="emer_nombre" name="emer_nombre" data-parsley-minlength="4" placeholder="Pepito" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user-md form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="emer_telefono" name="emer_telefono"  required="required" placeholder="3603299" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_celular">Celular / Móvil
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="emer_celular" name="emer_celular"   placeholder="3115921575" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

               <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alergias">Alergias
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="alergias" name="alergias"  placeholder="NO" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase" value="NO">
                        <span class="fa fa-ambulance form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

               <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicamentos">Medicamentos
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="medicamentos" name="medicamentos"  placeholder="NO" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase" value="NO">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enfermedades">Enfermedades
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="enfermedades" name="enfermedades"  placeholder="NO" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase" value="NO">
                        <span class="fa fa-stethoscope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                        <label for="area" class="control-label col-md-3 col-sm-3 col-xs-12">Area</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single11 form-control" tabindex="-1" id="select2_single11" required name="area">

                                    <!-- carga informacion ajax php/consulta_cargo.php -->

                            </select>
                          </div>
                        </div>


                      <div id="cargo">
                        
                   <div class="item form-group">
                        <label for="cargo" class="control-label col-md-3 col-sm-3 col-xs-12">Cargo</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single12 form-control" required tabindex="-1" id="select2_single12" name="cargo">

                                    <!-- carga informacion ajax php/consulta_cargo.php-->

                            </select>
                          </div>
                        </div>

                      </div>



                  <div id="fecha_vinculacion">
                        <div class="form-group">
                          <label for="fecha_vinculacion" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de vinculación</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

            
                       
                              <input type="date" class="form-control has-feedback-left" required='required' name="fecha_vinculacion" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                                         

                    <div class="item form-group">
                        <label for="t_vinculacion" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de vinculación</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single10 form-control" tabindex="-1" name="t_vinculacion">
                                <option value="">Seleccione</option>
                                <option value="Temporal">Temporal</option>
                                <option value="Directa">Directa</option>
                                <option value="Prestación de servicios">Prestación de servicios</option>
                            </select>
                          </div>
                        </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eps">EPS
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single13 form-control" tabindex="-1" id="eps" name="eps" required="required">

                                    <!-- carga informacion ajax php/consulta_salud.php?EPS-->

                            </select>
                      </div>
                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="afp">AFP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single14 form-control" tabindex="-1" id="afp" name="afp" required="required">

                                    <!-- carga informacion ajax php/consulta_salud.php?AFP-->

                            </select>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="arl">ARL
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single15 form-control" tabindex="-1" id="arl" name="arl" required="required">

                                    <!-- carga informacion ajax php/consulta_salud.php?ARL-->

                            </select>
                      </div>
                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla_botas">Talla de Botas
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="talla_botas" name="talla_botas"  placeholder="38" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla_pantalon">Talla de Pantalon
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="talla_pantalon" name="talla_pantalon"  placeholder="32" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla_camisa">Talla de Camisa
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="talla_camisa" name="talla_camisa"  placeholder="M" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" id="textarea" name="comentarios"></textarea>
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

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <!-- <script src="js/custom.js"></script> -->

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
    <!-- color picker -->
  <script src="js/jscolor/jscolor.min.js"></script>




</body>

</html>
