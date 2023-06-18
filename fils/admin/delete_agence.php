<?php

require_once("../PHP/db.php");

class supprimer_agence{
    private $id_agence;

    public function __construct($id_agence){
        $this->id_agence = $id_agence;
    }

    public function delete_agence($con){
        $id_agence = $this->id_agence;
        $sql = "DELETE FROM agence WHERE id_agence ='$id_agence'";
        $query = $con->query($sql);
        return $query;
    }
}


if ($_POST["id_agence"]) {
    $id_agence = $_POST["id_agence"];
    $agence = new supprimer_agence($id_agence);
    $result = $agence->delete_agence($con);
    if($result){
        header("Location:index.php?delete=true");
        exit();
    }
      
}




?>
