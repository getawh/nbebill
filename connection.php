<?php
$server_name = 'localhost';
$db_name = 'id19469424_nbe_bill_management';
$username = 'id19469424_nbe_db';
$password = '@Getawh15321532';
$conn = new mysqli($server_name,$username,$password,$db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
