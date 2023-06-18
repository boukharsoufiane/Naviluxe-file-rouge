<?php
while($row = $result->fetch_assoc()){
    $profile = ' <!-- Main -->
    <div class="main">
        <h1>Mes Informations</h1>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td class="column">Nom</td>
                            <td>:</td>
                            <td>'.$row["nom"].'</td>
                        </tr>
                        <tr>
                            <td class="column">Prénom</td>
                            <td>:</td>
                            <td>'.$row["prénom"].'</td>
                        </tr>
                        <tr>
                            <td class="column">Utilisateur</td>
                            <td>:</td>
                            <td>'.$row["username_client"].'</td>
                        </tr>
                        <tr>
                            <td class="column">Email</td>
                            <td>:</td>
                            <td>'.$row["email"].'</td>
                        </tr>
                        <tr>
                            <td class="column">Telephone</td>
                            <td>:</td>
                            <td>'.$row["n_tele"].'</td>
                        </tr>
                        <tr>
                            <td class="column">La carte nationale</td>
                            <td>:</td>
                            <td>'.$row["i_carte"].'</td>
                        </tr>
                    </tbody>
                </table>
                <div id="image">
                <img src="'.$row["image"].'" alt="profle" />
                
                </div>
            </div>
        </div>
    </div>';
}
  
?>
  
