<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include_once('php/class.conexion.php');
header("Content-Type: text/html;charset=utf-8");
?>

<?php 
//traer trabajadores "TODA EL AREA" de la base de datos
$trabajadores = new Conexion;
$sql = 'SELECT * FROM intranet_usuarios WHERE  grupo_bodega = 2 AND activo = 1 ORDER BY nombre ASC';
$query = $trabajadores->query($sql);
//Fin traer trabajadores "TODA EL AREA" de la base de datos

//traer trabajadores "TODA EL AREA" de la base de datos falla
$trabajadores = new Conexion;
$sql = 'SELECT * FROM intranet_usuarios WHERE  grupo_bodega = 2 AND activo = 1 ORDER BY nombre ASC';
$query2 = $trabajadores->query($sql);
//Fin traer trabajadores "TODA EL AREA" de la base de datos falla

//traer JEFES de la base de datos
$jefes = new Conexion;
$sql3 = 'SELECT CONCAT(nombre, " ", apellido) As nombre FROM intranet_usuarios WHERE jefe = 1 AND activo = 1 ORDER BY nombre ASC';
$query3 = $jefes->query($sql3);
//Fin traer JEFES de la base de datos

//traer JEFES de la base de datos fallas 
$jefes01 = new Conexion;
$sql3 = 'SELECT CONCAT(nombre, " ", apellido) As nombre FROM intranet_usuarios WHERE jefe = 1 AND activo = 1 ORDER BY nombre ASC';
$query4 = $jefes01->query($sql3);
//Fin traer JEFES de la base de datos fallas


  
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

  <title>Calificación de Empleados</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
<link href="css/impresion.css" rel="stylesheet" type="text/css" media="print">

  <link rel="stylesheet" type="text/css" href="css/progressbar/bootstrap-progressbar-3.3.0.css">
  <script src="js/jquery.min.js"></script>
 <script src="js/menu.js"></script>
      <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">
    <link href="css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Esconder div otra COLABORADOR -->

         <script type="text/javascript">
        function esconder(){
          document.getElementById('colaborador').style.display="none";
           
        }
        </script>

    <!-- fin Esconder COLABORADOR -->

<!-- mostrar campo OPERACION -->
    <script type="text/javascript">
function tipobonificacion(){
  var myselect = document.getElementById("tipo_bonificacion");
  var myvalue = myselect.options[myselect.selectedIndex].value;
  //window.alert(myvalue);
  switch (myvalue)
            {
               case 'Individual': 
         
  document.getElementById('divoperacion').style.display="none";
  document.getElementById('colaborador').style.display="block";
               break;

               default:
    document.getElementById('divoperacion').style.display="block";
    esconder();
         
            }
  
}
</script>

    <!-- mostrar campo oOPERACION-->


    <!-- mostrar campo COLABORADORES-->
    <script type="text/javascript">
function tipocolaborador(){
  var myselect = document.getElementById("operacion");
  var myvalue = myselect.options[myselect.selectedIndex].value;
  //window.alert(myvalue);
  switch (myvalue)
            {
               case 'Toda_el_area': 
         
  esconder();
         
               break;

               case 'Almacenamiento': 
  esconder();
         
               break;

               case 'Distribucion': 

  esconder();
         
               break;

               case 'Mensajeria': 

  esconder();
         
               break;

               default:

    esconder();         

         
            }
  
}
</script>

<!-- falla -->

       <!-- Esconder div otra COLABORADOR -->

         <script type="text/javascript">
        function falla_esconder(){
          document.getElementById('falla_colaborador').style.display="none";
           
        }
        </script>

    <!-- fin Esconder COLABORADOR -->

<!-- mostrar campo OPERACION -->
    <script type="text/javascript">
function falla_tipobonificacion(){
  var myselect = document.getElementById("falla_tipo_bonificacion");
  var myvalue = myselect.options[myselect.selectedIndex].value;
  //window.alert(myvalue);
  switch (myvalue)
            {
               case 'Individual': 
         
  document.getElementById('falla_divoperacion').style.display="none";
  document.getElementById('falla_colaborador').style.display="block";

  
         
               break;

               default:
    document.getElementById('falla_divoperacion').style.display="block";
    falla_esconder();
         
            }
  
}
</script>

    <!-- mostrar campo oOPERACION-->


    <!-- mostrar campo COLABORADORES-->
    <script type="text/javascript">
