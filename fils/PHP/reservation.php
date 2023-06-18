<?php

session_start();
if(isset($_SESSION["id_client"])){
    $id_client = $_SESSION["id_client"];
}



$con = mysqli_connect('localhost', 'Root', '', 'file');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


class Reservation
{
    private $date_reservation;
    private $time_sortie;
    private $time_retour;
    private $id_client;
    private $id_bateau;
    private $prix;

    public function __construct($date_reservation, $time_sortie, $time_retour, $id_client, $id_bateau, $prix)
    {
        $this->date_reservation = $date_reservation;
        $this->time_sortie = $time_sortie;
        $this->time_retour = $time_retour;
        $this->id_client = $id_client;
        $this->id_bateau = $id_bateau;
        $this->prix = $prix;
    }

    public function insert_reservation($con)
    {
        $date_reservation = $con->real_escape_string($this->date_reservation);
        $time_sortie = $con->real_escape_string($this->time_sortie);
        $time_retour = $con->real_escape_string($this->time_retour);
        $id_client = $this->id_client;
        $id_bateau = $this->id_bateau;
        $prix = $this->prix;

        $sql = "INSERT INTO reservation (`id_client`, `date_sortie`, `heure_sortie`, `heure_retour`, `date_validation`, `état`, `id_bateau`, `prix` , `annulation`) VALUES ('$id_client', '$date_reservation', '$time_sortie', '$time_retour', NULL, 'En attend', '$id_bateau', '$prix','false')";
        $query = $con->query($sql);
        return $query;
    }
}

if (isset($_POST['time_sortie']) && isset($_POST['time_retour']) && isset($_POST['date'])) {
    if(!isset($_SESSION["id_client"])){
        header("Location: ./inscription.php");

    }
    $date = $_POST['date'];
    $api_key = 'b70b371dcc8a5674fea3bf43d535532d';
    $location = 'Tanger';
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$location&dt=$date&appid=$api_key";
    $weather_data = file_get_contents($url);
    $weather_json = json_decode($weather_data);

    if ($weather_json->cod === 200) {
        $conditions = $weather_json->weather[0]->description;
        if (strpos($conditions, 'rain') === false || strpos($conditions, 'snow') === false) {
            $time_sortie = $_POST['time_sortie'];
            $time_retour = $_POST['time_retour'];
            $id_client = $_SESSION["id_client"];
            $id_bateau = $_POST["id_bateau"];
            $prix = $_POST["prices"];
            $amount=$prix/2;

            $reservation = new Reservation($date, $time_sortie, $time_retour, $id_client, $id_bateau, $prix);
            $result = $reservation->insert_reservation($con);

            if ($result) {
                $id_reservation = mysqli_insert_id($con);
                header("Location: reservation.php?id_reservation=" . $id_reservation . "&amount=" . $amount . "&reservation=true");
                exit;            
            } else {
                echo "Error inserting data: " . mysqli_error($con);
            }
        } else {
            header("location:../reservation.php?msg=true");
            exit();
        }
    } else {
        echo "Error retrieving weather data: " . $weather_json->message;
    }
}







?>

