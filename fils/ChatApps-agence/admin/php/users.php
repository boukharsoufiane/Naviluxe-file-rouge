<?php
    session_start();

    if(isset($_SESSION['id_agence'])){
      $id_agence = $_SESSION['id_agence'];
    }
    include_once "config.php";
    $sql = "SELECT * FROM admin";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Aucun utilisateur n'est disponible pour discuter";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>