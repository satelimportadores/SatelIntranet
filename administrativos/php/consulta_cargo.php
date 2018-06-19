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

        //traer cargos
            $areas = new Conexion;
            $sql01 = "SELECT DISTINCT(area) as areas FROM intranet_cargo";
            $rareas = $areas->query($sql01) or trigger_error($areas->error);
            $Nrareas = $areas->affected_rows;
            $areas->close();
        //traer cargos
            echo "<option value=''>Seleccione</option>";

            while ($r=$rareas->fetch_array()) {
              
                 echo "<option value='$r[areas]'>$r[areas]</option>";
                
                
            }

    }

      if (isset($_REQUEST['cargo'])) {

        $cargo = $_REQUEST['cargo'];
        //traer cargos
            $areas = new Conexion;
            $sql01 = "SELECT cargo FROM intranet_cargo WHERE area = '$cargo'";
            $rareas = $areas->query($sql01) or trigger_error($areas->error);
            $Nrareas = $areas->affected_rows;
            $areas->close();
        //traer cargos
            echo "<option value=''>Seleccione</option>";

            while ($r=$rareas->fetch_array()) {
              
                 echo "<option value='$r[cargo]'>$r[cargo]</option>";
                
                
            }

    }


?>