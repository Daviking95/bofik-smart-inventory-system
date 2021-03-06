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
  <title>Change Password | Admin Dashboard | Bofik Nigeria Limited.</title>

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
            <li class="bold"><a href="dashboard.php#" data-navid="1" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">INVENTORY</p></li>
            <li class="bold"><a href="dashboard.php#create_inv" data-navid="2" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-content-add-box"></i> Create Inventory</a>
            </li>
            <?php
                 if($type === 'superadmin'){
                    echo '<li class="bold"><a href="#search_inv" data-navid="3" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-search"></i> Search Inventory</a>
                    </li>';
                 }
                ?>
            <li class="bold"><a href="dashboard.php#running_inv" data-navid="4" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-input"></i> Inventory Running</a>
            </li>
            <?php
                   if($type === 'superadmin'){
                   echo '<li class="bold"><a href="dashboard.php#bulk_inv" data-navid="5" class="waves-effect waves-deep-purple darken-4 "><i class="mdi-action-receipt"></i> Bulk Purchase Input</a>
                    </li>
                    <li class="bold"><a href="dashboard.php#download_inv" data-navid="6" class="waves-effect waves-deep-purple darken-4"><i class="mdi-communication-call-received"></i> Download Data</a>
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
                    <li class="bold"><a href="settings.php" class="waves-effect waves-deep-purple darken-4"><i class="mdi-action-settings"></i> Settings</a>
                            
                    </li>';
                 }
                 ?>
            <li><a href="#"><i class="mdi-action-lock-outline"></i> Change Password</a>
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
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search...">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Change Password</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Change Password</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Change Your Password.</p>
            <div class="divider"></div>
        <section id="change_password" class="sections">
            <div class="center-align card blue" style="padding:10px; color:#fff;"><h5>CHANGE PASSWORD</h5></div>
            <div class="col s12">
              <form class="container formValidate" id="formValidate" name="RegForm" method="get" action="php/change_password.php" style="width:500px;">
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="old_pass" name="old_pass" type="password" required  data-error=".errorTxt1">
                     <div class="errorTxt1"></div>
                    <label for="old_pass" class="center-align">Old Password</label>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" name="password" type="password" required  data-error=".errorTxt3">
                     <div class="errorTxt3"></div>
                    <label for="password">New Password</label>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password-again" name="password-again" type="password" required  data-error=".errorTxt4">
                     <div class="errorTxt4"></div>
                    <label for="password-again">New Password again</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button id="change_password" type="submit" name="change_password" class="btn waves-effect waves-light col s12">Change Password</button>
                  </div>
                </div>
                <div class="row">
                    <div class="col 12 message_box" style="margin:10px 0px;"></div>
                </div>
              </form>
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
