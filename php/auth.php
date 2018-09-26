<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit(); 
    }else {
        $now = time(); // Checking the time now when home page starts.
        if ($now > $_SESSION['expire']) {
            
             $user_last_login = $_SESSION['last_login'];
             $sql= "UPDATE `users` SET `last_login`='0' WHERE id = '".$_SESSION['user_id']."'";
             $result=mysqli_query($conn, $sql);
            session_destroy();
            // header("Location: ../../index.php");
            header('Refresh:0; url= ../index.php');
            echo "<script >alert ('Your session has expired');</script>";
        }
      }
    
?>