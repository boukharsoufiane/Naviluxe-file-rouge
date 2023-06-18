<?php
require_once("db.php");
session_start();
if(isset($_SESSION["id_agence"])){
    $id_agence = $_SESSION["id_agence"];
}
if(isset($_POST["commande"])){
    $output="";
    $sql = "SELECT nom,prénom,date_sortie,heure_sortie,heure_retour,prix,r.id_reservation,état FROM reservation r LEFT JOIN payments p ON r.id_reservation = p.id_reservation INNER JOIN client c ON r.id_client = c.id_client;";
    $query = $con->query($sql);
    if($query->num_rows > 0){
        include_once "historique_data.php";
    }else{
      $output = "Aucune reservation a fait";
    }

}elseif(isset($_POST["publication"])){
    $publication ="";
    include_once("form_publication.php");
}elseif(isset($_POST["informationAgence"])){
    $informationAgence ="";
    $sql = "SELECT * FROM agence WHERE id_agence ='$id_agence'";
    $query = $con->query($sql);
    if($query->num_rows > 0){
        include_once('form_information_agence.php');
    }
}
  
?>
