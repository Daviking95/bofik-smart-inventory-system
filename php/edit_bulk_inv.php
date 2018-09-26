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
          $order_no = test_input(strtoupper($_POST["pur_order_no"]));
          $trn_date = date('Y-m-d H:i:s');
        //   echo $id;
            
        $sql = "UPDATE purchase SET pur_date = '".$inv_date."', company_name = '".$company_name."', brand_name = '".$brand_name."' ".
            ", sub_name = '".$sub_name."', pur_quantity = '".$quantity."', pur_order_no = '".$order_no."', input_date= '" . $trn_date . "' WHERE id = '".$id."' ";
        
        $sql2 = "UPDATE inventory SET pur_date = '".$inv_date."', company_name = '".$company_name."', brand_name = '".$brand_name."' ".
            ", sub_name = '".$sub_name."', pur_quantity = '".$quantity."', pur_order_no = '".$order_no."', trn_date= '" . $trn_date . "', pur_id= '" . $id . "' WHERE id = '".$id."' ";
            
            $res = mysqli_query($conn, $sql);
            $res2 = mysqli_query($conn, $sql2);
            
            if(!$res && !$res2){
                die("Update failed" . mysqli_error($conn));
            }else {
             header('Refresh:1; url=../dashboard.php');
             echo "<script >alert ('Data Updated Successfully');</script>";
            }
        }else {
            die("Error " . mysqli_error($conn));
        }



?>