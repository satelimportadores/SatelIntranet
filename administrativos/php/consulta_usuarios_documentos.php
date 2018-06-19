
<?php
  include_once('class.conexion.php');
  if (isset($_REQUEST['user_id'])) {
            $user_id = $_REQUEST['user_id'];
        //traer cargos
            $documentos = new Conexion;
            $sql01 = "SELECT *  FROM intranet_usuarios_documentos WHERE user_id = $user_id";
            $rdocumentos = $documentos->query($sql01) or trigger_error($documentos->error);
            $documentos->close();
        //traer cargos


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
                
                
            }

    }
?>