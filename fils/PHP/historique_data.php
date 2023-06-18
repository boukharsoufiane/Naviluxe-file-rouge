<?php
 while($row = $query->fetch_assoc()){
  $valider="";
  $annulerBtn = "";
  $retour = "";
  $terminer = "";
  $annuler = "";
  if($row["état"]=='En attend'){
    $valider = '<input type="submit" class="btn btn-primary" name="valider" value="Valider"/>';
    $annulerBtn = '<input type="submit" class="btn btn-danger" style="margin-left:5px;" name="annuler" value="Annuler"/>';
  }elseif($row["état"]=='En cours'){
    $retour = '<input type="submit" class="btn btn-success" style="margin-left:7px;" name="retour" value="Valider retour"/>';
  }elseif($row["état"]=='Terminer'){
    $terminer = '<p>Terminer</p>';
  }elseif($row["état"]=='Annuler'){
    $annuler = '<p>Annuler</p>';
  }
    $output .= '
      <tr>
        <td>'.$row["nom"].'</td>
        <td>'.$row["prénom"].'</td>
        <td>'.$row["date_sortie"].'</td>
        <td>'.$row["heure_sortie"].'</td>
        <td>'.$row["heure_retour"].'</td>
        <td>'.$row["prix"].'</td>
        <td><form action="PHP/valider_reservation.php" method ="POST" style="display:flex;"><input type="hidden" name="id_reservation" value="'.$row["id_reservation"].'"/>'.$valider.' '.$annulerBtn.' '.$retour.' '.$terminer.' '.$annuler.'</form></td>

      </tr> 
    ';
}
?>