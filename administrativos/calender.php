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

  <title>Calendario Satel</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="css/calendar/fullcalendar.css" rel="stylesheet">
  <link href="css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">

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
                                    Calendario
                                    <small>
                                        Click para añadir eventos
                                    </small>
                                </h3>
            </div>


          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Calendario de eventos<small><i class="fa fa-square calendar-blue"><strong> Eventos</strong></i> <i class="fa fa-square calendar-green"><strong> Compras de pedidos </strong></i></small></h2>
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

                  <div id='calendar'></div>

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


      <!-- Start Calender modal -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Nueva entrada de calendario</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="antoform" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Titulo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary antosubmit">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Editar entrada de calendario</h4>
            </div>
            <div class="modal-body">

              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Titulo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2">
                    </div>
                  </div>


                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary antosubmit2">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

      <!-- End Calender modal -->
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

  <script src="js/nprogress.js"></script>
  
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <!-- <script src="js/custom.js"></script> -->

  <script src="js/moment/moment.min.js"></script>
  <script src="js/calendar/fullcalendar.js"></script>
  <script src="js/calendar/es.js"></script>
  
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
<script>

 $(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();

  var calendar = $('#calendar').fullCalendar({
   editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month'
   },
   lang: 'es',
   events: "php/eventos.php",
   
   // Convert the allDay from string to boolean
   eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
   },
   selectable: true,
   selectHelper: true,
   select: function(start, end, allDay) {

     var start1  = moment(start).format('YYYY-MM-DD H:mm:ss');
      var end1 = moment(end).format('YYYY-MM-DD H:mm:ss');

        $('#fc_create').click();
   //var title = prompt('Event Title:');
   $(".antosubmit").on("click", function() {
   var title = $("#title").val();

            categoryClass = $("#event_type").val();

   if (title) {
      var hora = moment().format('LTS');
      var start1  = moment(start).format('YYYY-MM-DD')+' '+hora;
      var end1 = moment(end).format('YYYY-MM-DD');
   $.ajax({
   url: 'php/eventos_add.php',
   data: 'title='+ title+'&start1='+ start1 +'&end1='+ end1 ,
   type: "POST",
   success: function(json) {
   alert('Registro añadido correctamente');
   }
   });
   calendar.fullCalendar('renderEvent',
   {
   title: title,
   start: start,
   end: end,
   allDay: allDay
   },
   true // make the event "stick"
   );
   }
   $('#title').val('');
   calendar.fullCalendar('unselect');
   $('.antoclose').click();
               return false;
          });
   },
   
   editable: true,
   eventDrop: function(event, delta) {

    start1  = moment(event.start.format()).format('YYYY-MM-DD H:mm:ss');
    end1  = moment(event.end.format()).format('YYYY-MM-DD H:mm:ss');
    
   $.ajax({
   url: 'php/eventos_edit.php',
   data: 'title='+ event.title +'&start1='+ start1 +'&end1='+ end1+'&id='+event.id  ,
   type: "POST",
   success: function(json) {
   alert('Registro actualizado correctamente');
   }
   });

   },

eventClick: function(event) {
var decision = confirm("Quiere realmente borrar este evento del calendario?"); 
if (decision) {
$.ajax({
type: "POST",
url: "php/eventos_delete.php",
data: "&id=" + event.id,
    success: function(json) {
     alert("Registro eliminado.");
    }
});
$('#calendar').fullCalendar('removeEvents', event.id);
}
}
   
  });
  
 });

</script>
</body>

</html>