function falla_tipocolaborador(){
  var myselect = document.getElementById("falla_operacion");
  var myvalue = myselect.options[myselect.selectedIndex].value;
  //window.alert(myvalue);
  switch (myvalue)
            {
               case 'Toda_el_area': 
         
  esconder();
         
               break;

               case 'Almacenamiento': 
  esconder();
         
               break;

               case 'Distribucion': 

  esconder();
         
               break;

               case 'Mensajeria': 

  esconder();
         
               break;

               default:

    esconder();         

         
            }
  
}
</script>

    <!--esconder divs -->

        <script type="text/javascript">
function esconderfalla(){
  document.getElementById('falla01').style.display="none";
  document.getElementById('falla02').style.display="none";
  document.getElementById('falla03').style.display="none";
  document.getElementById('falla04').style.display="none";
        }
        </script>

    <!-- fin de esconder divs-->


<!-- Tipos de Fallas -->

      <script type="text/javascript">
function fallas(){
  var myselect = document.getElementById("tipo_falla");
  var falla = myselect.options[myselect.selectedIndex].value;
  
  switch (falla)
            {
               case 'Gestión': 
         
  document.getElementById('falla01').style.display="block";
  document.getElementById('falla02').style.display="none";
  document.getElementById('falla03').style.display="none";
  document.getElementById('falla04').style.display="none";
           
               break;
            
               case "Seguridad":
  
  document.getElementById('falla02').style.display="block";
  document.getElementById('falla01').style.display="none";
  document.getElementById('falla03').style.display="none";
  document.getElementById('falla04').style.display="none";

         
               break;
            
               case 'Accidente':
        
  document.getElementById('falla03').style.display="block";
  document.getElementById('falla02').style.display="none";
  document.getElementById('falla01').style.display="none";
  document.getElementById('falla04').style.display="none";
        
               break;
            
               case 'Quejas_Clientes':
  document.getElementById('falla04').style.display="block";
  document.getElementById('falla02').style.display="none";
  document.getElementById('falla03').style.display="none";
  document.getElementById('falla01').style.display="none";
               break;
           
        default:
            
          esconderfalla();
          break;
            }
  
}
</script>

<!-- Tipos de Fallas -->


<!-- falla -->



</head>


<body class="nav-md nover" onload="esconder();falla_esconder();esconderfalla();">

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
              <h3>Formularios de calificación de Empleados</h3>
            </div>

            <div class="title_right">
