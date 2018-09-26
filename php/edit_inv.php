<?php

    require('connect.php');
    
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        $data = strtoupper($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
          $id = $_POST["id"];
          
          $inv_date = date('Y-m-d', strtotime($_POST["inv_date"]));
          $company_name = test_input(ucfirst($_POST["company_name"]));
          $brand_name = test_input(ucfirst($_POST["brand_name"]));
          $sub_name = test_input(ucfirst($_POST["sub_name"]));
          $quantity = test_input($_POST["quantity"]);
          $order_no = test_input(strtoupper($_POST["order_no"]));
          $invoice_no = test_input(strtoupper($_POST["invc_no"]));
          $weighbill_no = test_input(strtoupper($_POST["weighbill_no"]));
          $vehicle_no = test_input(strtoupper($_POST["vehicle_no"]));
          $iss_date = date('Y-m-d', strtotime($_POST["iss_date"]));
          $invoice_date = date('Y-m-d', strtotime($_POST["invoice_date"]));
          $receive_date = date('Y-m-d', strtotime($_POST["receive_date"]));
          $driver_name =test_input(ucfirst($_POST["driver_name"]));
          $outlet = test_input($_POST["outlet"]);
          $prod_date = date('Y-m-d', strtotime($_POST["production_date"]));
          $expiry_date = date('Y-m-d', strtotime($_POST["expiry_date"]));
        //   $date = $_POST["expiry_date"];
        //   $expiry_date = STR_TO_DATE('$date', '%m/%d/%Y');
          $alert_month = $_POST["alert_month"];
          $trn_date = date('Y-m-d H:i:s');
        //   echo $expiry_date;
            
        $sql = "UPDATE inventory SET inv_date = '".$inv_date."', company_name = '".$company_name."', brand_name = '".$brand_name."' ".
            ", sub_name = '".$sub_name."', quantity = '".$quantity."', invoice_no = '".$invoice_no."', order_no = '".$order_no."', weighbill_no = '".$weighbill_no."', vehicle_no = '".$vehicle_no."' ".
            ", iss_date = '".$iss_date."', invoice_date= '" . $invoice_date . "', receive_date= '" . $receive_date . "', driver_name= '" . $driver_name . "' ".
            ", outlet= '" . $outlet . "', production_date= '" . $prod_date . "', expiry_date= '" . $expiry_date . "', alert_month= '" . $alert_month . "', trn_date= '" . $trn_date . "' WHERE id = '".$id."' ";
            
            $res = mysqli_query($conn, $sql);
            
            if(!$res){
                die("Update failed" . mysqli_error($conn));
            }else {
            
             header('Refresh:1; url=../dashboard.php');
             echo "<script >alert ('Data Updated Successfully');</script>";
            }
        }else {
            die("Error " . mysqli_error($conn));
        }



?>