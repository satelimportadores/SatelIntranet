<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
?>
<?php  //$dia = date_format( new DateTime($s['fecha']), 'd/m/Y H:i:s' ); ?>

<?php
include_once('php/class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
 include_once('php/consultas_css.php');
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
       $sql01 = "SELECT * FROM intranet_actualizacion_clientes WHERE  cardcode = \"$cardcode\" AND activo = 'si'";
       $Rcliente = $cliente->query($sql01) or trigger_error($cliente->error);
       $r=$Rcliente->fetch_array();
       $cliente->close();

       if ($r["cardname"] == '') {
         print "<script>alert(\"No existen registros\");window.location='contacts.php';</script>";
       }
 
    //traer cliente

      //traer comentarios
       
       $cliente_comen = new Conexion;
       $sql02 = "SELECT * FROM intranet_actualizacion_clientes_comentarios WHERE  cardcode = \"$cardcode\" ORDER BY fecha DESC";
       $Rcliente_comen = $cliente_comen->query($sql02) or trigger_error($cliente_comen->error);
       $Ccliente_comen = $cliente_comen->affected_rows;
       $cliente_comen->close();
 
    //traer comentarios

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

  <title>Perfil de cliente</title>

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
              <h3>Perfil Empresa</h3>
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
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $r["cardname"];?> <small>reporte de actividad</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        


                          <?php 
                                if ($Ccliente_comen <= 5) {
                                echo "<div class='avatar-view' title='¿Por qué no me llamas?'>"; 
                                echo "<img src='images/Caritas01.png' alt='¿Por qué no me llamas?'>";
                                }
                                if ($Ccliente_comen >= 6 && $Ccliente_comen < 10 ) {
                                echo "<div class='avatar-view' title='No sé que pensar'>"; 
                                echo "<img src='images/Caritas02.png' alt='No sé que pensar'>"; 
                                }
                                 if ($Ccliente_comen >= 10) {
                                echo "<div class='avatar-view' title='¡Gracias por tu atención!'>"; 
                                echo "<img src='images/Caritas03.png' alt='¡Gracias por tu atención!'>";
                                }                               


                           ?>




                          
                        </div>

                        <!-- Cropping modal -->
                        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                <div class="modal-header">
                                  <button class="close" data-dismiss="modal" type="button">&times;</button>
                                  <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="avatar-body">

                                    <!-- Upload image and data -->
                                    <div class="avatar-upload">
                                      <input class="avatar-src" name="avatar_src" type="hidden">
                                      <input class="avatar-data" name="avatar_data" type="hidden">
                                      <label for="avatarInput">Local upload</label>
                                      <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                    </div>

                                    <!-- Crop and preview -->
                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                      </div>
                                    </div>

                                    <div class="row avatar-btns">
                                      <div class="col-md-9">
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                        </div>
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="modal-footer">
                                                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                </div> -->
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    <h3><?php $cardname = $r["cardname"]; echo $r["cardname"];?></h3>

                    <ul class="list-unstyled user_data">

                       <li>
                        <i class="fa fa-briefcase user-profile-icon"></i><?php echo $r["sector"];?>
                      </li>

                      <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $r["ciudad_new"];?>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-at user-profile-icon"></i>
                        <a href="#" target="_blank"><?php echo $r["email_new"];?></a>
                      </li>
                      
                      <li class="m-top-xs">
                        <i class="fa fa-phone-square user-profile-icon"></i>
                        <a href="#" target="_blank"><?php echo $r["telefono"];?></a>
                      </li>

                                            <li class="m-top-xs">
                        <i class="fa fa-male user-profile-icon"></i>
                        <a href="#" target="_blank"><?php echo $r["persona_contacto"];?></a>
                      </li>

                    </ul>

                    <!-- <a href="editar.php?cardcode=<?php echo $r["cardcode"];?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar</a> -->
                    <br />



                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Llamadas realizadas durante el año:</h2>
                      </div>
  
                <div class="col-md-6">
                  <div  class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    
                    <strong><?php date_default_timezone_set('America/Bogota');echo date("Y-m-d H:i:s");?></strong>
                  </div>
                </div>


                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active col-lg-2 col-xs-12"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Comentarios</a>
                        </li>
                        <li role="presentation" class="col-lg-2 col-xs-12" ><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Agregar comentario</a>
                        </li>
                        <li role="presentation" class="col-lg-2 col-xs-12"><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Pedidos</a>
                        </li>
                        <li role="presentation" class="col-lg-2 col-xs-12"><a href="#tab_content6" role="tab" id="profile-tab6" data-toggle="tab" aria-expanded="false">Agregar Pedidos</a>
                        </li>
                        <li role="presentation" class="col-lg-2 col-xs-12"><a href="#tab_content4" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Contactos</a>
                        </li>
                        <li role="presentation" class="col-lg-2 col-xs-12" style="width: 77px;"><a href="#tab_content5" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false" style="width: 77px;">Agregar Contactos</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">

<div class="clearfix"></div>
<hr>

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
<div class="clearfix"></div>
                          <!-- start recent activity -->
                          <ul class="messages">


                               <?php 

                                      while ($s=$Rcliente_comen->fetch_array()) {

                                        $dia = date_format( new DateTime($s['fecha']), 'd' );
                                        $mes = date_format( new DateTime($s['fecha']), 'M' );
                                        echo "<li>";
                                        echo "<img src='images/img.jpg' class='avatar' alt='Avatar'>";
                                        echo "<div class='message_date'>";
                                        echo "<h3 class='date text-info'>$dia</h3>";
                                        echo "<p class='month'>$mes</p>";
                                        echo "</div>";
                                        echo "<div class='message_wrapper'>";

                                                //traer usuario que creo comentario
                                                   $nuser = $s['user_id'];
                                                   $usuario = new Conexion;
                                                   $sql03 = "SELECT CONCAT(nombre,' ',apellido)as nombre FROM intranet_usuarios WHERE id =  \"$nuser\"";
                                                   $Rusuario = $usuario->query($sql03) or trigger_error($usuario->error);
                                                   $t=$Rusuario->fetch_array();
                                                   $usuario->close();
                                                //traer usuario que creo comentario  


                                        echo "<h4 class='heading'>$t[nombre] -> $s[destinatario]</h4>";

                                        echo "<blockquote class='message'>$s[comentarios]</blockquote>";
                                        echo "<br />";

                                            if ($s['n_adjunto'] <> '') {
                                              echo "<small>Datos adjuntos: </small><a target='_blank' href='uploads/$s[n_adjunto]'>$s[n_adjunto]</a>";
                                            }

                                        echo "</div>";
                                        echo "</li>";
                                        
                                      }


                                ?>   


                              <a href=""></a>

                          </ul>
                          <!-- end recent activity -->


                        </div>
                        <div class="clearfix"></div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- stsegunda Pestaña -->
                            <!-- start form for validation -->

                     <form id="demo-form2" novalidate  data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="php/e_comentario.php">

                      <div class="item form-group">
                      <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea class="col-xs-12" required="required" data-parsley-minlength='75' id="textarea" name="comentarios"></textarea>
                          </div>
                    </div>
                    <?php 
                                                //traer contactos
                                                   $contactos = new Conexion;
                                                   $sql04 = "SELECT * FROM intranet_contactos WHERE cardcode =  \"$cardcode\" ORDER BY nombre ASC";
                                                   $Rcontactos = $contactos->query($sql04) or trigger_error($contactos->error);
                                                   $Ncontactos = $contactos->affected_rows;
                                                   $contactos->close();
                                                //traer contactos  
                                                   if ($Ncontactos > 0) {
                                                    echo "<div class='form-group'>";
                                                    echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'>Contacto</label>";
                                                    echo "<div class='col-md-9 col-sm-9 col-xs-12'>";
                                                    echo "<select class='form-control' required='' name='destinatario'>";
                                                    echo "<option value=''>Selecciona un contacto</option>";
                                                   while ($s=$Rcontactos->fetch_array()) {
                                                      echo "<option value='$s[nombre] $s[apellido]'>$s[nombre] $s[apellido]</option>";
                                                   }
                                                    echo "</select>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                   }





                     ?>

                      <div class="item form-group">
                       <div class="col-md-12 col-md-offset-3">
                          <label for="file">Archivos adjuntos:</label>
                          <input placeholder="selecciona tu archivo" name="file[]" id="file" type="file"  multiple accept="image/jpeg,image/png,application/pdf">
                          <span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-xs-offset-3">
                      <input type="hidden" name="cardcode" value="<?php echo $cardcode; ?>">
                      <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                        </div></form>

                            <!-- end form for validations -->

                            <!-- segunda Pestaña -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                         <!-- pestaña Profile -->

                                         <?php 
$Npedidos = '0';

    //traer pedidos del usuario
  $pedido = new Conexion;
  $sql01 = "SELECT fecha,cliente,numero_pedido,encargado_alistamiento,encargado_revision,observaciones,user_id FROM intranet_registro_pedido WHERE cod_cliente = \"$cardcode\" ORDER BY fecha DESC LIMIT 5";
  $Pedidos = $pedido->query($sql01) or trigger_error($pedido->error);
  $Npedidos = $pedido->affected_rows;
  $pedido->close();
//traer pedidos del usuario

?>

                <div class="table-responsive">
                  
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Cliente</th>
                        <th class="column-title"># pedido</th>
                        <th class="column-title">Alistamiento</th>
                        <th class="column-title">Revisión</th>
                        <th class="column-title">Observaciones</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Pedidos seleccionados ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
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
                echo "<td class=' '>$r[numero_pedido]<i class='success fa fa-long-arrow-up'></i></td>";
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

                          <!-- pestaña Profile -->
                        </div>


<!-- tab content 6------------------------------------------------------------------------------------------------- -->

<div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">


 <!-- formulario de actualizacion de clientes -->

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" method="POST" action="php/e_pedido.php?cardcode=<?php echo $cardcode ?>">

                    <div class="form-group">

                      <label class="control-label col-md-1 col-xs-12" for="fecha">Fecha --
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
                        <input type="text" id="name" name="cardname" data-parsley-minlength="5" value="<?php echo $cardname; ?>" readonly placeholder="Satel Importadores / Pepito Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="cardcode">Código cliente
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="cardcode" placeholder="C123456789" pattern="[cC]+[0-9]{5,10}" value="<?php echo $cardcode; ?>" readonly required="required"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_pedido"># Pedido
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="numero_pedido" name="numero_pedido"  required="required" placeholder="1234" data-parsley-minlength="4" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <div id="MostrarTexto"></div>
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contacto">Nombre y apellido contacto:
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="contacto" data-parsley-minlength="5" value="" placeholder="Pepito Pérez" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_contacto">Teléfono del contacto:
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="telefono_contacto" name="telefono_contacto"  required="required" placeholder="3603299" data-parsley-minlength="7" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_pedido">Total del pedido<span class="red"> antes de IVA</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="total_pedido" name="total_pedido"  required="required" placeholder="1000000" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" class="form-control col-md-7 col-xs-12 has-feedback-left currency">
                        <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
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



<!-- end tab content 6----------------------------------------------------------------------------- -->



<!-- tab content 4------------------------------------------------------------------------------------------------- -->

<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                         <!-- pestaña Profile -->

                                         <?php 
$Npedidos = '0';

    //traer contactos
  $contactos = new Conexion;
  $sql01 = "SELECT * FROM intranet_contactos WHERE cardcode = \"$cardcode\" ORDER BY nombre ASC ";
  $Rcontactos = $contactos->query($sql01) or trigger_error($contactos->error);
  $Ncontactos = $contactos->affected_rows;
  $contactos->close();
//traer contactos

?>

              <div class="table-responsive">
                
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Apellido</th>
                        <th class="column-title">Ciudad</th>
                        <th class="column-title">Telefono</th>
                        <th class="column-title">E-mail</th>
                        <th class="column-title">Obra</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Pedidos seleccionados ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>



<?php

if ($Ncontactos >= '1') {
        //imprimir los registros

            while ($r=$Rcontactos->fetch_array()) {
                echo "<tr class='even pointer'>";
                echo "<td class='a-center '>";
                echo "<input type='checkbox' class='flat' name='table_records'>";
                echo "</td>";
                echo "<td class=' '>$r[nombre]</td>";
                echo "<td class=' '>$r[apellido]</td>";
                echo "<td class=' '>$r[ciudad]</td>";
                echo "<td class=' '>$r[telefono]</td>";
                echo "<td class=' '>$r[email]</td>";
                echo "<td class='a-right a-right '>$r[obra]</td>";
                echo "</td>";
                echo "</tr>";
            }


      //imprimir los registros
}



 ?>


                    </tbody>

                  </table>

              </div>

                          <!-- pestaña Profile -->
                        </div>



<!-- end tab content 4----------------------------------------------------------------------------- -->

<!-- tab content 5------------------------------------------------------------------------------------------------- -->

<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">


 <!-- formulario de actualizacion de clientes -->

                  <form id="demo-form2" data-parsley-validate novalidate class="form-horizontal form-label-left" method="POST" action="php/e_contacto.php?cardcode=<?php echo $cardcode ?>">

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
                        <input type="text" id="nombre" name="nombre" placeholder="Pepito" data-parsley-minlength="4" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="apellido" name="apellido" placeholder="Pérez" data-parsley-minlength="5" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   </div>

                                      <div class="item form-group">
                      <label for="ciudad_new" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" required="" tabindex="-1" name="ciudad_new">
                          <option value="">Seleccione</option>
                          <option value="Bogotá">Bogotá</option>
                          <option value="Bucaramanga">Bucaramanga</option>
                          <option value="Cali">Cali</option>
                          <option value="Medellin">Medellín</option>
                        </select>
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
                        <input type="number" id="movil_new" name="movil_new"  placeholder="3115921575" required="required"  data-parsley-length="[10,10]" class="form-control col-md-7 col-xs-12 has-feedback-left">
                        <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obra">Obra
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="obra" name="obra" placeholder="CASTILLA"  class="form-control col-md-7 col-xs-12 has-feedback-left text-uppercase">
                        <span class="fa fa-university form-control-feedback left" aria-hidden="true"></span>
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



<!-- end tab content 5----------------------------------------------------------------------------- -->


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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


  


  <!-- chart js -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script src="js/chartjs/chart.min.js"></script>

  <!-- moris js -->
  <script src="js/moris/raphael-min.js"></script>
  <script src="js/moris/morris.min.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

   <!-- form validation -->
  <script src="js/parsley/parsleysatel.js"></script>
  <!-- input mask -->
  <script src="js/input_mask/satel.inputmask.js"></script>

  <!-- input_mask -->
  <script>
    $(document).ready(function() {
      $(":input").inputmask();
        //comprobar pedido
                      $('#numero_pedido').blur(function(){

              //$("#MostrarTexto").text('Has perdido el foco del text');
              var data = $('#numero_pedido').val();
              
            $.ajax({
              url: 'php/comprobar_pedidos.php',
              type: 'post',
              data: ('prueba='+data),
                success:function(respuesta){
                  if (respuesta == 1) {
                    $("#MostrarTexto").html("¡Ya existe un pedido con el número! = <span class='red'>"+data+'</span>'); 
                    $('#numero_pedido').focus();
                  }else{
                    $("#MostrarTexto").html("");
                  }
                }
            })


            });
        //comprobar pedido
    });
  </script>
  <!-- /input mask -->


<?php 

//traer la cantidad de llamadas realizadas este año

        //traer cliente
       $cardcode = $_REQUEST['cardcode'];
       $canvas01 = new Conexion;
       $acentos = $canvas01->query("SET lc_time_names = 'es_CO'");
       $sql01 = "SELECT Date_format(fecha,'%M') as mes,COUNT(id) as cant  FROM intranet_actualizacion_clientes_comentarios WHERE cardcode = \"$cardcode\" AND DATE_FORMAT(fecha,'%Y') = DATE_FORMAT(NOW(),'%Y') GROUP BY mes ORDER BY mes DESC";

       $Rcanvas01 = $canvas01->query($sql01) or trigger_error($canvas01->error);
       $canvas01->close();
 
    //traer cliente

//traer la cantidad de llamadas realizadas este año

?>

  <script>
    $(function() {
      var day_data = [
      <?php 
          while ($r=$Rcanvas01->fetch_array()) {
            $canvas01mes = $r['mes'];
            $canvas01cant = $r['cant'];

            echo '{'.'"period"'.':'.'"'.$canvas01mes.'"'.','.'"Hours worked"'.':'.$canvas01cant.'}'.',';
          }


       ?>
];
      Morris.Bar({
        element: 'graph_bar',
        data: day_data,
        xkey: 'period',
        hideHover: 'auto',
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        ykeys: ['Hours worked', 'sorned'],
        labels: ['Llamadas realizadas', ''],
        xLabelAngle: 60
      });
    });
  </script>
  


</body>

</html>
