<?php
session_start();
include_once "php/config.php";
if (isset($_SESSION["id_agence"])) {
  $id_agence = $_SESSION["id_agence"];
}

?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM agence WHERE id_agence = '$id_agence'");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="../../<?php echo $row['logo'] ?>" alt="">
          <div class="details">
            <span><?php echo $row['nom_agence'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="../../index.php" class="back">Accueil</a>
      </header>
      <div class="search">
        <?php
        $query = mysqli_query($conn, "SELECT COUNT(*) FROM client WHERE status = 'En ligne'");
        $query_two = mysqli_query($conn, "SELECT COUNT(*) FROM client WHERE status = 'Hors ligne'");

        if (mysqli_num_rows($query) > 0) {
          $rows = mysqli_fetch_assoc($query);
        }
        if (mysqli_num_rows($query_two) > 0) {
          $row_two = mysqli_fetch_assoc($query_two);
        }
        ?>
        <span class="text">Clients en ligne : [<?php echo $rows['COUNT(*)']; ?>]</span>
        <span class="text">Clients hors ligne : [<?php echo $row_two['COUNT(*)']; ?>]</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>


    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>