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
  <title>Admin Dashboard | Bofik Nigeria Limited.</title>

  <!-- CORE CSS-->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- JQUERY CSS -->
  <link rel="stylesheet" href="css/jquery-ui.min.css">
  <link rel="stylesheet" href="css/jquery-ui.theme.min.css">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <!-- Custome CSS-->
  <link href="css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  
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
      table.dataTable thead th, table.dataTable thead td {
            padding: 10.4px 18px !important;
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
                        <li><a href="php/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
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
            <li class="bold"><a href="#" data-navid="1" class="waves-effect waves-deep-purple darken-4 dash_click"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">INVENTORY</p></li>
            <?php
                if($type !== 'user'){
                    echo '<li class="bold"><a href="#create_inv" data-navid="2" class="waves-effect waves-deep-purple darken-4  dash_click"><i class="mdi-content-add-box"></i> Create Inventory</a>
                    </li>';
                }
            ?>
            <?php
                 if($type === 'superadmin'){
                    echo '<li class="bold"><a href="#search_inv" data-navid="3" class="waves-effect waves-deep-purple darken-4 dash_click"><i class="mdi-action-search"></i> Search Inventory</a>
                    </li>';
                 }
                ?>
            <li class="bold"><a href="#running_inv" data-navid="4" class="waves-effect waves-deep-purple darken-4 dash_click"><i class="mdi-action-input"></i> Inventory Running</a>
            </li>
            <?php
                   if($type === 'superadmin'){
                   echo '<li class="bold"><a href="#bulk_inv" data-navid="5" class="waves-effect waves-deep-purple darken-4  dash_click"><i class="mdi-action-receipt"></i> Bulk Purchase Input</a>
                    </li>';
                 }
                 ?>
                    <li class="bold"><a href="#download_inv" data-navid="6" class="waves-effect waves-deep-purple darken-4  dash_click"><i class="mdi-communication-call-received"></i> Download Data</a>
                    </li>
                     <li class="bold"><a href="#download_month" data-navid="8" class="waves-effect waves-deep-purple darken-4  dash_click"><i class="mdi-action-event"></i> Download Monthly Data <span class="new badge"></span></a>
                    </li>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">SETTINGS</p></li>
            <?php
                    if($type === 'superadmin'){
                    echo '
                    <li class="bold"><a href="settings.php" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-settings"></i> Settings</a>
                            
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

      <!-- START DASHBOARD CONTENT -->
      <section id="dashboard" data-navitem="1" class="dashboard sections">

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
                <h5 class="breadcrumbs-title">Dashboard</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Welcome To Bofik Nigeria Limited.</p>
            <div class="divider"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
      <!-- END DASHBOARD CONTENT -->

      <!-- START CREATE INVENTORY CONTENT -->
      <section id="create_inv" data-navitem="2" class="create_inv sections" style="display:none;">
      <!--<a name="timeline" />-->
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
                <h5 class="breadcrumbs-title">Create Inventory</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Create Inventory</a></li>
                    <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Complete the form below to create an inventory : </p>
            <div class="divider"></div>


            <!-- MY FORM DETAILS -->

            <form class="" action="php/create_inv.php" method="post">
              <!--######################## CREATE INVENTORY #############################3 -->
                <!-- Company Name -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <!--<label>Select Company Name</label>-->
                         <!--onchange="showBrand(this.value)"-->
                        <select id="company_name" name="company_name" required>
                            <option value="" disabled selected>Select Company Name</option>
                            <?php
                                $sql = "SELECT DISTINCT company_name FROM add_product_name";
                                  $res = mysqli_query($conn, $sql);
                                  if (!$res) { 
                                    die("No results from the table");
                                  }
                                  $i = 1;
                                  while ($row=mysqli_fetch_assoc($res)) {
                                    foreach ($row as $key => $value) {
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
                              <!--<ul id="lis"></ul>-->
                              <select id="sel" name="brand_name" class="browser-default" required>
                                <option value=" ">Select Brand Name</option>
                              </select>
                              
                              <!--<select id="" name="brand_name" required style="display:none;">-->
                              <!--  <option value="" disabled selected>Select Brand Name</option>-->
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
                        <input type="text" placeholder="Specify The Sub Brand Name If Available" id="autocomplete-input-sub_brand" name="sub_name" class="autocompleteSubBrand">
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
                        <input type="date" placeholder="Date Of Inventory Creation" id="autocomplete-input-date" name="inv_date" class="datepicker" required>
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
                    <input placeholder="Invoice No." id="invc_no" name="invc_no" type="text">
                     <label for="invc_no">Invoice No.</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-action-assignment prefix"></i>
                    <input placeholder="Order No." id="order_no" name="order_no" type="text">
                     <label for="order_no">Order No.</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-action-book prefix"></i>
                    <input placeholder="Weighbill No." id="weighbill_no" name="weighbill_no" type="text" required>
                     <label for="weighbill_no">Weigh Bill No.</label> 
                  </div>
                </div>
                <!-- End Order & Weighbill No. -->

                <!-- Quantity & Vehicle No. -->
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="mdi-action-shopping-basket prefix"></i>
                    <input placeholder="Quantity Details" id="quantity" name="quantity" type="text" required>
                     <label for="quantity">Quantity Of Product</label> 
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="mdi-maps-directions-bus prefix"></i>
                    <input placeholder="Vehicle No." id="vehicle_no" name="vehicle_no" type="text" required>
                     <label for="vehicle_no">Vehicle No.</label> 
                  </div>
                </div>
                <!-- End Quantity & Vehicle No. -->

                <!-- Issue & Invoice Date -->
                <div class="row">
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Issued Date" id="issue_date" type="date" name="iss_date" class="datepicker" required>
                     <label for="issue_date">Date Of Product Issuance</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Invoice Date" id="invoice_date" type="date" name="invoice_date" class="datepicker" required>
                     <label for="invoice_date">Invoice Date</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Receiving Date" id="receive_date" type="date" name="receive_date" class="datepicker" required>
                     <label for="receive_date">Receiving Date</label> 
                  </div>
                </div>
                <!-- End Issue & Invoice Date -->


                <!-- Expiry Date & alert Time. -->
                <div class="row">
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Set Production Date" id="production_date" type="date" name="production_date" class="datepicker" required>
                     <label for="production_date">Production Date</label> 
                  </div>
                  <div class="input-field col s12 m4">
                    <i class="mdi-notification-event-note prefix"></i>
                    <input placeholder="Set Expiry Date" id="expiry_date" type="date" name="expiry_date" required>
                     <!--<label for="expiry_date">Expiry Date</label> -->
                  </div>
                  <div class="input-field col s12 m4">
                    <!-- <i class="mdi-notification-event-note prefix"></i> -->
                    <!--<label>Months Before Alert</label>-->
                    <select id="expire_month" name="alert_month" required>
                      <option value="" disabled selected>Months Before Alert</option>
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
                    <input placeholder="Driver's Name" id="driver_name" name="driver_name" type="text" required>
                     <label for="driver_name">Driver's Name</label> 
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="mdi-communication-call-split prefix"></i>
                    <input placeholder="Outlet" id="outlet" name="outlet" type="text" required>
                     <label for="outlet">Destination / Outlet</label> 
                  </div>
                </div>
                <!-- End Driver's Name & Destination -->
                <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m4 offset-m4">
                    <button type="submit" class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="submit_inv" id="submit_inv">Submit Inventory</button>
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
      <!-- END CREATE INVENTORY CONTENT -->

      <!-- START SEARCH CONTENT -->
      <section id="search_inv" data-navitem="3" class="search_inv sections" style="display:none">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <!--<div class="header-search-wrapper grey hide-on-large-only">-->
            <!--    <i class="mdi-action-search active"></i>-->
            <!--    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">-->
            <!--</div>-->
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Search Inventory</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Search Inventory</a></li>
                    <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Search For Any Product/Brand Details</p>
            <div class="divider"></div>
            <form class="" action="#" method="get">
              <div class="row">
                <div class="col s12 m12 valign-wrapper">

                    <div class="col s12 m6 offset-m3">
                      <div class="input-field brand_search">
                          <select id="" onchange="getNodes(this.value)" name="search_brand" required>
                                <option value="" disabled selected>Select Company Name</option>
                                <?php
                                    $sql = "SELECT DISTINCT company_name FROM add_product_name";
                                      $res = mysqli_query($conn, $sql);
                                      if (!$res) { 
                                        die("No results from the table");
                                      }
                                      $i = 1;
                                      while ($row=mysqli_fetch_assoc($res)) {
                                        foreach ($row as $key => $value) {
                                        if($key == 'company_name'){
                                          echo  '<option value="'.$value.'">'.$value.'</option>';
                                        }
                                        $i++;
                                        }
                                      }
                                ?>
                            </select>
                        <!--<i class="mdi-action-verified-user prefix"></i>-->
                        <!--<input type="text" class="autocompleteBrand" onkeyup="getNodes(this.value)" name="search_brand" value="" placeholder="Brand Details">-->
                      </div>

                    </div>

                </div>
              </div>
            </form>
            <div class="divider"></div>
            <div class="container col s12 m12 l12 search_result">
              <table id="data-table-row-grouping" class="display demo2 responsive-table edit_table" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Company</th>
                          <th>Outlet</th>
                          <th>Brand name</th>
                          <th>Sub brand</th>
                          <th>Quantity</th>
                          <th>Order no</th>
                          <th>Weighbill no</th>
                          <th>Vehicle no</th>
                          <th>Issued date</th>
                          <th>Invoice date</th>
                          <th>Receiving date</th>
                          <th>Driver Name</th>
                          <th>Outlet</th>
                          <th>Expiry Date</th>
                          <th>Edit Details</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                        <th>Date</th>
                        <th>Company</th>
                        <th>Outlet</th>
                        <th>Brand name</th>
                        <th>Sub brand</th>
                        <th>Quantity</th>
                        <th>Order no</th>
                        <th>Weighbill no</th>
                        <th>Vehicle no</th>
                        <th>Issued date</th>
                        <th>Invoice date</th>
                        <th>Receiving date</th>
                        <th>Driver Name</th>
                        <th>Outlet</th>
                        <th>Expiry Date</th>
                        <th>Edit Details</th>
                      </tr>
                  </tfoot>

                  <tbody id="resulting">
                      
                  </tbody>
              </table>
            </div>
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
      <!-- END SEARCH CONTENT -->

      <!-- START RUNNING INVENTORY -->
      <section id="running_inv" data-navitem="4" class="running_inv sections" style="display:none">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <!--<div class="header-search-wrapper grey hide-on-large-only">-->
            <!--    <i class="mdi-action-search active"></i>-->
            <!--    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">-->
            <!--</div>-->
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Inventory Running</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Check Running Inventory</a></li>
                    <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">
            <div class="row">
              <p class="caption">All Running Inventory</p>
            </div>

            <div class="divider"></div>
            <div class="container col s12 m12 l12">
                
                
              <table id="data-table-simple" class="display demo2 responsive-table data-table-simple" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>DATE</th>
                          <th>COMPANY</th>
                          <th>OUTLET</th>
                          <th>BRAND NAME</th>
                          <th>SUB BRAND</th>
                          <th>QUANTITY</th>
                          <th>INVOICE NO.</th>
                          <th>ORDER NO.</th>
                          <th>WEIGHBILL NO.</th>
                          <th>VEHICLE NO</th>
                          <th>ISSUED DATE</th>
                          <th>INVOICE DATE</th>
                          <th>RECEIVING DATE</th>
                          <th>DRIVER NAME</th>
                          <th>OUTLET</th>
                          <th>PROD. DATE</th>
                          <th>EXPIRY DATE</th>
                          <th style="display:none" >ALERT TIME</th>
                          <th>COUNTDOWN</th>
                          <?php
                            if($type == 'superadmin'){
                                echo '<th>Edit</th>';
                            }
                          ?>
                          
                      </tr>
                  </thead>

                  <tfoot>
                      <tr class="noExl">
                        <th>Date</th>
                        <th>Company</th>
                        <th>Outlet</th>
                        <th>Brand name</th>
                        <th>Sub brand</th>
                        <th>Quantity</th>
                        <th>Invoice no</th>
                        <th>Order no</th>
                        <th>Weighbill no</th>
                        <th>Vehicle no</th>
                        <th>Issued date</th>
                        <th>Invoice date</th>
                        <th>Receiving date</th>
                        <th>Driver Name</th>
                        <th>Outlet</th>
                        <th>Prod. Date</th>
                        <th>Expiry Date</th>
                        <th style="display:none;">Alert Time</th>
                        <th>Countdown</th>
                        <?php
                            if($type == 'superadmin'){
                                echo '<th>Edit</th>';
                            }
                          ?>
                      </tr>
                  </tfoot>
                
                  <tbody>
                       <?php 
                            $sqlinvt = "SELECT * FROM inventory WHERE pur_order_no = '' ORDER BY company_name";
                            $resultinvt = mysqli_query($conn, $sqlinvt);
                            while($rowinvt = mysqli_fetch_assoc($resultinvt))
                                    {
                     echo '<tr class="set_well">';
                     echo     '<td>'.$rowinvt["inv_date"].'</td>';
                     echo     '<td>'.$rowinvt["company_name"].'</td>';
                     echo     '<td>'.$rowinvt["outlet"].'</td>';
                     echo     '<td>'.$rowinvt["brand_name"].'</td>';
                     echo     '<td>'.$rowinvt["sub_name"].'</td>';
                     echo     '<td>'.$rowinvt["quantity"].' bags.</td>';
                     echo     '<td>'.$rowinvt["invoice_no"].'</td>';
                     echo     '<td>'.$rowinvt["order_no"].'</td>';
                     echo     '<td>'.$rowinvt["weighbill_no"].'</td>';
                     echo     '<td>'.$rowinvt["vehicle_no"].'</td>';
                     echo     '<td>'.$rowinvt["iss_date"].'</td>';
                     echo     '<td>'.$rowinvt["invoice_date"].'</td>';
                     echo     '<td>'.$rowinvt["receive_date"].'</td>';
                     echo     '<td>'.$rowinvt["driver_name"].'</td>';
                     echo     '<td>'.$rowinvt["outlet"].'</td>';
                     $date = $rowinvt["expiry_date"];
                     $prod_date = $rowinvt["production_date"];
                     $prod_format = date("M d, Y", strtotime($prod_date));
                     $new_format = date("M d, Y", strtotime($date));
                     $now_date = date('Y-m-d');
                     $getMonthNo = date("n j, y", strtotime($new_format));
                     
                     $diff = abs(strtotime($date) - strtotime($now_date));
                     $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                     
                     echo     '<td data-countid="2">'.$prod_format.'</td>';
                     echo     '<td data-countid="1" class="counter">'.$new_format.'</td>';
                     $alertMonth = $rowinvt["alert_month"];
                     echo     '<td class="alert_time" value="'.$rowinvt["alert_month"].'" style="display:none" >'.$alertMonth.'</td>';
                     if($months <= $alertMonth){
                         $weighbillNo = $rowinvt["weighbill_no"];
                         echo     '<td data-countext="1" class="showCounter" style="background:red; color:#fff;">'.$months.' Months To Expire. PLEASE TAKE ACTIONS</td>';
                     }else {
                         echo     '<td data-countext="1" class="showCounter">'.$months.' Months To Expire</td>';
                     }
                     $id = $rowinvt["id"];
                     $inv_date = $rowinvt["inv_date"];
                     $company_name = $rowinvt["company_name"];
                     $brand_name = $rowinvt["brand_name"];
                     $sub_name = $rowinvt["sub_name"];
                     $quantity = $rowinvt["quantity"];
                     $invoice_no = $rowinvt["invoice_no"];
                     $order_no = $rowinvt["order_no"];
                     $weighbill_no = $rowinvt["weighbill_no"];
                     $vehicle_no = $rowinvt["vehicle_no"];
                     $iss_date = $rowinvt["iss_date"];
                     $invoice_date = $rowinvt["invoice_date"];
                     $receive_date = $rowinvt["receive_date"];
                     $driver_name = $rowinvt["driver_name"];
                     $outlet = $rowinvt["outlet"];
                     $prod_date = $rowinvt["production_date"];
                     $expiry_date = $rowinvt["expiry_date"];
                     $alert_month = $rowinvt["alert_month"];
                     $str = "id={$id}&inv_date={$inv_date}&company_name={$company_name}&brand_name={$brand_name}&sub_name={$sub_name}&quantity={$quantity}". 
                     "&invoice_no={$invoice_no}&order_no={$order_no}&weighbill_no={$weighbill_no}&vehicle_no={$vehicle_no}&iss_date={$iss_date}&invoice_date={$invoice_date}".
                     "&receive_date={$receive_date}&driver_name={$driver_name}&outlet={$outlet}&production_date={$prod_date}&expiry_date={$expiry_date}&alert_month={$alert_month}";
                            if($type == 'superadmin'){
                                echo '<td>
                            <a href="edit_inv.php?'.$str.'" class="waves-effect waves-light  btn-floating"><i class="mdi-content-redo left"></i>Edit</a>
                            <a href="javascript:delete_inv('.$rowinvt["id"].')" class="waves-effect waves-light  btn-floating"><i class="mdi-action-delete left"></i>Delete</a>
                           </td>';
                            }
                      echo '</tr>';
                      
                                    }
                        ?>
                  </tbody>
              </table>
              
                      <div class="right-align" style="margin-top: 20px;">
                            <button class="waves-effect waves-light  btn download_csv"><i class="mdi-action-get-app right"></i>Download As CSV</button>
                      </div>
                    <?php
                    if($type === 'superadmin'){
                        echo    '<div class="right-align" style="margin-top: 20px; display:none;">
                            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                <input type="file" name="file" id="file" class="input-large">
                                <button type="submit" id="submit" class="waves-effect waves-light btn" name="Import"><i class="mdi-action-backup right"></i>Upload CSV</button>
                            </form>
                      </div>';
                    }
                    ?>
            </div>
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
      <!-- END RUNNING INVENTORY -->
      
      <!-- START BULK PURCHASE INPUT CONTENT -->
      <section id="bulk_inv" data-navitem="5" class="bulk_inv sections" style="display:none">

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
                <h5 class="breadcrumbs-title">Bulk Purchase Input Page</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Bulk Purchase Input</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Bulk Purchase Input Page.</p>
            <div class="divider"></div>
             <!--action="php/bulk_inv.php" method="post"-->
             <!--method="POST" onsubmit="return submitdata();"-->
            <form id="sub_form" action="php/bulk_inv.php" method="post">
              <!--######################## CREATE PURCHASE INVENTORY #############################3 -->
              <!-- Company Name -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                          <select id="bulk_company" name="company_name" required>
                            <option value="" disabled selected>Select Company Name</option>
                            <?php
                                $sql = "SELECT DISTINCT company_name FROM add_product_name";
                                  $res = mysqli_query($conn, $sql);
                                  if (!$res) { 
                                    die("No results from the table");
                                  }
                                  $i = 1;
                                  while ($row=mysqli_fetch_assoc($res)) {
                                    foreach ($row as $key => $value) {
                                    if($key == 'company_name'){
                                      echo  '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                    $i++;
                                    }
                                  }
                            ?>
                        </select>
                        <!--<i class="mdi-communication-business prefix"></i>-->
                        <!--<input type="text" placeholder="Enter The Company's Name" id="bulk_company" name="company_name" class="autocompleteCompany" required>-->
                        <!-- <label for="autocomplete-input">Company Name :</label> -->
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
                          <select id="sel2" name="brand_name" class="browser-default" required>
                                <option value=" ">Select Brand Name</option>
                              </select>
                           <!--<select id="bulk_brand" name="brand_name" required>-->
                           <!--     <option value="" disabled selected>Select Brand Name</option>-->
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
                        <!--<i class="mdi-action-verified-user prefix"></i>-->
                        <!--<input type="text" placeholder="Specify The Brand Name" id="bulk_brand" name="brand_name" class="autocompleteBrand" required>-->
                        <!-- <label for="autocomplete-input-brand">Brand Name :</label> -->
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
                        <input type="text" placeholder="Specify The Sub Brand Name If Available" id="bulk_sub_brand" name="sub_name" class="autocompleteSubBrand">
                        <!-- <label for="autocomplete-input-sub_brand">Sub Brand Name :</label> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Sub Brand Name -->
                <!-- Purchase Order No -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-assignment prefix"></i>
                        <input type="text" placeholder="Enter The Purchase Order No." id="bulk_order" name="pur_order_no" class="" required>
                        <!-- <label for="autocomplete-input">Company Name :</label> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Purchase Order No -->

                <!-- Purchase Quantity -->
                <div class="row brand">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-verified-user prefix"></i>
                        <input type="text" placeholder="Specify Quantity" id="bulk_quantity" name="pur_quantity" class="" required>
                        <!-- <label for="autocomplete-input-brand">Brand Name :</label> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Purchase Quantity -->
                
                <!-- Purchase Date -->
                <div class="row inputDate">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-notification-event-available prefix"></i>
                        <input type="date" placeholder="Purchase Date" id="bulk_date" name="pur_date" class="datepicker" required>
                        <!-- <label for="autocomplete-input-date">Date :</label> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Purchase Date -->
                  <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m4 offset-m4">
                    <button type="submit" class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="submit_pur_inv" id="submit_pur_inv">Submit Purchase Inventory</button>
                  </div>
                </div>
                <!--###### END SUBMIT BUTTON  ########-->
              <!--######################## END CREATE PURCHASE INVENTORY #############################3 -->
            </form>
            
            <div class="divider"></div>
            <div class="container col s12 m12 l12">
                
                
              <table id="data-table-row-grouping" class="display demo2 responsive-table data-table-simple" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>DATE</th>
                          <th>COMPANY</th>
                          <th>COMPANY</th>
                          <th>BRAND NAME</th>
                          <th>SUB BRAND</th>
                          <th>PURCHASE QUANTITY</th>
                          <th>PURCHASE ORDER NO.</th>
                          <th>PURCHASE DATE</th>
                          <?php
                            if($type == 'superadmin'){
                                echo '<th>Edit</th>';
                            }
                          ?>
                          
                      </tr>
                  </thead>

                  <tfoot>
                      <tr class="noExl">
                          <th>DATE</th>
                          <th>COMPANY</th>
                          <th>COMPANY</th>
                          <th>BRAND NAME</th>
                          <th>SUB BRAND</th>
                          <th>PURCHASE QUANTITY</th>
                          <th>PURCHASE ORDER NO.</th>
                          <th>PURCHASE DATE</th>
                        <?php
                            if($type == 'superadmin'){
                                echo '<th>Edit</th>';
                            }
                          ?>
                      </tr>
                  </tfoot>
                
                  <tbody>
                       <?php 
                            $sqlbulk = "SELECT * FROM purchase ORDER BY company_name";
                            $resultbulk = mysqli_query($conn, $sqlbulk);
                            while($rowbulk = mysqli_fetch_assoc($resultbulk))
                                    {
                     echo '<tr class="set_well">';
                     echo     '<td>'.$rowbulk["input_date"].'</td>';
                     echo     '<td>'.$rowbulk["company_name"].'</td>';
                     echo     '<td>'.$rowbulk["company_name"].'</td>';
                     echo     '<td>'.$rowbulk["brand_name"].'</td>';
                     echo     '<td>'.$rowbulk["sub_name"].'</td>';
                     echo     '<td>'.$rowbulk["pur_quantity"].' bags.</td>';
                     echo     '<td>'.$rowbulk["pur_order_no"].'</td>';
                     echo     '<td>'.$rowbulk["pur_date"].'</td>';
                     
                     $pur_id = $rowbulk["id"];
                     $pur_inv_date = $rowbulk["inv_date"];
                     $pur_company_name = $rowbulk["company_name"];
                     $pur_brand_name = $rowbulk["brand_name"];
                     $pur_sub_name = $rowbulk["sub_name"];
                     $pur_quantity = $rowbulk["pur_quantity"];
                     $pur_order_no = $rowbulk["pur_order_no"];
                     $pur_date = $rowbulk["pur_date"];
                     $pur_str = "pur_id={$pur_id}&pur_inv_date={$pur_inv_date}&pur_company_name={$pur_company_name}&pur_brand_name={$pur_brand_name}&pur_sub_name={$pur_sub_name}&pur_quantity={$pur_quantity}". 
                     "&pur_order_no={$pur_order_no}&pur_date={$pur_date}";
                            if($type == 'superadmin'){
                                echo '<td>
                            <a href="edit_bulk_inv.php?'.$pur_str.'" class="waves-effect waves-light  btn-floating"><i class="mdi-content-redo left"></i>Edit</a>
                            <a href="javascript:delete_pur('.$rowbulk["id"].')" class="waves-effect waves-light  btn-floating"><i class="mdi-action-delete left"></i>Delete</a>
                           </td>';
                            }
                      echo '</tr>';
                      
                                    }
                        ?>
                  </tbody>
              </table>
            </div>
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
      <!-- END BULK PURCHASE INPUT CONTENT -->
      
      <!-- START DOWNLOAD DATA CONTENT -->
      <section id="download_inv" data-navitem="6" class="download_inv sections" style="display:none">

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
                <h5 class="breadcrumbs-title">Table Data Page</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Table Data Page</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Download Table Data Page.</p>
            <div class="divider"></div>
            <form>
                <!-- Company Name -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <!--<label>Select Company Name</label>-->
                         <!--onchange="showBrand(this.value)"-->
                        <select id="company_name_data" name="company_name" required>
                            <option value="" disabled selected>Select Company Name</option>
                            <?php
                                $sql = "SELECT DISTINCT company_name FROM add_product_name";  // Select all data from the table
                                  $res = mysqli_query($conn, $sql); // use the function on it and assign it to a variable
                                  if (!$res) { // if the variable does not contain any data, use a die function on it
                                    die("No results from the table");
                                  }
                                  $i = 1;
                                  while ($row=mysqli_fetch_assoc($res)) { // This returns data in form of associative array.
                                    foreach ($row as $key => $value) {
                                    if($key == 'company_name'){
                                      echo  '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                    $i++;
                                    }
                                  }
                            ?>
                        </select>
                        <select id="sel3" name="brand_name" class="browser-default" required>
                                <option value=" ">Select Brand Name</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                 <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m4 offset-m4">
                    <input class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="download" id="download_data" type="button" value="Show Table" onclick="post_table()">
                  </div>
                </div>
                <!--###### END SUBMIT BUTTON  ########-->
                </form>
            
           <div class="container col s12 m12 l12">
               <div id="download_results"></div>
            </div>
                            
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
      <!-- END DOWNLOAD DATA CONTENT -->
      
      <!-- START DOWNLOAD MONTHLY DATA CONTENT -->
      <section id="download_inv" data-navitem="8" class="download_month sections" style="display:none">

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
                <h5 class="breadcrumbs-title">Monthly Report Download</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Monthly Report Download</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Monthly Report Download Data Page.</p>
            <div class="divider"></div>
            <form>
                <!-- Company Name -->
                <div class="row company">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <!--<label>Select Company Name</label>-->
                         <!--onchange="showBrand(this.value)"-->
                        <select id="company_name_month" name="company_name_month" required>
                             <!--onchange="downloadData(this.value)" -->
                            <option value="" disabled selected>Select Company Name</option>
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
                        <select id="brand_name_month" name="brand_name" class="browser-default" required>
                                <option value=" ">Select Brand Name</option>
                        </select>
                        
                        <div class="input-field col s12 m12">
                            <i class="mdi-notification-event-note prefix"></i>
                            <input placeholder="Select month" id="bmonth" type="month" class="datepicker" required>
                          </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
                 <!--###### SUBMIT BUTTON  ########-->
                <div class="row">
                  <div class="col s12 m6 offset-m4">
                    <input class="btn full_btn waves-effect waves-light btn-large teal darken-4" name="download" id="download_data_month" type="button" value="Show Results Table" onclick="post()">
                  </div>
                </div>
                <!--###### END SUBMIT BUTTON  ########-->
                <!-- End Company name -->
                </form>
            
           <div class="container col s12 m12 l12">
               <div id="download_results_month"></div>
            </div>
                            
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
      <!-- END DOWNLOAD MONTHLY DATA CONTENT -->
      
         <!-- START SETTINGS CONTENT -->
      <section id="settings" data-navitem="7" class="settings sections" style="display:none">

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
        // function downloadData(value){
        //     var compname = $('#company_name_data').val();
        //      $.post("php/download_data.php",{partialNodes:value, comp:compname},function(data){
        //         $("#download_results").html(data);
        //     });
        // }
        
        function post () {
            var cname = $('#company_name_month').val();
			var bname = $("#brand_name_month").val();
			var bmonth = $("#bmonth").val();
            $.post('php/download_data_monthly.php', {cname:cname, bname:bname, bmonth:bmonth}, 
            function(data) {
               $("#download_results_month").html(data); 
            });
        }
        function post_table () {
            var compname = $('#company_name_data').val();
			var brandname = $("#sel3").val();
            $.post('php/download_data.php', {compname:compname, brandname:brandname}, 
            function(data) {
               $("#download_results").html(data); 
            });
        }
    </script>
    <script>
        $("#resulting tr td").click(function(){
        $(this).replaceWith('<input type="text" />');
            });
    </script>
    <script type="text/javascript">
 
          function submitdata() {
            var company_name= $("#bulk_company").val();// document.getElementById( "bulk_company" );     //
            var brand_name=$("#bulk_brand").val();//  document.getElementById( "bulk_brand" );      // 
            var sub_name=$("#bulk_sub_brand").val();//  document.getElementById( "bulk_sub_brand" );     // 
            var pur_order_no=$("#bulk_order").val();//  document.getElementById( "bulk_order" );    //  
            var pur_quantity= $("#bulk_quantity").val();// document.getElementById( "bulk_quantity" );   //
            var pur_date= $("#bulk_date").val(); //document.getElementById( "bulk_date" );    // 
            var VALUE = company_name;
         
            
        // AJAX code to send data to php file.
                $.ajax({
                    type: "POST",
                    url: "php/bulk_inv.php",
                    data: JSON.stringify({company_name:company_name,brand_name:brand_name,sub_name:sub_name,pur_order_no:pur_order_no,pur_quantity:pur_quantity,pur_date:pur_date}),
                    dataType: "JSON",
                    contentType:"application/json",
                    success: function(data) {
                        alert('form was submitted');
                    //  $("#message").html(data);
                    // $("p").addClass("alert alert-success");
                    },
                    error: function(err) {
                    alert(err);
                    alert(company_name);
                    }
                });
         
        }
        
    $(function () {

        $('#sub_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'php/bulk_inv.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

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
        function delete_pur(id)
        {
         if(confirm('Sure To Remove This Record ?'))
         {
          window.location.href='php/delete_pur.php?delete_pur='+id;
         }
        }
        </script>
    <script type="text/javascript">
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
            
            $("#bulk_company").change(function(){
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
                        $('#sel2').empty();   
                        for (var i = 0; i < data.length; i++) {
                            var brandId = data[i]['brandId'];
                            var brandName = data[i]['brandName'];
                            option = '<option value="' + brandName + '">'
    					    + brandName + '</option>';
    					    $('#sel2').append(option); 
                        }
                    }    
                });
            });
            $("#company_name_data").change(function(){
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
                        $('#sel3').empty();   
                        for (var i = 0; i < data.length; i++) {
                            var brandId = data[i]['brandId'];
                            var brandName = data[i]['brandName'];
                            option = '<option value="' + brandName + '">'
    					    + brandName + '</option>';
    					    $('#sel3').append(option); 
                        }
                    }    
                });
            });
            $("#company_name_month").change(function(){
                var cmonth = $(this).val();
                var METHOD = "POST";
                var URL = 'brand_result_monthly.php';
                var VALUE = cmonth;
                 $.ajax({
                        url: URL,
                        type : METHOD,
                        data: {
                          cmonth: VALUE,
                        },
                        dataType:"json",
                        error: function(){
                          console.log("Error");  
                        },
                        success:function(data){
                        $('#brand_name_month').empty();   
                        for (var i = 0; i < data.length; i++) {
                            var brandid = data[i]['brandid'];
                            var brandname = data[i]['brandname'];
                            option = '<option value="' + brandname + '">'
    					    + brandname + '</option>';
    					    $('#brand_name_month').append(option); 
                        }
                    }    
                });
            });
    </script>

</body>

</html>