<!--               <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div> -->
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bars"></i> Por favor elige el tipo de reporte que deseas realizar: <small></small></h2>
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


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bonificación</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Falla</a>
                      </li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <!-- Bonificacion -->
                                            
                                             <!-- formulario de actualizacion de clientes -->

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left"  method="POST" action="php/e_registro_bonificacion.php">

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
                      <label for="numero_pedido" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de bonificación</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single01 form-control" required='required' name="tipo_bonificacion" onchange="tipobonificacion()" id="tipo_bonificacion">

                          <option value="">Seleccione</option>
                              <option value="Comunal">Comunal</option>
                              <option value="Individual">Individual</option>
                        </select>
                      </div>
                    </div>

                    <div id="divoperacion">
                    <div class="item form-group">
                      <label for="numero_pedido" class="control-label col-md-3 col-sm-3 col-xs-12">Operación en la que se presenta la bonificación</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single02 form-control" name="operacion" id="operacion" onchange="tipocolaborador()">

                          <option value="">Seleccione</option>
                              <option value="Toda_el_area">Toda el área</option>
                              <option value="Almacenamiento">Almacenamiento</option>
                              <option value="Distribucion">Distribución</option>
                              <option value="Mensajeria">Mensajería</option>

                        </select>
                      </div>
                    </div>



                    </div>


                      <div id="colaborador">
                        <div class="item form-group">
                            <label for="colaborador" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del colaborador</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single03 form-control" name="colaborador" >

                                <option value="">Seleccione</option>
                                                       <?php
                                                         while($r=$query->fetch_array())
                                                           echo "<option  value='".$r["id"]."'>".$r["nombre"]."</option>"; 
                                                        ?>
                              </select>
                            </div>
                          </div>
                      </div>

                      <div id="responsable">
                        <div class="item form-group">
                            <label for="colaborador" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable de la operación</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single04 form-control" required='required' name="jefe_inmediato" id="jefe_inmediato"  >

                                <option value="">Seleccione</option>
                 <?php
                 while($r=$query3->fetch_array())
                   echo "<option  value='".$r["nombre"]."'>".$r["nombre"]."</option>"; 
                ?>
                              </select>
                            </div>
                          </div>
                      </div>

                      <div id="fecha">
                        <div class="item form-group">
                          <label for="fecha_suceso" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha del suceso</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

                         <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="xdisplay_inputx form-group has-feedback">
                              <input type="date" class="form-control has-feedback-left" required='required' name="fecha_suceso" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
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
                      <label for="razon" class="control-label col-md-3 col-sm-3 col-xs-12">Razón de la bonificación</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="razon"></textarea>
                          </div>
                    </div>

                    <div class="item form-group">
                      <label for="observaciones" class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="observaciones"></textarea>
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

                            <!-- Bonificacion -->
                      </div>


<!-- ***********------------*************** -->


                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <!-- Falla -->
                                             <!-- formulario de actualizacion de clientes -->

                  <form id="falla" data-parsley-validate novalidate class="form-horizontal form-label-left"  method="POST" action="php/e_registro_falla.php">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="falla_fecha">Fecha 
                      </label>
                      <div class="col-md-5 col-xs-12">
                        <input type="text" id="falla_fecha" name="falla_fecha" required="required" value="<?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <label class="control-label col-md-1 col-xs-12" for="falla_ip">IP
                      </label>
                      <div class="col-md-5 col-xs-12">
                        <input type="text" id="falla_ip" name="falla_ip" required="required" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" readonly="readonly" class="form-control col-md-3 col-xs-12 has-feedback-left">
                        <span class="fa fa-cloud form-control-feedback left" aria-hidden="true"></span>
                      </div>

                   </div>

                   <div class="item form-group">
                      <label for="falla_tipo_bonificacion" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de falla</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" required='required' name="falla_tipo_bonificacion" onchange="falla_tipobonificacion()" id="falla_tipo_bonificacion">

                          <option value="">Seleccione</option>
                              <option value="Comunal">Comunal</option>
                              <option value="Individual">Individual</option>
                        </select>
                      </div>
                    </div>


                     <div id="falla_divoperacion">
                    <div class="item form-group">
                      <label for="falla_operacion" class="control-label col-md-3 col-sm-3 col-xs-12">Operación en la que se presenta la bonificación</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single06 form-control" name="falla_operacion" id="falla_operacion" onchange="falla_tipocolaborador()">

                          <option value="">Seleccione</option>
                              <option value="Toda_el_area">Toda el área</option>
                              <option value="Almacenamiento">Almacenamiento</option>
                              <option value="Distribucion">Distribución</option>
                              <option value="Mensajeria">Mensajería</option>

                        </select>
                      </div>
                    </div>
                    </div>


                      <div id="falla_colaborador">
                        <div class="item form-group">
                            <label for="falla_colaborador" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del colaborador</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single07 form-control" name="falla_colaborador" >

                                <option value="">Seleccione</option>
                                                       <?php
                                                         while($s=$query2->fetch_array())
                                                           echo "<option  value='".$s["id"]."'>".$s["nombre"]."</option>"; 
                                                        ?>
                              </select>
                            </div>
                          </div>
                      </div>

                      <div id="falla_responsable">
                        <div class="item form-group">
                            <label for="falla_jefe_inmediato" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable de la operación</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single08 form-control" required='required' name="falla_jefe_inmediato" id="falla_jefe_inmediato"  >

                                <option value="">Seleccione</option>
                 <?php
                 while($r=$query4->fetch_array())
                   echo "<option  value='".$r["nombre"]."'>".$r["nombre"]."</option>"; 
                ?>
                              </select>
                            </div>
                          </div>
                      </div>


                      <div id="falla_fecha">
                        <div class="item form-group">
                          <label for="falla_fecha_suceso" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha del suceso</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >

                         <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="xdisplay_inputx form-group has-feedback">
                              <input type="date" class="form-control has-feedback-left" required='required' name="falla_fecha_suceso" id="single_cal1" placeholder="Seleccione la fecha" aria-describedby="inputSuccess2Status">
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
                      <label for="tipo_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de falla</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="tipo_falla" id="tipo_falla" required='required' onchange="fallas()">

                          <option value="">Seleccione</option>
                              <option value="Gestión">Gestión</option>
                              <option value="Seguridad">Seguridad</option>
                              <option value="Accidente">Accidente</option>
                              <option value="Quejas_Clientes">Quejas Clientes</option>


                        </select>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12"></div>
                    </div>
          
                   <div class="item form-group">
                                                  <!-- Tipos de falla -->
                                                  <div class="clearfix"></div>

                        <div class="row">
                          
                            <div id="falla01">
                            <label for="tipo_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Gestión:</label>
                              <div class="col-md-9">Son ejemplos de fallas de gestión: alistamiento errado, avería del producto, faltantes en bodega, gestión de las órdenes de alistamiento, pedidos retrasados, recepción errada de compras, reprocesamientos, entre otras.</div>
                              
                            </div>
                            <div class="clearfix"></div>

                            <div id="falla02">
                              <label for="tipo_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Seguridad:</label>
                              <div class="col-md-9">Son ejemplos de fallas de seguridad: comportamiento irresponsable, faltas en el uso de los Elementos de Protección Personal (EPP), entre otras.</div>
                            </div>
