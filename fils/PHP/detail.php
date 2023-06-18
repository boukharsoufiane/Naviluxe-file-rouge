<?php

session_start();

if(isset($_SESSION["id_agence"])){
    $id_agence = $_SESSION["id_agence"];
}

require_once("db.php");

if(isset($_POST["edit_bateau"])){
    $detail ="";
    $bateau = $_POST["bateauID"];
    $sql = "SELECT * FROM bateau WHERE id_bateau= '$bateau'";
    $query = $con->query($sql);
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $detail .='
            <div class="container" id="div-info">
   <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
       <form action="PHP/editer_bateau.php"  method="POST">	
           <h1 id="title-info">Editer les informations du bateau</h1>
           <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Description :</label>
                       <input  style="width:100%;" type="text" name="description" class="form-control" value="'.$row["description"].'"  >
                   </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Numero du bateau : </label>
                       <input  style="width:100%;" type="text" name="n_bateau" class="form-control" value="'.$row["n_bateau"].'" >
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Capacité	du bateau :</label>
                       <input  style="width:100%;" type="number" name="capacite" class="form-control" value="'.$row["capacité"].'" >
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Categorie du bateau :</label>
                       <select class="form-control" name="categorie" >
                        <option value="'.$row["category"].' selected>'.$row["category"].'</option>
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
                       <input  style="width:100%;" type="text" name="prix" class="form-control" value="'.$row["prix"].'" >
                   </div>
               </div>
           </div>
           
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                   <div class="form-group">
                       <input type="hidden" name="id_bateau" id="btn-info" class="btn" value="'.$row["id_bateau"].'">
                       <input type="submit" name="editer_bateau" id="btn-info" class="btn" value="Editer">
                   </div>
                   <div class="form-group">
                        <a href="./profile_agence.php?bateau='.$row["id_bateau"].'" class="btn btn-primary">Editer les images</a>     
                        
                    </div>
               </div>
           </div>
       </form>
   </div>
</div>
            ';
        }
    }

}
