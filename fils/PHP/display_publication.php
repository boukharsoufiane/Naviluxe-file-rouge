<?php
session_start();
require_once("db.php");



class Update_publication {
    private $titre;
    private $text;
    private $image;
    private $id_pub;

    public function __construct($titre, $text, $image,$id_pub) {
        $this->titre = $titre;
        $this->text = $text;
        $this->image = $image;
        $this->id_pub = $id_pub;
    }

    public function updatePub($con) {
        $titre = $con->real_escape_string($this->titre);
        $text = $con->real_escape_string($this->text);
        $id_pub = $this->id_pub;
        $sql = "UPDATE publication SET text_pub = '$text', titre_pub = '$titre'";
    
        if (!empty($image)) {
            $image = $con->real_escape_string($image);
            $sql .= ", img_pub = '$image'";
        }
    
        $sql .= " WHERE id_pub = '$id_pub'";
    
        $query = $con->query($sql);
        return $query;
    }
    
}

class Display_publication
{
    private $id_agence;

    public function __construct($id_agence)
    {
        $this->id_agence = $id_agence;
    }

    public function displayPub($con)
    {
        $id_agence = $this->id_agence;
        $sql = "SELECT * FROM publication WHERE id_agence = '$id_agence'";
        $query = $con->query($sql);
        return $query;
    }
}

if (isset($_SESSION['id_agence'])) {
    $id_agence = $_SESSION['id_agence'];

    if (isset($_POST["publicationEditer"])) {
        $pubEdit = "";
        $publication = new Display_publication($id_agence);
        $result = $publication->displayPub($con);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $text_limit = 20;
                $text_pub = strlen($row["text_pub"]) > $text_limit ? substr($row["text_pub"], 0, $text_limit) . '...' : $row["text_pub"];
                $pubEdit .= '<tr>
                    <td>' . $row["titre_pub"] . '</td>
                    <td>' . $text_pub . '</td>
                    <td><a href="profile_agence.php?id_pub='.$row["id_pub"].'" class="btn btn-primary">Voir plus</a></td>
                    </tr>';
            }
        }
    }
}

if($_POST["Editer_publication"]){
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    
    $titre = $_POST["titre_pub"];
    $text = $_POST["text_pub"];
    $id_pub = $_POST["id_pub"];
    $image = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $dossier = "images/images_publication/".$image;
    // move_uploaded_file($tmp_name,$dossier);
    $updatePublication = new Update_publication($titre, $text, $dossier, $id_pub);
    $update = $updatePublication->updatePub($con);
    if($update){
        header("Location:../profile_agence.php?pubUpdate=true");
    }

}



?>
