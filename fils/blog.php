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



    <div class="intro-section" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
            <h1>Publication</h1>
            <p>Les nouvelles publication</p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">

          <?php
          require_once('PHP/db.php');

          $sql = "SELECT * FROM publication";
          $result = mysqli_query($con, $sql);
          ?>


          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
              <div class="blog-entry">

                <img src="<?php echo $row['img_pub']; ?>" style=" height: 300px;" class="card-img-top" alt="<?php echo $row['img_pup']; ?>">
                 <div class="blog-entry-contents">
                  <h3 style="margin-top:7px;"><?php echo $row['titre_pub']; ?></h3>
                  <div style="display: flex;">
                    <p><?php $text_pub = $row['text_pub'];
                      $text_limit = 20;
                      $text_display = strlen($text_pub) > $text_limit ? substr($text_pub, 0, $text_limit) . '...' : $text_pub;
                      echo $text_display; ?>
                    </p>
                    <form action="blog-single.php?id_pub=<?php echo $row['id_pub']; ?>" method="post">
                      <button type="submit" name="submit" class="btn btn-primary">Voir le detail</button>
                    </form>

                  </div>

                  <form action="" method="get">
                    <?php $id = $row['id_agence'];
                    $sql2 = "SELECT * FROM agence where id_agence='$id' ";
                    $result2 = mysqli_query($con, $sql2);
                    while ($rowd = mysqli_fetch_assoc($result2)) { ?>
                      <div class="meta">Posted by <a><?php echo $rowd['nom_agence']; ?></a> In <a><?php echo $row['date_pub']; ?></a></div>
                    <?php } ?>
                  </form>


                </div>

              </div>
            </div>

          <?php } ?>



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




  <script src="js/main.js"></script>

</body>

</html>