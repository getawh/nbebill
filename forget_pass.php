<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forget_pass.css">
    <title>Recover password </title>
</head>
<body>
    <form action="process_recover.php" method="GET">
        <div class="header">
            <b>RECOVER PASSWORD </b>
                 
        </div>
        
        <input type="text" name="recover_pass_field" id="recover_pass_field" placeholder="Enter your username" required>
        <input type="submit" value="RECOVER" name="recover" class="recover-button">

    </form>
</body>
</html>