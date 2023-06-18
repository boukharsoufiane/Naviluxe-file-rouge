<?php

session_start();
if(isset($_SESSION['id_agence'])){
    $id_agence = $_SESSION["id_agence"];
}
require_once("db.php");

class Edit_bateau{
    private $description;
    private $n_bateau;
    private $capacite;
    private $categorie;
    private $id_agence;
    private $prix;
    private $bateau;

    public function __construct($description,$n_bateau,$capacite,$categorie,$id_agence,$prix,$bateau){
        $this->description = $description;
        $this->n_bateau = $n_bateau;
        $this->capacite = $capacite;
        $this->categorie = $categorie;
        $this->id_agence = $id_agence;
        $this->prix = $prix;
        $this->bateau = $bateau;
    }

    public function update_bateau($con){
        $description = $con->real_escape_string($this->description);
        $n_bateau = $this->n_bateau;
        $capacite = $this->capacite;
        $categorie = $con->real_escape_string($this->categorie);
        $id_agence = $this->id_agence;
        $prix = $this->prix;
        $bateau = $this->bateau;
        $sql = "UPDATE bateau SET description = '$description', n_bateau = '$n_bateau', capacité = '$capacite', category ='$categorie',id_agence='$id_agence', prix='$prix' WHERE id_bateau='$bateau'";
        $query = $con->query($sql);
        return $query;
    }
}

class Images{
    private $image;
    private $id_image;

    public function __construct($image,$id_image){
        $this->image = $image;
        $this->id_image = $id_image;
    }

    public function update_image($con){
        $image = $con->real_escape_string($this->image);
        $id_image = $this->id_image;
        $sql = "UPDATE img_bateau SET src_img='$image' WHERE id_img='$id_image'";
        $query = $con->query($sql);
        return $query;
    }
}

if(isset($_POST['editer_bateau'])){
    $bateau = $_POST['id_bateau'];
    $description = $_POST['description'];
    $n_bateau = $_POST['n_bateau'];
    $capacite = $_POST['capacite'];
    $categorie = $_POST['categorie'];
    $id_agence = $_SESSION["id_agence"];
    $prix = $_POST['prix'];
    $updateBateau = new Edit_bateau($description, $n_bateau, $capacite, $categorie, $id_agence, $prix,$bateau);
    $result = $updateBateau->update_bateau($con);
    if($result){
        header("Location: ../profile_agence.php?open_edit=true");
        exit();
    }

}elseif(isset($_POST['edit_img'])){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $id_image = $_POST['id_image'];
    $image = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $dossier = "./images/images_bateau/".$image;
    
    move_uploaded_file($tmp_name, $dossier);
    
    $updateImage = new Images($dossier, $id_image);
    $result = $updateImage->update_image($con);
    
    if($result){
        header("Location: ../profile_agence.php?open_image=true");
        exit(); 
    }
}

  
?>