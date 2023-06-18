<?php 
session_start();

require_once("../PHP/db.php");

class Ajouter_agence{
    private $nom_gerant;
    private $nom_agence;
    private $email_agence;
    private $n_tele;
    private $i_carte;
    private $n_fiscale;
    private $ville;
    private $locale;
    private $password;
    private $logo;
    private $status;

    public function __construct($nom_gerant, $nom_agence, $email_agence, $n_tele, $i_carte, $n_fiscale, $ville, $locale, $password, $logo, $status){
        $this->nom_gerant = $nom_gerant;
        $this->nom_agence = $nom_agence;
        $this->email_agence = $email_agence;
        $this->n_tele = $n_tele;
        $this->i_carte = $i_carte;
        $this->n_fiscale = $n_fiscale;
        $this->ville = $ville;
        $this->locale = $locale;
        $this->password = $password;
        $this->logo = $logo;
        $this->status = $status;
    }

    public function insert_agence($con){
        $nom_gerant = $con->real_escape_string($this->nom_gerant);
        $nom_agence = $con->real_escape_string($this->nom_agence);
        $email_agence = $con->real_escape_string($this->email_agence);
        $n_tele= $this->n_tele;
        $i_carte= $con->real_escape_string($this->i_carte);
        $n_fiscale= $con->real_escape_string($this->n_fiscale);
        $ville = $con->real_escape_string($this->ville);
        $locale = $con->real_escape_string($this->locale);
        $password = $con->real_escape_string($this->password);
        $logo = $con->real_escape_string($this->logo);
        $status= $con->real_escape_string($this->status);
        $sql = "INSERT INTO `agence`(`nom_gerant`, `nom_agence`, `email_agence`, `n_tele`, `i_carte`, `n_fiscale`, `ville`, `locale`, `password`, `date_création`, `logo`, `status`,code_recuperation) VALUES ('$nom_gerant', '$nom_agence', '$email_agence', '$n_tele', '$i_carte', '$n_fiscale', '$ville', '$locale', '$password',NOW() ,'$logo', '$status','NV-235256')";
        $query = $con->query($sql);
        return $query;
    }

}

if(isset($_POST["form-agence"])){
    $output = "";
    include_once("form-agence.php");
}elseif(isset($_POST["ajouter_agence"])){
    $html = "";
    $nom_agence = $_POST["nom_agence"];
    $nom_gerant = $_POST["nom_gerant"];
    $email_agence = $_POST["email"];
    $n_tele = $_POST["n_tele"];
    $i_carte = $_POST["i_carte"];
    $n_fiscale = $_POST["n_fiscale"];
    $ville = $_POST["ville"];
    $locale = $_POST["locale"];
    $password = $_POST["mtp"];
    $confirmPassowrd = $_POST["mtp_confirmer"];
    $logo = $_FILES['logo']['name'];
    $tmp_name = $_FILES['logo']['tmp_name'];
    $dossier = "images/image_agence/" . $logo;
    $fichier = "../images/image_agence/" . $logo;
    move_uploaded_file($tmp_name, $fichier);
    if($password == $confirmPassowrd){
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        $agence_reseult = new Ajouter_agence($nom_gerant, $nom_agence, $email_agence, $n_tele, $i_carte, $n_fiscale, $ville, $locale, $newPassword, $dossier, 'Hors ligne');
        $resulte = $agence_reseult->insert_agence($con);
        if($resulte){
            header("Location:index.php?ajouter=true");
            exit();
        }
    }else{
        $html="S'il vous plait entrer le meme mots de passe.";
        header("Location: index.php?msg=$html");
    }
}elseif(isset($_POST["liste_agence"])){
    $liste = "";
    $sql = "SELECT * FROM agence";
    $resulte =$con->query($sql);
    if($resulte->num_rows > 0){
        include_once("liste_agence.php");
    }
}else{
    $dashbord="";
    $sqlAgenceCount = "SELECT COUNT(*) AS agenceCount FROM agence";
    $resultAgenceCount = mysqli_query($con, $sqlAgenceCount);
    $rowAgenceCount = mysqli_fetch_assoc($resultAgenceCount);
    $agenceCount = $rowAgenceCount['agenceCount'];

    $sqlClientCount = "SELECT COUNT(*) AS clientCount FROM client";
    $resultClientCount = mysqli_query($con, $sqlClientCount);
    $rowClientCount = mysqli_fetch_assoc($resultClientCount);
    $clientCount = $rowClientCount['clientCount'];

    if($clientCount != "" && $agenceCount !=""){
        $dashbord = '<div style="background-color:#fbe086;width:100%;height:10vh;display:flex;justify-content:center;margin-top:-40px;"><p style="background-color:#fff;padding:10px;height:fit-content;margin-top:15px;">Naviluxe</p></div><canvas id="myChart" style="width:40%;height:30%;padding:5%"></canvas>';
    }
}
