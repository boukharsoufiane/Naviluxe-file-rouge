<?php
require_once("PHP/db.php");

if (isset($_GET["id_client"])) {
    if (isset($_POST["changer_mtp"])) {
        $id_client = $_GET["id_client"];
        $code = $_POST["code"];
        $mtp = $_POST["mtp"];
        $mtpCon = $_POST["mtpCon"];
        if ($mtp == $mtpCon) {
            $sql_code = "SELECT code_recuperation FROM client WHERE id_client='$id_client'";
            $query_code = $con->query($sql_code);
            $row_code = $query_code->fetch_assoc();
            $codeRecuperation = $row_code['code_recuperation'];
            if($code == $codeRecuperation) {
                $NouveauMtp = password_hash($mtp, PASSWORD_DEFAULT);
                $sql = "UPDATE client SET password_client = '$NouveauMtp' WHERE id_client = '$id_client'";
                $query = $con->query($sql);
                if ($query) {
                    header("Location:nouveau_mtp.php?msg_mtp=true");
                }
            }else{
                header("Location:nouveau_mtp.php?msg_error=true&id_client=".$id_client);
            }
        }
    }
} elseif (isset($_GET["id_agence"])) {
    if (isset($_POST["changer_mtp"])) {
        $id_agence = $_GET["id_agence"];
        $code = $_POST["code"];
        $mtp = $_POST["mtp"];
        $mtpCon = $_POST["mtpCon"];
        if ($mtp == $mtpCon) {
            $sql_code = "SELECT code_recuperation FROM agence WHERE id_agence='$id_agence'";
            $query_code = $con->query($sql_code);
            $row_code = $query_code->fetch_assoc();
            $codeRecuperation = $row_code['code_recuperation'];
            if($code == $codeRecuperation){
                $NouveauMtp = password_hash($mtp, PASSWORD_DEFAULT);
                $sql = "UPDATE agence SET password = '$NouveauMtp' WHERE id_agence = '$id_agence'";
                $query = $con->query($sql);
                if ($query) {
                    header("Location:nouveau_mtp.php?msg_mtp=true");
                }
            }else{
                header("Location:nouveau_mtp.php?msg_error=true&id_agence=".$id_agence);
            }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <div style="display: flex;justify-content:space-around;">
            <h2>Changement de mot de passe</h2>
            <div id="msg">
                <?php
                if (isset($_GET["msg"])) {
                    $html = $_GET["msg"];
                    echo "<p style='color:red'>$html</p>";
                }
                ?>
            </div>
        </div>

        <form action="" method="POST">
            <div class="formInput">
                <div class="input-box">
                    <input type="text" placeholder="Votre code de recuperation" name="code" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Votre nouveau mot de passe" name="mtp" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirmer Votre mot de passe" name="mtpCon" required>
                </div>
            </div>
            <div class="input-box button">
                <input type="Submit" name="changer_mtp" value="Changer">
            </div>
            <div class="text">
                <h3>Vous avez un compte? <a href="connexion.php">Connecter maintenant</a></h3>
            </div>

        </form>
    </div>
    <div class="modal" id="changer" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Changement de mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Votre mot de passe a été changé avec réussir.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">D'accord</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="vueMessage" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Changement de mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalVues()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nous avons envoyé un code de récupération sur votre email.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalVues()">D'accord</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="errorMessage" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Changement de mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalVuesError()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Code de récupération est incorrect</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalVuesError()">D'accord</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        ::placeholder {
            font-size: 12px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openChanger = urlParams.get('msg_mtp');
            if (openChanger === 'true') {
                $("#changer").modal('show');
            }
        });

        function closeModal() {
            $("#changer").modal('hide');
            window.location.href = 'connexion.php';
        }

        $(document).ready(function() {
            const urlParamss = new URLSearchParams(window.location.search);
            const openVueEmail = urlParamss.get('vueMessage_open');
            if (openVueEmail === 'true') {
                $('#vueMessage').modal('show');
            }
        });

        function closeModalVues() {
            $('#vueMessage').modal('hide');
        }

        $(document).ready(function() {
            const urlParamsError = new URLSearchParams(window.location.search);
            const openVueError = urlParamsError.get('msg_error');
            if (openVueError === 'true') {
                $('#errorMessage').modal('show');
            }
        });

        function closeModalVuesError() {
            $('#errorMessage').modal('hide');
        }
    </script>
    <script src="bootstrap.bundle.min.js"></script>

</body>

</html>