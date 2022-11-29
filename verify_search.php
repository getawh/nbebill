<?php
    require ('header.php');
    $service_number = $_GET['search-field'];
    $sql = "SELECT * FROM profile WHERE service_number =".$service_number;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0){
        header("Location: profile.php?service_number=".$service_number);
        
        // echo("<P><b>Service type :</b>  ".  $row['service_type']."</P><span><a href='/change_service.php?service_number=".$service_number."'>change</a> </span>");
    }
    else{
        echo "<script> 
        alert('there is no account with this service number!');
        window.location.href='home.php';
         </script> 
        ";
    }
?>