<?php
    require ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="change_service.css">
    <title>Change service type</title>
</head>

<body>
    <div class="container">

        <div class="header">
            <?php echo("<p><b>SERVICE NUMBER :</b>   ". $_GET['service_number'] ."</p>");    ?>
            
            <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
            </form>
            
        </div>
        <form action="verify_change.php?service_number=<?php echo($_GET['service_number']) ?>" method = "POST" class="input_block">
            <div>
                <?php 
                $service_number = $_GET['service_number'];
                $sql = "SELECT service_type FROM profile WHERE service_number = ". (int)$service_number;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $service_type = $row['service_type'];
                
                
                
                echo("<p>From : </p><b>". $service_type ."</b>");    ?>
    
            </div>
            <div>
    
                <span>To : </span>
                
                <select name="service_list" id="service_list">
        
                    <?php
        
                    $sql = "SELECT service_type FROM service_types";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo(" <option value='".$row['service_type']."'>".$row['service_type']."</option> ");
                        }
                    }
                    ?>
                    
                </select>
            </div>

        <button type="submit" name="change" id="change">Change</button>
        </form>
    </div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>