<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include('php/class.conexion.php');
include('php/e_inventario_souvenires.php');
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

  <title>Inventario de souvenires Satel Importadores</title>

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
  <script type="text/javascript" src="js/inventario_souvenires.js"></script>

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
            <a href="index.php" class="site_title"><i class="fa fa-gears"></i> <span><?php echo $_SESSION["departamento"]; ?></span></a>
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
              <h3>
                    Inventario de Souvenires
                    <small>
                        
                    </small>
                </h3>
            </div>


            
          </div>
          <div class="clearfix"></div>


          <div class="row">

          
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><div class="col-md-12 col-xs-12 col-md-offset-5"><h1>Inventario</h1></div></div></div> 
<!-- usuarios -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <h2>Detalle:.
                   </strong><small>
                   </small></h2>
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

                    <div id="inventario">
                      
                        <form method="POST" class="form-horizontal form-label-left" novalidate data-parsley-validate>
                          
                  <div class="row">
                          
                        <div class="item form-group">
                                <label for="lista" class="control-label col-md-3 col-sm-3 col-xs-12">Referencia:</label>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="lista" id="lista" required class="form-control">
                                    <!-- Se carga por ajax por consulta_dotaciones.php?carga -->
                                      </select>
                                </div>
                        </div>

                        <div class="item form-group">

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad:</label> 
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" maxlength="4" size="4" required name="num" class="form-control">
                                  </div>

                        </div>

                      <div class="form-group" id="loading">
                                <div class="col-md-3 col-xs-6 control-label">
                                     <i class="fa fa-spinner fa-spin fa-2x fa-fw blue"></i>
                                </div>
                      </div>


                          <div class="item form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>

                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div id="tipos">
                                              <!-- Se carga por ajax  php/consulta_referencias_souvenir.php?ref -->
                                            </div>
                                  </div>
                          </div>


                          <div class="item form-group">
                                 <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="submit" name="enviar" value="+ Agregar" class="buttonNext btn btn-success">
                                      <input type="submit" name="restar" value="- Retirar" class="btn btn-danger">
                                      <input type="button" name="agregar" value="+ Agregar Nuevo" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
                                 </div>     
                          </div>
                          


                        </form> 



                  </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Nuevo producto</h4>
                              </div>
                              <form method="POST" class="form-horizontal form-label-left">
                              <div class="modal-body">

                              <div class="item form-group">

                                    <label for="lista" class="control-label col-md-3 col-sm-3 col-xs-12">Referencia:</label>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input required type="text"  name="ref" class="form-control">
                                    </div>

                               </div>

                               <div class="item form-group">

                                    <label for="lista" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input required type="text"  name="des" class="form-control">
                                    </div>
                                    
                               </div>

                              <div class="item form-group">

                                    <label for="lista" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad:</label>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input required type="number"  name="can" class="form-control">
                                    </div>
                                    
                               </div>

                               <div class="item form-group">

                                    <label for="lista" class="control-label col-md-3 col-sm-3 col-xs-12">Color:</label>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input required type="text"  name="color" class="form-control">
                                    </div>
                                    
                               </div>

                                 <div class="item form-group">
                                        <label for="estado" class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select name="estado" id="estado" class="form-control">
                                                      <option value="nuevo">Nuevo</option>
                                                      <option value="usado">Usado</option>
                                              </select>
                                        </div>
                                </div>                      
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-primary" name="envio" value="Guardar">
                                </form>
                              </div>
                            </div>
                          </div>

                    </div>                  

                </div>
              </div>
            </div>
<!-- Usuarios -->

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

  <script src="js/select/select2.full.js"></script>


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
