<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "add_admin";

if($_SESSION['admin_type']!="Primary"){
	$s = "location:$ext/home";
	header($s);
}
	
if(isset($_POST['btn_save'])){
	$salary = explode("|", "$_POST[text_staff_uid]")[1];
	$staff_uid = explode("|", "$_POST[text_staff_uid]")[0];
	$fname = substr($_POST['text_name'], 0,1);
	$uid = $fname.date("jYhisA").rand();
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date_time=date('Y-m-d H:i:s',$time_now);
	
	if(file_exists($_FILES['text_profile']['tmp_name'])){
		$fileinfos = pathinfo($_FILES['text_profile']['name']);  
		$extensions = $fileinfos['extension'];
		$profilepic = rand().date("IjSofFYhisA").".".$extensions;
		$locations = "../../images/".$profilepic;
		move_uploaded_file($_FILES['text_profile']['tmp_name'],$locations);
	}
	
	$q="INSERT INTO admin VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_name']."','".$_POST['text_mobile']."','".$_POST['text_email']."','".$_POST['text_password']."','".$_POST['text_admin_type']."','Active','".$profilepic."')";
	$r=mysqli_query($cn,$q);
	if($r){
		?><script>if(!alert("Saved!")) document.location = '';</script><?php
	}else{
		?><script>if(!alert("Email or Mobile Already Exist!")) document.location = '';</script><?php
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
    <title><?php echo $row_title[3]; ?> | Add Admin</title>
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
   
      <div class="row">
		  <div class="col s12">
			<div id="icon-prefixes" class="card card-tabs">
			  <div class="card-content">
				<div class="card-title">
				  <div class="row">
					<div class="col s12 m6 l10">
					  <h4 class="card-title">Add Admin</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <div class="row">
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" placeholder="Enter Name" class="validate" name="text_name" >
						  <label>Name</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" class="validate" name="text_mobile"  size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">mail_outline</i>
						  <input type="email" placeholder="Enter Email ID" class="validate" name="text_email" >
						  <label>Email</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">vpn_key</i>
						  <?php
						  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
							$pass = array(); //remember to declare $pass as an array
							$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
							for ($i = 0; $i < 8; $i++) {
								$n = rand(0, $alphaLength);
								$pass[] = $alphabet[$n];
							}
						  ?>
						  <input type="text" placeholder="Enter Password" class="validate" name="text_password" value="<?php echo implode($pass); ?>" >
						  <label>Password</label>
						</div>
						<div class="input-field col s6">
							<select name="text_admin_type" >
							  <option value="" disabled selected>Choose Staff</option>
								<option value="Primary">Primary</option>
								<option value="Secondary">Secondary</option>
							</select>
							<label>Admin Type</label>
					    </div>
						<div class="file-field input-field col s6">
						<i class="material-icons prefix">insert_drive_file</i>
							  <div class="btn">
								<span>File</span>
								<input type="file" name="text_profile">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" placeholder="Profile Picture" type="text" name="text_profile_picture">
							  </div>
							
						</div>
						
					  </div>
					  <br><center><button style="width:200px;height:40px;" name="btn_save" type="submit" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-5 mr-1 mb-2">Save</button></center>
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