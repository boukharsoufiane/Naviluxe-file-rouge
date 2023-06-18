<?php
$output = '<h2 style="margin-top:3%;border-left:8px solid #fbe086;padding-left:5px;">Ajouter des agences</h2>
<div class="ajoute">
<form action="" enctype="multipart/form-data" method="POST">
  <div style="display:flex;justify-content:space-evenly;">
    <div class="form-group">
        <label for="name">Nom agence:</label>
        <input type="text" class="form-control" name="nom_agence">
    </div>
    <div class="form-group">
        <label for="dob">Nom gerant</label>
        <input type="text" class="form-control" name="nom_gerant">
    </div>
  </div>

  <div style="display:flex;justify-content:space-evenly;">
    <div class="form-group">
        <label for="email">Email agence:</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="address">Numero de telephone :</label>
        <input type="text" class="form-control" name="n_tele" pattern="0[5-8][0-9]{8}" maxlength="10">
    </div>   
  </div>

  <div style="display:flex;justify-content:space-evenly;">
    <div class="form-group">
        <label for="income">La carte nationale :</label>
        <input type="text" class="form-control" name="i_carte">
    </div>
    <div class="form-group">
        <label for="address">Numero de fiscale :</label>
        <input type="text" class="form-control" name="n_fiscale">
    </div>  
  </div>

  <div style="display:flex;justify-content:space-evenly;">
    <div class="form-group">
        <label for="address">Ville :</label>
        <input type="text" class="form-control" name="ville">
    </div>    
    <div class="form-group">
        <label for="address">Adress :</label>
        <input type="text" class="form-control" name="locale">
    </div>  
  </div>

  <div style="display:flex;justify-content:space-evenly;">
    <div class="form-group">
        <label for="address">Mot de passe :</label>
        <input type="password" class="form-control" name="mtp">
    </div> 
    <div class="form-group">
        <label for="address">Confirmer mot de passe :</label>
        <input type="password" class="form-control" name="mtp_confirmer">
    </div>  
    
  </div>
  <div>
        <div class="form-group">
            <label for="address">Logo :</label>
            <input type="file" id="file" class="form-control" name="logo">
        </div> 
  </div>
    <button type="reset" class="btn">Reset</button>
    <button type="submit" class="btn" style="float:right" name="ajouter_agence">Ajouter</button>
   </form>
</div>';

?>
