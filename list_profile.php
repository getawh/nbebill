<?php
    require ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list_profile.css">
    <title>Profile lists</title>
</head>
<body>
    <div class="container">
    <div class="header">
        <b>SERVICE NUMBER LIST</b>

        <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>
    </div>

    <?php
        $sql = "SELECT * FROM profile ORDER BY last_renew_date";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                echo("<div class='card'>
                <div class='card_header'>
                    <b><a href='profile.php?service_number=".$row['service_number']."'>".$row['service_number']."</a></b> <b>".$row['owner_name']."</b>
                </div>
                <hr>
                <div class='card_body'>
                    <div>
                        <p>Last renew date : </p> <b>".$row['last_renew_date']."</b>
                    </div>
                    <div>
                        <p>Last payed amount : </p> <b>".$row['last_payed_amount']."</b>
                    </div>
                </div>
    
            </div>");
            }
        }
    ?>


    </div>
</body>
</html>