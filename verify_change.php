    <?php
        require ('connection.php');
        $service_number = $_GET['service_number'];
        $service_type = $_POST['service_list'];
        $sql = "UPDATE profile SET  service_type = '".$service_type."' WHERE service_number = ".$service_number;
        $result = $conn -> query($sql);
        if($result){
            echo "<script> alert('The service type updated successfully! ');
                window.location.href = 'profile.php?service_number=".$service_number."';
            </script> ";
        }else{
            echo("ERROR: could not excute the request ".$conn->error);
        }
        
    ?>