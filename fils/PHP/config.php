<?php
require_once "vendor/autoload.php";
  
// Connect with the database
$db = new mysqli('localhost', 'Root', '', 'file');
  
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
  
$gateway = Omnipay\Omnipay::create('AuthorizeNetApi_Api');
$gateway->setAuthName('9f7cZW9P');
$gateway->setTransactionKey('6eU2fH783vg2Zymn');
$gateway->setTestMode(true); //comment this line when move to 'live'