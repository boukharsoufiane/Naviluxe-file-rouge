<?php

while($row = $query->fetch_assoc()){
    $informationAgence .=' <div class="container" id="div-info">
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
        <form action="PHP/editer_info_agence.php"  method="POST">	
            <h1 id="title-info">Editer les informations d\'agence</h1>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Nom agence :</label>
                        <input style="width:100%;" type="text" name="nom_agence" class="form-control" value="'.$row["nom_agence"].'"  >
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Nom de gerant : </label>
                        <input style="width:100%;" type="text" name="nom_gerant" class="form-control" value="'.$row["nom_gerant"].'" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Email :</label>
                        <input style="width:100%;" type="email" name="email_agence" class="form-control" value="'.$row["email_agence"].'" >
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Telephone :</label>
                        <input style="width:100%;" type="tel" name="n_tele" class="form-control" value="'.$row["n_tele"].'" pattern="0[5-8][0-9]{8}" maxlength="10" required >
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Identité carte :</label>
                        <input style="width:100%;" type="text" name="i_carte" class="form-control" value="'.$row["i_carte"].'" >
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Ville :</label>
                        <input style="width:100%;" type="text" name="ville" class="form-control" value="'.$row["ville"].'" >
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Locale :</label>
                        <input style="width:100%;" type="text" name="locale" class="form-control" value="'.$row["locale"].'" >
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Mot de passe :</label>
                        <input style="width:100%;" type="password" name="mtp" class="form-control" value="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="profile_details_text">Logo :</label>
                        <input style="width:100%;" type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                    <div class="form-group">
                        <input type="hidden" name="id_agence" id="btn-info" class="btn" value="'.$row["id_agence"].'">
                        <input type="submit" name="editer_info_agence" id="btn-info" class="btn" value="Editer">
                    </div>
                </div>
            </div>
        </form>
    </div>
 </div>';
}




?>