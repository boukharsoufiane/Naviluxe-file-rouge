<?php
require_once("db.php");
session_start();

if(isset($_SESSION['id_agence'])){
    $id_agence = $_SESSION['id_agence'];
}

class Bateau{
    private $description;
    private $n_bateau;
    private $capacite;
    private $categorie;
    private $id_agence;
    private $prix;
    private $id_bateau; 

    public function __construct($description, $n_bateau, $capacite, $categorie, $id_agence, $prix){
        $this->description = $description;
        $this->n_bateau = $n_bateau;
        $this->capacite = $capacite;
        $this->categorie = $categorie;
        $this->id_agence = $id_agence;
        $this->prix = $prix;
    }

    public function ajouter_annonce($con){
        $description = $con->real_escape_string($this->description);
        $n_bateau = $this->n_bateau;
        $capacite = $this->capacite;
        $categorie = $con->real_escape_string($this->categorie);
        $id_agence = $this->id_agence;
        $prix = $this->prix;
        $sql = "INSERT INTO bateau (description, n_bateau, capacité, category, id_agence, prix) VALUES ('$description', '$n_bateau', '$capacite', '$categorie', '$id_agence', '$prix')";
        $query = $con->query($sql);
        if($query){
            $this->id_bateau = $con->insert_id; 
        }
        return $query;
    }

    public function get_id_bateau(){
        return $this->id_bateau;
    }
}

if(isset($_POST['ajouter_annonce'])){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $description = $_POST['description'];
    $n_bateau = $_POST['n_bateau'];
    $capacite = $_POST['capacite'];
    $categorie = $_POST['categorie']; 
    $id_agence = $_SESSION["id_agence"];
    $prix = $_POST['prix'];
    $annonce = new Bateau($description, $n_bateau, $capacite, $categorie, $id_agence, $prix);
    $result = $annonce->ajouter_annonce($con);

    if($result){
       
        $id_bateau = $annonce->get_id_bateau(); 
        $images = $_FILES['images'];
        $numImages = count($images['name']);

        for($i = 0; $i < $numImages; $i++){
            $fileName = $images['name'][$i];
            $fileTmpName = $images['tmp_name'][$i];
            $dossier ='./images/images_bateau/' . $fileName;
            $fichier = '../images/images_bateau/' . $fileName;
            move_uploaded_file($fileTmpName,$fichier);
            $typImg = ($i === 0) ? 'main' : 'secondaire';
            $sql = "INSERT INTO img_bateau (src_img, typ_img, id_bateau) VALUES ('$dossier', '$typImg', '$id_bateau')";
            $result_sql = $con->query($sql);
           
        }
       
        if($result_sql){
            header("Location:../profile_agence.php?open_bateau=true");
            exit();
        }




    }
}
  
?>
