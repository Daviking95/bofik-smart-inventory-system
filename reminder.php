<?php
    /*
    PDOconnection_db.php
        
    //MySQL Database user name.    
    $login = "zarvil_smart_hub";
    //Password for MySQL.
    $dbpass = "Bofik_smart2018";
    //MySQL Database name.
    $dbname = "zarvil_smart_hub"; 
    //Establish a connection
    $db = new PDO("mysql:host=localhost;dbname=$dbname", "$login", "$dbpass");
    //Enable PDO error reporting (to be used ONLY during development)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    END PDOconnection_db.php
    */
    require_once 'php/PDOconnection_db.php';
    
    //Set Site Title, Email and Domain
    $SiteTitle = "My Great Site";
    $SiteEmail = "info@smartinventory.zarvilla.com";
    $SiteURL   = "http://smartinventory.zarvilla.com"; 
    ///////////////////////////////////
    
    $today = date('Y-m-d');
    
    //Delay BEFORE payment is due
    $delay_days = 14;
    //Delay AFTER payment is late
    $late_days = 4;
    
    $noticedate = date('Y-m-d', strtotime( "$today + $delay_days days" ));
    $latedate = date('Y-m-d', strtotime( "$today - $late_days days" ));
    
    /* 
    Assuming all fields in the same table    
    Note: Payment1Paid etc was added.
    Querying for payment due today,
    payment due in $delay_days and
    payment is late by $late_days
    */  
    
    try{
        $sql = "SELECT *
        FROM inventory
        WHERE 
        (expiry_date = :Today1)";
        
        // OR
        // ((Payment2Date = :Today2 OR Payment2Date = :NoticeDate2) OR (Payment2Paid = 0 AND Payment2Date = :LateDate2)) OR
        // ((Payment3Date = :Today3 OR Payment3Date = :NoticeDate3) OR (Payment3Paid = 0 AND Payment3Date = :LateDate3)) OR
        // ((Payment4Date = :Today4 OR Payment4Date = :NoticeDate4) OR (Payment4Paid = 0 AND Payment4Date = :LateDate4)) OR
        // ((Payment5Date = :Today5 OR Payment5Date = :NoticeDate5) OR (Payment5Paid = 0 AND Payment5Date = :LateDate5)) OR
        // ((Payment6Date = :Today6 OR Payment6Date = :NoticeDate6) OR (Payment6Paid = 0 AND Payment6Date = :LateDate6))
        
        $query = $db->prepare($sql); 
        for($n=1;$n<=6;$n++):
            $query->bindParam(":Today".$n, $today);
            $query->bindParam(":NoticeDate".$n, $noticedate);
            $query->bindParam(":LateDate".$n, $latedate);
        endfor; 
        $query->execute();
        
        //Build data array
        $data = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $data[$row['id']]['id'] = $row['id'];
            $data[$row['id']]['name'] = $row['name'];
            $data[$row['id']]['email'] = $row['email'];
            $data[$row['id']]['PaymentDates'] = array($row['Payment1Date']    
            , $row['Payment2Date']     
            , $row['Payment3Date']     
            , $row['Payment4Date']     
            , $row['Payment5Date']     
            , $row['Payment6Date']); 
            $data[$row['id']]['PaymentAmounts'] = array($row['Payment1']     
            , $row['Payment2']     
            , $row['Payment3']     
            , $row['Payment4']     
            , $row['Payment5']     
            , $row['Payment6']);
            $data[$row['id']]['PaymentStatus'] = array($row['Payment1Paid']     
            , $row['Payment2Paid']     
            , $row['Payment3Paid']     
            , $row['Payment4Paid']     
            , $row['Payment5Paid']     
            , $row['Payment6Paid']);  
            //echo "<pre>";
            //print_r($row);        
            //echo "</pre>";
        }  
        //echo "<pre>";
        //print_r($data);        
        //echo "</pre>";
        
        //
        if(!empty($data)):
        
            foreach($data as $id => $arr):
                //Get array key of todays date
                $key = (in_array($today,$data[$id]['PaymentDates']) ? array_search($today,$data[$id]['PaymentDates']):0);
                
                //Payment due Today
                if(in_array($today,$data[$id]['PaymentDates']) && $data[$id]['PaymentStatus'][$key] == 0){
                    $mail_subject = $SiteTitle . " Payment due Today";
                    $noticetype = "Payment due Today";
                    $message = "This is a courtesy reminder that your payment is due today.<br />
                    Please make your payment as soon as possible.";
                    
                //Payment Reminder
                }elseif(in_array($noticedate,$data[$id]['PaymentDates'])){
                    $mail_subject = $SiteTitle . " Payment Reminder";  
                    $noticetype = "Payment Reminder";                 
                    $due_date = date('l, F d, Y', strtotime($noticedate));
                    $message = "This is a courtesy reminder that your next payment is due " . $due_date;
                
                //Payment Confirmation Notice
                }elseif(in_array($today,$data[$id]['PaymentDates']) && $data[$id]['PaymentStatus'][$key] == 1){    
                    $mail_subject = $SiteTitle . " Payment Confirmation Notice"; 
                    $noticetype = "Payment Confirmation Notice";
                    $message = "Thank you for the prompt payment on your account.<br />
                    We deeply appreciate your business and the timely manner in which you pay your bill each month.";
                
                //Late Payment Reminder
                }elseif(in_array($latedate,$data[$id]['PaymentDates'])){
                    $mail_subject = $SiteTitle . " Late Payment Reminder";             
                    $noticetype = "Late Payment Reminder";                 
                    $due_date = date('l, F d, Y', strtotime($noticedate));
                    $message = "This is a courtesy reminder that your payment is Past Due.  It was due to be paid ". $late_days . " days ago.<br />
                    Please make your payment as soon as possible.";
                }
                
                $messageBottom = "Thank you<br />" . $SiteTitle;
                
                //Payment Schedule table
                $messagetable = "<table border=0 cellspacing=1 cellpadding=3 bgcolor=#C0C0C0 style='margin-left:auto;margin-right:auto;'>
                <thead>
                    <tr>
                        <td bgcolor=#EFEFEF align=center colspan=3><b>Payment Schedule</b></td>
                    </tr>
                    <tr>
                        <td bgcolor=#F6F6F6 align=center>Date Due</td>
                        <td bgcolor=#F6F6F6 align=center>Amount</td>
                        <td bgcolor=#F6F6F6 align=center>Status</td>
                    </tr>
                </thead>\r";
                
                for($r=0;$r<=5;$r++):
                    $Status = ($data[$id]['PaymentStatus'][$r] == 0 ? "Due" : "Paid");
                    $payment_date = date('l, F d, Y', strtotime($data[$id]['PaymentDates'][$r]));
                    $PaymentAmount = number_format($data[$id]['PaymentAmounts'][$r], 2, '.', ',');
                    $messagetable .= "<tr>
                            <td bgcolor=#FFFFFF align=right>" . $payment_date . "</td>
                            <td bgcolor=#FFFFFF align=right>" . $PaymentAmount . "</td>
                            <td bgcolor=#FFFFFF align=center>" . $Status . "</td>
                        </tr>\r";
                endfor;
                
                $messagetable .= "</table>";
                
                // format message             
                $todays_date = date('l, F d, Y', strtotime($today));
                $mailmsg ="";
                $mailmsg .= "<h2 style='text-align: center'>" . $noticetype . "</h2>";
                $mailmsg .= "<p><span style='float:right;padding-right:30px;'>" . $todays_date . "</span>Hello " . $data[$id]['name'] . ",</p>"; 
                $mailmsg .= "<p>" . $message . "</p>\r";
                  
                $mailmsg .= $messagetable; 
                 
                $mailmsg .= "<p>" . $messageBottom . "</p>\r"; 
                
                //Double tables are the most reliable centering for emails
                $mail_body = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
                <html>
                    <head>
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
                    </head>
                    <body>
                        <center>
                            <table width=98% border=\"0\" align=\"center\" cellpadding=1 cellspacing=\"0\" >
                                <tr>
                                    <td align=\"center\" valign=\"top\">
                                        <table width=900px border=\"0\"  cellpadding=\"0\" cellspacing=\"0\" style='border:2px solid; border-color:#969696'>
                                            <tr>                                            
                                                <td bgcolor=\"#FFFFFF\" align=\"left\" style=\"padding:14px;\">" . $mailmsg . "</td>                                            
                                            </tr>
                                            <tr>
                                                <td bgcolor=#606060 align=\"center\" style=\"padding:2px; border-top:2px solid; border-color:#777777\">
                                                    <a href=\"" . $SiteURL . "\" style='color:#ffffff; text-decoration:none'>" . $SiteTitle . "</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </body>
                </html>"; 
                $mail_to = $data[$id]['email'];
                $headers = "From: \"$SiteTitle\" <$SiteEmail>\r\n";
                $headers .= "Reply-To: $SiteEmail\r\n";
                $headers .= "Organization: $SiteTitle \r\n";
                $headers .= "X-Sender: $SiteEmail \r\n";
                $headers .= "X-Priority: 3 \r\n";
                $headers .= "X-Mailer: php\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                //mail($mail_to, $mail_subject, $mail_body, $headers);
                echo $mail_to, $mail_subject, $mail_body, $headers;
            endforeach;
        
        endif;
        
        
    } catch (PDOException $ex) {
        //ONLY echo error message during development to test for problems
        //echo  $ex->getMessage();
    }
?>