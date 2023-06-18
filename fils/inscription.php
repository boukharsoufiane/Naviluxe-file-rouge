<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inscription.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <h2>Inscription</h2>
        <form action="PHP/inscription.php" method="POST" enctype="multipart/form-data">
            <div class="formInput">
                <div class="input-box">
                    <input type="text" placeholder="Votre Nom" name="nom" required>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Votre Prenom" name="prenom" required>
                </div>
            </div>
            <div class="formInput">
                <div class="input-box">
                    <input type="email" placeholder="Votre Email" name="email" required>
                </div>
                <div class="input-box">
                    <input type="tel" placeholder="Votre numero de telephone" name="telephone" pattern="0[5-8][0-9]{8}" maxlength="10" required>
                </div>
            </div>
            <div class="formInput">

                <div class="input-box">
                    <input type="text" placeholder="Votre carte de national" name="id_carte" maxlength="6" required>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Votre nom d'utilisateur" name="utilisateur" required>
                </div>
            </div>

            <div class="formInput">
                <div class="input-box">
                    <input type="password" placeholder="Votre mot de passe" name="mtp" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Répétez votre mot de passe" name="confirmerMtp" required>
                </div>
            </div>
            <h4>Votre image :</h4>
            <div class="input-box">
                <input id="file" type="file" name="image">
            </div>
            <div class="input-box button">
                <input type="Submit" name="inscrire" value="Inscription">
            </div>
            <div class="text">
                <h3>Vous avez déjà un compte? <a href="connexion.php">Connecter maintenant</a></h3>
            </div>
        </form>
    </div>


    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="padding: 10px;font-size:25px;">Email, identité carte ou nom d'utilisateur déjà existe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openPublication = urlParams.get('msg_error');

            if (openPublication === 'true') {
                $('#myModal').modal('show');
            }

            $('.close').click(function() {
                $('#myModal').modal('hide');
            });
        });
    </script>



</body>

</html>