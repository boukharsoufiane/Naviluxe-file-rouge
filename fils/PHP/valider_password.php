<?php
require_once("db.php");

class Client
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function get_client($con)
    {
        $email = $con->real_escape_string($this->email);
        $sql = "SELECT * FROM client WHERE email = '$email'";
        $query = $con->query($sql);

        if ($query->num_rows > 0) {
            $row_client = $query->fetch_assoc();
            $id_client = $row_client["id_client"];
            $prefix = 'NV-';
            $length = 6;
            $randomNumber = mt_rand(pow(10, $length - 1), pow(10, $length) - 1);
            $codeNumber = $prefix . $randomNumber;

            $sql_update_client = "UPDATE client SET code_recuperation = '$codeNumber' WHERE id_client = '$id_client'";
            $query_update = $con->query($sql_update_client);

            if ($query_update) {
                $sql_code = "SELECT code_recuperation FROM client WHERE id_client = '$id_client'";
                $query_code = $con->query($sql_code);
                $row = $query_code->fetch_assoc();
                $msg = '<div><p>Code de récupération :</p><span>' . $row["code_recuperation"] . '</span></div>';

                include_once("smtpmail/class.phpmailer.php");
                $email = $email;
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = "soufiane.boukhar.20@gmail.com";
                $mail->Password = "hoarzmzdjasmbnvt";
                $mail->FromName = "Naviluxe";
                $mail->AddAddress($email);
                $mail->Subject = "Votre code de recuperation de votre mot de passe";
                $mail->isHTML(TRUE);
                $mail->Body = $msg;

                if ($mail->Send()) {
                    header("location: ../nouveau_mtp.php?vueMessage_open=true&id_client=" . $id_client);
                }
            }
        }
    }
}






class Agence
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function get_agence($con)
    {
        $email = $con->real_escape_string($this->email);
        $sql = "SELECT * FROM agence WHERE email_agence = '$email'";
        $query = $con->query($sql);

        if ($query->num_rows > 0) {
            $row_agence = $query->fetch_assoc();
            $id_agence = $row_agence["id_agence"];
            $prefix = 'NV-';
            $length = 6;
            $randomNumber = mt_rand(pow(10, $length - 1), pow(10, $length) - 1);
            $codeNumber = $prefix . $randomNumber;

            $sql_update_agence = "UPDATE agence SET code_recuperation = '$codeNumber' WHERE id_agence = '$id_agence'";
            $query_update = $con->query($sql_update_agence);

            if ($query_update) {
                $sql_code = "SELECT code_recuperation FROM agence WHERE id_agence = '$id_agence'";
                $query_code = $con->query($sql_code);
                $row = $query_code->fetch_assoc();
                $msg = '<div><p>Code de récupération :</p><span>' . $row["code_recuperation"] . '</span></div>';

                include_once("smtpmail/class.phpmailer.php");
                $email = "boukhar.soufiane.solicode@gmail.com";
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = "soufiane.boukhar.20@gmail.com";
                $mail->Password = "hoarzmzdjasmbnvt";
                $mail->FromName = "Navliuxe";
                $mail->AddAddress($email);
                $mail->Subject = "Votre code de recuperation de votre mot de passe";
                $mail->isHTML(TRUE);
                $mail->Body = $msg;

                if ($mail->Send()) {
                    header("location: ../nouveau_mtp.php?vueMessage_open=true&id_agence=" . $id_agence);
                }
            }
        }
    }
}


if (isset($_POST["recuperer"])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $email = $_POST["email"];
    $client_recuperer = new Client($email);
    $result_client = $client_recuperer->get_client($con);
    if (!$result_client) {
        $agence = new Agence($email);
        $result_agence = $agence->get_agence($con);
    }
}
?>
