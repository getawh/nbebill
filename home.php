<?php
    require ('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Search for service number</title>
</head>
<body>
    <div class="container">

        <form action="logout.php" method="post" class="header">
                <?php
                $sql = "SELECT * FROM login WHERE username = '".$_SESSION['username']."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $name  = strtoupper($row['first_name']." ".$row['last_name']);
                echo('<b> WELCOME &nbsp&nbsp&nbsp&nbsp' . $name . '</b>');
                ?>
                <button type="submit" name="logout" id="logout">Logout</button>
        </form>

            
        <form action="verify_search.php" class="search-form" id="search-form" autocomplete="off" method = "GET">
            <input type="number" name="search-field" id="search" placeholder="Search for service number" required>
            <input type="submit" name ="search-button" value="Search" class="submit-button">

        </form>
        <div class="profile">
            <a href="list_profile.php"><span>List profiles </span></a>
            <a href="register_profile.php"><span>Register profile </span></a>
        </div>

    </div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>