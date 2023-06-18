<?php 
    session_start();
   
    include_once "config.php";
    if(isset($_SESSION["id_agence"])){
        $id_agence = $_SESSION["id_agence"];
    }
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (id_client, id_agence, id_admin, msg, sence)
        VALUES ({$incoming_id}, {$id_agence}, NULL,'{$message}','agence to client')") or die();    
    }
   
?>