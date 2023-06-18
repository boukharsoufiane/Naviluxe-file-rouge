<?php
  
$con = mysqli_connect('localhost', 'Root', '', 'file');
  
if ($con->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
  
