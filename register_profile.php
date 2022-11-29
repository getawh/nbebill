<?php
    require ('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register_profile.css">
    <title>Register new profile</title>
</head>
<body>

    <div class="container">
        <div class="header">
            <b>REGISTER NEW PROFILE</b>
        <form action="logout.php" method="POST">
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>
        
        </div>
    
        <form action="verify_register.php" method="POST" class="input_block">

                <div>
                    <span>Service number : </span><input type='number' name='service_number' id='service_number' placeholder="required" style = "border-color : rgb(200, 7, 7);" required>
                </div>
                <div>
                    <span>Service type : </span>
                    <select name="service_type" id="service_type" required>
        
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
                <div>
                    <span>Owner name : </span><input type='text' name='owner_name' id='owner_name' placeholder="required" style = "border-color : rgb(200, 7, 7);" required>
                </div>
                <div>
                    <span>password : </span><input type='password' name='password' id='password' placeholder="required" style = "border-color : rgb(200, 7, 7);" required>
                </div>
                <div>
                    <span>Last renew date : </span><input type='date' name='last_renew_date' id='last_renew_date'>
                </div>
                <div>
                    <span>Last payed amount : </span><input type='number' name='last_payed_amount' id='last_payed_amount' placeholder="optional">
                </div>

                
            <button type="submit" name="register" id="register">Register</button>
    </form>
        </div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>