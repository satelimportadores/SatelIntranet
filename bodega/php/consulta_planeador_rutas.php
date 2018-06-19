<?php   
if (isset($_REQUEST['idpedido'])) {

      $postidpedido = $_REQUEST['idpedido'];

      if (isset($_REQUEST['check01'])) {
    

    $updatepedido = new Conexion;
    $sql = ("UPDATE intranet_registro_pedido SET entransito = '1' WHERE  id = $postidpedido");
    $Rupdatepedido = $updatepedido->query($sql) or trigger_error($updatepedido->error);
    unset($_REQUEST['idpedido']);
    unset($_REQUEST['check01']);
    unset($_REQUEST['check02']);
    unset($postidpedido);
    unset($Rupdatepedido);
    }

    //
      if (isset($_REQUEST['check02'])) {
    
    
    $updatepedido02 = new Conexion;
    $sql02 = ("UPDATE intranet_registro_pedido SET entregado = '1' WHERE  id = $postidpedido");
    $Rupdatepedido02 = $updatepedido02->query($sql02) or trigger_error($updatepedido02->error);
    echo $updatepedido02->store_result();
    unset($_REQUEST['idpedido']);
    unset($_REQUEST['check01']);
    unset($_REQUEST['check02']);
    unset($postidpedido);
    unset($Rupdatepedido02);
    
    
  }



}    
    

?>

<?php 
$Nguias = '0';
   //traer pedidos del usuario
  $guia = new Conexion;
  $sql02 = "SELECT * FROM intranet_registro_pedido WHERE zona <> 'TRANSPORTADORA' AND ( entransito IS NULL OR entregado IS NULL ) ORDER BY numero_pedido ASC";
  $guias = $guia->query($sql02) or trigger_error($guia->error);
  $Nguias = $guia->affected_rows;
  //echo $Nguias;
  //echo '</br>';
  $guia->close();
//traer pedidos del usuario

?>