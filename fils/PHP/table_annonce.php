<?php
while($row = $query->fetch_assoc()){
    $annonecTable .= '
      <tr>
        <form action="" method="POST">
          <td>'.$row["description"].'"</td>
          <td>'.$row["capacité"].'</td>
          <td>'.$row["category"].'</td>
          
          <td>
            <input type="hidden" name="bateauID" value="'.$row["id_bateau"].'"/>
             <button type="submit" name="edit_bateau" class="btn btn-primary" >Voir plus</button>
          </td>
        </form>
      </tr>
    ';
}
?>
