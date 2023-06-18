<?php
session_start();

if(isset($_SESSION['id_agence'])){
    $id_agence = $_SESSION['id_agence'];
}
require_once("db.php");

if(isset($_POST["annonceAjouter"])){
    $formAnnonce = "";
    include_once("form_annonceTraitement.php");
}

  
?>