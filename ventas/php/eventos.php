<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";

}
?>


<?php
// liste des événements
 $user_id = $_SESSION["user_id"];
 $json = array();
 // requête qui récupère les événements
 $requete = "SELECT * FROM intranet_calendario WHERE user_id = \"$user_id\" ORDER BY id";
 
 
 // connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=satelimp_intranet', 'root','' );
 } catch(Exception $e) {
 exit('Impossible de se connecter à la base de données.');
 }
 // exécution de la requête
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 // envoi du résultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>