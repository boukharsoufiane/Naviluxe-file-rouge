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
                    <a href="index.php?#propos" class="nav-link text-left">A propos</a>
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
            <h1>Notre services</h1>
            <p><a href="contact.php" class="btn btn-primary py-3 px-5">Contact</a></p>
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
              <h3>30 Years of Experience</h3>
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

    

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="text-white">Contact</h2>
            <p class="lead text-white">On est disponible 7j/7j.</p>
            <p class="mb-0"><a href="contact.php" class="btn btn-warning py-3 px-5 text-white">Contactez-Nous</a></p>
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




  <script src="js/main.js"></script>

</body>

</html>