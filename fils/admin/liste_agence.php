<?php
 while($row = $resulte->fetch_assoc()){
    $liste .= '
      <tr>
        <td>'.$row["nom_agence"].'</td>
        <td>'.$row["nom_gerant"].'</td>
        <td>'.$row["locale"].'</td>
        <td>'.$row["ville"].'</td>
        <td>
        <a href="" class="btn btn-danger" onclick="openModal(event, '.$row["id_agence"].')">
           Supprimer
        </a>
      
        </td>
      </tr>
    ';
}
