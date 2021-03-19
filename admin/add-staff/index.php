<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "add_staff";

if(isset($_POST['btn_save'])){
	//echo "dasoihdio";
	$fname = substr($_POST['text_name'], 0,1);
	$uid = $fname.date("jYhisA").rand();
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date_time=date('Y-m-d H:i:s',$time_now);
	
	$q="Select count(*) from staff where mobile1='".$_POST['text_mobile']."'";
	$r=mysqli_query($cn,$q);
	$row=mysqli_fetch_array($r);
	
	if($row[0]!=0){
		?><script>if(!alert("Mobile Already Exist!")) document.location = '';</script><?php
	}else{
		$_POST['text_birth_date'] =  str_replace("/","-",$_POST['text_birth_date']);
		$birth_date = date("Y-m-d", strtotime($_POST['text_birth_date']));
		$_POST['text_join_date'] =  str_replace("/","-",$_POST['text_join_date']);
		$join_date = date("Y-m-d", strtotime($_POST['text_join_date']));
		$_POST['text_anniversary_date'] =  str_replace("/","-",$_POST['text_anniversary_date']);
		$anniversary_date = date("Y-m-d", strtotime($_POST['text_anniversary_date']));
		if(file_exists($_FILES['text_indentity_doc']['tmp_name'])){
			$fileinfo = pathinfo($_FILES['text_indentity_doc']['name']);  
			$extension = $fileinfo['extension'];
			$file_name = rand().date("IjSofFYhisA").".".$extension;
			$location = "../../images/".$file_name;
			move_uploaded_file($_FILES['text_indentity_doc']['tmp_name'],$location);
		}
		if(file_exists($_FILES['text_profile_pic']['tmp_name'])){
			$fileinfo1 = pathinfo($_FILES['text_profile_pic']['name']);  
			$extension1 = $fileinfo1['extension'];
			$file_name1 = rand().date("IjSofFYhisA").".".$extension1;
			$location1 = "../../images/".$file_name1;
			move_uploaded_file($_FILES['text_profile_pic']['tmp_name'],$location1);
		}
		$q="INSERT INTO staff VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_name']."','".$_POST['radio_gender']."','".$_POST['text_address']."','".$_POST['text_city']."','".$_POST['text_state']."','".$_POST['text_pincode']."','".$_POST['text_email']."','".$_POST['text_mobile']."','".$_POST['text_alternet_mobile']."','".$_POST['text_password']."','".$_POST['text_department']."','".$join_date."','".$birth_date."','".$anniversary_date."','".$file_name."','".$_POST['text_account_number']."','".$_POST['text_ifsc_code']."','".$_POST['text_account_holder_name']."','".$_POST['text_salary']."', 'Active','".$file_name1."','".$_POST['text_latemark']."')";
		$r=mysqli_query($cn,$q);
		
		if($_POST['text_mobile']!=""){
			$user_sms="Your Account is Created Successfully in ".$row_title[3]."<br>Username: ".$_POST['text_mobile']."<br>Password: ".$_POST['text_password']."<br><br>Thanks &amp; Regards,<br>".$row_title[3];
			$msg = $user_sms;
			$user_sms = str_replace(" ","%20",$user_sms);
			$user_sms = str_replace("<br>","%0A",$user_sms);
			$q="select * from sms where type='transactional'";
			$r=mysqli_query($cn,$q);
			$count=mysqli_fetch_array($r);
			$url = $count[3];
			$url = str_replace("{mob}","$_POST[text_mobile]",$url);
			$url = str_replace("{message}","$user_sms",$url);
			$json = file_get_contents($url);
			$json_data = json_decode($json, true);
			$uid = rand().date("jYhisA").rand();
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d H:i:s',$time_now);
			$q="INSERT INTO sms_history VALUES (NULL, '".$uid."','".$date_time."','".$msg."','".$_POST['text_mobile']."','".$url."','Active')";
			$r=mysqli_query($cn,$q);
		}
		
		if($_POST['text_email']!=""){
			$mailto = $_POST['text_email'];
			$mailSub = "Your Account is Created in ".$row_title[3];
			$mailMsg = "Your Account is Created Successfully in ".$row_title[3]."<br>Username: ".$_POST['text_mobile']."<br>Password: ".$_POST['text_password']."<br><br>Do not reply to this mail, Its system generated mail!<br>Thanks &amp; Regards,<br>".$row_title[3];
			require '../../PHPMailer-master/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'SSL';
			$sql_email="select * from email";
			$result_email=mysqli_query($cn,$sql_email);
			$row_email=mysqli_fetch_array($result_email);
			$mail ->Host = $row_email[3];
			$mail ->Port = $row_email[4]; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = $row_email[5];
			$mail ->Password = $row_email[6];
			$mail ->SetFrom($row_email[5],$row_email[7]);
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($mailto);
			if(!$mail->Send())
			{
				echo "Mail Not Sent";
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else
			{
				$uid = rand().date("jYhisA").rand();
				$time_now=mktime(date('h')+5,date('i')+30,date('s'));
				$date_time=date('Y-m-d H:i:s',$time_now);
				$q="INSERT INTO email_history VALUES (NULL, '".$uid."','".$date_time."','".$mailMsg."','".$_POST['text_email']."','Active')";
				$r=mysqli_query($cn,$q);
//				echo "Mail Sent";
			}
		}
		
		
		?><script>if(!alert("Saved!")) document.location = '';</script><?php
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
    <title><?php echo $row_title[3]; ?> | Add Staff</title>
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
					  <h4 class="card-title">Add Staff</h4>
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
						  <input type="text" placeholder="Enter Name" class="validate" name="text_name">
						  <label>Name</label>
						</div>
						<div class="file-field input-field col s6">
						<i class="material-icons prefix">insert_drive_file</i>
							  <div class="btn">
								<span>Profile Picture</span>
								<input type="file" name="text_profile_pic">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" placeholder="Upload Profile Picture" type="text" name="text_profile">
							  </div>
							
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input type="text" placeholder="Enter Salary" class="validate" name="text_salary" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Salary</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" class="validate" name="text_mobile" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Alternet Mobile Number" class="validate" name="text_alternet_mobile" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Alternet Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">mail_outline</i>
						  <input type="email" placeholder="Enter Email" class="validate" name="text_email">
						  <label>Email</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">mail_outline</i>
						  <input type="number" placeholder="Enter Latemark" class="validate" name="text_latemark">
						  <label>Latemark Allowed</label>
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
						  <input type="text" placeholder="Enter Password" class="validate" name="text_password" value="<?php echo implode($pass); ?>">
						  <label>Password</label>
						</div>
						<div class="input-field col s12">
						Gender:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <p>
						  <label>
							<input class="with-gap" value="Male" name="radio_gender" type="radio" />
							<span>Male</span>
						  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label>
							<input class="with-gap" value="Female" name="radio_gender" type="radio"/>
							<span>Female</span>
						  </label>
						</p>
						  
						</div>
						<div class="input-field col s12">
							<select name="text_department">
							  <option value="" disabled selected>Choose Department</option>
							  <option value="Sales">Sales</option>
							  <option value="Support">Support</option>
							  <option value="Sales-Support">Sales-Support</option>
							  <option value="Telecaller">Telecaller</option>
							</select>
							<label>Select Department</label>
					    </div>
						<div class="input-field col s12">
						  <i class="material-icons prefix">location_on</i>
						  <textarea name="text_address" placeholder="Enter Address" type="number" class="materialize-textarea"></textarea>
						  <label>Address</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">location_city</i>
						  <input type="text" placeholder="Enter City" name="text_city" class="validate">
						  <label>City</label>
						</div>
						<div class="input-field col s6">
						  <select name="text_state" >
							  <option value="" disabled selected>Choose State</option>
							  <option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Delhi">Delhi</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Puducherry">Puducherry</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu and Kashmir">Jammu and Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Odisha">Odisha</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Telangana">Telangana</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="Uttarakhand">Uttarakhand</option>
								<option value="West Bengal">West Bengal</option>
							  
							</select>
						  <label for="icon_telephone">State</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">fiber_pin</i>
						  <input type="text" placeholder="Enter Pincode" class="validate" name="text_pincode" size="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Pincode</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date" name="text_join_date">
						  <label>Joining Date</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">cake</i>
						  <input type="date" name="text_birth_date">
						  <label>Date of Birth</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date" name="text_anniversary_date">
						  <label>Anniversary Date</label>
						</div>
						<div class="file-field input-field col s6">
						<i class="material-icons prefix">insert_drive_file</i>
							  <div class="btn">
								<span>File</span>
								<input type="file" name="text_indentity_doc">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" placeholder="Indentity Document" type="text" name="text_indentity_filename">
							  </div>
							
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_balance</i>
						  <input type="text" placeholder="Enter Account Number" class="validate" name="text_account_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Account Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_balance_wallet</i>
						  <input type="text" placeholder="Enter IFSC Code" name="text_ifsc_code" class="validate" onkeyup="getbankdata();" id="ifsccode" pattern="^[A-Z]{4}0[A-Z0-9]{6}$">
						  <label>IFSC Code</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">supervisor_account</i>
						  <input type="text" placeholder="Enter Account Holder Name" name="text_account_holder_name" class="validate">
						  <label>Account Holder Name</label>
						</div>
						<div style="color:black;" class="mypanel"></div>

						<script>
						function getbankdata(){
							$(".mypanel").html('');
							var jobValue = document.getElementById('ifsccode').value
								$.getJSON('https://ifsc.razorpay.com/'+jobValue, function(data) {
										var text = `Branch: ${data.BRANCH}<br>
											Bank: ${data.BANK}<br>
											Address: ${data.ADDRESS}<br>`
											//Unix time: ${data.milliseconds_since_epoch}`
											
								
										$(".mypanel").html(text);
								});
						}
						
						</script>
						
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