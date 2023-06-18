<?php
$formAnnonce .='<div class="container" id="div-info">
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
    <form action="PHP/ajouter_annonce.php"  method="POST" enctype="multipart/form-data">	
        <h1 id="title-info">Ajouter une annonce</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Description :</label>
                    <input style="width:100%;" type="text" name="description" class="form-control"  >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Numero du bateau : </label>
                    <input style="width:100%;" type="text" name="n_bateau" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Capacité du bateau :</label>
                    <input style="width:100%;" type="text" name="capacite" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Catégorie du bateau :</label>
                    <select class="form-control" name="categorie" >
                        <option value="">Choisir categorie</option>
                        <option value="Anniversaire">Anniversaire</option>
                        <option value="Marriage">Marriage</option>
                        <option value="Tour">Tour</option>
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Prix /30min :</label>
                    <input style="width:100%;"  type="text" name="prix" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="profile_details_text">Images du bateau :</label>
                    <input style="width:100%;" type="file" name="images[]" class="form-control" multiple>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                <div class="form-group">
                    <input type="submit" name="ajouter_annonce" id="btn-info" class="btn" value="Ajouter">
                </div>
            </div>
        </div>
    </form>
</div>
</div>';
  
?>