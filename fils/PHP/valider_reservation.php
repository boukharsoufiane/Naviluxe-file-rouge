<?php
require_once("db.php");

class Valider_reservation{
    private $id_reservation;

    public function __construct($id_reservation){
        $this->id_reservation = $id_reservation;
    }

    public function update_reservation($con){
        $id_reservation = $this->id_reservation;
        $sql = "UPDATE reservation SET date_validation = NOW() ,état= 'En cours' WHERE id_reservation ='$id_reservation'";
        $query = $con->query($sql);
        $query = $con->query($sql);
        return $query;
    }
}

class Retour_reservation{
    private $id_reservation;

    public function __construct($id_reservation){
        $this->id_reservation = $id_reservation;
    }

    public function retour_reservation($con){
        $id_reservation = $this->id_reservation;
        $sql = "UPDATE reservation SET état = 'Terminer' WHERE id_reservation ='$id_reservation'";
        $query = $con->query($sql);
        return $query;
    }
}


class Annuler_reservation{
    private $id_reservation;

    public function __construct($id_reservation){
        $this->id_reservation = $id_reservation;
    }

    public function annulation_reservation($con){
        $id_reservation = $this->id_reservation;
        $sql = "UPDATE reservation SET annulation = 'true' ,état ='Annuler' WHERE id_reservation ='$id_reservation'";
        $query = $con->query($sql);
        return $query;
    }
}


if(isset($_POST['valider'])){
    $id_reservation = $_POST['id_reservation'];
    $valider = new Valider_reservation($id_reservation);
    $result = $valider->update_reservation($con);
    if($result){
        header("Location:../profile_agence.php?open_valider=true");
        exit();
    }
}elseif(isset($_POST['retour'])){
    $id_reservation = $_POST['id_reservation'];
    $retour = new Retour_reservation($id_reservation);
    $result = $retour->retour_reservation($con);
    if($result){
        header("Location:../profile_agence.php?open_retour=true");
        exit();
    }
}elseif(isset($_POST['annuler'])){
    
    $id_reservation = $_POST['id_reservation'];
    $annuler = new Annuler_reservation($id_reservation);
    $result = $annuler->annulation_reservation($con);
    if($result){
        header("Location:../profile_agence.php?open_annuler=true");
        exit();
    }
}
