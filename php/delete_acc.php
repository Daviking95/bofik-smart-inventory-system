<?php
    require("connect.php");
    $sql_query="SELECT * FROM users";
    $result_set=mysqli_query($conn,$sql_query);
    if(isset($_GET['delete_acc']))
    {
     $sql_query="DELETE FROM users WHERE id=".$_GET['delete_acc'];
     mysqli_query($conn,$sql_query);
     header('Refresh:0; url=../settings.php');
     echo "<script >alert ('Account deleted successfully !');</script>";
    }

?>