<?php
while($row = $result->fetch_assoc()){
   $info = '<div class="container" id="div-info">
   <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
       <form action=""  method="POST">	
           <h1 id="title-info">Editer mes informations</h1>
           <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Nom :</label>
                       <input style="width:100%;" type="text" name="nom" class="form-control" value="'.$row["nom"].'"  >
                   </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Prenom : </label>
                       <input style="width:100%;" type="text" name="prenom" class="form-control" value="'.$row["prénom"].'" >
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Email :</label>
                       <input style="width:100%;" type="email" name="email" class="form-control" value="'.$row["email"].'" >
                   </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Nom utilisateur :</label>
                       <input style="width:100%;" type="text" name="utilisateur" class="form-control" value="'.$row["username_client"].'">
                       
                   </div>
               </div>
           </div>
          
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">La carte nationale :</label>
                       <input style="width:100%;" type="text" name="id_carte" class="form-control" value="'.$row["i_carte"].'" >
                   </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="form-group">
                   <label class="profile_details_text">Numero de telephone :</label>
                   <input style="width:100%;" type="tel" name="telephone" class="form-control" value="'.$row["n_tele"].'" >
               </div>
           </div>
           </div>
          
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                   <div class="form-group">
                       <input type="hidden" name="id_client" value="'.$row["id_client"].'">
                       <input type="submit" name="editer_information" id="btn-info" class="btn" value="Editer">
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>';

}




?>
  
