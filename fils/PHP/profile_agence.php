<?php

session_start();
if (isset($_SESSION["id_agence"])) {
    $id_agence = $_SESSION["id_agence"];
}

require_once("db.php");
$sql_reservation = "SELECT COUNT(*) FROM reservation WHERE id_bateau IN (SELECT id_bateau FROM bateau WHERE id_agence = '$id_agence')";
$query_reservation = mysqli_query($con,$sql_reservation);


$row = mysqli_fetch_assoc($query_reservation);
$countReservation = $row["COUNT(*)"];

$countReservationTerminer = "";
$countReservationAnnuler ="";

if($countReservation === "0"){
    $countReservationTerminer = "0";
    $countReservationAnnuler ="0";

}else{
    
    $sql_reservation_annuler = "SELECT COUNT(*) FROM reservation WHERE état = 'Annuler' AND id_bateau IN (SELECT id_bateau FROM bateau WHERE id_agence = '$id_agence')";
    $sql_reservation_terminer = "SELECT COUNT(*) FROM reservation WHERE état = 'Terminer' AND id_bateau IN (SELECT id_bateau FROM bateau WHERE id_agence = '$id_agence')";


    $query_reservation_annuler = mysqli_query($con,$sql_reservation_annuler);
    $row_reservation_annuler =  mysqli_fetch_assoc($query_reservation_annuler);
    $countReservationAnnuler = $row_reservation_annuler["COUNT(*)"];



    $query_reservation_terminer = mysqli_query($con,$sql_reservation_terminer);
    $row_terminer = mysqli_fetch_assoc($query_reservation_terminer);
    $countReservationTerminer = $row_terminer["COUNT(*)"];

}

$dashboard = '<canvas id="myChart" style="width:40%;height:30%;padding:5%"></canvas>';
if($countReservation > "0" && $countReservationTerminer > '0' && $countReservationAnnuler > '0'){
    $successRateAgence = ($countReservationTerminer / ($countReservation - $countReservationAnnuler)) * 100;
}else{
    $successRateAgence = '0';

}

?>

