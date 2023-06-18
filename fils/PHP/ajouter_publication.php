<?php
session_start();
require_once("db.php");

if(isset($_SESSION["id_agence"])){
    $id_agence = $_SESSION["id_agence"];
}

class Publication{
    private $image;
    private $titre;
    private $text;
    private $id_agence;

    public function __construct($image,$titre, $text, $id_agence){
        $this->image = $image;
        $this->titre = $titre;
        $this->text = $text;
        $this->id_agence = $id_agence;
    }

    public function ajouter_publication($con){
        $image = $con->real_escape_string($this->image);
        $titre = $con->real_escape_string($this->titre);
        $text = $con->real_escape_string($this->text);
        $id_agence = $this->id_agence;
        $sql = "INSERT INTO publication (img_pub,titre_pub,text_pub,id_agence) VALUES ('$image','$titre','$text','$id_agence')";
        $query = $con->query($sql);
        return $query;
    }

}


if(isset($_POST["ajouter_publication"])){

    $image = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $dossier = "../images/images_publication/".$image;
    move_uploaded_file($tmp_name, $dossier);
    $titre = $_POST["titre"];
    $text = $_POST["text"];
    $id_agence = $_SESSION["id_agence"];

    $publication = new Publication($dossier,$titre,$text, $id_agence);
    $result = $publication->ajouter_publication($con);
    if ($result) {
        header('Location: ../profile_agence.php?open_publication=true');
        exit();
    }
        
}
  
?>
