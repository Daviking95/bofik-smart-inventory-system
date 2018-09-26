<?php
    require('php/connect.php');
    // $sql2 = "SELECT add_email FROM add_email";
    // $result2 = mysqli_query($conn, $sql2);
    // if(!$result2){
    //     die("Query failed". mysqli_error($conn));
    // }
    // $emailArray = array();
    //  while($row2 = mysqli_fetch_assoc($result2))
    //     {
    //     foreach ($row2 as $key => $value) {
    //           $emailArray[] = $value;
    //         }
    //     }
    //     // print_r($emailArray);
    //     // echo "<hr>";
    //     $emails = implode(", ",$emailArray);
    //     echo $emails;
    
    // $sql = "SELECT expiry_date, alert_month, weighbill_no, brand_name FROM inventory";
    // $result = mysqli_query($conn, $sql);
    // $monthArray = array();
    // $messageArray = array();
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
    //         foreach ($row as $key => $value) {
    //             if($key == "alert_month"){
    //                 echo $value . " => ". $months . "<br>";
    //                 if($value == $months){
    //             $messageArray[] = $row["brand_name"];
                   
    //                 }
    //             }
    //         }
    //     }
    //     $msg = implode(", ",$messageArray);
    //     echo $msg; 
    
    
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
    
    var_dump($emails);
        
       
?>