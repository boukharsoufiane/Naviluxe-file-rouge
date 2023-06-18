<?php
require_once("db.php");

$html = '';

class Connexion_client {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function connect_client($con) {
        $email = $con->real_escape_string($this->email);
        $sql = "SELECT * FROM client WHERE email = '$email'";
        $query_client = $con->query($sql);
        return $query_client;
    }
}

class Connexion_agence {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function connect_agence($con) {
        $email = $con->real_escape_string($this->email);
        $sql = "SELECT * FROM agence WHERE email_agence = '$email'";
        $query_agence = $con->query($sql);
        return $query_agence;
    }
}

class Connexion_admin{
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function connect_admin($con) {
        $email = $con->real_escape_string($this->email);
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $query_admin = $con->query($sql);
        return $query_admin;
    }
}

if (isset($_POST["connexion"])) {
    $email = $_POST["email"];
    $mtp = $_POST["mtp"];
    $reponse_client = new Connexion_client($email);
    $reponse_agence = new Connexion_agence($email);
    $reponse_admin = new Connexion_admin($email);
    $result_client = $reponse_client->connect_client($con);
    $result_agence = $reponse_agence->connect_agence($con);
    $result_admin = $reponse_admin->connect_admin($con);

    if ($result_client->num_rows > 0) {
        $row = $result_client->fetch_assoc();
        $id_client = $row["id_client"]; 
        $pass = $row["password_client"];
        if (password_verify($mtp, $pass)) {
            session_start();
            $sql_status = "UPDATE client set status = 'En ligne' where id_client ='$id_client'";
            $query_status = mysqli_query($con,$sql_status);
            $_SESSION["email"] =  $email_client;
            $_SESSION["id_client"] = $id_client;
            header("Location: ../index.php");
            exit();
        } else {
            $html = 'Votre email ou mot de passe est incorrect';
            header("Location: ../connexion.php?msg=" . urlencode($html));
            exit();
        }
    } elseif ($result_agence->num_rows > 0) {
        $row = $result_agence->fetch_assoc();
        $id_agence = $row["id_agence"]; 
        $pass = $row["password"];
        if (password_verify($mtp, $pass)) {
            session_start();
            $sql_status = "UPDATE agence set status = 'En ligne' where id_agence ='$id_agence'";
            $query_status = mysqli_query($con,$sql_status);
            $_SESSION["id_agence"] = $id_agence;
            header("Location: ../index.php");
            exit();
        } else {
            $html = 'Votre email ou mot de passe est incorrect';
            header("Location: ../connexion.php?msg=$html");
            exit();
        }
    }elseif($result_admin->num_rows > 0){
        $row = $result_admin->fetch_assoc();
        $pass = $row["password"];
        $id_admin = $row["id_admin"];
        if($mtp == $pass){
            $sql_status = "UPDATE admin set status = 'En ligne' where id_admin ='0'";
            $query_status = mysqli_query($con,$sql_status);
            session_start();
            $_SESSION["id_admin"] = $id_admin;
            header("Location: ../admin/index.php");
            exit();
        }else{
            $html = 'Votre email ou mot de passe est incorrect';
            header("Location: ../connexion.php?msg=$html");
            exit();
        }
    } else {
        $html = "Il n'existe pas de compte avec cet email";
        header("Location: ../connexion.php?msg=$html");
        exit();
    }
    $con->close();
}
?>


