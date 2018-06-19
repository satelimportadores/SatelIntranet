<?php 

  include_once('php/usuario_perfil.php');

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

  <title>Ver Usuario</title>

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
              <h3>Editar usuario <?php echo $nombre.' '.$apellido ?></h3>
            </div>


          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Formulario de la edición de usuarios:</h2>
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

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="php/e_usuario_editar.php?user_id=<?php echo $user_id; ?>">

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
                        <input type="text" id="nombre" name="nombre" data-parsley-minlength="4" value="<?php echo $nombre; ?>" readonly required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="apellido" name="apellido" data-parsley-minlength="4" value="<?php echo $apellido; ?>" readonly required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Tipo de identificación
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="t_identificacion" name="t_identificacion" value="<?php echo $t_identificacion; ?>" readonly required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-bookmark-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_identificacion"># Identificación
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="numero_identificacion" required="" readonly name="numero_identificacion"  value="<?php echo $cedula; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ciudad">Ciudad
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="ciudad" required="" readonly name="ciudad"  value="<?php echo $ciudad; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="direccion" readonly name="direccion" value="<?php echo $direccion; ?>" data-parsley-minlength="8" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase  ">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono" readonly name="telefono"  required="required" value="<?php echo $telefono; ?>" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Correo / email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" readonly name="email" value="<?php echo $email; ?>" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_new">Departamento
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="departamento" id="departamento" readonly name="departamento" value="<?php echo $departamento; ?>" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Usuario
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" readonly data-parsley-minlength="4" value="<?php echo $username; ?>" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" readonly data-parsley-minlength="4" placeholder=""  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-asterisk form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Color</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name='color' readonly value="<?php echo $colorhex; ?>" class="form-control jscolor" />
                          
                        </div>
                      </div>
                    


                       <div id="falla_fecha">
                        <div class="item form-group">
                          <label for="fecha_nacimiento" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

                         <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="xdisplay_inputx form-group has-feedback">
                              <input type="date" class="form-control has-feedback-left" readonly required='required' value="<?php echo $fecha_nacimiento ?>" name="fecha_nacimiento" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero">Genero
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="genero" required="" readonly name="genero"  value="<?php echo $genero; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-child form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                      
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado_civil">Estado civil
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="estado_civil" required="" readonly name="estado_civil"  value="<?php echo $estadocivil; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-heart-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="escolaridad">Escolaridad
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="escolaridad" required="" readonly name="escolaridad"  value="<?php echo $escolaridad; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hijos">Cantidad de hijos
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="hijos" required="" readonly name="hijos"  value="<?php echo $hijos; ?>"  data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-smile-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>



<div class="clearfix"></div>

<div class="col-md-6 col-sm-6 col-sm-offset-3 col-xs-12"><h2>Documentos</h2>
                                        <div class="x_panel">
                                          
                                          <div class="x_content">

                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th>Nombre</th>
                                                  <th>Tipo</th>
                                                  <th>Fecha</th>
                                                  <th>Ver</th>
                                                </tr>
                                              </thead>
                                              <tbody> 
                                                <?php 
                                                    while ($r=$rdocumentos->fetch_array()) {

                                                      $tipo = $r['tipo_documento'];
                                                      $nombre = $r['nombre_adjunto'];
                                                      $fecha = $r['fecha'];
                                                      
                                                         echo "<tr>";
                                                            echo "<td>$nombre</td>";
                                                            echo "<td>$tipo</td>";
                                                            echo "<td>$fecha</td>";
                                                            echo "<td><a href='archivos/$tipo/$nombre' target='_blank'><i class='fa fa-search green'></i></a></td>";
                                                        echo "<tr>";
                                                    } ?>
                                              </tbody>
                                            </table>

                                          </div>
                                        </div>
                                      </div>

<div class="clearfix"></div>
                    <div class="item form-group">
                      <hr>
                      <div class="col-md-12 col-md-offset-4"><h2>Datos Sociodemograficos</h2></div>
                    </div>
                    
                  <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_nombre">En caso de emergencia llamar a
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="emer_nombre" name="emer_nombre" readonly value="<?php if (isset($emer_nombre)) {echo $emer_nombre;} ?>" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user-md form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_telefono">Teléfono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="emer_telefono" name="emer_telefono"  readonly value="<?php if (isset($emer_telefono)) {echo $emer_telefono;}  ?>" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
  
                <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emer_celular">Celular / Móvil
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="emer_celular" name="emer_celular" readonly   value="<?php if (isset($emer_celular)) {echo $emer_celular;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

               <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alergias">Alergias
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="alergias" name="alergias" readonly  value="<?php if (isset($alergias)) {echo $alergias;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-ambulance form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

               <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicamentos">Medicamentos
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="medicamentos" name="medicamentos" readonly value="<?php if (isset($medicamentos)) {echo $medicamentos;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enfermedades">Enfermedades
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="enfermedades" name="enfermedades" readonly  value="<?php if (isset($enfermedades)) {echo $enfermedades;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-stethoscope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Area
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="area" name="area" readonly  value="<?php if (isset($area)) {echo $area;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-suitcase form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cargo">Cargo
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="cargo" name="cargo" readonly  value="<?php if (isset($cargo)) {echo $cargo;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-print form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


                  <div id="fecha_vinculacion">
                        <div class="item form-group">
                          <label for="fecha_vinculacion" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de vinculación</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

                         <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="xdisplay_inputx form-group has-feedback">
                              <input type="date" class="form-control has-feedback-left" readonly name="fecha_vinculacion" id="single_cal2" value="<?php echo $fecha_vinculacion; ?>" aria-describedby="inputSuccess2Status">
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
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t_vinculacion">Tipo de vinculación
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="t_vinculacion" name="t_vinculacion" readonly  value="<?php if (isset($t_vinculacion)) {echo $t_vinculacion;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-upload form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eps">EPS
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="eps" name="eps" readonly  value="<?php if (isset($eps)) {echo $eps;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-stethoscope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="afp">AFP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="afp" name="afp" readonly  value="<?php if (isset($afp)) {echo $afp;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-stethoscope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>


              <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="arl">ARL
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="arl" name="arl" readonly  value="<?php if (isset($arl)) {echo $arl;} ?>" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-stethoscope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>



                    <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" id="textarea" readonly name="comentarios"><?php echo $comentarios; ?></textarea>
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
  <!-- pnotify -->
    <script src="js/notify/pnotify.core.js"></script>
  <script src="js/notify/pnotify.buttons.js"></script>
    <script src="js/notify/pnotify.nonblock.js"></script>




</body>

</html>
