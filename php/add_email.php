<?php
    session_start();
    require_once('connect.php');

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        return $data;
    }
     if(isset($_POST['submit_email'])){
         $email= test_input($_POST["add_email"]);
          $trn_date = date('Y-m-d H:i:s');
          
           $sql2= "INSERT INTO `add_email` (`add_email`, `date`)
                     VALUES('".$email."', '".$trn_date."')";
                    $result2= mysqli_query($conn, $sql2);
                     header('Refresh:0; url=../settings.php');
                     echo "<script >alert ('Email successfully added');</script>";
                     
     }
                     
    ?>