<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>
<?php
  include_once('class.conexion.php');
 header("Content-Type: text/html;charset=utf-8");
?>

<?php 
  if (isset($_REQUEST['areas'])) {

        //traer areas
            $areas = new Conexion;
            $sql01 = "SELECT DISTINCT(area) as areas FROM intranet_cargo";
            $rareas = $areas->query($sql01) or trigger_error($areas->error);
            $areas->close();
        //traer areas
            echo "<option value=''>Seleccione</option>";

            while ($r=$rareas->fetch_array()) {
              
                 echo "<option value='$r[areas]'>$r[areas]</option>";
                
                
            }

    }

      if (isset($_REQUEST['cargo'])) {

        $cargo = $_REQUEST['cargo'];
        //traer cargos
            $areas = new Conexion;
            $sql01 = "SELECT cargo FROM intranet_cargo WHERE area like '$cargo%'";
            $rareas = $areas->query($sql01) or trigger_error($areas->error);
            $areas->close();
        //traer cargos
            echo "<option value=''>Seleccione</option>";

            while ($r=$rareas->fetch_array()) {
              
                 echo "<option value='$r[cargo]'>$r[cargo]</option>";
                
                
            }

    }
    //Para traer en la edicion area

    if (isset($_REQUEST['user_id_area'])) {
        $user_id = $_REQUEST['user_id_area'];
        //traer areas del usuario
            $uareas = new Conexion;
            $sql01 = "SELECT area FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
            $ruareas = $uareas->query($sql01) or trigger_error($uareas->error);
            $uareas->close();
        //traer areas del usuario
          while ($r=$ruareas->fetch_array()) {
              
                 echo "<option value='$r[area]' selected='selected'>$r[area]</option>";
                
                
            }

         //traer areas
            $areas = new Conexion;
            $sql01 = "SELECT DISTINCT(area) as areas FROM intranet_cargo";
            $rareas = $areas->query($sql01) or trigger_error($areas->error);
            $areas->close();
        //traer areas

            while ($r=$rareas->fetch_array()) {
              
                 echo "<option value='$r[areas]'>$r[areas]</option>";
                
                
            }

    }
    //Para traer en la edicion area

        //Para traer en la edicion cargo
    
    if (isset($_REQUEST['user_id_cargo'])) {
        $user_id = $_REQUEST['user_id_cargo'];
        //traer areas del usuario
            $uareas = new Conexion;
            $sql01 = "SELECT cargo FROM intranet_usuarios_sociodemografico WHERE user_id = \"$user_id\"";
            $ruareas = $uareas->query($sql01) or trigger_error($uareas->error);
            $uareas->close();
        //traer areas del usuario
          while ($r=$ruareas->fetch_array()) {
              
                 echo "<option value='$r[cargo]' selected='selected'>$r[cargo]</option>";
                
                
            }


    }
    //Para traer en la edicion cargo

?>