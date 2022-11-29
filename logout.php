<?php
    session_start();
    if(isset($_POST['logout'])){
        if(isset($_SESSION['username'])){
            $_SESSION['username'] = NULL;
        }else if(isset($_SESSION['service_number'])){
            $_SESSION['service_number'] = NULL;
        }
        header('Location: index.php');
    }
?>
