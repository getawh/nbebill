<?php
    require ('connection.php');
    $service_number = $_GET['service_number'];
    $transfer_to = $_POST['transfer_to'];
    $remark = $_POST['remark'];
    $current_date = date("Y-m-d");

    $sql = "SELECT * FROM profile WHERE service_number =".$service_number;
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();
    $previous_owner = $row['owner_name'];
    

    $sql_profile = "UPDATE profile SET  owner_name = '".$transfer_to."' WHERE service_number = ".$service_number;
    $sql_history_update = "UPDATE ownership_history SET to_date = '".$current_date."' WHERE service_number = ".$service_number. " AND owner = '".$previous_owner."'";
    $sql_history_insert = "INSERT INTO ownership_history (service_number, from_date,owner, remark) VALUES ($service_number,'". $current_date."','".$transfer_to."', '".$remark."' )";
    
    $result = $conn -> query($sql_history_insert);
    if($result){
    $result = $conn -> query($sql_profile);
    if(!$result) { echo("ERROR: could not excute the request ".$conn->error); }
    $result = $conn -> query($sql_history_update);
    if(!$result) { echo("ERROR: could not excute the request ".$conn->error); }    
    echo "<script> alert('The service owner changed successfully! ');
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
