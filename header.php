<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
?>