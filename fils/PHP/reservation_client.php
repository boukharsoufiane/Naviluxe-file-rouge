<?php 
session_start();

if(isset($_SESSION["id_client"])){
    $id_client=$_SESSION["id_client"];
}
require_once("db.php");

class Reservation_client
{
    private $id_client;

    public function __construct($id_client)
    {
        $this->id_client = $id_client;
    }

    public function get_reservation($con)
    {
        $id_client = $con->real_escape_string($this->id_client);
        $sql = "SELECT r.id_reservation,date_sortie,heure_sortie,heure_retour,r.prix,transaction_id,nom_agence,état
        FROM reservation r
        LEFT JOIN payments p ON r.id_reservation = p.id_reservation
        INNER JOIN client c ON r.id_client = c.id_client
        INNER JOIN bateau b ON r.id_bateau = b.id_bateau
        INNER JOIN agence a ON b.id_agence = a.id_agence
        WHERE r.id_client = '$id_client'";
        $query = $con->query($sql);
        return $query;
    }
}

class Information_client
{
    private $id_client;

    public function __construct($id_client)
    {
        $this->id_client = $id_client;
    }

    public function get_information($con)
    {
        $id_client = $con->real_escape_string($this->id_client);
        $sql = "SELECT * FROM client WHERE id_client = '$id_client'";
        $query = $con->query($sql);
        return $query;
    }
}

if (isset($_POST["profile"])) {
    $reservation = new Reservation_client($id_client);
    $result = $reservation->get_reservation($con);
    $output="";
    if ($result->num_rows > 0) {
        include_once("get_reservation.php");
    }else{
        echo "Aucun réservation trouvée";
    }
   
    
}elseif(isset($_POST["info"])){

    $information = new Information_client($id_client);
    $result = $information->get_information($con);
    $info = "";
    if($result->num_rows > 0){
        require_once("information_client.php");
    }
}else{
    $information = new Information_client($id_client);
    $result = $information->get_information($con);
    $profile = "";
    if($result->num_rows > 0){
        require_once("profile.php");
    }
}








?>