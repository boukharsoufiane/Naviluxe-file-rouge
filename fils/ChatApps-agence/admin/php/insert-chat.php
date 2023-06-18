<?php 
    session_start();
    if(isset($_SESSION['id_agence'])){
        include_once "config.php";
        $id_agence = $_SESSION['id_agence'];
        $id_admin = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (id_client, id_agence, id_admin, msg, sence)
                                        VALUES (NULL, {$id_agence}, {$id_admin},'{$message}','agence to admin')") or die();
        }
    }


    
?>