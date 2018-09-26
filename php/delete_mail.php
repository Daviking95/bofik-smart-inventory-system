<?php

    require("connect.php");
    $sql_query="SELECT * FROM add_email";
    $result_set=mysqli_query($conn,$sql_query);
    if(isset($_GET['delete_id']))
    {
     $sql_query="DELETE FROM add_email WHERE id=".$_GET['delete_id'];
     mysqli_query($conn,$sql_query);
     header("Location: ../dashboard.php");
    }


?>