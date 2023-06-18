<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $sql = "SELECT * FROM agence WHERE (nom_agence LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'Aucun utilisateur trouvé lié à votre terme de recherch';
    }
    echo $output;
?>