<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){
        header("Location: home.php");
    }
    if(isset($_SESSION['service_number'])){
        header("Location: guest_profile.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login page</title>
</head>
<body>
    <form action="authenticate.php" method="POST">
        <div class="header">
            <h3>LOGIN</h3>

        </div>
        <div class="input_form">
            
            <input type="text" name="username" id="username" placeholder="username" required>
            <input type="password" name="password" id="password" placeholder="password" required>
            <div class = "previlage">
                Admin<input type="radio" name="previlage"  value="admin" checked="checked">
                <input type="radio" name="previlage"  value="user">User
            </div>
            <input type="submit" name = "login" value="login" id="login">
        </div>

        <div class="footer">
        
            <p>forget password? <a href="/forget_pass.php">click here</a></p>
        </div>
    </form>


</script>
</body>
</html>