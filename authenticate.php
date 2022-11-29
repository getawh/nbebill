<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){
        header("Location: home.php");
    }
    
    if (isset($_POST['login'])){

        $username = strtolower($_POST['username']);
        $password = $_POST['password'];
        $previlage = $_POST['previlage'];
        
        if( $previlage == 'admin'){
            $sql = "SELECT * FROM login where username = '".$username."'";
        }else{
            try {
                $sql = "SELECT * FROM profile where service_number = ".(int)$username;
            } catch(Exception $e) {
                echo "<script> alert('there is no account with this service number!') 
                window.location.href = 'index.php';
                </script> ";
            }
        }
        
        $result = $conn->query($sql);  
        $result_guest = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['password']  ==  $password){
                if($previlage == 'admin'){
                    $_SESSION['username'] = $username;
                    header("Location: home.php");
                }else{
                    $_SESSION['service_number']=$username;
                    header("Location: guest_profile.php");
                }
            }
            else{
                
                echo "<script>alert(' the password is incorrect!');
                    window.location.href = 'index.php';
                </script> ";
            }
          }
          else {
            echo "<script> alert('there is no account with this username!') 
                window.location.href = 'index.php';
            </script> ";
          }
          
          $conn->close();
    }
    ?>
    
