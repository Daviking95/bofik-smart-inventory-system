<?php
    session_start();
    require_once('connect.php');
    
    
     if (isset($_GET['change_password']))
    {
     $id = $_SESSION['user_id'];
     $old_password = md5($_GET['old_pass']);
     $password = md5($_GET['password']);
     $passwordAgain = md5($_GET['password-again']);
     
     if(!empty($old_password) && !empty($password) && !empty($passwordAgain)) {
         
         if($password === $passwordAgain) {
             $user_check_query = "SELECT * FROM users WHERE id='".$id."' LIMIT 1";
              $result = mysqli_query($conn, $user_check_query);
              $user = mysqli_fetch_assoc($result);
              $admin = "admin";
              if (!$user) { // if the variable does not contain any data, use a die function on it
                header('Refresh:0; url=../change_password.php');
                echo "<script >alert ('This account doesn\'t exist ');</script>";
              }
              
              if ($user) { // if user exists
                if ($old_password !== $user['password']) {
                    header('Refresh:0; url=../change_password.php');
                    echo "<script >alert ('This account doesn\'t exist ');</script>";
                //   array_push($errors, "Username already exists");
                }else {
                    // echo $old_password . " <br> ". $password;
                    $update = ("UPDATE users " .       // The table you want to update
                                  "SET password='".$password."' " . // Column of the table you wish to update
                                  "WHERE id='".$id."' ") ;   // Then tell us the row you want to update, else, the 'SET' above will affect all rows in that column.
                      $res=mysqli_query($conn, $update);
                      if (!$res) { // if the variable does not contain any data, use a die function on it
                        die("Query Failed" . mysqli_error($conn));
                      }else {
                        //   echo $id . "<br> ". $user['password'];
                         session_destroy();
                         header('Refresh:0; url=../index.php');
                         echo "<script >alert ('Password has been changed');</script>";
                      }
                }
              }
             
         }else {
             header('Refresh:1; url=../change_password.php');
             echo "<script >alert ('Passwords do not match');</script>";
         }
         
     } else {
                header('Refresh:0; url=../change_password.php');
                echo "<script >alert ('One of the field is empty');</script>";
        }
     
    }