<div class="clearfix"></div>
                            <div id="falla03">
                            <label for="tipo_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Accidentes:</label>
                              <div class="col-md-9">Se deberán reportar todos los accidentes en los que nuestro personal se vea envuelto, sean o no ocasionados.</div>
                             
                            </div>
<div class="clearfix"></div>
                            <div id="falla04">
                            <label for="tipo_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Quejas clientes:</label>
                              <div class="col-md-9">Toda queja de un cliente es gravísima, deberán ser reportadas en su totalidad.</div>
                              
                            </div>
                            <div class="clearfix"></div>

                        </div>

                          <!-- Tipos de falla -->



                   </div>

                  

                    <div class="item form-group">
                      <label for="falla_razon" class="control-label col-md-3 col-sm-3 col-xs-12">Razón de la falla</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="falla_razon"></textarea>
                          </div>
                    </div>

                                        <div class="item form-group">
                      <label for="descripcion_falla" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción de la falla</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="descripcion_falla"></textarea>
                          </div>
                    </div>

                                                            <div class="item form-group">
                      <label for="consecuencias" class="control-label col-md-3 col-sm-3 col-xs-12">Consecuencias perceptibles</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" required="required" id="textarea" name="consecuencias"></textarea>
                          </div>
                    </div>

                    <div class="item form-group">
                      <label for="falla_observaciones" class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="col-xs-12" id="textarea" name="falla_observaciones"></textarea>
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


                          <!-- Falla -->

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>


           
        <div class="clearfix"></div>

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

   <!-- form validation -->
 <script src="js/parsley/parsleysatel.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <!-- PNotify -->
  <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
<!-- <script src="js/custom.js"></script> -->
          <script src="js/select/select2.full.js"></script>

    <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single01").select2({
        placeholder: "Seleccione el tipo de bonificación"
      });
      $(".select2_single02").select2({
        placeholder: "Seleccione la operación en la que se presenta la bonificación"
      });
      $(".select2_single03").select2({
        placeholder: "Seleccione el nombre del colaborador"
      });
     $(".select2_single04").select2({
        placeholder: "Seleccione el responsable de la operación"
      });
    });
  </script>

 





</body>

</html>
