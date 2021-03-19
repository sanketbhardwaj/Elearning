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
	
	if(file_exists($_FILES['text_profile']['tmp_name'])){
		$fileinfos = pathinfo($_FILES['text_profile']['name']);  
		$extensions = $fileinfos['extension'];
		$file_names = rand().date("IjSofFYhisA").".".$extensions;
		$locations = "../../../files/".$file_names;
		move_uploaded_file($_FILES['text_profile']['tmp_name'],$locations);
	}
	
	$q="Update tickets set client_uid = '".$_POST['text_client_uid']."', issue = '".$_POST['text_issue']."', solve_by = '".$_POST['text_solve_by']."', remark = '".$_POST['text_remark']."', call_duration = '".$_POST['text_call_duration']."', answer = '".$_POST['text_answer']."', url = '".$_POST['text_url']."', file = '".$file_names."' where uid='".$_GET['id']."'";
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
    <title><?php echo $row_title[3]; ?> | Update Tickets</title>
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
					  <h4 class="card-title">Update Tickets</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <div class="row">
					  <?php
						$sql_ticket="select * from tickets where uid = '".$_GET['id']."'";
						$result_ticket=mysqli_query($cn,$sql_ticket);
						$row_ticket=mysqli_fetch_array($result_ticket);
					  ?>
						
						<div class="input-field col s12">
							<select name="text_client_uid" >
							  <option value="" disabled selected>Choose Client</option>
								<?php
								$sql_c="select * from client";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option <?php if($row_c[1]==$row_ticket[4]){ echo "selected";}?> value="<?php echo $row_c[1]; ?>"><?php echo $row_c[10]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Assign Client</label>
					    </div>
						
						<div class="input-field col s12">
							<select onchange="pincode();" id="slry">
							  <option value="" disabled selected>Choose Ticket Questions</option>
								<?php
								$sql_tickets="select * from ticket_question";
								$result_tickets=mysqli_query($cn,$sql_tickets);
								while($row_tickets=mysqli_fetch_array($result_tickets)){
								?>
								<option value="<?php echo $row_tickets[3]."|".$row_tickets[4]."|".$row_tickets[5]; ?>"><?php echo $row_tickets[3]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Ticket Questions</label>
					    </div>
						
						<script>
						function pincode(){
							document.getElementById("issue").value = document.getElementById("slry").value.split('|')[0];
							document.getElementById("answer").value = document.getElementById("slry").value.split('|')[1];
							document.getElementById("url").value = document.getElementById("slry").value.split('|')[2];
							
						}
						</script>
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">report_problem</i>
						  <textarea name="text_issue" id="issue" placeholder="Enter Issue" class="materialize-textarea"><?php echo $row_ticket[5];?></textarea>
						  <label>Issue</label>
						</div>
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">report_problem</i>
						  <textarea name="text_answer" id="answer" placeholder="Enter Answer" class="materialize-textarea"><?php echo $row_ticket[11];?></textarea>
						  <label>Answer</label>
						</div>
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">fiber_pin</i>
						  <input type="text" value="<?php echo $row_ticket[13]; ?>" id="url" placeholder="Enter Url" class="validate" name="text_url">
						  <label>Url</label>
						</div>
						
						<div class="file-field input-field col s12">
						<i class="material-icons prefix">insert_drive_file</i>
							  <div class="btn">
								<span>File/Images</span>
								<input type="file" name="text_profile">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" placeholder="File/Images" type="text" name="text_profile_picture">
							  </div>
						</div>
						<?php
						if($row_c[12]!=""){
							?>
						<div class="input-field col s6">
						  <a href="<?php echo "../../../images/".$row_c[12]; ?>">View File/Image</a>
						  
						  
						</div>
							<?php
						}
						?>
						
						
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">account_circle</i>
						  <textarea name="text_remark" placeholder="Enter Remark" class="materialize-textarea"><?php echo $row_ticket[8];?></textarea>
						  <label>Remark</label>
						</div>
						<div class="input-field col s12">
						  <i class="material-icons prefix">business_center</i>
						  <input type="text" placeholder="Enter Call Duration" value="<?php echo $row_ticket[9];?>" class="validate" name="text_call_duration">
						  <label>Call Duration</label>
						</div>
						<div class="input-field col s6">
							<select name="text_solve_by">
							  <option value="" disabled selected>Choose Solve By</option>
								<?php
								$sql_c="select * from staff";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option <?php if($row_c[1]==$row_ticket[6]){ echo "selected";}?> value="<?php echo $row_c[1]; ?>"><?php echo $row_c[3]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Choose Solve By</label>
					    </div>
						<div class="input-field col s6">
							<select name="text_is_solve">
								<option value="" disabled selected>Is Solved</option>
								<option <?php if("Pending"==$row_ticket[7]){ echo "selected";}?> value="Pending">Pending</option>
								<option <?php if("Completed"==$row_ticket[7]){ echo "selected";}?> value="Completed">Completed</option>
							</select>
							<label>Is Solved</label>
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