<?php
    require('logout.php');
    require ('connection.php');
    if(!isset($_SESSION['service_number'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title><?php echo("SN:  ".$_SESSION['service_number']);    ?></title>
</head>
<body>
    <div class="header">
        <?php echo("<p><b>SERVICE NUMBER :</b>   ". $_SESSION['service_number'] ."</p>");    ?>

        <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>
    </div>
    <div class="current-info">
        <div class="service-type">
            <?php 
            $service_number = $_SESSION['service_number'];
            $sql = "SELECT * FROM profile WHERE service_number =".$service_number;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            // if ($result->num_rows > 0){

            echo("<P><b>Service type :</b>  ".  $row['service_type']."</P>");

            echo("</div>
        <div class='owened-by'>
            
            <p><b>Owned by :</b>  ". $row['owner_name'] ."</p>
        </div>
        <div class='status'>
            
            <p><b>Status :</b> Renewed on ". $row['last_renew_date']."</p>
        </div>
    </div>")
            ?>
    <div class="history">

        <p>Ownership History</p>
        <div class="ownership-history">

            <?php
                $sql = "SELECT * FROM ownership_history WHERE service_number = ".$service_number." ORDER BY from_date DESC";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        if($row['to_date'] == NULL){
                            continue;
                        }else{
                        
                        echo( $row['from_date']." <b>to</b> ". $row['to_date'] ."<b> owned by </b>".  $row['owner'] ." <br><br>");

                        }
                    }
                }
            ?>
            

        </div>
        <br>
        <p>Payment History</p>
        <div class="payment-history">
        <?php
                $sql = "SELECT * FROM payment_history WHERE service_number = ".$service_number." ORDER BY date DESC";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo($row['payed_amount'] ." birr<b> is payed on </b>".  $row['date'] ."<br><br>");
                        
                    }
                }
            ?>
        </div>
    </div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>