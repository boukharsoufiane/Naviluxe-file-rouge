<?php
session_start();
require_once("db.php");
if (isset($_SESSION["id_client"])) {
    $id_client = $_SESSION["id_client"];
}

class Commentaire
{
    private $text;
    private $id_publication;
    private $id_client;

    public function __construct($text, $id_publication, $id_client)
    {
        $this->text = $text;
        $this->id_publication = $id_publication;
        $this->id_client = $id_client;
    }

    public function ajouter_commentaire($con)
    {
        $text = $con->real_escape_string($this->text);
        $id_publication = $this->id_publication;
        $id_client = $this->id_client;
        $sql = "INSERT INTO commentaire (`id_pub`, `id_client`, `text_commentaire`) VALUES ('$id_publication', '$id_client', '$text')";
        $query = $con->query($sql);
        return $query;
    }
}


if (isset($_POST["commentaire"])) {
    if (!isset($_SESSION["id_client"])) {
        header("Location:./inscription.php");
    }
    
    

    $text = $_POST["text"];
    $id_publication = $_POST["id_pub"];
    $id_client = $_SESSION["id_client"];
    $commentaire = new Commentaire($text, $id_publication, $id_client);
    $result = $commentaire->ajouter_commentaire($con);
    if ($result) {
        header('Location: ./blog-single.php?' . $id_publication);
        exit();
    }
}

?>
