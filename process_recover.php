<?php
include('connection.php');

$from = "getaw.hab@gmail.com";
$to_username = $_GET['recover_pass_field'];

$sql = "SELECT * FROM login where username = '".$to_username."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '. $from . "\r\n";
    
    $to = $row['email_address'];
    $subject = "Recover you NBE bill management system password";
    
    $message = '<html><body>';
    $message .= '<h1>HELLO, <b>'.strtoupper($row['first_name']). '</b></h1>';
    $message .= '<h3> YOUR LOGIN PASSWORD IS :  <b>'.$row['password'].'</b></h2>';
    $message .= '</body></html>';


    if(mail($to,$subject,$message, $headers)) {
        echo "<script> alert('The email message was sent.');
            window.location.href = 'index.php';
        </script> ";
        
    } else {
        echo "<script> alert('The email message was not sent.');
            window.location.href = 'forget_pass.php';
        </script> ";
    }

} else {
echo "<script> alert('there is no account with this username!');
    window.location.href = 'forget_pass.php';
</script> ";
}
  
  $conn->close();

?>