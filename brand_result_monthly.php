<?php
    require('php/connect.php');
    
    $company_name_month = $_POST['cmonth'];   // department id

    $sql_month = "SELECT id,brand_name FROM add_product_name WHERE company_name = '".$company_name_month."'";
    
    $result_month = mysqli_query($conn,$sql_month);
    
    $users_arr_month = array();
    
    while( $row_month = mysqli_fetch_array($result_month) ){
        $res_month = array();
        
        $res_month['brandid'] = $row_month['id'];
        $res_month['brandname'] = $row_month['brand_name'];
    
        array_push($users_arr_month, $res_month);
    }
    
    // encoding array to json format
    echo json_encode($users_arr_month);