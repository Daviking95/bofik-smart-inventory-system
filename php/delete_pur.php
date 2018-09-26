<?php

 require("connect.php");
    $sql_query="SELECT * FROM purchase";
    $result_set=mysqli_query($conn,$sql_query);
    
    $sql_query2 ="SELECT pur_order_no, pur_quantity, pur_date FROM inventory";
    $result_set2 =mysqli_query($conn,$sql_query2);
    if(isset($_GET['delete_pur']))
    {
     $sql_query="DELETE FROM purchase WHERE id=".$_GET['delete_pur'];
     mysqli_query($conn,$sql_query);
     $sql_query2 ="DELETE FROM inventory WHERE pur_id=".$_GET['delete_pur'];
     mysqli_query($conn,$sql_query2);
     header("Location: ../dashboard.php");
    }

?>