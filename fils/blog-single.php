<?php

session_start();
if (isset($_SESSION['id_client'])) {
  $id_client = $_SESSION['id_client'];
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
                      <a href="profile_agence.php" class="nav-link text-left">Profile</a>
                    <?php
                    } elseif (isset($_SESSION["id_client"])) {
                    ?>
                      <a href="profile_client.php" class="nav-link text-left">Mon profile</a>
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

    <?php
    require_once("PHP/db.php");
    if (isset($_GET["id_pub"])) {
      $id = $_GET["id_pub"];
    }
    $sql = "SELECT * FROM publication p INNER JOIN agence a ON p.id_agence = a.id_agence WHERE p.id_pub = '$id'";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
    ?>
    <div class="intro-section site-blocks-cover innerpage" style="background-image: url('<?php echo isset($row["img_pub"]) ? $row["img_pub"] : ''; ?>');">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-lg-8 mt-5" data-aos="fade-up">
            <h1><?php echo $row["titre_pub"]; ?></h1>
            <p class="text-white text-center">
              <?php echo $row["date_pub"]; ?> by <a href="#"><?php echo $row["nom_agence"]; ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <p class="lead"><span>Description :</span> <?php echo $row["text_pub"]; ?></p>

            <div class="pt-5">
              <h3 class="mb-5">
                <?php
                $count = "SELECT COUNT(*) FROM commentaire WHERE id_pub='$id'";
                $query_count = $con->query($count);
                $rows = $query_count->fetch_assoc();
                if ($query_count->num_rows > 0) {
                  echo $rows["COUNT(*)"];
                } else {
                  echo "0";
                }
                ?> Commentaire
              </h3>
              <ul class="comment-list">
                <?php
                $liste_commentaire = "SELECT * FROM commentaire cm INNER JOIN client c ON cm.id_client = c.id_client WHERE cm.id_pub = '$id'";
                $query_commentaire = $con->query($liste_commentaire);
                if ($query_commentaire->num_rows > 0) {
                  while ($row_commentaire = $query_commentaire->fetch_assoc()) {
                ?>
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="<?php echo $row_commentaire["image"]; ?>" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3><?php echo $row_commentaire["nom"]; ?> <?php echo $row_commentaire["prénom"]; ?></h3>
                        <div class="meta"><?php echo $row_commentaire["date_commentaire"]; ?></div>
                        <p><?php echo $row_commentaire["text_commentaire"]; ?></p>
                      </div>
                    </li>
                <?php
                  }
                }
                ?>
              </ul>
              <?php 
              if(!empty($_SESSION['id_client'])){
                ?>
                  <div class="comment-form-wrap pt-5">
                      <h3 class="mb-5">Laissez un commentaire</h3>
                      <form action="PHP/commentaire.php" method="post" class="p-5 bg-light">
                        <div class="form-group">
                          <label for="name">Text :</label>
                          <textarea type="text" class="form-control" name="text" style="height: 30vh;"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="id_pub" value="<?php echo $id; ?>">
                          <input type="submit" name="commentaire" value="Poster" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                <?php
              }
              
              
              
              ?>
            
            </div>
          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <img src="<?php echo $row["logo"]; ?>" alt="Image placeholder" class="img-fluid mb-4">
            </div>
          </div>
        </div>
      </div>
    </section>








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




  <script src="js/main.js"></script>

</body>

</html>