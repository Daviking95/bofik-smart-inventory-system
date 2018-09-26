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
    
    if(isset($_POST['submit_inv'])){
        $company_name= test_input($_POST["company_name"]);
        $brand_name = test_input($_POST["brand_name"]);
        $sub_name = test_input($_POST['sub_name']);
        $date_inv = $_POST['inv_date'];
        $inv_date = date('Y-m-d', strtotime($date_inv));
        // global $order_no;
        $order_no= test_input($_POST['order_no']);
        $invoice_no= test_input($_POST['invc_no']);
        // global $weighbill_no;
        $weighbill_no = test_input($_POST['weighbill_no']);
        $quantity = test_input($_POST['quantity']);
        $vehicle_no = test_input($_POST['vehicle_no']);
        $iss_date = date('Y-m-d', strtotime($_POST['iss_date']));
        $invoice_date = date('Y-m-d', strtotime($_POST['invoice_date']));
        $receive_date = date('Y-m-d', strtotime($_POST['receive_date']));
        $production_date = date('Y-m-d', strtotime($_POST['production_date']));
        $expiry_date = date('Y-m-d', strtotime($_POST['expiry_date']));
        $alert_month = test_input($_POST['alert_month']);
        $driver_name = test_input($_POST['driver_name']);
        $outlet = test_input($_POST['outlet']);
        $trn_date = date('Y-m-d H:i:s');
        
        // if(empty($order_no)){
        $user_check_query = "SELECT * FROM inventory WHERE weighbill_no='$weighbill_no' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { // if user exists
                // if ($order_no === $user['order_no']) {
                //  header('Refresh:0; url=../dashboard.php');
                //  echo "<script >alert ('Order No. already exists. Please re-run your inventory');</script>";
                // }
               
                if ($weighbill_no === $user['weighbill_no']) {
                    header('Refresh:0; url=../dashboard.php');
                    echo "<script >alert ('Weighbill No. already exists or not entered. Please re-run your inventory');</script>";
                }
              }else {
                    $sql= "INSERT INTO `inventory` (`company_name`, `brand_name`, `sub_name`, `inv_date`, `order_no`, `weighbill_no`, `quantity`, `vehicle_no`, `iss_date`, `invoice_date`, `receive_date`, `production_date`, `expiry_date`, `alert_month`, `driver_name`, `outlet`, `trn_date`, `invoice_no`)
                     VALUES('".$company_name."', '".$brand_name."', '".$sub_name."', '".$inv_date."', '".$order_no."', '".$weighbill_no."', '".$quantity."', '".$vehicle_no."', '".$iss_date."', '".$invoice_date."', '".$receive_date."', '".$production_date."', '".$expiry_date."', '".$alert_month."', '".$driver_name."', '".$outlet."', '".$trn_date."', '".$invoice_no."')";
                    $result= mysqli_query($conn, $sql);
                    header('Refresh:0; url=../dashboard.php#');
                    echo "<script >alert ('You Have Successfully Added Your Inventory');</script>";
                }
        // }else if($order_no != " ") {
        //     $user_check_query = "SELECT * FROM inventory WHERE weighbill_no='$weighbill_no' LIMIT 1";
        //     $result = mysqli_query($conn, $user_check_query);
        //     $user = mysqli_fetch_assoc($result);
        //     if ($user) { // if user exists
        //             if ($order_no === $user['order_no']) {
        //              header('Refresh:0; url=../dashboard.php');
        //              echo "<script >alert ('Order No. already exists. Please re-run your inventory');</script>";
        //             }
                   
        //             if ($weighbill_no === $user['weighbill_no']) {
        //                 header('Refresh:0; url=../dashboard.php');
        //                 echo "<script >alert ('Weighbill No. already exists or not entered. Please re-run your inventory');</script>";
        //             }
        //           }else {
        //                 $sql= "INSERT INTO `inventory` (`company_name`, `brand_name`, `sub_name`, `inv_date`, `order_no`, `weighbill_no`, `quantity`, `vehicle_no`, `iss_date`, `invoice_date`, `receive_date`, `production_date`, `expiry_date`, `alert_month`, `driver_name`, `outlet`, `trn_date`)
        //                  VALUES('".$company_name."', '".$brand_name."', '".$sub_name."', '".$inv_date."', '".$order_no."', '".$weighbill_no."', '".$quantity."', '".$vehicle_no."', '".$iss_date."', '".$invoice_date."', '".$receive_date."', '".$production_date."', '".$expiry_date."', '".$alert_month."', '".$driver_name."', '".$outlet."', '".$trn_date."')";
        //                 $result= mysqli_query($conn, $sql);
        //                 header('Refresh:0; url=../dashboard.php#');
        //                 echo "<script >alert ('You Have Successfully Added Your Inventory');</script>";
        //             }
        // }
        
    }
    
?>