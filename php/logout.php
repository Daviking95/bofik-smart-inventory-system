<?php
    session_start();
    require_once('connect.php');
     $user_last_login = $_SESSION['last_login'];
     echo $user_last_login;
     $sql= "UPDATE `users` SET `last_login`='0' WHERE id = '".$_SESSION['user_id']."'";
     $result=mysqli_query($conn, $sql);
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: ../index.php");
}
?>