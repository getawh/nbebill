<?php
    require ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="renew.css">
    <title>Renew</title>
</head>

<body>
.<div class="container">
    
    <div class="header">
        <?php echo("<p><b>SERVICE NUMBER : </b>".  $_GET['service_number'] ."</p>"); ?>

        <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>
    </div>
    
    <form action="verify_renew.php?service_number=<?php echo($_GET['service_number']) ?>" method="POST" class="input_block">
    <div class="amount">

        <span>Payed amount</span><input type="number" name="payment_amount" id="payment_amount" required>
    </div>
    <div class="date">

        <span>Payment date</span><input type="date" name="payment_date" id="payment_date">
    </div>
    <button type="submit" name="renew" id="renew">Renew</button>
</form>
</div>
</body>
</html>