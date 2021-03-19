<?php
error_reporting(0);
session_start();
include('../../connection.php');
$ext = "../";
include('../ischecklogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
if(isset($_POST['btn_login'])){

  $sql="select count(*) from staff where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."' and password='".mysqli_escape_string($cn,$_POST['text_password'])."' ";
  $result=mysqli_query($cn,$sql);
  $row=mysqli_fetch_array($result);
  if($row[0]==0)
	{
		?><script>if(!alert("Invalid Mobile or Password!")) document.location = '';</script><?php
	}else{
			$sql_vendor="SELECT * from staff where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."' and password='".mysqli_escape_string($cn,$_POST['text_password'])."'";
			$result_vendor=mysqli_query($cn,$sql_vendor);
			$row_vendor=mysqli_fetch_array($result_vendor);
			session_start();
			$_SESSION['staff_uid'] = $row_vendor[1];
			$_SESSION['staff_name'] = $row_vendor[3];
			$_SESSION['dept'] = $row_vendor[13];
			$_SESSION['staff_pic'] = $row_vendor[23];
			$s = "location:../";
			header($s);
	}
}
?>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:08 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Musskan CRM Software which is helps to manage your business properly and You can moniter, assign work to staff, leads reports etc">
    <meta name="keywords" content="CRM, crm, Musskan CRM, hst, Highsoft Technologies">
    <meta name="author" content="Highsoft Technologies">
    <title><?php echo $row_title[3]; ?> | Staff Login</title>
    <link rel="apple-touch-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
		  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
			<form class="login-form" action="" method="POST">
			  <div class="row">
			  <?php
				$sql_title="select * from logo where type='circle'";
				$result_title=mysqli_query($cn,$sql_title);
				$row_title=mysqli_fetch_array($result_title);
			  ?>
			  <center><img style="width:250px;margin-top:20px;" src="../../logo/<?php echo $row_title[4]; ?>"></center>
				<div class="input-field col s12">
				  <h5 class="ml-4">Sign in</h5>
				</div>
			  </div>
			  <div class="row margin">
				<div class="input-field col s12">
				  <i class="material-icons prefix pt-2">person_outline</i>
				  <input id="username" type="text" name="text_mobile">
				  <label for="username" class="center-align">Mobile</label>
				</div>
			  </div>
			  <div class="row margin">
				<div class="input-field col s12">
				  <i class="material-icons prefix pt-2">lock_outline</i>
				  <input id="password" type="password" name="text_password">
				  <label for="password">Password</label>
				</div>
			  </div>
			  <div class="row">
				<div class="col s12 m12 l12 ml-2 mt-1">
				  <p>
					
					<a href="../forgot-password" style="float: right;">
					  <span>Forgot Password</span>
					</a>
				  </p>
				</div>
			  </div>
			  <div class="row">
				<div class="input-field col s12">
				  <button name="btn_login" type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
				</div>
			  </div>
			  <br>
			</form>
		  </div>
		</div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../app-assets/js/plugins.min.js"></script>
    <script src="../app-assets/js/search.min.js"></script>
    <script src="../app-assets/js/custom/custom-script.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:09 GMT -->
</html>