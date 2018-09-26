<?php

 require('php/connect.php');
	$compy = $_GET['brand_name'];
	$company = $_GET['comp_name'];
	$last_bal = $_GET['last_bal'];
    // echo $compy ." <br>" . $last_bal . "<br>". $company;
      $csv_filename = 'db_export_'.date('Y-m-d').'.csv';
       
              // create var to be filled with export data
        $csv_export = '';
        // query to get data from database
        // company_name LIKE '%$partialNode%' AND brand_name='$compy'
        $query = "SELECT * FROM inventory WHERE company_name LIKE '%$company%' AND brand_name LIKE '%$compy%' ORDER BY pur_quantity DESC ";
        $resultinvt = mysqli_query($conn, $query);
        
            if (!$resultinvt) { 
                    die("No results from the table");
                  }
            if($resultinvt->num_rows > 0){
                $delimiter = ",";
                $filename = "{$compy} ON " . date('Y-m-d') . ".csv";
                
                //create a file pointer
                $f = fopen('php://memory', 'w');
                
                //set column headers
                $fields = array('PURCHASE DATE', 'PURCHASE ORDER NO', 'PURCHASE QUANTITY', 'COMPANY NAME', 'BRAND', 'SUB BRAND', 'VEHICLE NO', 'ISSUED DATE', 'INVOICE NO.', 'ORDER NO.', 'WEIGHBILL NO', 'QUANTITY', 'RECEIVING DATE', 'PRODUCTION DATE', 'EXPIRY DATE', 'DRIVER NAME', 'OUTLET', 'BAL');
                fputcsv($f, $fields, $delimiter);
                
                //output each row of the data, format line as csv and write to file pointer
                while($row = $resultinvt->fetch_assoc()){
                    // $status = ($row['status'] == '1')?'Active':'Inactive';
                    $lineData = array($row['pur_date'], $row['pur_order_no'], $row['pur_quantity'], $row['company_name'], $row['brand_name'], $row['sub_name'], $row['vehicle_no'], $row['iss_date'], $row['invoice_no'], $row['order_no'], $row['weighbill_no'], $row['quantity'], $row['receive_date'], $row['production_date'], $row['expiry_date'], $row['driver_name'], $row['outlet'], $last_bal);
                    fputcsv($f, $lineData, $delimiter);
                }
                
                //move back to beginning of file
                fseek($f, 0);
                
                //set headers to download file rather than displayed
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '";');
                
                //output all remaining data on a file pointer
                fpassthru($f);
            }
            exit;
 
 
 ?>