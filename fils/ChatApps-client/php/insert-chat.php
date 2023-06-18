<?php 
    session_start();
    if(isset($_SESSION['id_client'])){
        include_once "config.php";
        $id_client = $_SESSION['id_client'];
        $id_agence = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (id_client, id_agence, id_admin, msg, sence)
                                        VALUES ({$id_client}, {$id_agence}, NULL,'{$message}','client to agence')") or die();
        }
    }


    
?>