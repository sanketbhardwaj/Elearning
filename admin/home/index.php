<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "home";
?>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:09 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Musskan CRM Software which is helps to manage your business properly and You can moniter, assign work to staff, leads reports etc">
    <meta name="keywords" content="CRM, crm, Musskan CRM, hst, Highsoft Technologies">
    <meta name="author" content="Highsoft Technologies">
    <title><?php echo $row_title[3]; ?> | Admin Dashboard</title>
    <link rel="apple-touch-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php
	include('../header.php')
	?>
    <!-- END: Header-->
    



    <?php
	include('../menu.php')
	?>

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!--card stats start-->
   <div id="card-stats" class="pt-0">
      <div class="row">
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Active Admin</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from admin where status = 'Active'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>/
						</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from admin";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Total Sales Person</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from staff where status = 'Active' AND dept = 'Sales'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>/
						</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from staff where dept = 'Sales'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>Total Support Person</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from staff where status = 'Active' AND dept = 'Support'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>/
						</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from staff where dept = 'Support'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Total Active Inquiries</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from client where client_status = 'Pending'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Tickets</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from tickets where is_solve = 'Pending'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from tickets";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Supports</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from supports where is_solve = 'Pending'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from supports";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Total Clients</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from client where client_status = 'Confirmed'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>Total Visits</p>
                     </div>
                     <div class="col s5 m5 right-align">
						<h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from visits where visit_status = 'Completed'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from visits";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Total Trainings</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from training where training_status = 'Completed'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from training";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Transactions</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from transaction";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Total Feedbacks</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from feedback";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         
      </div>
   </div>
   <!--card stats end-->
   <!--yearly & weekly revenue chart start-->
   
   <!--end container-->
</div><!-- START RIGHT SIDEBAR NAV -->

<!-- END RIGHT SIDEBAR NAV -->
          </div>
          
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    <!-- Theme Customizer -->




    <!-- BEGIN: Footer-->

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2020          <a href="https://highsofttechno.com" target="_blank"><?php echo $row_title[3]; ?></a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://highsofttechno.com/">Team Highsoft Technologies</a></span></div>
      </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../app-assets/vendors/chartjs/chart.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../app-assets/js/plugins.min.js"></script>
    <script src="../app-assets/js/search.min.js"></script>
    <script src="../app-assets/js/custom/custom-script.min.js"></script>
    <script src="../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:11 GMT -->
</html>