<?php

// // connect to the database
// include('connect.php');
// $id = $_GET['id'];
// // echo $id;
// // confirm that the 'id' variable has been set
// if (isset($id) && is_numeric($id)) {
//     // get the 'id' variable from the URL
//     // $id = $_GET['id'];
    
//     // delete record from database
//     $query = "DELETE FROM inventory WHERE id=$id"; 
//     $result = mysqli_query($conn,$query) or die ( mysqli_error());
    
//     // redirect user after delete is successful
//     header('Refresh:1; url=../dashboard.php#');
//     echo "<script >alert ('Data deleted successfully');</script>";
//     }
        
        
    require("connect.php");
    $sql_query="SELECT * FROM inventory";
    $result_set=mysqli_query($conn,$sql_query);
    if(isset($_GET['delete_inv']))
    {
     $sql_query="DELETE FROM inventory WHERE id=".$_GET['delete_inv'];
     mysqli_query($conn,$sql_query);
     header("Location: ../dashboard.php");
    }

?>