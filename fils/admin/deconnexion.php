<?php
require_once("../PHP/db.php");
session_start(); 

if (isset($_POST["deconnexion"])) {
    $sql_status = "UPDATE admin SET status ='Hors ligne' WHERE id_admin ='0'";
    if(mysqli_query($con,$sql_status)){
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
   
}
?>
