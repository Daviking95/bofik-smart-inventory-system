<?php

    include("php/connect.php");
    
    $sql = "SELECT expiry_date, alert_month, order_no, weighbill_no, brand_name FROM inventory";
    $result = mysqli_query($conn, $sql);
    
    $sql2 = "SELECT add_email FROM add_email";
    $result2 = mysqli_query($conn, $sql2);
    if(!$result2){
        die("Query failed". mysqli_error($conn));
    }
    $emailArray = array();
     while($row2 = mysqli_fetch_assoc($result2))
        {
        foreach ($row2 as $key => $value) {
              $emailArray[] = $value;
            }
        }
    $emails = implode(", ",$emailArray);
    
    
    $message = array();
    $output;
    $orderArray = array();
    $weighArray = array();
    $messageArray = array();
    $expdateArray = array();
    // while($row = mysqli_fetch_assoc($result))
    //     {
    //         $weighBillNo = $row["weighbill_no"];
    //         $brandName = $row["brand_name"];
    //         $date = $row["expiry_date"];
    //         $alertMonth = $row["alert_month"];
    //         $new_format = date("M d, Y", strtotime($date));
    //         $now_date = date('Y-m-d');
    //         $diff = abs(strtotime($date) - strtotime($now_date));
    //         $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    //     }
    
    while($row = mysqli_fetch_assoc($result))
        {
            
            $weighBillNo = $row["weighbill_no"];
            $brandName = $row["brand_name"];
            $date = $row["expiry_date"];
            $alertMonth = $row["alert_month"];
            $new_format = date("M d, Y", strtotime($date));
            $now_date = date('Y-m-d');
            $diff = abs(strtotime($date) - strtotime($now_date));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            foreach ($row as $key => $value) {
                if($key == "alert_month"){
                    // echo $value . " => ". $months . "<br>";
                    if($value == $months){
                        $messageArray[] = $row["brand_name"];
                        $orderArray[] = $row["order_no"];
                        $weighArray[] = $row["weighbill_no"];
                        $expdateArray[] = $row["expiry_date"];
                    }
                }
            }
        }
        $msg = implode(" || ",$messageArray);
        $order = implode(" || ",$orderArray);
        $weigh = implode(" || ",$weighArray);
        $expdate = implode(" || ",$expdateArray);
               //  MAIL ISSH
                $to = "{$emails}";
                $subject = "Bofik Inventory Products Alert";
                //$message = "Your product with weighbill no {$weighBillNo} is about to expire on {$date}. Please take action OR go to the app for more details. <a href='http://smartinventory.zarvilla.com/dashboard.php#running_inv'>Smart Inventory</a>";
                
                $message = "The following products : <br><strong>(" . strtoupper($msg) . ")</strong>,<br><br> with Weighbill numbers : <br><strong>" .$weigh. "</strong><br><br> and Invoice numbers : <br><strong>" .$order. "</strong><br><br> are about to expire on : <br><strong>" .$expdate. "</strong> respectively.<br><br>
                Please take action OR go to the app for more details. <a href='https://bofik.com/dashboard.php#running_inv'>Smart Inventory</a>";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <no-reply-bofikalert@bofik.com>' . "\r\n";
                // $headers .= 'Cc: myboss@example.com' . "\r\n";
                mail($to,$subject,$message,$headers);
                                  
            // END MAIL ISSH    
        // print_r(array_values ($message));
        
    
?>