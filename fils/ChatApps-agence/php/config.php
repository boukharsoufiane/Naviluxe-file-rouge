<?php
  $hostname = "localhost";
  $username = "Root";
  $password = "";
  $dbname = "file";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>