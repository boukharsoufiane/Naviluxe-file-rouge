<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/connexion.css">
</head>

<body>
    <div class="wrapper">
        <div style="display: flex;justify-content:space-around;">
        <h2>Connexion</h2>
        <div id="msg">
            <?php 
             if(isset($_GET["msg"])){
                $html = $_GET["msg"];
                echo "<p style='color:red'>$html</p>";
             }
            ?>
        </div>
        </div>
        
        <form action="PHP/connexion.php" method="POST">
            <div class="formInput">
                <div class="input-box">
                    <input type="text" placeholder="Votre email ou nom d'utilisateur" name="email" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Votre password" name="mtp" required>
                </div>
            </div>


            <div class="input-box button">
                <input type="Submit" name="connexion" value="Connecter">
            </div>
            <div class="text">
                <h3>Vous n'avez pas un compte? <a href="inscription.php">Inscrire maintenant</a></h3>
                <h3>Vous avez oubliée votre mot de passe? <a href="recuperer_password.php">Récupére votre mot de pass</a></h3>

            </div>
            
        </form>
    </div>
</body>

</html>