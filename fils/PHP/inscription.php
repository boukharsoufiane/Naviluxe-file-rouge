<?php 
$con = mysqli_connect('localhost','Root','','file');

class Inscription{
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $id_carte;
    private $utilisateur;
    private $image;
    private $mtp;

    public function __construct($nom,$prenom,$email,$telephone,$id_carte,$utilisateur,$image,$mtp){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->id_carte = $id_carte;
        $this->utilisateur = $utilisateur;
        $this->image = $image;
        $this->mtp = $mtp;
    }

    public function insert_client($con){
        $nom = $con->real_escape_string($this->nom);
        $prenom = $con->real_escape_string($this->prenom);
        $email = $con->real_escape_string($this->email);
        $telephone = $this->telephone;
        $id_carte = $con->real_escape_string($this->id_carte);
        $utilisateur = $con->real_escape_string($this->utilisateur);
        $image = $con->real_escape_string($this->image);
        $mtp = $con->real_escape_string($this->mtp);
        $sql_check = "SELECT email, i_carte, username_client FROM client";
        $query_check = $con->query($sql_check);
        $row = $query_check->fetch_assoc();
        if($row['i_carte'] == $id_carte || $row['email'] == $email || $row['username_client'] == $utilisateur){
            header("Location:../inscription.php?msg_error=true");
        }else{
            $sql = "INSERT INTO `client`(`nom`, `prénom`, `email`, `n_tele`, `i_carte`, `username_client`, `password_client`, `image`, `status`, `code_recuperation`) VALUES ('$nom','$prenom','$email','$telephone','$id_carte','$utilisateur','$mtp','$image','Hors ligne','NV-202340')";
            $query = $con->query($sql);
            return $query;
        }
        
    }
}

if(isset($_POST["inscrire"])){
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $id_carte = $_POST["id_carte"];
    $utilisateur = $_POST["utilisateur"];
    $mtp = $_POST["mtp"];
    $confirmerMtp = $_POST["confirmerMtp"];

    $image = $_FILES['image']['name'];
    $tmp_nom = $_FILES['image']['tmp_name'];
    $dossier = "images/images_client/" . $image;
    $fichier = "../images/images_client/" . $image;

    move_uploaded_file($tmp_nom, $fichier);
    
    if($mtp == $confirmerMtp){
        $nouveuxMtp = password_hash($mtp, PASSWORD_DEFAULT);

        $client = new Inscription($nom, $prenom, $email, $telephone, $id_carte, $utilisateur, $dossier, $nouveuxMtp);

        $result = $client->insert_client($con);
        if($result){
            header("Location: ../connexion.php");
        }

    }

}

?>
