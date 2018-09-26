<?php
    session_start();
    require_once('connect.php');
    
    // ENCRYPTION AND DECRYPTION SHIT
        // Define a 32-byte (64 character) hexadecimal encryption key
        // Note: The same encryption key used to encrypt the data must be used to decrypt the data
        define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
        // Encrypt Function
        function mc_encrypt($encrypt, $key){
            $encrypt = serialize($encrypt);
            $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
            $key = pack('H*', $key);
            $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
            $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
            $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
            return $encoded;
        }
        // Decrypt Function
        function mc_decrypt($decrypt, $key){
            $decrypt = explode('|', $decrypt.'|');
            $decoded = base64_decode($decrypt[0]);
            $iv = base64_decode($decrypt[1]);
            if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
            $key = pack('H*', $key);
            $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
            $mac = substr($decrypted, -64);
            $decrypted = substr($decrypted, 0, -64);
            $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
            if($calcmac!==$mac){ return false; }
            $decrypted = unserialize($decrypted);
            return $decrypted;
        }
            
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
    if (isset($_POST['reg_button']))
    {
        
     $username= test_input($_POST["username"]);
     $email = test_input($_POST["email"]);
     $admin_type = test_input($_POST['admin_type']);
     $password = test_input($_POST['password']);
     $passwordAgain = test_input($_POST['password-again']);
     $passwordEncryp = mc_encrypt(test_input($_POST["password"]), ENCRYPTION_KEY);
     $trn_date = date("Y-m-d H:i:s");
     if(!empty($username) && !empty($email) && !empty($password) && !empty($passwordAgain)) {
         
         if($password === $passwordAgain) {
             
             // first check the database to make sure 
              // a user does not already exist with the same username and/or email
              $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
              $result = mysqli_query($conn, $user_check_query);
              $user = mysqli_fetch_assoc($result);
              $admin = "admin";
              
              if ($user) { // if user exists
                if ($user['username'] === $username) {
                    header('Refresh:0; url=../register.php');
                    echo "<script >alert ('Username already exists');</script>";
                //   array_push($errors, "Username already exists");
                }elseif ($user['email'] === $email) {
                    header('Refresh:0; url=../register.php');
                    echo "<script >alert ('Email already exists');</script>";
                //   array_push($errors, "email already exists");
                }
              }else {
                    $sql= "INSERT INTO `users` (`type`, `username`, `email`, `password`, `trn_date`) VALUES('".$admin_type."' ,'".$username."', '".$email."', '".md5($password)."', '".$trn_date."')";
                    $result=mysqli_query($conn, $sql);
                     if($result){
                                $_SESSION['username'] = "$username";
                                header('Refresh:0; url=../dashboard.php');
                                echo "<script >alert ('You Have Successfully Added A User');</script>";
                        }else{
                                header('Refresh:0; url=../register.php');
                                echo "<script >alert ('Sorry, we could not save this data.');</script>";
                            }
              }
  
             
         }else {
             header('Refresh:1; url=../register.php');
             echo "<script >alert ('Passwords do not match');</script>";
         }
        } else {
                header('Refresh:1; url=../register.php');
                echo "<script >alert ('One of the field is empty');</script>";
        }
    }
    // END REGISTRATION
    
    // LOGIN USER
    if (isset($_POST['login_button'])) {
      $usernamel= test_input($_POST["usernamel"]);
      $passwordl = test_input($_POST['passwordl']);
    
    //  AND password='".md5($passwordl)."'
      	$query = "SELECT * FROM users WHERE username='$usernamel' AND password='".md5($passwordl)."'";
      	$result = mysqli_query($conn,$query) or die(mysql_error());
	    $rows = mysqli_fetch_row($result);
    //   	print_r ($rows);
      	if ($rows) {
      	    $_SESSION['last_login'] = $rows[6];
      	 //   echo $_SESSION['last_login'];
      	    if($_SESSION['last_login'] == 0){
      	          $_SESSION['user_id'] = $rows[0];
        		  $_SESSION['username'] = $rows[2];
        		  $_SESSION['start'] = time(); // Taking now logged in time.
                    // Ending a session in 30 minutes from the starting time.
                    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
                    $_SESSION['last_login'] = 0;
                    $user_last_login = $_SESSION['last_login'];
                    // echo "{$user_last_login}";
                    $sql= "UPDATE `users` SET `last_login` = '".$user_last_login."' WHERE id = '".$_SESSION['user_id']."'";
                    $result=mysqli_query($conn, $sql);
              	  header('Location: ../dashboard.php');
                  echo "<script >alert ('You are now logged in');</script>";
      	    }else {
      	    header('Refresh:0; url=../index.php');
            echo "<script >alert ('This user already logged in');</script>";
      	    }
      	}else {
      	    header('Refresh:0; url=../index.php');
            echo "<script >alert ('Wrong username/password combination');</script>";
      	}
    }

?>