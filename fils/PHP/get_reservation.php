<?php
$a = "";
$trans="";
while($row = $result->fetch_assoc()){
  if(!empty($row["transaction_id"])){
    $a = '<a href="PHP/successfully.php?id_reservation='.$row["id_reservation"].'" class="element paye" style="padding:5px;">Reçu</a>';
  }else{
    $condition='nonPaye';
    $a = '<a href="./reservation.php?prix='.$row["prix"].'&id_reservation='.$row["id_reservation"].'" class="element nonPaye" style="padding:5px;">Non paye</a>';
    $trans = "---";

  }

  $output .= '
  <tr>
    <td>'.$row["nom_agence"].'</td>
    <td>'.$row["date_sortie"].'</td>
    <td>'.$row["heure_sortie"].'</td>
    <td>'.$row["heure_retour"].'</td>
    <td>'.$row["prix"].'</td>
    <td>'.$trans.' '.$row["transaction_id"].'</td>
    <td>'.$row["état"].'</td>
    <td>'.$a.'</td>
  </tr>
';

}
?>
