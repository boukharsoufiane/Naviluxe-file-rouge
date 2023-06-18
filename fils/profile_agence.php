<?php
session_start();
require_once("PHP/db.php");

if (isset($_SESSION['id_client'])) {
    $id_agence = $_SESSION['id_agence'];
} elseif (isset($_SESSION['id_agence'])) {
    $id_agence = $_SESSION['id_agence'];
}

if (isset($_POST["imageBateauAutre"])) {
    $id_bateau = $_POST["id_bateau"];
    $imageAutre = $_FILES["imageAutre"]["name"];
    $tmp_name = $_FILES["imageAutre"]["tmp_name"];
    $dossier = "images/images_bateau/" . $imageAutre;
    move_uploaded_file($tmp_name, $dossier);
    if (!empty($imageAutre)) {
        $sql = "INSERT INTO img_bateau (src_img,typ_img,id_bateau)VALUES('$dossier','secondaire','$id_bateau')";
        $result = $con->query($sql);
        if ($result) {
            header("Location: http://localhost/Naviluxe/fils/profile_agence.php?msgAutreImage=true&bateau=" . $id_bateau);
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Naviluxe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">




</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <div class="header-top bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-lg-3">
                        <span class="h2 d-block"><img src="images/logo.png" alt="logo" width="150vw" height="150vh"></span>
                    </div>
                    <div class="col-lg-3 d-none d-lg-block">

                        <div class="quick-contact-icons d-flex">
                            <div class="icon align-self-start">
                                <span class="icon-location-arrow text-primary"></span>
                            </div>
                            <div class="text">
                                <span class="h4 d-block">Tanger ,Morocco</span>
                                <span class="caption-text">Avenue California</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="quick-contact-icons d-flex">
                            <div class="icon align-self-start">
                                <span class="icon-phone text-primary"></span>
                            </div>
                            <div class="text">
                                <span class="h4 d-block">+212607059355</span>
                                <span class="caption-text">Notre numero de telephone</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="quick-contact-icons d-flex">
                            <div class="icon align-self-start">
                                <span class="icon-envelope text-primary"></span>
                            </div>
                            <div class="text">
                                <span class="h4 d-block">Naviluxe@gmail.com</span>
                                <span class="caption-text">Notre email adresse</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 d-block d-lg-none text-right">
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>




            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

                <div class="container">
                    <div class="d-flex align-items-center">

                        <div class="mx-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li>
                                        <a href="index.php" class="nav-link text-left">Acceuil</a>
                                    </li>
                                    <li>
                                        <a href="index.php?#propos" class="nav-link text-left">A propos</a>
                                    </li>
                                    <li>
                                        <a href="services.php" class="nav-link text-left">Services</a>
                                    </li>
                                    <li><a href="blog.php" class="nav-link text-left">Blog</a></li>
                                    <li>
                                        <a href="contact.php" class="nav-link text-left">Contact</a>
                                    </li>

                                    <?php


                                    if (isset($_SESSION["id_agence"])) {
                                    ?>
                                        <li>
                                            <a href="profile_agence.php" class="nav-link text-left">Profil</a>

                                        </li>
                                        <li>
                                            <a href="ChatApps-agence/users.php" class="nav-link text-left">Messenger</a>
                                            <a href="ChatApps-agence/admin/users.php" class="nav-link text-left">Admin</a>


                                        </li>
                                    <?php
                                    }


                                    ?>

                                </ul>

                            </nav>


                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="site-section" id="profile-header">
            <div class="container">
                <div id="agenceListe">
                    <div class="dropdown">
                        <button id="dropdown-toggle">La Liste des operations</button>
                        <div id="dropdown-menu">
                            <form action="" method="post">
                                <button type="submit" name="annonceAjouter">Ajouter une annonce</button>
                            </form>
                            <form action="" method="post">
                                <button type="submit" name="publication">Ajouter une publication</button>
                            </form>
                            <form action="" method="post">
                                <button type="submit" name="annonceEditer">Editer mes annonces</button>
                            </form>
                            <form action="" method="post">
                                <button type="submit" name="publicationEditer">Editer mes publications</button>
                            </form>
                            <form action="" method="post">
                                <button type="submit" name="commande">Gestion des réservations</button>
                            </form>
                            <form action="" method="post">
                                <button type="submit" name="informationAgence">Editer mes informations</button>
                            </form>
                            <form action="PHP/deconnexion.php" method="post">
                                <button type="submit" name="deconnexion_agence">Déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="container" id="historique">
                <?php

                include_once("PHP/historique.php");
                include_once("PHP/ajouter_agence.php");
                include_once("PHP/form_annonce.php");
                include_once("PHP/edit_annonce.php");
                include_once("PHP/detail.php");
                include_once("PHP/editer_bateau.php");
                include_once("PHP/profile_agence.php");
                echo $publication;
                echo $formAnnonce;
                echo $detail;
                echo $informationAgence;




                if ($annonecTable != "") {
                ?>
                    <table id="dtBasicExamples" class="table table-sm">

                        <thead>
                            <tr>
                                <th class="th-sm">Description

                                </th>

                                <th class="th-sm">Capacité

                                </th>
                                <th class="th-sm">Categorie



                                </th>
                                <th class="th-sm">Lien

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $annonecTable; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Description
                                </th>

                                <th>Capacité
                                </th>
                                <th>Categorie
                                </th>

                                <th>Lien
                                </th>

                            </tr>
                        </tfoot>
                    </table>
                <?php
                }








                if ($output != "") {
                ?>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Nom de client

                                </th>
                                <th class="th-sm">Prénom de client

                                </th>
                                <th class="th-sm">Date de sortie

                                </th>
                                <th class="th-sm">Heure de sortie

                                </th>
                                <th class="th-sm">Heure de retour

                                </th>
                                <th class="th-sm">Prix

                                </th>
                                <th class="th-sm">Operation

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $output; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom de client
                                </th>
                                <th>Prénom de client
                                </th>
                                <th>Date de reservation
                                </th>
                                <th>Heure de sortie
                                </th>
                                <th>Heure de retour
                                </th>
                                <th>Prix
                                </th>
                                <th>Operation
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                <?php
                }






                ?>
            </div>
            <div class="container">

                <?php
                include_once("PHP/display_publication.php");


                if ($pubEdit != "") {
                ?>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Titre de publication

                                </th>
                                <th class="th-sm">Text de publication

                                </th>
                                <th class="th-sm">Lien

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $pubEdit; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Titre de publication
                                </th>
                                <th>Text de publication
                                </th>
                                <th>Lien
                                </th>

                            </tr>
                        </tfoot>
                    </table>
                <?php

                }



                ?>

            </div>
            <div class="container">
                <div>
                    <?php

                    if (isset($_GET["bateau"])) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="">Ajouter autre image de bateau</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imageAutre" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <input type="hidden" name="id_bateau" value="<?php $id = $_GET["bateau"];
                                                                            echo $id; ?>">
                            <button style="margin-top: 2%;" name="imageBateauAutre" type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    <?php
                    }



                    ?>

                </div>
                <div class="row" style="margin-top: 5%;">

                    <?php
                    require_once("PHP/db.php");
                    if (isset($_GET["bateau"]) && $publication == "" && $detail == "" && $pubFormEdit == "" && $formAnnonce == "" && $output == "" && $annonecTable == "") {
                        $sql = "SELECT * FROM img_bateau WHERE id_bateau = {$_GET["bateau"]}";
                        $query = $con->query($sql);
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                echo '
                                
                                <form action="PHP/editer_bateau.php" method="POST" enctype="multipart/form-data">
                                    <div class="card" style="width: 20rem;margin-left:20px;">
                                        <img class="card-img-top" src="' . $row["src_img"] . '" alt="Card image cap" width="30vw" height="200vh">
                                        <div class="card-body">
                                            <input type="hidden" value="' . $row["id_img"] . '" name="id_image"/>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Editer" name="edit_img"/>
                                        </div>
                                    </div>
                               </form>';
                            }
                        }
                    }
                    $formPubEDITER = "";

                    if (isset($_GET["id_pub"]) && $publication == "" && $detail == "" && $formAnnonce == "" && $output == "" && $annonecTable == "") {
                        $sql = "SELECT * FROM publication WHERE id_pub = {$_GET["id_pub"]}";
                        $query = $con->query($sql);
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                $formPubEDITER .= '<div style="margin-left:15%;">
                                <form action="PHP/display_publication.php" method="POST" enctype="multipart/form-data">
                                    <div class="card" style="width: 45rem;margin-left:20px;">
                                        <img class="card-img-top" src="' . $row["img_pub"] . '" alt="Card image cap" width="30vw" height="300vh">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="profile_details_text">Titre de publication :</label>
                                                <input style="width:100%;" type="text" name="titre_pub" class="form-control" value="' . $row["titre_pub"] . '"  >
                                            </div>
                                            <div class="form-group">
                                                <label class="profile_details_text">Text de publication :</label>
                                                <textarea style="height:30vh;" type="text" name="text_pub" class="form-control">' . $row["text_pub"] . '</textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_pub" value="' . $row["id_pub"] . '" />
                                            <input type="submit" class="btn btn-primary" value="Editer" name="Editer_publication"/>
                                        </div>
                                    </div>
                               </form></div>';
                                echo $formPubEDITER;
                            }
                        }
                    }
                    if ($publication == "" && $formAnnonce == "" && $detail == "" && $annonecTable == "" && $formPubEDITER == "" && $output == "" && $informationAgence == "" && $pubEdit == "" && $pubFormEdit == "" && (!isset($_GET["bateau"]))) {
                        echo '<div><h3>La réussite de l\'agence: ' . $successRateAgence . ' %</h3></div>';
                        echo $dashboard;
                    }









                    ?>

                </div>

            </div>

        </div>
        <div class="modal" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Publication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre publication a été ajoutée réussir</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="bateau" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bateau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre annonce a été ajoutée réussir</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="update_bateau" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bateau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre bateau a été modifié réussir</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="update_images" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Les images du bateau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre images a été modifié réussir</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="update_valider" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Validation de réservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">La réservation a été validé</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="retour_reservation" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Retour de réservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">La réservation a été terminé</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="annuler_reservation" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Annulation de réservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">La réservation a été annulé</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="infoAgence" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editer les informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre information a été modifiée avec réussir.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="editerPublication" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editer publication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Votre publication a été modifiée avec réussir.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="msgAutre" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editer les image de bateau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding: 10px;font-size:25px;">Vous avez ajoutée autre image de bateau avec réussir.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">D'accord</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <p class="mb-4">Naviluxe</p>
                        <p>Notre site de réservation de bateaux est dédié à offrir une expérience exceptionnelle pour les passionnés de navigation et de plaisance. Nous sommes une équipe passionnée et expérimentée dans le domaine, et nous nous efforçons de rendre la location de bateaux simple, pratique et sécurisée.</p>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Notre compagnie</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="#">À propos</a></li>
                            <li><a href="#">Actualités</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Notre équipe</a></li>
                            <li><a href="#">Carrières</a></li>
                            <li><a href="#">Projets</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Notre services</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Industriel</a></li>
                            <li><a href="#">Construction</a></li>
                            <li><a href="#">Remodelage</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Contact</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Centre d'aide</a></li>
                            <li><a href="#">Communauté d'assistance</a></li>
                            <li><a href="#">Appuyez sur</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Nos partenaires</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                            <p>
                                Copyright &copy; Naviluxe 2023 ,Tanger
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" />
        </svg></div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                "paging": true
            });
            $('.dataTables_length').addClass('bs-select');
        });


        $(document).ready(function() {
            $('#dtBasicExamples').DataTable({
                "paging": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const openPublication = urlParams.get('open_publication');

            if (openPublication === 'true') {
                $('#myModal').modal('show');
            }

            $('.close').click(function() {
                $('#myModal').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParamsAutre = new URLSearchParams(window.location.search);
            const openImageAutre = urlParamsAutre.get('msgAutreImage');

            if (openImageAutre === 'true') {
                $('#msgAutre').modal('show');
            }

            $('.close').click(function() {
                $('#msgAutre').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParamss = new URLSearchParams(window.location.search);
            const openBateau = urlParamss.get('open_bateau');

            if (openBateau === 'true') {
                $('#bateau').modal('show');
            }

            $('.close').click(function() {
                $('#bateau').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParams_edit = new URLSearchParams(window.location.search);
            const openPublication = urlParams_edit.get('open_edit');

            if (openPublication === 'true') {
                $('#update_bateau').modal('show');
            }

            $('.close').click(function() {
                $('#update_bateau').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParams_edit = new URLSearchParams(window.location.search);
            const openPublication = urlParams_edit.get('pubUpdate');

            if (openPublication === 'true') {
                $('#editerPublication').modal('show');
            }

            $('.close').click(function() {
                $('#editerPublication').modal('hide');
            });
        });



        $(document).ready(function() {
            const urlParams_images = new URLSearchParams(window.location.search);
            const openPublication = urlParams_images.get('open_image');

            if (openPublication === 'true') {
                $('#update_images').modal('show');
            }

            $('.close').click(function() {
                $('#update_images').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParams_valider = new URLSearchParams(window.location.search);
            const openPublication = urlParams_valider.get('open_valider');

            if (openPublication === 'true') {
                $('#update_valider').modal('show');
            }

            $('.close').click(function() {
                $('#update_valider').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParams_retour = new URLSearchParams(window.location.search);
            const openRetour = urlParams_retour.get('open_retour');

            if (openRetour === 'true') {
                $('#retour_reservation').modal('show');
            }

            $('.close').click(function() {
                $('#retour_reservation').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParamsAnnuler = new URLSearchParams(window.location.search);
            const openAnnuler = urlParamsAnnuler.get('open_annuler');

            if (openAnnuler === 'true') {
                $('#annuler_reservation').modal('show');
            }

            $('.close').click(function() {
                $('#annuler_reservation').modal('hide');
            });
        });

        $(document).ready(function() {
            const urlParamsInfo = new URLSearchParams(window.location.search);
            const openInfo = urlParamsInfo.get('msgInfoEdit');

            if (openInfo === 'true') {
                $('#infoAgence').modal('show');
            }

            $('.close').click(function() {
                $('#infoAgence').modal('hide');
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('msgInfoEdit=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_edit=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_bateau=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_publication=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_image=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_valider=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('bateau')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_retour=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('open_annuler=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('id_pub')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
        $(document).ready(function() {
            $('body').on('click', function() {
                if (window.location.search.includes('pubUpdate=true')) {
                    history.replaceState({}, document.title, window.location.pathname);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var reservation = <?php echo json_encode($countReservation); ?>;
        var reservationAnnuler = <?php echo json_encode($countReservationAnnuler); ?>;
        var reservationTerminer = <?php echo json_encode($countReservationTerminer); ?>;
        console.log(reservationTerminer);
        console.log(reservationAnnuler);


        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Nombre de réservations', 'Réservations annulées', 'Réservations terminées'],
                datasets: [{
                    label: 'Statistiques',
                    data: [reservation, reservationAnnuler, reservationTerminer],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 204, 0, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.getElementById('dropdown-toggle');
            var dropdownMenu = document.getElementById('dropdown-menu');

            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>



    <script src="js/main.js"></script>

</body>

</html>