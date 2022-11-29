<?php
require('header.php');

$service_number = $_POST['service_number'];
$service_type = $_POST['service_type'];
$owner_name = $_POST['owner_name'];
$last_renew_date = $_POST['last_renew_date'];
$last_payed_amount = $_POST['last_payed_amount'];
$password = $_POST['password'];
$today = date('Y-m-d');
$new = 'NEW';
$sql = "SELECT * FROM profile WHERE service_number =". $service_number;
$result = $conn->query($sql);
if (($service_number < 900000000) or ($service_number > 999999999)){
    echo("<script>
        alert('Please enter a valid service number!');
        window.location.href = 'register_profile.php';
    </script>");
}else if($result->num_rows > 0){
    echo("<script>
        alert('There is a profile with this service number!');
        window.location.href = 'register_profile.php';
    </script>");
}else{
    
    if($last_renew_date && $last_payed_amount){
        $sql_insert_profile = "INSERT INTO profile (service_number, service_type, password,owner_name, last_renew_date, last_payed_amount) VALUES ($service_number,'". $service_type."', '". $password."','".$owner_name."', '".$last_renew_date."', $last_payed_amount);";
    }else{
        $sql_insert_profile = "INSERT INTO profile (service_number, service_type, password,owner_name) VALUES ($service_number,'". $service_type."', '". $password."','".$owner_name."')";
    }
    
    $sql_payment_history = "INSERT INTO payment_history (service_number, date ,payed_amount) VALUES ($service_number, '".$last_renew_date."', $last_payed_amount)";
    
    $sql_ownership_history = "INSERT INTO ownership_history (service_number, from_date, owner, remark) VALUES ($service_number,'". $today."','".$owner_name."','".$new."')";
    
    $result = $conn->query($sql_insert_profile);
    if($result){
        $result_ownership = $conn->query($sql_ownership_history);
        if($last_renew_date && $last_payed_amount){
            $result_paymnet = $conn->query($sql_payment_history);
        }
        echo("<script>
        alert('Profile registered successfully!');
        window.location.href = 'register_profile.php';
    </script>");
        // echo('its in');
        // echo($conn -> error);
    }else{
        echo ("<script>
        alert('".($conn -> error)."');
        window.location.href = 'register_profile.php';
    </script>");
        
    }
}

?>