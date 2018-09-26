<?php
    require("php/connect.php");
    $companyName = $_POST['companyName'];   // department id

    $sql = "SELECT id,brand_name FROM add_product_name WHERE company_name = '".$companyName."'";
    
    $result = mysqli_query($conn,$sql);
    
    $users_arr = array();
    
    while( $row = mysqli_fetch_array($result) ){
        $res = array();
        
        $res['brandId'] = $row['id'];
        $res['brandName'] = $row['brand_name'];
    
        array_push($users_arr, $res);
    }
    
    // encoding array to json format
    echo json_encode($users_arr);
    
    // ####################################################
?>
