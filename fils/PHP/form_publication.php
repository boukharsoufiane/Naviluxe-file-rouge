<?php
   $publication .= '<div class="container" id="div-info">
   <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
       <form action="PHP/ajouter_publication.php"  method="POST" enctype="multipart/form-data">	
           <h1 id="title-info">Ajouter une publication</h1>
           <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Image de publication :</label>
                       <input type="file" name="image" class="form-control">
                   </div>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Titre de publication : </label>
                       <textarea type="text" name="titre" class="form-control" style="height:10vh;"></textarea>
                   </div>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                   <div class="form-group">
                       <label class="profile_details_text">Text de publication : </label>
                       <textarea type="text" name="text" class="form-control" style="height:30vh;"></textarea>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
                   <div class="form-group">
                       <input type="submit" name="ajouter_publication" id="btn-info" class="btn" value="Ajouter">
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>';

?>
  
