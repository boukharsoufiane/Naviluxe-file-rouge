<?php
session_start(); 

require_once("db.php");

if(isset($_SESSION["id_client"])){
    $id_client = $_SESSION["id_client"];
}elseif(isset($_SESSION["id_agence"])){
    $id_agence = $_SESSION["id_agence"];
}

if (isset($_POST["deconnexion"])) {
    $sql = "UPDATE client SET status = 'Hors ligne' WHERE id_client = '$id_client'";
    $query = $con->query($sql);
    if($query){
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
   
}elseif(isset($_POST["deconnexion_agence"])){
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $sql = "UPDATE agence SET status = 'Hors ligne' WHERE id_agence = '$id_agence'";
    $query = $con->query($sql);
    if($query){
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
?>
