<?php
require_once("db.php");

class editer_agence{
    private $id_agence;
    private $nom_gerant;
    private $nom_agence;
    private $email_agence;
    private $n_tele;
    private $i_carte;
    private $n_fiscale;
    private $ville;
    private $locale;
    private $password;

    public function __construct($id_agence,$nom_gerant, $nom_agence, $email_agence, $n_tele, $i_carte, $n_fiscale, $ville, $locale, $password){
        $this->id_agence = $id_agence;
        $this->nom_gerant = $nom_gerant;
        $this->nom_agence = $nom_agence;
        $this->email_agence = $email_agence;
        $this->n_tele = $n_tele;
        $this->i_carte = $i_carte;
        $this->n_fiscale = $n_fiscale;
        $this->ville = $ville;
        $this->locale = $locale;
        $this->password = $password;
    }

    public function edit_agence($con){
        $id_agence = $this->id_agence;
        $nom_gerant = $con->real_escape_string($this->nom_gerant);
        $nom_agence = $con->real_escape_string($this->nom_agence);
        $email_agence = $con->real_escape_string($this->email_agence);
        $n_tele= $this->n_tele;
        $i_carte= $con->real_escape_string($this->i_carte);
        $n_fiscale= $con->real_escape_string($this->n_fiscale);
        $ville = $con->real_escape_string($this->ville);
        $locale = $con->real_escape_string($this->locale);
        $password = $con->real_escape_string($this->password);
        if($password !=""){
            $sql = "UPDATE agence SET nom_gerant ='$nom_gerant', nom_agence ='$nom_agence', email_agence ='$email_agence', n_tele ='$n_tele',i_carte='$i_carte', n_fiscale='$n_fiscale',ville='$ville', locale='$locale', password ='$password' WHERE id_agence = '$id_agence'";
        }else{
            $sql = "UPDATE agence SET nom_gerant ='$nom_gerant', nom_agence ='$nom_agence', email_agence ='$email_agence', n_tele ='$n_tele',i_carte='$i_carte', n_fiscale='$n_fiscale',ville='$ville', locale='$locale' WHERE id_agence = '$id_agence'";
        }
       
        $query = $con->query($sql);
        return $query;
    }
}

if(isset($_POST["editer_info_agence"])){
    $id_agence = $_POST["id_agence"];
    $nom_agence = $_POST["nom_agence"];
    $nom_gerant = $_POST["nom_gerant"];
    $email_agence = $_POST["email_agence"];
    $n_tele = $_POST["n_tele"];
    $i_carte = $_POST["i_carte"];
    $n_fiscale = $_POST["n_fiscale"];
    $ville = $_POST["ville"];
    $locale = $_POST["locale"];
    $password = $_POST["mtp"];
    $passwordNew = password_hash($password, PASSWORD_DEFAULT);
    $editAgence = new editer_agence($id_agence,$nom_gerant,$nom_agence,$email_agence,$n_tele,$i_carte,$n_fiscale,$ville,$locale,$passwordNew);
    $result = $editAgence->edit_agence($con);
    if($result){
        if(!empty($logo)){
            $logo = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $dossier = "./images/image_agence/" . $logo;
            move_uploaded_file($tmp_name, $dossier);
            $sql_img ="UPDATE agence SET logo='$dossier' WHERE id_agence='$id_agence'";
            $query_img = $con->query($sql_img);
            if($query_img){
                header("Location:../profile_agence.php?msgInfoEdit=true");
            }
        }else{
            header("Location:../profile_agence.php?msgInfoEdit=true");
        }
    }
}
