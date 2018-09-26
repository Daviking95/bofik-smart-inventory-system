<?php
    session_start();
    require_once('connect.php');
            
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = htmlentities($data);
                return $data;
            }
    // ENCRYPT AND DECRYPT ENDS HERE
    
    // REGISTRATION
    if (isset($_POST['add_prod']))
    {
        
     $company_name= test_input($_POST["comp_name"]);
     $brand_name = test_input($_POST["brand_name"]);
     $trn_date = date("Y-m-d H:i:s");
     if(!empty($company_name) && !empty($brand_name)) {
         
                    $sql= "INSERT INTO `add_product_name` (`company_name`, `brand_name`, `trn_date`) VALUES('".ucfirst($company_name)."' ,'".ucfirst($brand_name)."', '".$trn_date."')";
                    $result=mysqli_query($conn, $sql);
                     if($result){
                                $_SESSION['username'] = "$username";
                                header('Refresh:0; url=../settings.php');
                                echo "<script >alert ('You Have Successfully Added A Product');</script>";
                        }else{
                                header('Refresh:0; url=../settings.php');
                                echo "<script >alert ('Sorry, we could not save this data.');</script>";
                            }
        } else {
                header('Refresh:1; url=../settings.php');
                echo "<script >alert ('One of the field is empty');</script>";
        }
    }
    
    ?>