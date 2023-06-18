<?php
session_start();
require_once("PHP/reservation.php");
if (isset($_SESSION["id_client"])) {
    $id_client = $_SESSION["id_client"];
} else {
    header("Location:connexion.php");
}

if (isset($_GET["id_bateau"])) {
    $id_bateau = $_GET["id_bateau"];
}





if (isset($_POST['date']) && isset($_POST['id_bateau'])) {
    $date = $_POST['date'];
    $id_bateau = $_POST["id_bateau"];

    if (!empty($id_bateau)) {
        $mysqli = mysqli_connect('localhost', 'Root', '', 'file');
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $sqlSortie = "SELECT heure_sortie FROM reservation WHERE date_sortie = '$date' AND id_bateau = '$id_bateau'";
        $resultSortie = mysqli_query($mysqli, $sqlSortie);

        $sqlRetour = "SELECT heure_retour FROM reservation WHERE date_sortie = '$date' AND id_bateau = '$id_bateau'";
        $resultRetour = mysqli_query($mysqli, $sqlRetour);

        if ($resultSortie && $resultRetour) {
            $timesSortie = array();
            while ($row = mysqli_fetch_assoc($resultSortie)) {
                $timesSortie[] = $row['heure_sortie'];
            }

            $timesRetour = array();
            while ($row = mysqli_fetch_assoc($resultRetour)) {
                $timesRetour[] = $row['heure_retour'];
            }

            $response = array('timesSortie' => $timesSortie, 'timesRetour' => $timesRetour);
            echo json_encode($response);
        }

        $mysqli->close();
        exit();
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Naviluxe</title>
    <link rel="stylesheet" href="app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="java.js"></script>
</head>

<body>

    <header>
        <div>
            <ul>
                <li><a href="index.php">Acceuil</a></li>
            </ul>
        </div>
    </header>

    <p id="meteo" style="background-color:#fff;color:red;padding:12px;"></p>

    <div id="reservation">


        <form id="reservation-form" action="" method="POST">
            <div class="box">
                <div class="container">
                    <h2>CARTE DE RÉSERVATION</h2>
                    <label>
                        <span for="date">Date</span>
                        <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                    </label>

                    <label>
                        <span for="time_sortie">Heure de sortie</span>
                        <select id="time_sortie" name="time_sortie" required>
                            <option value="" selected>-</option>
                        </select>
                    </label>

                    <label>
                        <span for="time_retour">Heure de retour</span>
                        <select id="time_retour" name="time_retour" required>
                            <option value="" selected>-</option>
                        </select>
                    </label>

                    <label>
                        <span for="price">Prix (DH)</span>
                        <input type="hidden" name="prices" class="price">
                        <input type="number" class="price" disabled>
                    </label>

                    <label>
                        <input type="hidden" name="id_bateau" id="id_bateau" value="<?php echo isset($_GET['id_bateau']) ? $_GET['id_bateau'] : ''; ?>">
                        <input class="button" type="submit" value="Reserver" id="btn">
                    </label>
                </div>
            </div>
        </form>


        <form action="PHP/charge.php" method="post" id="paimenet-form">
            <div class="box">
                <div class="container">
                    <h2>CARTE DE CRÉDIT</h2>

                    <label>
                        <span>Prix (DH)</span>
                        <select id="paiementAmount" name="amount" required>
                            <option value="<?php if (isset($_GET["amount"])) {
                                                $amount = $_GET["amount"];
                                                echo $amount;
                                            } elseif (isset($_GET["prix"])) {
                                                $prix = $_GET["prix"];
                                                $prixAmount = $prix / 2;
                                                echo $prixAmount;
                                            } ?>" selected><?php if (isset($_GET["amount"])) {
                                                                $amount = $_GET["amount"];
                                                                echo $amount;
                                                            } elseif (isset($_GET["prix"])) {
                                                                $prix = $_GET["prix"];
                                                                $prixAmount = $prix / 2;
                                                                echo $prixAmount;
                                                            } ?></option>

                        </select>
                    </label>

                    <label>
                        <span>Numéro de carte</span>
                        <input id="cardnumber" maxlength="19" type="text" name="cc_number" placeholder="XXXX-XXXX-XXXX-XXXX" required />
                    </label>

                    <label>
                        <span>Date d'expiration</span>
                        <select id="month" name="expiry_month" required>
                            <option value="1" selected>Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>

                        <select id="year" name="expiry_year" required>

                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                            <option value="31">2031</option>
                            <option value="32">2032</option>
                            <option value="33">2033</option>
                        </select>
                    </label>

                    <label>
                        <span>CVV</span>
                        <input id="csv" type="text" name="cvv" maxlength="3" placeholder="XXX" required>
                    </label>
                    <input type="hidden" name="id_reservation" value="<?php if (isset($_GET["id_reservation"])) {
                                                                            $id_reservation = $_GET["id_reservation"];
                                                                            echo $id_reservation;
                                                                        } ?>" />


                    <label>
                        <input class="button" type="submit" name="submit" value="Valider paiement">
                    </label>

                </div>
            </div>

        </form>

    </div>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Le CreditCard est invalide ou insuffisant.</p>
        </div>
    </div>

    <div id="myModalReservation" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Vous avez réservé réussir. S'il vous plait payez la réservation.</p>
        </div>
    </div>

    <div id="meteo" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>La réservation ne peut pas passer à cause de mauvais climat.</p>
        </div>
    </div>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openMsg = urlParams.get('errorPaye');

            if (openMsg === 'true') {
                const modal = document.getElementById('myModal');
                const closeButton = modal.querySelector('.close');
                modal.style.display = 'block';

                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openMsg = urlParams.get('reservation');

            if (openMsg === 'true') {
                const modal = document.getElementById('myModalReservation');
                const closeButton = modal.querySelector('.close');
                modal.style.display = 'block';

                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openMsg = urlParams.get('msg');

            if (openMsg === 'true') {
                const modal = document.getElementById('meteo');
                const closeButton = modal.querySelector('.close');
                modal.style.display = 'block';

                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
        });
    </script>


    <script src="java.js"></script>

    <script>
        $(document).ready(function() {
            $('#date, #time_sortie, #time_retour').on('change', function() {
                var date = $('#date').val();
                var time_sortie = $('#time_sortie').val();
                var time_retour = $('#time_retour').val();

                if (date && time_sortie && time_retour) {
                    var date_sortie = new Date(date + ' ' + time_sortie);
                    var date_retour = new Date(date + ' ' + time_retour);

                    var time_diff_ms = date_retour - date_sortie;

                    var time_diff_min = time_diff_ms / 60000;

                    var intervals = time_diff_min / 30;
                    var prix = <?php echo isset($_GET['prices']) ? $_GET['prices'] : 0; ?>;


                    var price = intervals * prix;

                    $('.price').empty();
                    $('.price').val(price);


                }
            });
        });
    </script>
</body>

</html>