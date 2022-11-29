<?php

    require ('connection.php');
    
    $service_number = $_GET['service_number'];
    if(!isset($_POST['payment_date'])){
        $payment_date = date("Y-m-d");
    }else{
        $payment_date = $_POST['payment_date'];
    }
    $payed_amount = $_POST['payment_amount'];

    $sql = "SELECT * FROM profile WHERE service_number =".$service_number;
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();


    $sql_profile = "UPDATE profile SET  last_renew_date = '".$payment_date."' && last_payed_amount ='".$payed_amount."' WHERE service_number = ".$service_number;

    $sql_history_insert = "INSERT INTO payment_history (service_number, date,payed_amount) VALUES ($service_number,'". $payment_date."','".$payed_amount."' )";
    
    $result = $conn -> query($sql_history_insert);
    if($result){
        $result = $conn -> query($sql_profile);
        if(!$result) { echo("ERROR: could not excute the request ".$conn->error); }
    
        echo "<script> alert('The service renewed successfully! ');
            window.location.href = 'profile.php?service_number=".$service_number."';
        </script> ";
    }
    else{
        echo("ERROR: could not excute the request ".$conn->error);
    }
        
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
