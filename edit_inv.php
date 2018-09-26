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
  
  $id = ucfirst($_GET["id"]);
  $inv_date = ucfirst($_GET["inv_date"]);
  $company_name = ucfirst($_GET["company_name"]);
  $brand_name = ucfirst($_GET["brand_name"]);
  $sub_name = ucfirst($_GET["sub_name"]);
  $quantity = ucfirst($_GET["quantity"]);
  $invoice_no = ucfirst($_GET["invoice_no"]);
  $order_no = ucfirst($_GET["order_no"]);
  $weighbill_no = ucfirst($_GET["weighbill_no"]);
  $vehicle_no = ucfirst($_GET["vehicle_no"]);
  $iss_date = ucfirst($_GET["iss_date"]);
  $invoice_date = ucfirst($_GET["invoice_date"]);
  $receive_date = ucfirst($_GET["receive_date"]);
  $driver_name = ucfirst($_GET["driver_name"]);
  $outlet = ucfirst($_GET["outlet"]);
  $prod_date = ucfirst($_GET["production_date"]);
  $expiry_date = ucfirst($_GET["expiry_date"]);
  $alert_month = ucfirst($_GET["alert_month"]);
  $str= "id={$id}";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Edit Inventory | Admin Dashboard | Bofik Nigeria Limited.</title>

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
                    <img src="images/login-logo.jpeg" alt="" class="circle responsive-img valign profile-image">
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
                    </li>';
                 }
                 ?>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">SETTINGS</p></li>
            <?php
                    if($type === 'superadmin'){
                    echo '
                    <li class="bold"><a href="settings.php" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-action-settings"></i> Settings</a>
                            
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
      <section id="settings" class="settings sections">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <!--<div class="header-search-wrapper grey hide-on-large-only">-->
            <!--    <i class="mdi-action-search active"></i>-->
            <!--    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search...">-->
            <!--</div>-->
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Edit Inventory</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Edit Inventory</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
         <div class="container">
          <div class="section">

            <p class="caption">Complete the form below to update this inventory : </p>
            <div class="divider"></div>


            <!-- MY FORM DETAILS -->

            <form class="" action="php/edit_inv.php" method="post">
              <!--######################## CREATE INVENTORY #############################3 -->
                <!-- Company Name -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <!--<label>Select Company Name</label>-->
                         <!--onchange="showBrand(this.value)"-->
                         <input type="text" value="<?php echo $id; ?>" name="id" style="display:none;"/>
                        <select id="company_name" name="company_name" required>
                            <option value="" disabled selected><?php echo $company_name; ?> : Select Company Name</option>
                            <?php
                                $sql = "SELECT DISTINCT company_name FROM add_product_name";  // Select all data from the table
                                  $res = mysqli_query($conn, $sql); // use the function on it and assign it to a variable
                                  if (!$res) { // if the variable does not contain any data, use a die function on it
                                    die("No results from the table");
                                  }
                                  $i = 1;
                                  while ($row=mysqli_fetch_assoc($res)) { // This returns data in form of associative array.
                                    foreach ($row as $key => $value) {
                                    //   echo "{$key}: " . "{$value}";
                                    //   echo "<br /><hr /></br />";
                                    
                                    if($key == 'company_name'){
                                      echo  '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                    $i++;
                                    }
                                  }
                            ?>
                        </select>
                        <!--<input type="text" placeholder="Enter The Company's Name" id="autocomplete-input" name="company_name" class="autocompleteCompany" required>-->
                         <label for="autocomplete-input">Company Name :</label> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Company name -->
                
                <!-- Brand Name -->
                <div class="row brand">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                          <div class="input-field col s12">
                              <select id="sel" name="brand_name" class="browser-default" required>
                                <option value=" "><?php echo $brand_name; ?> : Select Brand Name</option>
                              </select>
                              <!--<select id="brand_name" name="brand_name" required>-->
                              <!--  <option value="" disabled selected><?php echo $brand_name; ?></option>-->
                                <?php
                                    // $sql = "SELECT DISTINCT brand_name FROM add_product_name"; 
                                    //   $res = mysqli_query($conn, $sql); 
                                    //   if (!$res) { 
                                    //     die("No results from the table");
                                    //   }
                                    //   $i = 1;
                                    //   while ($row=mysqli_fetch_assoc($res)) { 
                                    //     foreach ($row as $key => $value) {
                                    //     if($key == 'brand_name'){
                                    //       echo  '<option value="'.$value.'">'.$value.'</option>';
                                    //     }
                                    //     $i++;
                                    //     }
                                    //   }
                                ?>
                            <!--</select>-->
                              <!--<select id="brand_name" name="brand_name">-->
                              <!--  <option value="0" disabled selected></option>-->
                              <!--  <option value="Flour">Flour</option>-->
                              <!--  <option value="Pasta">Pasta</option>-->
                              <!--</select>-->
                          </div>
                        <!--<i class="mdi-action-verified-user prefix"></i>-->
                        <!--<input type="text" placeholder="Specify The Brand Name" id="autocomplete-input-brand" name="brand_name" class="autocompleteBrand" required>-->
                       
                       
                        <!--<p id="brand_name"></p>-->
                         <label for="autocomplete-input-brand">Brand Name :</label> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Brand Name -->

                <!-- Sub Brand Name -->
                <div class="row sub_brand">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-social-domain prefix"></i>
                        <input type="text" placeholder="Specify The Sub Brand Name If Available" value="<?php echo $sub_name; ?>" id="autocomplete-input-sub_brand" name="sub_name" class="autocompleteSubBrand">
                         <label for="autocomplete-input-sub_brand">Sub Brand Name :</label> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Sub Brand Name -->

                <!-- Input Date -->
                <div class="row inputDate">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-notification-event-available prefix"></i>
                        <input type="date" placeholder="Date Of Inventory Creation" value="<?php echo $inv_date; ?>" id="autocomplete-input-date" name="inv_date" class="datepicker" required>
                         <label for="autocomplete-input-date">Date :</label> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Input Date -->

                <!-- Order & Weighbill No. -->
                <div class="row">
                    <div class="input-field col s12 m4">
                    <i class="mdi-action-assignment prefix"></i>
                    <input placeholder="Invoice No." id="invc_no" value="<?php echo $invoice_no; ?>" name="invc_no" type="text">
                     <label for="invc_no">Invoice No.</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-action-assignment prefix"></i>
                    <input placeholder="Order No." id="order_no" value="<?php echo $order_no; ?>" name="order_no" type="text" required>
                     <label for="order_no">Order No.</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-action-book prefix"></i>
                    <input placeholder="Weighbill No." id="weighbill_no" value="<?php echo $weighbill_no; ?>" name="weighbill_no" type="text" required>
                     <label for="weighbill_no">Weigh Bill No.</label> 
                  </div>
                </div>
                <!-- End Order & Weighbill No. -->

                <!-- Quantity & Vehicle No. -->
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="mdi-action-shopping-basket prefix"></i>
                    <input placeholder="Quantity Details" id="quantity" value="<?php echo $quantity; ?>" name="quantity" type="text" required>
                     <label for="quantity">Quantity Of Product</label> 
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="mdi-maps-directions-bus prefix"></i>
                    <input placeholder="Vehicle No." id="vehicle_no" value="<?php echo $vehicle_no; ?>" name="vehicle_no" type="text" required>
                     <label for="vehicle_no">Vehicle No.</label> 
                  </div>
                </div>
                <!-- End Quantity & Vehicle No. -->

                <!-- Issue & Invoice Date -->
                <div class="row">
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Issued Date" id="issue_date" value="<?php echo $iss_date; ?>" type="date" name="iss_date" class="datepicker" required>
                     <label for="issue_date">Date Of Product Issuance</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Invoice Date" id="invoice_date" value="<?php echo $invoice_date; ?>" type="date" name="invoice_date" class="datepicker" required>
                     <label for="invoice_date">Invoice Date</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Receiving Date" id="receive_date" value="<?php echo $receive_date; ?>" type="date" name="receive_date" class="datepicker" required>
                     <label for="receive_date">Receiving Date</label> 
                  </div>
                </div>
                <!-- End Issue & Invoice Date -->


                <!-- Expiry Date & alert Time. -->
                <div class="row">
                 <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Set Production Date" id="production_date" value="<?php echo $prod_date; ?>" type="date" name="production_date" class="datepicker" required>
                     <label for="production_date">Production Date</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Set Expiry Date" id="expiry_date" value="<?php echo $expiry_date; ?>" type="date" name="expiry_date" required>
                     <!--<label for="expiry_date">Expiry Date</label> -->
                  </div>
                  <div class="input-field col s12 m4">
                    <!-- <i class="mdi-notification-event-note prefix"></i> -->
                    <!--<label>Months Before Alert</label>-->
                    <select id="expire_month" name="alert_month" required>
                      <option value="" disabled selected><?php echo $alert_month; ?></option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                     <label for="expire_month">Alert Month</label> 
                  </div>
                </div>
                <!-- End Expiry date & Alert Time. -->

                <!-- Driver's Name & Destination -->
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="mdi-action-assignment-ind prefix"></i>
                    <input placeholder="Driver's Name" id="driver_name" value="<?php echo $driver_name; ?>" name="driver_name" type="text" required>
                     <label for="driver_name">Driver's Name</label> 
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="mdi-communication-call-split prefix"></i>
                    <input placeholder="Outlet" id="outlet" value="<?php echo $outlet; ?>" name="outlet" type="text" required>
                     <label for="outlet">Destination / Outlet</label> 
                  </div>
                </div>
                <!-- End Driver's Name & Destination -->
                <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m4 offset-m4">
                      
                    <button type="submit" class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="edit_inv" id="submit_inv">Edit Inventory</button>
                  </div>
                </div>
                <!--###### END SUBMIT BUTTON  ########-->
              <!--######################## END CREATE INVENTORY #############################3 -->
            </form>

            <!-- FORM DETAILS END HERE -->
          </div>
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
    $("#company_name").change(function(){
                var companyName = $(this).val();
                var METHOD = "POST";
                var URL = 'brand_result.php';
                var VALUE = companyName;
                 $.ajax({
                        url: URL,
                        type : METHOD,
                        data: {
                          companyName: VALUE,
                        },
                        dataType:"json",
                        error: function(){
                          console.log("Error");  
                        },
                        success:function(data){
                        $('#sel').empty();   
                        for (var i = 0; i < data.length; i++) {
                            var brandId = data[i]['brandId'];
                            var brandName = data[i]['brandName'];
                            option = '<option value="' + brandName + '">'
    					    + brandName + '</option>';
    					    $('#sel').append(option); 
                        }
                    }    
                });
            });
 
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