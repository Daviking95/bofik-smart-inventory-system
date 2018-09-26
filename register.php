<?php
    require('php/connect.php');
    if(!isset($_SESSION["username"])){
        header("Location: index.php");
        exit(); 
    }
    $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."' LIMIT 1"; 
    $res = mysqli_query($conn, $sql); 
    if (!$res) { 
            die("No results from the table");
          }
          $row=mysqli_fetch_assoc($res);
        foreach ($row as $key => $value) {
            $type = $row[type];
            }
            if($type !== 'superadmin'){
                header('Refresh:0; url=dashboard.php');
                echo '<script>alert("You are not an admin")</script>';
                }
?>

<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Bofik Smart Inventory Application
	Version: 1.0
	Author: Zarvilla 
	Author URL: https://www.zarvilla.com
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Bofik Smart Inventory Application">
  <meta name="keywords" content="bofik, smart, inventory, application, zarvilla, alert">
  <title>Register An Admin | Bofik Nigeria Limited.</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form formValidate" id="formValidate" name="RegForm" method="post" action="php/register_admin.php">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Add new admin here !</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="username" type="text" required  data-error=".errorTxt1">
             <div class="errorTxt1"></div>
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" name="email" type="email" required  data-error=".errorTxt2">
             <div class="errorTxt2"></div>
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password" required  data-error=".errorTxt3">
             <div class="errorTxt3"></div>
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" name="password-again" type="password" required  data-error=".errorTxt4">
             <div class="errorTxt4"></div>
            <label for="password-again">Password again</label>
          </div>
        </div>
        <div class="row margin">
            <div class="input-field col s12">
                    <select name="admin_type">
                      <option value="" disabled selected>Choose admin type</option>
                      <option value="admin">Admin</option>
                      <option value="superadmin">Super Admin</option>
                    </select>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button id="reg_button" type="submit" name="reg_button" class="btn waves-effect waves-light col s12">Register Admin</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="index.php">Login</a></p>
          </div>
        </div>
        <div class="row">
            <div class="col 12 message_box" style="margin:10px 0px;"></div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->
    
    
  <!--jQuery CDN -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  
  <!-- validation -->
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script>
        $(document).ready(function() {
           var delay = 2000;
           $('#reg_button').click(function(e){
           e.preventDefault();
           var name = $('#username').val();
           if(name == ''){
           $('.message_box').html(
           '<span style="color:red;">Enter Your Name!</span>'
           );
           $('#name').focus();
           return false;
           }
        		
           var email = $('#email').val();
           if(email == ''){
           $('.message_box').html(
           '<span style="color:red;">Enter Email Address!</span>'
           );
           $('#email').focus();
           return false;
           }
           if( $("#email").val()!='' ){
           if( !isValidEmailAddress( $("#email").val() ) ){
           $('.message_box').html(
           '<span style="color:red;">Provided email address is incorrect!</span>'
           );
           $('#email').focus();
           return false;
           }
           }
        			
           var password = $('#password').val();
           if(password == ''){
           $('.message_box').html(
           '<span style="color:red;">Enter Your Password Here!</span>'
           );
           $('#password').focus();
              return false;
           }
           
           var passwordAgain = $('#password-again').val();
           if(passwordAgain !== password){
           $('.message_box').html(
           '<span style="color:red;">Your password doesn\'t match. </span>'
           );
           $('#password-again').focus();
              return false;
           }
        					
           $.ajax
           ({
           type: "POST",
           url: "php/register_admin.php",
           data: "name="+name+"&email="+email+"&password="+password,
           beforeSend: function() {
           $('.message_box').html(
           '<img src="images/login-logo.jpeg" width="25" height="25"/>'
           );
           },		 
           success: function(data)
           {
           setTimeout(function() {
           $('.message_box').html(data);
           }, delay);
           }
           });
           });
        			
        });
        </script>
        <script>
        //Email Validation Function	
            function isValidEmailAddress(emailAddress) {
                var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                return pattern.test(emailAddress);
            };
        </script>
        
    <script type="text/javascript">
        $("#formValidate").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email:true
                },
                password: {
    				required: true,
    				minlength: 5
    			},
    			password-again: {
    				required: true,
    				minlength: 5,
    				equalTo: "#password"
    			},
            },
            //For custom messages
            messages: {
                password:{
                    required: "Enter Your Password Again",
                    equalTo: "Your password does not match"
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
              var placement = $(element).data('error');
              if (placement) {
                $(placement).append(error)
              } else {
                error.insertAfter(element);
              }
            }
         });
    </script>

</body>

</html>
