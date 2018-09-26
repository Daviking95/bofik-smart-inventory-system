<?php
//include auth.php file on all secure pages
require("php/connect.php");
require("php/auth.php");

  
  $sql2 = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."' LIMIT 1"; 
    $res2 = mysqli_query($conn, $sql2); 
    if (!$res2) { 
            die("No results from the table");
          }
        $row2=mysqli_fetch_assoc($res2);
        foreach ($row2 as $key => $value) {
            $type = $row2[type];
            }
  date_default_timezone_set('UTC');
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Settings Page | Admin Dashboard | Bofik Nigeria Limited.</title>

  <!-- CORE CSS-->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- JQUERY CSS -->
  <link rel="stylesheet" href="css/jquery-ui.min.css">
  <link rel="stylesheet" href="css/jquery-ui.theme.min.css">

  <!-- Custome CSS-->
  <link href="css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <link rel="shortcut icon" href="images/bofik_logo.png" type="image/x-icon">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Varela|Varela+Round" rel="stylesheet">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- stylesheets for older browsers -->
  <!-- ie6/7 micro clearfix -->
  <!--[if lte IE 7]>
      <style>
      .grouping {
          *zoom: 1;
      }
      </style>
    <![endif]-->
  <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style media="screen">
      .brand_search_details {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 30px;
      }
      .hide_side_nav {
        cursor: pointer;
        width: 50px;
        margin-left: 10px;
      }
      /*.set_well > td {*/
      /*  padding: 10px 10px !important;*/
      /*  border-bottom: 0.5px solid #111 !important;*/
      /*}*/
      .header-search-wrapper {
        display: none !important;
      }
      table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
            border-top: 1px solid transparent !important;
            padding: 10px 10px !important;
            border-bottom: 0.5px solid #111 !important;
        }
    .divider {
        background-color: #311b92;
    }
    input#download_data_month, input#download_data {
            padding: 20px;
            width: auto;
        }
    </style>
    
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color deep-purple darken-4">
                <div class="nav-wrapper">
                    <ul class="left">
                      <li>
                        <i class="mdi-navigation-menu hide-on-med-and-down hide_side_nav waves-effect waves-light deep-purple darken-4"></i>
                        <!-- <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-med-and-down hide_side_nav deep-purple darken-4"><i class="mdi-navigation-menu"></i></a> -->
                      </li>
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"> <h6>Bofik Nigeria Limited</h6> </a></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search..."/>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details deep-purple darken-4 darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/bofik_logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <!-- <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                        </li> -->
                        <!-- <li class="divider"></li> -->
                        <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <?php  
                    if (isset($_SESSION['username'])) {
                       echo '<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">' .$_SESSION['username'].'<i class="mdi-navigation-arrow-drop-down right"></i></a>';
                       
                    }
                    ?>
                </div>
            </div>
            </li>
            <li class="bold"><a href="dashboard.php#" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">INVENTORY</p></li>
            <li class="bold"><a href="dashboard.php#create_inv" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-content-add-box"></i> Create Inventory</a>
            </li>
            <?php
                 if($type === 'superadmin'){
                    echo '<li class="bold"><a href="#search_inv" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-search"></i> Search Inventory</a>
                    </li>';
                 }
                ?>
            <li class="bold"><a href="dashboard.php#running_inv" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-input"></i> Inventory Running</a>
            </li>
            <?php
                   if($type === 'superadmin'){
                   echo '<li class="bold"><a href="dashboard.php#bulk_inv" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-action-receipt"></i> Bulk Purchase Input</a>
                    </li>
                    <li class="bold"><a href="dashboard.php#download_inv" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-communication-call-received"></i> Download Data</a>
                    </li>
                     <li class="bold"><a href="dashboard.php#download_month" data-navid="8" class="waves-effect waves-deep-purple darken-4  dash_click"><i class="mdi-action-event"></i> Download Monthly Data <span class="new badge"></span></a>
                    </li>';
                 }
                 ?>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">SETTINGS</p></li>
            <?php
                    if($type === 'superadmin'){
                    echo '
                    <li class="bold"><a href="#" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-action-settings"></i> Settings</a>
                            
                    </li>';
                 }
                 ?>
            <li><a href="change_password.php"><i class="mdi-action-lock-outline"></i> Change Password</a>
            </li>
            <li><a href="php/logout.php"><i class="mdi-action-launch"></i> Sign Out</a>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only deep-purple darken-4"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

         <!-- START SETTINGS CONTENT -->
      <section id="settings" class="settings">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search...">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Settings Page</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Settings Page</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Settings Page.</p>
            <div class="divider"></div>
            <div class="row margin">
            <div class="input-field col s6">
                    <select name="settings_select" id="select">
                      <option value="" disabled>Choose Settings Action</option>
                      <option data-navid="1" value="1" selected>Add/Edit Email</option>
                      <option data-navid="2" value="2">Add/Edit New Account</option>
                      <option data-navid="3" value="3">Add Product Name</option>
                    </select>
            </div>
        </div>
        <div class="divider"></div>
        <section id="add_email" data-navitem="1" class="sections">
            <div class="center-align card teal darken-3" style="padding:10px; color:#fff;"><h5>ADD EMAILS TO RECEIVE ALERTS</h5></div>
            <form class="" action="php/add_email.php" method="post">
              <!--######################## CREATE EMAIL #############################3 -->
              <!-- Company Name -->
                <div class="row company valign-wrapper">
                  <div class="col s6 offset-s3">
                    <div class="row">
                      <div class="input-field col s12 center-align">
                        <i class="mdi-communication-email prefix"></i>
                        <input type="email" placeholder="Add Email" id="" name="add_email" class="" required>
                        <!-- <label for="autocomplete-input">Company Name :</label> -->
                      </div>
                    </div>
                  </div>
                </div>
          <!-- End Purchase Date -->
                  <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m6 offset-m3">
                    <button type="submit" class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="submit_email">Add Email</button>
                  </div>
                </div>
                <!--###### END SUBMIT BUTTON  ########-->
              <!--######################## END CREATE EMAIL #############################3 -->
            </form>
            
            <div class="divider"></div>
            <div class="container col s12 m12 l12 search_result">
              <table id="data-table-simple" class="display demo2 responsive-table edit_table" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Email</th>
                          <th>Date Added</th>
                          <th>Edit</th>
                      </tr>
                  </thead>
                  
                   <tfoot>
                      <tr>
                          <th>Email</th>
                          <th>Date Added</th>
                          <th>Edit</th>
                      </tr>
                  </tfoot>
                  
                  <tbody>
                      
                      <?php
                        $sqlcomp = "SELECT * FROM add_email";
                          $resultcomp = mysqli_query($conn, $sqlcomp);
                          while($rowcompany=mysqli_fetch_assoc($resultcomp)){
                              $id = $rowcompany['id'];
                              $add_email = $rowcompany['add_email'];
                              $date = $rowcompany['date'];
                              echo '<tr>';
                              echo '<td>'.$add_email.'</td>';
                              echo '<td>'.$date.'</td>';
                              echo '<td>
                                    <a href="javascript:delete_id('.$id.')" class="waves-effect waves-light  btn-floating"><i class="mdi-content-content-cut left"></i>Delete</a>
                                   </td>';
                                   echo '</tr>';
                          }
                      ?>
                      
                  </tbody>
            </table>
            
          </div>
        </section>
        <br><br>
        <div class="divider"></div>
        <section id="add_account" data-navitem="2" class="sections" style="display:none;">
            <div class="center-align card blue" style="padding:10px; color:#fff;"><h5>ADD/EDIT NEW ACCOUNT</h5></div>
            <div class="col s12">
              <form class="container formValidate" id="formValidate" name="RegForm" method="post" action="php/add_account.php" style="width:500px;">
                <div class="row">
                  <div class="input-field col s12 center">
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
                              <option value="user">User</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button id="reg_button" type="submit" name="reg_button" class="btn waves-effect waves-light col s12">Register Admin</button>
                  </div>
                </div>
                <div class="row">
                    <div class="col 12 message_box" style="margin:10px 0px;"></div>
                </div>
              </form>
            </div>
            
            <div class="divider"></div>
            <div class="container col s12 m12 l12 search_result">
              <table id="data-table-row-grouping" class="display demo2 responsive-table edit_table" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Type</th>
                          <th>Username</th>
                          <th>Type</th>
                          <th>Email</th>
                          <th>Edit</th>
                      </tr>
                  </thead>
                  
                   <tfoot>
                      <tr>
                          <th>Type</th>
                          <th>Username</th>
                          <th>Type</th>
                          <th>Email</th>
                          <th>Edit</th>
                      </tr>
                  </tfoot>
                  
                  <tbody>
                      
                      <?php
                        $sqlcomp = "SELECT * FROM users";
                          $resultcomp = mysqli_query($conn, $sqlcomp);
                          while($rowcompany=mysqli_fetch_assoc($resultcomp)){
                              $id = $rowcompany['id'];
                              $type = $rowcompany['type'];
                              $username = $rowcompany['username'];
                              $admin_email = $rowcompany['email'];
                              $str = "id={$id}&type={$type}";
                              echo '<tr>';
                              echo '<td>'.$type.'</td>';
                              echo '<td>'.$username.'</td>';
                              echo '<td>'.$type.'</td>';
                              echo '<td>'.$admin_email.'</td>';
                              echo '<td>
                                    
                                    <a href="javascript:delete_acc('.$id.')" class="waves-effect waves-light  btn-floating"><i class="mdi-content-content-cut left"></i>Delete</a>
                                   </td>';
                                   echo '</tr>';
                          }
                      ?>
                      <!--<a href="php/edit_acc.php?edit_acc='.$str.'" class="waves-effect waves-light  btn-floating"><i class="mdi-action-swap-horiz left"></i>Edit</a>-->
                  </tbody>
            </table>
            
          </div>
        </section>
        <div class="divider"></div>
        <section id="add_product_name" data-navitem="3" class="sections" style="display:none;">
            <div class="center-align card yellow darken-4" style="padding:10px; color:#fff;"><h5>ADD/EDIT PRODUCT DETAILS</h5></div>
            <div class="col s12">
              <form class="container formValidate" id="formValidate2" name="RegForm" method="post" action="php/add_product.php" style="width:500px;">
                <div class="row">
                  <div class="input-field col s12 center">
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="comp_name" name="comp_name" type="text" required  data-error=".errorTxt1">
                     <div class="errorTxt1"></div>
                    <label for="comp_name" class="center-align">Add Company Name</label>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="mdi-communication-email prefix"></i>
                    <input id="brand_name" name="brand_name" type="text" required  data-error=".errorTxt2">
                     <div class="errorTxt2"></div>
                    <label for="brand_name" class="center-align">Add Brand Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button id="add_prod" type="submit" name="add_prod" class="btn waves-effect waves-light col s12">Add Product</button>
                  </div>
                </div>
                <div class="row">
                    <div class="col 12 message_box" style="margin:10px 0px;"></div>
                </div>
              </form>
            </div>
            
            <div class="divider"></div>
            <div class="container col s12 m12 l12 search_result">
              <table id="data-table-row-grouping2" class="display demo2 responsive-table edit_table" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Company Name</th>
                          <th>Brand Name</th>
                          <th>Company Name</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  
                   <tfoot>
                      <tr>
                         <th>Company Name</th>
                         <th>Brand Name</th>
                         <th>Company Name</th>
                         <th>Delete</th>
                      </tr>
                  </tfoot>
                  
                  <tbody>
                      
                      <?php
                        $sqlcomp = "SELECT * FROM add_product_name";
                          $resultcomp = mysqli_query($conn, $sqlcomp);
                          while($rowcompany=mysqli_fetch_assoc($resultcomp)){
                              $id = $rowcompany['id'];
                              $company_name = $rowcompany['company_name'];
                              $brand_name = $rowcompany['brand_name'];
                              echo '<tr>';
                              echo '<td>'.$company_name.'</td>';
                              echo '<td>'.$brand_name.'</td>';
                              echo '<td>'.$company_name.'</td>';
                              echo '<td>
                                    <a href="javascript:delete_prod('.$id.')" class="waves-effect waves-light  btn-floating"><i class="mdi-action-delete left"></i>Delete</a>
                                   </td>';
                                   echo '</tr>';
                          }
                      ?>
                      
                  </tbody>
            </table>
            
          </div>
        </section>
            
          <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large">
                  <i class="mdi-action-wallet-travel deep-purple darken-4 darken-4"></i>
                </a>
                <ul>
                  <li><a href="#create_inv" class="btn-floating deep-purple darken-4 darken-4"><i class="large mdi-content-add-box"></i></a></li>
                  <li><a href="#search_inv" class="btn-floating yellow darken-1"><i class="large mdi-action-search"></i></a></li>
                  <li><a href="#running_inv" class="btn-floating green"><i class="large mdi-action-input"></i></a></li>
                  <!-- <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li> -->
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END SETTINGS CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->
    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>© 2018 Bofik Nigeria Limited.</span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
    <!-- JQUERY UI JS -->
    <!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>

    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <!--editabletable-->
    <script type="text/javascript" src="js/plugins/editable-table/mindmup-editabletable.js"></script>   
    <script type="text/javascript" src="js/plugins/editable-table/numeric-input-example.js"></script>
    <!--prism
    <script type="text/javascript" src="js/prism/prism.js"></script>-->
    <!--scrollbar-->
    <!-- <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script>
        $('#select').change(function(){
            // console.log('Hey');
            var id= $(this).val();
            $(".sections").fadeOut("300");
            showSection(id);
            // console.log(id);
        });
    </script>
    
    <script type="text/javascript">
    var brand = $('.brand input');
    var subBrand = $('.sub_brand');
    $(brand).on('blur click',function() {
      if ($(this).val() !== "") {
        subBrand.css({display : 'block', background : 'rgba(204, 204, 204, 0.18)', padding : '10px'});
      }else {
        subBrand.css({display : 'none', background : 'rgba(204, 204, 204, 0.18)', padding : '5px'});
      }
    });
    </script>
    <script type="text/javascript">
      // AUTOCOMPLETE FEATURE
      var company = ["Dangote",
                      "Golden Penny",
                      "Crown Flour Mills",
                      "Pure Flour Mills",
                      "Honeywell Flour Mills"];
      $('.autocompleteCompany').autocomplete( {source : company});
    </script>
    <script type="text/javascript">
      // SHOW OTHER SECTIONS
      // var a = $('#left-sidebar-nav ul li');
      // console.log(a);
        $(".dash_click").click(function() {
          var b = $(this).data('navid');
          // console.log(b);
          $(".sections").fadeOut("300");
          showSection(b);
          // console.log(this);
        });

      function  showSection(b){
          var element = $('section[data-navitem="'+b+'"]');;
          element.fadeIn(2000);
          element.addClass('active');
        }
    </script>
    <script type="text/javascript">
      $('.allbuttons').on('click', function (e) {
        e.preventDefault();
      });
    </script>
    <script>
    // FOR COUNTER EFFECT
      (function(){
        $('.counter').each(function(){
          var counter = $(this).text();
          var showCounter = $('.showCounter');
          var counterDate = Date.parse(counter);
          var now = new Date().getTime();
          var distance = counterDate - now;
          var d = new Date(distance);
          var getMonth = d.getMonth() + 1;
          var showError = $('.show_alert_error');
        //   setInterval(function() {
        //     showCounter.text(getMonth + " Months to expire");
        //   }, 1000);
          if (getMonth === $('.alert_time').val()) {
            showCounter.css({color:"#fff", background:"red"});
          }
        });
      })();

      // FOR SIDE NAV TOGGLE
      (function(){
        $('#left-sidebar-nav').addClass('active');
        $('.hide_side_nav').on('click', function() {
          $('#left-sidebar-nav').slideToggle(1000, function() {
            $('#main, .page-footer').css({paddingLeft:"0px"});
            $(this).toggleClass('active');
            if ($('#left-sidebar-nav').hasClass('active')) {
              $('#main, .page-footer').css({paddingLeft:"240px"});
            }
          });

        });
      })();
    </script>
    <script src="js/jquery.table2excel.js"></script>
    <script>
        $(".download_csv").click(function(){
            var showDate = new Date();
            // showDate.toDateString()
            // alert("yes");
          $(".data-table-simple").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Excel Document Name",
			filename: "Bofik Inventory Table on " + showDate,
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
          });
