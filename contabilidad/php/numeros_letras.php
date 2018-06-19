<?php 
include('NumberToLetterConverter.php');
$letras = new NumberToLetterConverter;

if(isset($_REQUEST['monto'])){
$monto = $_REQUEST['monto'];	
echo $letras->to_word($monto,'COP');
}

if(isset($_REQUEST['monto2'])){
$monto2 = $_REQUEST['monto2'];	
echo $letras->to_word($monto2,'COP');
}
?>

