<?php
    require("connect.php");
    $sql_query="SELECT * FROM add_product_name";
    $result_set=mysqli_query($conn,$sql_query);
    if(isset($_GET['delete_prod']))
    {
     $sql_query="DELETE FROM add_product_name WHERE id=".$_GET['delete_prod'];
     mysqli_query($conn,$sql_query);
     header('Refresh:0; url=../settings.php');
     echo "<script >alert ('Product details deleted successfully !');</script>";
    }

?>