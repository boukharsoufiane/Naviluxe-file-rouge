<?php
require_once("db.php");

class Edit_client {
    private $id_client;
    private $nom;
    private $prenom;
    private $email;
    private $utilisateur;
    private $telephone;
    private $id_carte;

    public function __construct($id_client, $nom, $prenom, $email, $utilisateur, $telephone, $id_carte) {
        $this->id_client = $id_client;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->utilisateur = $utilisateur;
        $this->telephone = $telephone;
        $this->id_carte = $id_carte;
    }

    public function edit_profile($con) {
        $id_client = $this->id_client;
        $nom = $con->real_escape_string($this->nom);
        $prenom = $con->real_escape_string($this->prenom);
        $email = $con->real_escape_string($this->email);
        $utilisateur = $con->real_escape_string($this->utilisateur);
        $telephone = $this->telephone;
        $id_carte = $con->real_escape_string($this->id_carte);

        $sql = "UPDATE client SET nom='$nom', prénom='$prenom', email='$email', username_client='$utilisateur', n_tele=$telephone, i_carte='$id_carte' WHERE id_client=$id_client";
        $query = $con->query($sql);
        return $query;
    }
}

if (isset($_POST["editer_information"])) {
    $id_client = $_POST["id_client"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $utilisateur = $_POST["utilisateur"];
    $telephone = $_POST["telephone"];
    $id_carte = $_POST["id_carte"];

    $client = new Edit_client($id_client, $nom, $prenom, $email, $utilisateur, $telephone, $id_carte);
    $result = $client->edit_profile($con);
   
}
?>

