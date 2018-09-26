<?php
    session_start();
    require_once('connect.php');

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        $data = strtoupper($data);
        return $data;
    }
     if(isset($_POST['submit_pur_inv'])){
        $company_name= test_input($_POST["company_name"]);
        $brand_name = test_input($_POST["brand_name"]);
        $sub_name = test_input($_POST['sub_name']);
        $pur_order_no = test_input($_POST["pur_order_no"]);
        $pur_quantity = test_input($_POST['pur_quantity']);
        // $pur_date = $_POST['$pur_date'];
        $pur_date = date('Y-m-d', strtotime($_POST['pur_date']));
        $trn_date = date('Y-m-d H:i:s');
        
        // $user_check_query = "SELECT * FROM purchase WHERE company_name='$company_name' AND brand_name='$brand_name' LIMIT 1";
        //       $result = mysqli_query($conn, $user_check_query);
        //       $user = mysqli_fetch_assoc($result);
        //       $admin = "admin";
              
        //       if ($user) { // if user exists
        //         if ($user['username'] === $username) {
        //             header('Refresh:0; url=../register.php');
        //             echo "<script >alert ('Username already exists');</script>";
        //         //   array_push($errors, "Username already exists");
        //         }
        $user_check_query = "SELECT * FROM purchase WHERE pur_order_no='$pur_order_no' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { // if user exists
                if ($user['pur_order_no'] === $pur_order_no) {
                    header('Refresh:0; url=../dashboard.php');
                    echo "<script >alert ('Purchase Order No. already exists. Please re-run your inventory');</script>";
                }
              }else {
       $sql= "INSERT INTO `purchase` (`company_name`, `brand_name`, `sub_name`, `pur_order_no`, `pur_quantity`, `pur_date`, `input_date`)
                     VALUES('".$company_name."', '".$brand_name."', '".$sub_name."', '".$pur_order_no."', '".$pur_quantity."', '".$pur_date."', '".$trn_date."')";
         $result= mysqli_query($conn, $sql);
        //  echo "Yes";
        $check_id = "SELECT * FROM purchase ORDER BY id DESC LIMIT 1";
        $result_id = mysqli_query($conn, $check_id);
        $bulk_id = mysqli_fetch_assoc($result_id);             
        // print_r($bulk_id);
        $pur_id =  $bulk_id['id'];             
         $sql2= "INSERT INTO `inventory` (`company_name`, `brand_name`, `sub_name`, `pur_order_no`, `pur_quantity`, `pur_date`, `trn_date`, `pur_id`)
                     VALUES('".$company_name."', '".$brand_name."', '".$sub_name."', '".$pur_order_no."', '".$pur_quantity."', '".$pur_date."', '".$trn_date."', '".$pur_id."')";
                   // $result= mysqli_query($conn, $sql);
                    $result2= mysqli_query($conn, $sql2);
                     header('Refresh:1; url=../dashboard.php#');
                     echo "<script >alert ('You Have Successfully Added Your Purchase Inventory');</script>";
              }
    
     }
    
?>    
    