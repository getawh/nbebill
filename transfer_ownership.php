<?php
    require ('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transfer_ownership.css">
    <title>Change service service type</title>
</head>
<body>

    <div class="container">
        <div class="header">
            <?php echo("<p><b>SERVICE NUMBER :</b>".  $_GET['service_number'] ."</p>"); ?>
            
        <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>
        
        </div>
    
        <form action="verify_transfer.php?service_number=<?php echo($_GET['service_number']) ?>" method="POST" class="input_block">
            <div>
                <?php
                    $service_number = $_GET['service_number'];
                    $sql = "SELECT * FROM profile WHERE service_number =".(int)$service_number;
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo("<p>From :  </p> <b>". $row['owner_name'] ."</b>
                    </div>
                <div>
                    <span>To : </span><input type='text' name='transfer_to' id='transfer_to' required>
                </div>
                <div>
                    <span>Remark : </span><input type='text' name='remark' id='remark' required>
                </div>
                " )
                    
            ?>
            
                
                
            <button type="submit" name="transfer" id="transfer">Transfer</button>
    </form>
        </div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>