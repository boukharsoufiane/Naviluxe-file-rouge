<?php
    session_start();
    include_once "config.php";
    if(isset($_SESSION["id_agence"])){
        $id_agence = $_SESSION["id_agence"];
    }
    
    $sql = "SELECT * FROM client WHERE id_client IN (SELECT id_client FROM messages WHERE id_agence = '$id_agence') ORDER BY id_client DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    $admin ="";
    if(mysqli_num_rows($query) == 0){
        $output .= "<p style='display:flex;justify-content:center;'>Aucun utilisateur n'est disponible pour discuter</p>";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>