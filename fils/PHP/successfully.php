
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        function downloadPDF() {
            var doc = new jsPDF();
            var source = window.document.getElementsByClassName("modal-body")[0];
            doc.fromHTML(
                source,
                10,
                10, {
                    'width': 180,
                },
                function() {
                    html2canvas(document.getElementById("qr-code"), {
                        useCORS: true
                    }).then(canvas => {
                        var qrDataUrl = canvas.toDataURL();
                        doc.addImage(qrDataUrl, 'JPEG', 2, 30, 20, 20, '', 'FAST', 1);
                        doc.save('reservation.pdf');
                    });
                }
            );
        }
    </script>





    <title>Test</title>
</head>

<body>



    <div class="wrapperAlert">

        <div class="contentAlert">

            <div class="topHalf">

                <p><svg viewBox="0 0 512 512" width="100" title="check-circle">
                        <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
                    </svg></p>
                <h1>Félicitations</h1>

                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>

            <div class="bottomHalf">

                <p>Vous avez payé la réservation avec succès...</p>

                <button id="alertMO" type="button" class="btn btn-primary" style="background-color:#D4AF37;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Voir le reçu
                </button>
                <a href="../index.php" class="btn btn-primary" style="background-color:#D4AF37;border:none;">Acceuil</a>


            </div>

        </div>

    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Le reçu de réservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 20rem;margin-left:15%;">
                        <div class="card-body">

                            <?php
                            $id_reservation = $_GET["id_reservation"];
                            $con = mysqli_connect('localhost', 'Root', '', 'file');
                            $sql = "SELECT nom,prénom,nom_agence,r.prix,heure_sortie,date_sortie,heure_retour FROM reservation r INNER JOIN bateau b ON r.id_bateau = b.id_bateau INNER JOIN agence a ON b.id_agence = a.id_agence INNER JOIN client c ON r.id_client = c.id_client WHERE r.id_reservation = '$id_reservation'";

                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                require_once 'phpqrcode/qrlib.php';
                                $agence = $row['nom_agence'];
                                $price = $row['prix'];
                                $prix = $price /2;
                                $date_sortie = $row['date_reservation'];
                                $time_sortie = $row['date_sortie'];
                                $time_retour = $row['date_retour'];

                                $info_scan = "Agence : $agence - Prix : $prix DH - Date sortie : $date_sortie - Heure de sortie : $time_sortie - heure de retour : $time_retour";

                                $size = 3;
                                $level = 'H';
                                ob_start();
                                QRcode::png($info_scan, null, $level, $size);
                                $qr_code_image = ob_get_contents();
                                ob_end_clean();
                            ?>



                                <img id="qr-code" src="data:image/png;base64,<?php echo base64_encode($qr_code_image); ?>" alt="QR Code">
                                <div style="display: flex;flex-direction:column;text-align:start;" id="recu">
                                    <p><span>Nom et Prenom :</span> <?php echo $row["nom"] ?> <?php echo $row["prénom"] ?></p>
                                    <p><span>Agence :</span> <?php echo $row["nom_agence"] ?></p>
                                    <p><span>Date sortie :</span> <?php echo $row["date_sortie"] ?></p>
                                    <p><span>Heure de sortie :</span> <?php echo $row["heure_sortie"] ?></p>
                                    <p><span>Heure de retour :</span> <?php echo $row["heure_retour"] ?></p>
                                    <p><span>Prix :</span> <?php echo $prix ?> DH</p>


                                </div>

                                <a href="#" class="btn btn-primary" onclick="downloadPDF()">Télécharger</a>

                            <?php
                            }
                            ?>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>











    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            font-size: 14px;
            text-align: center;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            background: rgb(255, 244, 209);
            background: linear-gradient(90deg, rgba(255, 244, 209, 1) 0%, rgba(255, 247, 222, 1) 38%);
        }

        .wrapperAlert {
            width: 500px;
            height: 400px;
            overflow: hidden;
            border-radius: 12px;
            border: none;
            border-top-right-radius: 45px;
            border-bottom-left-radius: 45px;
            background-color: #fff;
            box-shadow: -1px 10px 5px 0px rgba(184, 184, 184, 0.75);
            -webkit-box-shadow: -1px 10px 5px 0px rgba(184, 184, 184, 0.75);
            -moz-box-shadow: -1px 10px 5px 0px rgba(184, 184, 184, 0.75);
        }

        #recu p span {
            font-weight: bold;
            font-size: 0.7rem;
        }

        .topHalf {
            width: 100%;
            color: white;
            overflow: hidden;
            min-height: 250px;
            position: relative;
            padding: 40px 0;
            background: rgb(0, 0, 0);
            background: -webkit-linear-gradient(45deg, #D4AF37, #D4AF37);
        }

        .topHalf p {
            margin-bottom: 30px;
        }

        svg {
            fill: white;
        }

        .topHalf h1 {
            font-size: 2.25rem;
            display: block;
            font-weight: 500;
            letter-spacing: 0.15rem;
            text-shadow: 0 2px rgba(128, 128, 128, 0.6);
        }

        /* Original Author of Bubbles Animation -- https://codepen.io/Lewitje/pen/BNNJjo */
        .bg-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            /* fade(green, 75%);*/
            bottom: -160px;

            -webkit-animation: square 20s infinite;
            animation: square 20s infinite;

            -webkit-transition-timing-function: linear;
            transition-timing-function: linear;
        }

        li:nth-child(1) {
            left: 10%;
        }

        li:nth-child(2) {
            left: 20%;

            width: 80px;
            height: 80px;

            animation-delay: 2s;
            animation-duration: 17s;
        }

        li:nth-child(3) {
            left: 25%;
            animation-delay: 4s;
        }

        li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;

            animation-duration: 22s;

            background-color: rgba(white, 0.3);
            /* fade(white, 25%); */
        }

        li:nth-child(5) {
            left: 70%;
        }

        li:nth-child(6) {
            left: 80%;
            width: 120px;
            height: 120px;

            animation-delay: 3s;
            background-color: rgba(white, 0.2);
            /* fade(white, 20%); */
        }

        li:nth-child(7) {
            left: 32%;
            width: 160px;
            height: 160px;

            animation-delay: 7s;
        }

        li:nth-child(8) {
            left: 55%;
            width: 20px;
            height: 20px;

            animation-delay: 15s;
            animation-duration: 40s;
        }

        li:nth-child(9) {
            left: 25%;
            width: 10px;
            height: 10px;

            animation-delay: 2s;
            animation-duration: 40s;
            background-color: rgba(white, 0.3);
            /*fade(white, 30%);*/
        }

        li:nth-child(10) {
            left: 90%;
            width: 160px;
            height: 160px;

            animation-delay: 11s;
        }

        @-webkit-keyframes square {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-500px) rotate(600deg);
            }
        }

        @keyframes square {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-500px) rotate(600deg);
            }
        }

        .bottomHalf {
            align-items: center;
            padding: 35px;
        }

        .bottomHalf p {
            font-weight: 500;
            font-size: 1.05rem;
            margin-bottom: 20px;
        }

        button {
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 12px;
            padding: 10px 18px;
            background-color: #019871;
            text-shadow: 0 1px rgba(128, 128, 128, 0.75);
        }

        button:hover {
            background-color: #85ddbf;
        }
    </style>
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>