//           $("#data-table-simple").table2excel({
//             // exclude CSS class
//             exclude: ".noExl",
//             name: "Excel Document Name",
// 			filename: "Bofik Inventory Table on " + showDate,
// 			fileext: ".xls",
// 			exclude_img: true,
// 			exclude_links: true,
// 			exclude_inputs: true
//           });
        });
        
        function getNodes(value){
            if(this.value == ""){
                $("#resulting").html("Enter a search query");
            }else{
            $.post("search.php",{partialNode:value},function(data){
                $("#resulting").html(data);
            });
            }
        }
        
        $('#data-table-row-grouping').editableTableWidget().numericInputExample().find('td:first').focus();
    </script>
    <script>
        $("#resulting tr td").click(function(){
        $(this).replaceWith('<input type="text" />');
            });
    </script>
    <script type="text/javascript">
 
  function insertBulk() {
    var company_name=$("#company_name").val();
    var brand_name=$("#brand_name").val();
    var sub_name=$("#sub_name").val();
    var pur_order_no=$("#pur_order_no").val();
    var pur_quantity=$("#pur_quantity").val();
    var pur_date=$("#pur_date").val();
 
 
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "php/bulk_inv.php",
            data: {company_name:company_name,brand_name:brand_name,sub_name:sub_name,pur_order_no:pur_order_no,pur_quantity:pur_quantity,pur_date:pur_date},
            dataType: "JSON",
            success: function(data) {
             $("#message").html(data);
            $("p").addClass("alert alert-success");
            },
            error: function(err) {
            alert(err);
            }
        });
 
}
 
  </script>
   <script type="text/javascript">
        function delete_id(id)
        {
         if(confirm('Sure To Remove This Mail ?'))
         {
          window.location.href='php/delete_mail.php?delete_id='+id;
         }
        }
    </script>
    <script type="text/javascript">
        function delete_inv(id)
        {
         if(confirm('Sure To Remove This Record ?'))
         {
          window.location.href='php/delete.php?delete_inv='+id;
         }
        }
    </script>
    <script type="text/javascript">
        function delete_prod(id)
        {
         if(confirm('Sure To Remove This Product Details ?'))
         {
          window.location.href='php/delete_prod.php?delete_prod='+id;
         }
        }
        function delete_acc(id)
        {
         if(confirm('Sure To Remove This Account ?'))
         {
          window.location.href='php/delete_acc.php?delete_acc='+id;
         }
        }
        function edit_acc(str)
        {
         if(confirm('Sure To Edit This Account ?'))
         {
          window.location.href='php/edit_acc.php?edit_acc='+str;
         }
        }
    </script>

</body>

</html>
