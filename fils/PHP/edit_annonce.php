<?php
session_start();
if(isset($_SESSION['id_agence'])){
    $id_agence = $_SESSION['id_agence'];
}
require_once("db.php");

if(isset($_POST["annonceEditer"])){
    $annonecTable = "";
    $sql = "SELECT * FROM bateau WHERE id_agence = '$id_agence'";
    $query = $con->query($sql);
    if($query->num_rows > 0){
        include_once("PHP/table_annonce.php");
    }
    
}
  
?>
