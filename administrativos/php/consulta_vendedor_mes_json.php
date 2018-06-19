<?php 


  include_once('class.conexion.php');

?>


<?php 

	//consulta vendedor mes

	if (isset($_REQUEST['fecha'])) {
		$fecha = $_REQUEST['fecha'];
        
		$sql = "select `ivm`.`fecha` AS `fecha`,`ivm`.`comercial` AS `comercial`,(select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`ivm`.`comercial` = `iu`.`id`)) AS `vendedor`,`ivm`.`vr` AS `vr`,`ivm`.`vm` AS `vm`,`ivm`.`gr` AS `gr`,`ivm`.`gm` AS `gm`,`ivm`.`lr` AS `lr`,`ivm`.`lm` AS `lm`,`ivm`.`ll_tarde` AS `ll_tarde`,`ivm`.`a_injusti` AS `a_injusti` from `intranet_vendedor_mes` `ivm` where (year(`ivm`.`fecha`) = year($fecha)) and (month(`ivm`.`fecha`) = month($fecha))   order by (select concat(`iu`.`nombre`,' ',`iu`.`apellido`) from `intranet_usuarios` `iu` where (`ivm`.`comercial` = `iu`.`id`))";
	}

	$vendedor = new conexion;
	$rvendedor = $vendedor->query($sql) or trigger_error($vendedor->error);
    $rvendedor2 = $vendedor->query($sql) or trigger_error($vendedor->error);
	$Nrvendedor = $rvendedor->num_rows;
    //echo $Nrvendedor;
    $array = array();
    $array2 = array();
    $i=0;
	//consulta vendedor mes
	
	if ($Nrvendedor>0) {

            while ($r=$rvendedor->fetch_array()) {
                 $array[$i]=$r['vendedor'];
                 $i++;
            }
            echo json_encode($array);
            echo'@';
            
		
			while ($r=$rvendedor2->fetch_array()) {

                $salto = '<br>';
                
                $CV = $r['vr'] / $r['vm'];
                $CV = round($CV,2);

                $A = $r['gr'] / $r['vr'];
                $A = round($A,2);

                $B = $r['gm'] / $r['vm'];
                $B = round($B,2);

                $CR = $A / $B;
                $CR = round($CR);

                $CL = $r['lr'] / $r['lm'];
                $CL = round($CL,2);

                $IM = $r['ll_tarde'] * 0.02;
                $IM = round($IM,2);

                $AU = $r['a_injusti'] * 0.1;
                $AU = round($AU,2);

                $subtotal =(($CV * 0.33)+($CR * 0.33)+($CL * 0.33));
                $subtotal = round($subtotal,2);

                
                $total = ($subtotal - $IM - $AU);
                echo $total;
                echo ',';

            }


            
            	}else{

		echo 'No existen registros de la fecha ',$fecha,'.';
	}


	

	

 ?>