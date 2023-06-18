<?php
session_start();

if (isset($_SESSION['id_client'])) {
  $id_client = $_SESSION['id_client'];
} elseif (isset($_SESSION['id_agnce'])) {
  $id_agence = $_SESSION['id_agence'];
}
require_once("PHP/db.php");



$sql_check_payment = "SELECT * FROM reservation WHERE date_reservation <= DATE_SUB(NOW(), INTERVAL 5 HOUR) AND id_reservation NOT IN (SELECT id_reservation FROM payments)";
$query_check = $con->query($sql_check_payment);

if ($query_check->num_rows > 0) {
  $sql_delete_reservations = "DELETE FROM reservation WHERE date_reservation <= DATE_SUB(NOW(), INTERVAL 5 HOUR) AND id_reservation NOT IN (SELECT id_reservation FROM payments)";
  $con->query($sql_delete_reservations);
    
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
            <span class="h2 d-block"><img src="images/logo.png" alt="logo" srcset="" width="150vw" height="150vh"></span>
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
                <span class="h4 d-block">Naviloc@gmail.com</span>
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
                  <li class="active">
                    <a href="index.php" class="nav-link text-left">Acceuil</a>
                  </li>
                  <li>
                    <a href="#propos" class="nav-link text-left">A propos</a>
                  </li>
                  <li>
                    <a href="services.php" class="nav-link text-left">Services</a>
                  </li>
                  <li><a href="blog.php" class="nav-link text-left">Blog</a></li>
                  <li>
                    <a href="contact.php" class="nav-link text-left">Contact</a>
                  </li>
                  <li>
                    <?php
                    if (isset($_SESSION["id_agence"])) {
                    ?>
                      <a href="profile_agence.php" class="nav-link text-left">Profil</a>
                    <?php
                    } elseif (isset($_SESSION["id_client"])) {
                    ?>
                      <a href="profile_client.php" class="nav-link text-left">Mon profil</a>
                    <?php
                    } else {
                    ?>
                      <a href="inscription.php" class="nav-link text-left">Inscription</a>
                      <a href="connexion.php" class="nav-link text-left">Connexion</a>
                    <?php
                    }

                    ?>
                  </li>

                  <li>
                    <?php
                    if (isset($_SESSION["id_client"])) {
                    ?>
                      <a href="ChatApps-client/users.php" class="nav-link text-left">Messenger</a>
                    <?php
                    } elseif (isset($_SESSION["id_agence"])) {
                    ?>
                      <a href="ChatApps-agence/users.php" class="nav-link text-left">Messenger</a>
                      <a href="ChatApps-agence/admin/users.php" class="nav-link text-left">Admin</a>

                    <?php
                    }

                    ?>
                  </li>
                </ul>

              </nav>


            </div>

          </div>
        </div>

      </div>

    </div>

    <div class="hero-slide owl-carousel site-blocks-cover">
      <div class="intro-section" style="background-image: url('images/bateau1.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
              <h1>Explorez, découvrez l'océan</h1>
              <p>Explorez les mystères de l'océan, découvrez ses trésors cachés et laissez-vous
                emporter par l'aventure de votre vie.</p>
              <p><a href="#" class="btn btn-primary py-3 px-5">Voir plus</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="intro-section" style="background-image: url('images/bateau4.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
              <h1>Profitez de l'océan avec votre famille</h1>
              <p>Profitez de moments privilégiés en famille et créez des souvenirs inoubliables en vous émerveillant
                ensemble devant les merveilles de l'océan.</p>
              <p><a href="#" class="btn btn-primary py-3 px-5">Voir plus</a></p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- END slider -->

    <div class="site-section" id="propos">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <span class="text-serif text-primary">À propos de nous</span>
            <h3 class="heading-92913 text-black">Bienvenue sur notre site</h3>
            <p>Notre site de réservation de bateaux est dédié à offrir une expérience exceptionnelle pour les passionnés de navigation et de plaisance. Nous sommes une équipe passionnée et expérimentée dans le domaine, et nous nous efforçons de rendre la location de bateaux simple, pratique et sécurisée.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <span class="flaticon-yacht"></span>
              </span>
              <h3>Yacht de luxe</h3>
              <p>Le yacht de luxe pour des expériences exquises.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <span class="flaticon-shield"></span>
              </span>
              <h3>30 ans d'expérience</h3>
              <p>30 ans d'expertise en réservation de bateaux pour une expérience sans égal.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="service-29283">
              <span class="wrap-icon-39293">
                <span class="flaticon-captain"></span>
              </span>
              <h3>Bon capitaine</h3>
              <p>Naviguez en toute confiance avec nos bons capitaines, experts en mer et passionnés de navigation, pour des aventures maritimes mémorables.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="counter-39392">
              <h3>+1000</h3>
              <span>Nombre de Yacht</span>
            </div>
          </div>
          <div class="col">
            <div class="counter-39392">
              <h3>+7000</h3>
              <span>Clients satisfaits</span>
            </div>
          </div>
          <div class="col">
            <div class="counter-39392">
              <h3>+120</h3>
              <span>Nombre d'employés</span>
            </div>
          </div>
          <div class="col">
            <div class="counter-39392">
              <h3>50</h3>
              <span>Destinations maritimes</span>
            </div>
          </div>
          <div class="col">
            <div class="counter-39392">
              <h3>230</h3>
              <span>Marins professionnels</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Section -->



    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="container search-section">

            <form action="#annonces" method="post" id="searchForm">
              <div class="search-form">
                <div class="form-group">
                  <label for="minPrice">Prix min</label>
                  <input type="number" class="form-control" id="minPrice" name="minPrice">
                </div>
                <div class="form-group">
                  <label for="maxPrice">Prix max</label>
                  <input type="number" class="form-control" id="maxPrice" name="maxPrice">
                </div>
                <div class="form-group">
                  <label for="category">Catégorie</label>
                  <select class="form-control" name="categorie">
                    <option value="">Choisir categorie</option>
                    <option value="Anniversaire">Anniversaire</option>
                    <option value="Marriage">Marriage</option>
                    <option value="Tour">Tour</option>
                  </select>
                </div>
                <button type="submit" id="searchBtn" name="search" class="btn btn-primary">Rechercher</button>
              </div>
            </form>



          </div>


          <div class="col-md-7 text-center">
            <span class="text-serif text-primary">Destination</span>
            <h3 class="heading-92913 text-black text-center">Nos Destinations</h3>
          </div>
        </div>

        <div class="row" id="annonces">
          <?php

          require_once("PHP/db.php");

          $itemsPerPage = 9;

          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

          $start = ($currentPage - 1) * $itemsPerPage;

          $sqlTotal = "SELECT COUNT(*) as total FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence";
          $totalQuery = $con->query($sqlTotal);
          $totalResult = $totalQuery->fetch_assoc();
          $totalItems = $totalResult['total'];

          $totalPages = ceil($totalItems / $itemsPerPage);

          $sql = "";
          $query = "";

          if (isset($_POST["search"])) {
            $minPrice = $_POST["minPrice"];
            $maxPrice = $_POST["maxPrice"];
            $categorie = $_POST["categorie"];

            if ($minPrice != "" && $maxPrice != "") {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.prix >= '$minPrice' AND b.prix <= '$maxPrice' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } elseif (!empty($categorie) && $minPrice != "") {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.category = '$categorie' AND b.prix >= '$minPrice' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } elseif (!empty($categorie) && $maxPrice != "") {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.category = '$categorie' AND b.prix >= '$maxPrice' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } elseif (!empty($categorie)) {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.category = '$categorie' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } elseif ($maxPrice != "") {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.prix <= '$maxPrice' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } elseif ($minPrice != "") {
              $sql  = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence WHERE b.prix <= '$minPrice' LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            } else {
              $sql = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence LIMIT $start, $itemsPerPage";
              $query = $con->query($sql);
            }
          } else {
            $sql = "SELECT * FROM bateau b INNER JOIN agence a ON a.id_agence = b.id_agence LIMIT $start, $itemsPerPage";
            $query = $con->query($sql);
          }




          if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
              $id_bateau = $row['id_bateau'];
          ?>
              <div class="col-md-6 col-lg-4 mb-4" >
                <div class="service-39381">
                  <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php
                      $sql_main = "SELECT src_img FROM img_bateau WHERE typ_img = 'main' AND id_bateau = '$id_bateau'";
                      $query_main = $con->query($sql_main);

                      if ($query_main->num_rows > 0) {
                        $row_main = $query_main->fetch_assoc();
                      ?>
                      <div class="carousel-item active">
                        <img src="./<?php echo $row_main['src_img']; ?>" alt="Image main" class="img-fluid carousel-image">
                      </div>
                      <?php
                      }

                      $sql_secondaire = "SELECT src_img FROM img_bateau WHERE typ_img = 'secondaire' AND id_bateau = '$id_bateau'";
                      $query_secondaire = $con->query($sql_secondaire);

                      if ($query_secondaire->num_rows > 0) {
                        while ($row_secondaire = $query_secondaire->fetch_assoc()) {
                      ?>
                      <div class="carousel-item">
                        <img src="<?php echo $row_secondaire['src_img']; ?>" alt="Image secondaire" class="img-fluid carousel-image">
                      </div>
                      <?php
                        }
                      }
                    ?>

                    </div>

                    
                  </div>

                  <div class="p-4">
                    <h3><a href="#"><span class="icon-room mr-1 text-primary"></span><?php echo $row["locale"]; ?></a></h3>
                    <p><a href="#"><span class="mr-1 text-primary">Description :</span><?php echo $row["description"]; ?></a></p>
                    <div class="d-flex">
                      <div class="mr-auto">
                        <span>Prix /30min :</span>
                        <p style="font-weight: bold;"><?php echo $row["prix"]; ?> DH</p>
                      </div>
                      <?php 
                        if(!isset($_SESSION['id_agence'])){
                          ?>
                          <div class="ml-auto price">
                              <span class="bg-primary">
                                <a class="text-light" href="reservation.php?id_bateau=<?php echo $row['id_bateau']; ?>&prices=<?php echo $row["prix"]; ?>">Réserver</a>
                              </span>
                          </div>
                          <?php 
                        }
                      ?>
                     
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<p>Aucun résultat trouvé.</p>";
          }

          ?>
        </div>
      </div>
      <div class="pagination">
        <?php
        if ($totalPages > 1) {
          echo '<ul>';

          if ($currentPage > 1) {
            echo '<li><a href="?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
          }

          for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
              echo '<li class="active"><span>' . $i . '</span></li>';
            } else {
              echo '<li><a href="?page=' . $i . '#annonces">' . $i . '</a></li>';
            }
          }

          if ($currentPage < $totalPages) {
            echo '<li><a href="?page=' . ($currentPage + 1) . '#annonces">&raquo;</a></li>';
          }

          echo '</ul>';
        }
        ?>
      </div>

    </div>







    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <span class="text-serif text-primary">Equipe</span>
            <h3 class="heading-92913 text-black text-center">Notre equipe</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="images/soufiane.jpg" alt="Image" class="img-fluid">
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </div>
              </figure>
              <div class="person-contents">
                <h3>Soufiane Boukhar</h3>
                <span class="position">Developpeur web</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="images/youssef.jpg" alt="Image" class="img-fluid">
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </div>
              </figure>
              <div class="person-contents">
                <h3>Youssef Bouayez</h3>
                <span class="position">Developpeur web</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="images/med.jpg" alt="Image" class="img-fluid">
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </div>
              </figure>
              <div class="person-contents">
                <h3>Ahmed ben Ali</h3>
                <span class="position">Engineer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="images/karim.jpg" alt="Image" class="img-fluid">
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </div>
              </figure>
              <div class="person-contents">
                <h3>Karim Alami</h3>
                <span class="position">Developpeur web</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="site-section bg-image overlay" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="text-white">Prenez contact avec nous</h2>
            <p class="lead text-white">On est disponible 7j/7j.</p>
            <p class="mb-0"><a href="#" class="btn btn-warning py-3 px-5 text-white">Contactez-nous</a></p>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.carousel').carousel();
    });
  </script>





  <script src="js/main.js"></script>

</body>

</html>