<?php
    require("connect.php");
    $cname = $_POST['compname'];
    $bname = $_POST['brandname'];
    
    // print_r ($cname);
    // print_r ($bname);
    // print_r ($month);
    // echo "Hey";
        function nill($a, $b){
                         if($a == $b){
                             echo     '<td>NIL</td>';
                         }else {
                              echo     '<td>'.$a.'</td>';
                         }
                     }
                    //   OR brand_name = '%$brand%'
        $sqlcomp = "SELECT DISTINCT * FROM inventory WHERE brand_name = '$bname' LIMIT 1 ";
                      $resultcomp = mysqli_query($conn, $sqlcomp);
                      while($rowcompany=mysqli_fetch_assoc($resultcomp)){
                          $compy = $rowcompany['brand_name'];
                          $company = $rowcompany['company_name'];
                            echo '<script> console.log("'. $compy. '")</script>';
                          global $compy;
                          $str = "brand_name={$compy}";
                          $str .= "&comp_name={$cname}";
              
                          echo '<hr><div class="center-align" style="margin-top: 50px;" id="compy">'.
                          strtoupper($compy) . "<br /><hr><hr>";
                          '</div>';                  
       
        echo     '<table id="data-table-row-grouping2" class="display responsive-table data-table-simple" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>PURCHASE DATE</th>
                          <th>PURCHASE ORDER NO</th>
                          <th>COMPANY NAME</th>
                          <th>BRAND NAME</th>
                          <th>PURCHASE QUANTITY</th>
                          <th>VEHICLE NO</th>
                          <th>ISSUED DATE</th>
                          <th>INVOICE NO</th>
                          <th>QUANTITY</th>
                          <th>RECEIVING DATE</th>
                          <th>DRIVER\'S NAME</th>
                          <th>BAL</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr class="noExl">
                          <th>PURCHASE DATE</th>
                          <th>PURCHASE ORDER NO</th>
                          <th>COMPANY NAME</th>
                          <th>BRAND NAME</th>
                          <th>PURCHASE QUANTITY</th>
                          <th>VEHICLE NO</th>
                          <th>ISSUED DATE</th>
                          <th>INVOICE NO</th>
                          <th>QUANTITY</th>
                          <th>RECEIVING DATE</th>
                          <th>DRIVER\'S NAME</th>
                          <th>BAL</th>
                      </tr>
                  </tfoot>
                
                  <tbody>';
                  
                //   pur_date AND 
                        $sqlinv = "SELECT * FROM inventory WHERE brand_name = '$bname' ORDER BY receive_date ASC";
                        $resultinv = mysqli_query($conn, $sqlinv);
                        $newqty = 0;
                        $purqty = 0;
                        $qtyArray = array();
                        $purqtyArray = array();
                        $i = 0;
                        
                        while($rowinv = mysqli_fetch_assoc($resultinv))
                          {
                            //   if($pur_check == $month) {
                                    $vh = $rowinv["vehicle_no"];
                                    $isd = $rowinv["iss_date"];
                                    $ord =  $rowinv["order_no"];
                                    $qty = $rowinv["quantity"];
                                    $rdate =  $rowinv["receive_date"];
                                    $dn = $rowinv["driver_name"];
                                    $pinv = $rowinv["pur_quantity"];
                                    $pdate = $rowinv["pur_date"];
                                    $porder = $rowinv["pur_order_no"];
                                    $inp_date = $rowinv["trn_date"];
                                      
                                     echo '<tr class="set_well">';
                                     
                                     nill($pdate, "0000-00-00");
                                     
                                    //  if($pdate == "0000-00-00"){
                                    //       echo     '<td>Nil</td>';
                                    //  }else{
                                    //     echo     '<td>'.$pdate.'</td>'; 
                                    //  }
                                     
                                     echo     '<td>'.$porder.'</td>';
                                     echo     '<td>'.$rowinv["company_name"].'</td>';
                                     echo     '<td>'.$rowinv["brand_name"].'</td>';
                                     nill($pinv, 0);
                                     
                                    //  if($pinv == 0){
                                    //      echo     '<td>Nil</td>';
                                    //  }else{
                                    //  echo     '<td>'.$pinv.' kg.</td>';
                                    //  }
                                    
                                     echo     '<td>'.$vh.'</td>';
                                     if($isd == "0000-00-00" || $isd == "1970-01-01"){
                                          echo     '<td>NIL</td>';
                                     }else{
                                     echo     '<td>'.$isd.'</td>';
                                     }
                                     echo     '<td>'.$ord.'</td>';
                                     nill($qty, 0);
                                     
                                    //  if($qty == 0){
                                    //       echo     '<td>Nil</td>';
                                    //  }else{
                                    //  echo     '<td>'.$qty.' kg.</td>';
                                    //  }
                                    
                                     if($rdate == "0000-00-00" || $rdate == "1970-01-01"){
                                          echo     '<td>NIL</td>';
                                     }else{
                                     echo     '<td>'.$rdate.'</td>';
                                     }
                                     echo     '<td>'.$dn.'</td>';
                                     
                                     $balqty = $newqty + $qty;
                                     $purqty = $purqty + $pinv;
                                     $newbalqty = $purqty - $balqty;
                                     
                                     $qtyArray[] = $qty;
                                     $purqtyArray[] = $pinv;
                                     $total = (array_sum($purqtyArray)) - (abs(array_sum($qtyArray)));
                                     
                                     
                                    //  if((array_sum($purqtyArray)) == 0){
                                    //     //  $total = abs($total);
                                    //      echo     '<td>'.abs($total).' kg.</td>';
                                    //  }else{
                                        //  $total = $total;
                                     echo     '<td>'.$total.' bags.</td>';
                                    //  }
                                     
                                     
                                    echo '</tr>';
                                    $i++;
                                     $newqty = $balqty;
                                // } 
                            
                          } 
                    //   }
               echo '</tbody>
                
              </table>';
              echo '<div class="right-align" style="margin: 30px 10px; font-size:20px;"><span class="deep-purple card" style="padding:15px; color:#fff;"><strong> TOTAL: '.$total.'</strong></span></div>';
              $lastbal = $total;
              $str .= "&last_bal={$lastbal}";
              echo'<div class="right-align" style="margin-top: 20px;">
                    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <a href="../functions.php?'.$str.'" class="waves-effect waves-light btn"><i class="mdi-action-get-app right"></i>Download As CSV</a>
                    </form>
              </div>';
                    
                }      
    mysqli_close($conn);
    ?>  