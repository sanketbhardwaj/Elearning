<?php
error_reporting(0);
session_start();
include('../../../connection.php');
include('../../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../../";
//$menu = "add_inq";

if(isset($_POST['btn_update'])){
	
	$q="Update visits set remark = '".$_POST['text_remark']."', visit_status = '".$_POST['text_visits_status']."', visit_date = '".$_POST['text_visits_date']."', type = '".$_POST['text_visits_type']."', client_uid = '".$_POST['text_client_uid']."' where uid='".$_GET['id']."'";
	$r=mysqli_query($cn,$q);
	if($r){
		?><script>if(!alert("Updated!")) document.location = '../';</script><?php
	}
	
}
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
    <title><?php echo $row_title[3]; ?> | Update Visits</title>
    <link rel="apple-touch-icon" href="../../../logo/<?php echo $row_title[4]; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../../../logo/<?php echo $row_title[4]; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/pages/dashboard.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/custom/custom.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php
	include('../../header.php')
	?>
    <!-- END: Header-->
    



    <?php
	include('../../menu.php')
	?>

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!--card stats start-->
   
      <div class="row">
		  <div class="col s12">
			<div id="icon-prefixes" class="card card-tabs">
			  <div class="card-content">
				<div class="card-title">
				  <div class="row">
					<div class="col s12 m6 l10">
					  <h4 class="card-title">Update Visits</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <div class="row">
					  <?php
						$sql_visits="select * from visits where uid = '".$_GET['id']."'";
						$result_visits=mysqli_query($cn,$sql_visits);
						$row_visits=mysqli_fetch_array($result_visits);
					  ?>
						
						<div class="input-field col s6">
							<select name="text_client_uid" >
							  <option value="" disabled selected>Choose Client</option>
								<?php
								$sql_c="select * from client";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option <?php if($row_c[1]==$row_visits[4]){ echo "selected";}?> value="<?php echo $row_c[1]; ?>"><?php echo $row_c[10]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Assign Client</label>
					    </div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[6];?>" class="validate">
						  <label>Start On</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[7];?>" class="validate">
						  <label>Start Latitude</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[8];?>" class="validate">
						  <label>Start Longitude</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[9];?>" class="validate">
						  <label>End On</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[10];?>" class="validate">
						  <label>End Latitude</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled value="<?php echo $row_visits[11];?>" class="validate">
						  <label>End Longitude</label>
						</div>
						
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">location_on</i>
						  <textarea name="text_remark" placeholder="Enter Remark" class="materialize-textarea"><?php echo $row_visits[5];?></textarea>
						  <label>Remark</label>
						</div>
						<div class="input-field col s6">
							<select name="text_visits_status">
								<option value="" disabled selected>Select Status</option>
								<option <?php if("Pending"==$row_visits[12]){ echo "selected";}?> value="Pending">Pending</option>
								<option <?php if("Completed"==$row_visits[12]){ echo "selected";}?> value="Completed">Completed</option>
							</select>
							<label>Visits Status</label>
					    </div>
						<div class="input-field col s6">
							<select name="text_visits_type">
								<option value="" disabled selected>Select Type</option>
								<option <?php if("Online"==$row_visits[15]){ echo "selected";}?> value="Online">Online</option>
								<option <?php if("Offline"==$row_visits[15]){ echo "selected";}?> value="Offline">Offline</option>
							</select>
							<label>Visits Type</label>
					    </div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">cake</i>
						  <input type="date" value="<?php if($row_c[13]!="1970-01-01"){ echo $row_c[13]; }?>" name="text_visits_date">
						  <label>Visits Date</label>
						</div>
						
						
						
						
						
					  </div>
					  <br><center><button style="width:200px;height:40px;" name="btn_update" type="submit" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-5 mr-1 mb-2">Update</button>
					  <a href="../" style="width:200px;height:40px;" class="waves-effect waves-light btn gradient-45deg-red-teal z-depth-5 mr-1 mb-2">Back</a></center>
					</form>
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
    <script src="../../app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../app-assets/vendors/chartjs/chart.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../app-assets/js/plugins.min.js"></script>
    <script src="../../app-assets/js/search.min.js"></script>
    <script src="../../app-assets/js/custom/custom-script.min.js"></script>
    <script src="../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:11 GMT -->
</html>