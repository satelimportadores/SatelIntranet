
<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
include_once('php/class.conexion.php');
include('php/e_impuestos_tareas_insertar.php');
$con = new conexion;
$x=0;
$query = "SELECT * from intranet_impuestos";
$result = $con->query($query) or trigger_error($con->error);


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

  <title>Indicador de rendimiento contabilidad</title>

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
 <script type="text/javascript" src="js/impuestos_tareas.js"></script>

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
              <h3>Contabilidad</h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:auto;">
                <div class="x_title">
                  <h2>Calendario tributario:</h2>
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
                
                <!-- contenido -->


  

<!-- tabla nueva -->

  <?php 
  while ($row = $result->fetch_array()){
        $query2 = "SELECT * from intranet_registros_imp INNER JOIN intranet_tareas on intranet_registros_imp.tarea=intranet_tareas.id where impuesto = ".$row['id'];
        $result2 = $con->query($query2) or trigger_error($con->error);
        $total = 0;
        $exist = $result2->num_rows;
    if($exist>0){
?>


  <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $row['impuesto']." - ".$row['fecha_limite']; ?></h2>
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

                  <table class="table">
                    <thead>
                      <tr>
                          <th>Responsable</th>
                          <th>Tarea</th>
                          <th>Fecha</th>
                          <th>Adjuntos</th>
                          <th>Comentarios</th>
                          <th>%</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php 
  while ($row2 = $result2->fetch_array()){
    if ($row2['tipo']==1) {
      ?>
      <tr>
      <td><?php echo $row2['user_resp'] ;?></td>
      <td><a data-toggle="modal" data-target="#myModal<?php echo $row2[0];?>"><?php echo $row2['nomtarea']; ?> <i class="fa fa-send blue"></i></a></td>
      <td><?php echo $row2['fecha_est'] ;?></td>
      <td align="center"><button class="btn btn-info" data-toggle="modal" id="adjuntos<?php echo $row2['0'];?>" value="<?php echo $row2[0];?>" data-target="#adjunto<?php echo $row2[0];?>" ><i class="fa fa-file"></i></button></td>
      <td align="center"><a data-toggle="modal" data-target="#coment<?php echo $row2[0];?>">ver <i class="fa fa-search-plus blue"></i></a></td>
      <td><?php echo $row2['porcentaje']*100 ;?></td>
    </tr>

<!-- Modal -->
<div class="modal fade" id="coment<?php echo $row2[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comentario</h4>
      </div>
      <div class="modal-body">
    
       <p style="word-wrap: break-word;"><?php echo $row2['comentario']; ?></p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="adjunto<?php echo $row2[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adjuntos</h4>
      </div>
      <div class="modal-body">
      <div id="respuesta<?php echo $row2['0'];?>"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal<?php echo $row2[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $row2['nomtarea'];?></h4>
      </div>
      <form enctype="multipart/form-data" method="POST">
      <div class="modal-body">
     
       <input type="text" name="id" value="<?php echo $row2['0'];?>" hidden> 
       <input type="text" name="imp" value="<?php echo $row['id'];?>" hidden> 
       <input type="text" name="nomtarea" value="<?php echo $row2['nomtarea'];?>" hidden> 
       <input type="text" name="nomimpuesto" value="<?php echo $row['impuesto'];?>" hidden> 

      <label>Comentarios</label><br>
      
      <br>
      <?php 
      if ($row2['porcentaje'] != 0) {
         ?>
         <textarea name="comentario" id="comentario" disabled cols="50" rows="5"></textarea><br><br>
         <input name="image[]" required="" disabled type="file" multiple /><br>
         <input type="checkbox" checked disabled  value="1"> Tarea realizada<br>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="Upload" disabled value="Guardar">
      </div>
         <?php 
       }else{ ?>
      <textarea name="comentario" id="comentario" cols="50" rows="5"></textarea><br><br>
      <input name="image[]" required="" type="file" multiple /><br>
      <input type="checkbox" name="check" value="1"> Tarea realizada<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="Upload" value="Guardar">
      </div>
          <?php 
          } ?>
      </form>
    </div>
  </div>
</div>


 <?php
 }else{
?>

      <tr>
      <td><?php echo $row2['user_resp'] ?></td>
      <td><a data-toggle="modal" data-target="#myModal<?php echo $row2[0]?>"><?php echo $row2['nomtarea'] ?> <i class="fa fa-send blue"></i></a></td>
      <td><?php echo $row2['fecha_est'] ?></td>
      <td colspan="2" align="center"><a data-toggle="modal" data-target="#coment<?php echo $row2[0]?>">ver comentario <i class="fa fa-search-plus blue"></i></a></td>
      <td><?php echo $row2['porcentaje']*100 ?></td>

    </tr>
<div class="modal fade" id="coment<?php echo $row2[0]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comentario</h4>
      </div>
      <div class="modal-body">
    
       <p style="word-wrap: break-word;"><?php echo $row2['comentario'] ?></p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row2[0]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $row2['nomtarea'] ?></h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      <input type="text" name="id" value="<?php echo $row2['0'];?>" hidden>   
      <label>Comentarios</label><br>
      <textarea name="comentario" id="comentario" cols="50" rows="5"></textarea><br><br>
      <?php 
      if ($row2['porcentaje'] != 0) {
         ?>
         <input type="checkbox" checked disabled  value="1"> Tarea realizada<br>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" disabled name="revisar" value="Guardar">
      </div>
         <?php 
       }else{ ?>
      <input type="checkbox" name="check" value="1"> Tarea realizada<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="revisar" value="Guardar">
      </div>
          <?php 
          } ?>
      
      </form>
    </div>
  </div>
</div>
<?php
 }
$total = ($row2['porcentaje']/$result2->num_rows)+$total;
}
  ?>
  <tr>
    <td colspan="4"></td>
    <td>TOTAL</td>
    <td><?php echo round($total*100, 2) ?></td>
  </tr>
 </table>
</div>
    </div>
  </div>
</div>
 
  <?php
  }
}
   ?>


<!-- tabla nueva fin -->

<!-- Botones de creacion y eliminacion-->


  <button data-toggle="modal" data-target="#myModalv1" class="btn btn-primary">Crear Nuevo Impuesto +</button>
  <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Agregar Impuesto +</button>
  <button data-toggle="modal" data-target="#myModalv2" class="btn btn-success">Agregar tarea +</button>
  <button id="btn" data-toggle="modal" data-target="#myModalv3" class="btn btn-warning">Eliminar tarea -</button>


<div class="modal fade" id="myModalv1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Impuesto</h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      <label>Nombre &nbsp;</label>
      <input type="text" name="nomimp" id="nomimp"><br>
      <label>Descripcion &nbsp;</label>
      <textarea name="descrip" id="descrip" cols="30" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="impuest" value="Guardar">
      </div>
      </form>
    </div>
  </div>
</div>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Impuesto</h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      <label>Nombre &nbsp;</label>
      <select name="impuest" id="impuest"></select><br>
      <label>Fecha Limite &nbsp;</label><input type="date" name="fechaimp">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="agregar" value="Guardar">
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="myModalv3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Tarea</h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      <select id="imp">
      <?php 
      $query4 = "SELECT * from intranet_impuestos";
      $result4 = $con->query($query4) or trigger_error($con->error);
      while ($row4 = $result4->fetch_array()) {
      ?>
      <option value="<?php echo $row4['id'];?>"><?php echo $row4['impuesto']; ?></option>
      <?php 
      }
       ?>  
       </select>
       <br><br>
      <div id="result"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="eliminar" value="Eliminar">
      </form>
      </div>
    </div>
  </div>
</div>



  <div class="modal fade" id="myModalv2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Tarea</h4>
      </div>
      <form method="POST">

      <div class="modal-body">
      <label>Impuesto &nbsp;</label><select name="impuesto" id="impuesto">
        <?php 
        $query5 = "SELECT * from intranet_impuestos";
        $result5 = $con->query($query5) or trigger_error($con->error);
        while ($row5 = $result5->fetch_array()){
       ?>
       <option value="<?php echo $row5['id']; ?>"><?php echo $row5['impuesto']; ?></option>
        <?php 
        }
       ?>
      </select><br>
      <label>Responsable &nbsp;</label><select name="responsable" id="responsable">
        <option value="SATEL">SATEL</option>
        <option value="Revisoria fiscal">Revisoria fiscal</option>
      </select><br>
      <label>Tarea &nbsp;</label><select name="tarea" id="tarea">
        <?php 
        $query6 = "SELECT * from intranet_tareas";
        $result6 = $con->query($query6) or trigger_error($con->error);
        while ($row6 = $result6->fetch_array()){
       ?>
       <option value="<?php echo $row6['id']; ?>"><?php echo $row6['nomtarea']; ?></option>
        <?php 
        }
       ?>
      </select><br>
        <label>Fecha Limite &nbsp;</label><input type="date" name="fecha">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="envio" value="Guardar">
      </form>
      </div>
    </div>
  </div>
</div>
      

                <!-- contenido -->

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
        placeholder: "Seleccione asesor comercial"
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

  <!-- <script src="js/custom.js"></script>-->

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>



</body>

</html>
