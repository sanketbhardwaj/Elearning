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

if(isset($_POST['btn_save'])){
	$_POST['text_city'] = explode("|", "$_POST[text_city]")[0];
	
	if($_POST['text_business_type']=="other"){
		$_POST['text_business_type'] = $_POST['text_businesstype'];
		$fname = substr($_POST['text_business_type'], 0,1);
		$uid = $fname.date("jYhisA").rand();
		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$date_time=date('Y-m-d H:i:s',$time_now);
		$q="INSERT INTO business_type VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_business_type']."','Active')";
		$r=mysqli_query($cn,$q);
	}
	
	if($_POST['text_business_category']=="other"){
		$_POST['text_business_category'] = $_POST['text_businesscategory'];
		$fname = substr($_POST['text_business_category'], 0,1);
		$uid = $fname.date("jYhisA").rand();
		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$date_time=date('Y-m-d H:i:s',$time_now);
		$q="INSERT INTO business_category VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_business_category']."','Active')";
		$r=mysqli_query($cn,$q);
	}
	
	if($_POST['text_lead_source']=="other"){
		$_POST['text_lead_source'] = $_POST['text_leadsource'];
		$fname = substr($_POST['text_lead_source'], 0,1);
		$uid = $fname.date("jYhisA").rand();
		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$date_time=date('Y-m-d H:i:s',$time_now);
		$q="INSERT INTO lead_source VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_lead_source']."','Active')";
		$r=mysqli_query($cn,$q);
	}
	
	
	
	$q="Update client set name = '".$_POST['text_name']."', business_name = '".$_POST['text_business_name']."', business_type = '".$_POST['text_business_type']."', business_category = '".$_POST['text_business_category']."', lead_source = '".$_POST['text_lead_source']."', reference_name = '".$_POST['text_reference_name']."', sales_uid = '".$_POST['text_sales_uid']."', mobile1 = '".$_POST['text_mobile']."', mobile2 = '".$_POST['text_alternet_mobile']."', whatsapp_no = '".$_POST['text_whatsapp']."', email = '".$_POST['text_email']."', gender = '".$_POST['radio_gender']."', address = '".$_POST['text_address']."', city = '".$_POST['text_city']."', state = '".$_POST['text_state']."', pincode = '".$_POST['text_pincode']."', area = '".$_POST['text_area']."' where uid='".$_GET['id']."'";
	$r=mysqli_query($cn,$q);
	if($r){
		$q="Update followups set staff_uid = '".$_POST['text_sales_uid']."' where client_uid='".$_GET['id']."'";
		$r=mysqli_query($cn,$q);
		?><script>if(!alert("Updated!")) document.location = '../';</script><?php
	}else{
		?><script>if(!alert("Mobile No. Already Exist!")) document.location = '../';</script><?php
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
    <title><?php echo $row_title[3]; ?> | Update Inquiry</title>
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
					  <h4 class="card-title">Update Inquiry</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <div class="row">
					  <?php
						$sql_c="select * from client where client_status = 'Pending' AND uid = '".$_GET['id']."'";
						$result_c=mysqli_query($cn,$sql_c);
						$row_c=mysqli_fetch_array($result_c);
					  ?>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" placeholder="Enter Name" value="<?php echo $row_c[3];?>" class="validate" name="text_name">
						  <label>Name</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">business</i>
						  <input type="text" placeholder="Enter Business Name" value="<?php echo $row_c[10];?>" class="validate" name="text_business_name">
						  <label>Business Name</label>
						</div>
						
						
						
						<div class="input-field col s6">
							<select id="dropdown_business_type" onchange="business_type_other();" name="text_business_type" >
								<option value="" disabled selected>Choose Business Type</option>
								<?php
								$sql_s="select * from business_type";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option <?php if($row_s[3]==$row_c[11]){ echo "selected";}?> value="<?php echo $row_s[3]; ?>"><?php echo $row_s[3]; ?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<script type="text/javascript">

							function business_type_other() {
								if (document.getElementById('dropdown_business_type').value=="other") {
									document.getElementById('text_businesstype').style.display = 'block';
								}
								else{
									document.getElementById('text_businesstype').style.display = 'none';
								} 

							}
							</script>
							<label>Select Business Type</label>
							<input style="display:none;" id="text_businesstype" type="text" placeholder="Enter Business Type" class="validate" name="text_businesstype">
					    </div>
						<div class="input-field col s6">
							<select id="dropdown_business_category" onchange="business_category_other();" name="text_business_category" >
							  <option value="" disabled selected>Choose Business Category</option>
								<?php
								$sql_s="select * from business_category";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option <?php if($row_s[3]==$row_c[12]){ echo "selected";}?> value="<?php echo $row_s[3]; ?>"><?php echo $row_s[3]; ?></option>
								<?php } ?>
							  <option value="other">Other</option>
							</select>
							<script type="text/javascript">

							function business_category_other() {
								if (document.getElementById('dropdown_business_category').value=="other") {
									document.getElementById('text_businesscategory').style.display = 'block';
								}
								else{
									document.getElementById('text_businesscategory').style.display = 'none';
								} 

							}
							</script>
							<label>Select Business Category</label>
							<input style="display:none;" id="text_businesscategory" type="text" placeholder="Enter Business Category" class="validate" name="text_businesscategory">
					    </div>
						
						<div class="input-field col s6">
							<select id="dropdown_lead_source" onchange="business_lead_source();" name="text_lead_source" >
							  <option value="" disabled selected>Choose Lead Source</option>
								<?php
								$sql_s="select * from lead_source";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option <?php if($row_s[3]==$row_c[21]){ echo "selected";}?> value="<?php echo $row_s[3]; ?>"><?php echo $row_s[3]; ?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<script type="text/javascript">

							function business_lead_source() {
								if (document.getElementById('dropdown_lead_source').value=="other") {
									document.getElementById('text_leadsource').style.display = 'block';
								}
								else{
									document.getElementById('text_leadsource').style.display = 'none';
								} 

							}
							</script>
							<label>Select Lead Source</label>
							<input style="display:none;" id="text_leadsource" type="text" placeholder="Enter Lead Source" class="validate" name="text_leadsource">
					    </div>
						<div class="input-field col s6">
							<select name="text_reference_name" >
							  <option value="" selected disabled>Choose Reference</option>
							  <option selected value="<?php echo $row_c[22]; ?>"><?php echo $row_c[22]; ?></option>
								<?php
								$sql_s="SELECT name, gender FROM client UNION SELECT name, status FROM partner ORDER BY name;";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option value="<?php if($row_c[1]=="Active"){ echo $row_s[0]." (Partner)"; }else{ echo $row_s[0]." (Client)"; } ?>"><?php if($row_c[1]=="Active"){ echo $row_s[0]." (Partner)"; }else{ echo $row_s[0]." (Client)"; } ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Reference</label>
					    </div>
						
						
						
						
						
						
						
						
						<div class="input-field col s6">
							<select name="text_sales_uid" >
							  
								<?php
								$sql_s="select * from staff";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option <?php if($row_c[20]==$row_s[1]){ echo "selected";}?> value="<?php echo $row_s[1]; ?>"><?php echo $row_s[3]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Assign Sales Staff</label>
					    </div>
						
						
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" value="<?php echo $row_c[5];?>" class="validate" name="text_mobile"  size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" value="<?php echo $row_c[6];?>" class="validate" name="text_alternet_mobile" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Alternet Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Whatsapp Number" class="validate" value="<?php echo $row_c[7];?>" name="text_whatsapp" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Whatsapp Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">mail_outline</i>
						  <input type="email" placeholder="Enter Email ID" class="validate" value="<?php echo $row_c[8];?>" name="text_email">
						  <label>Email</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">vpn_key</i>
						  <input type="text" placeholder="Enter Password" class="validate" name="text_password" value="<?php echo $row_c[9];?>" >
						  <label>Password</label>
						</div>
						<div class="input-field col s6">
						Gender:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <p>
						  <label>
							<input class="with-gap" <?php if($row_c[4]=="Male"){ echo "checked";}?> value="Male" name="radio_gender" type="radio"/>
							<span>Male</span>
						  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label>
							<input class="with-gap" <?php if($row_c[4]=="Female"){ echo "checked";}?> value="Female" name="radio_gender" type="radio"/>
							<span>Female</span>
						  </label>
						</p>
						  
						  
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">location_on</i>
						  <textarea name="text_address" placeholder="Enter Address" class="materialize-textarea"><?php echo $row_c[16];?></textarea>
						  <label>Address</label>
						</div>
						<div class="input-field col s6">
							<select onchange="pincode();" id="slry" name="text_city" >
							  <option value="" disabled selected>Choose City</option>
								<?php
								$sql_s="select * from city";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
								?>
								<option <?php if($row_s[3]==$row_c[17]){ echo "selected";}?> value="<?php echo $row_s[3]."|".$row_s[4]; ?>"><?php echo $row_s[3]." - ".$row_s[4]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select City</label>
					    </div>
						<script>
						function pincode(){
							document.getElementById("salary_text").value = document.getElementById("slry").value.split('|')[1];
							
						}
						</script>
						<div class="input-field col s6">
							<select name="text_area" >
							  <option value="" disabled selected>Choose Area</option>
								<?php
								$sql_s="select * from area";
								$result_s=mysqli_query($cn,$sql_s);
								while($row_s=mysqli_fetch_array($result_s)){
									$sql="select * from city where uid = '".$row_s[3]."'";
									$result=mysqli_query($cn,$sql);
									$row=mysqli_fetch_array($result)
								?>
								<option <?php if($row_s[4]==$row_c[27]){ echo "selected";}?> value="<?php echo $row_s[4]; ?>"><?php echo $row_s[4]." (".$row[3].")"; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Area</label>
					    </div>
						<div class="input-field col s6">
						  <select name="text_state">
							  
								<option selected value="<?php echo $row_c[18];?>"><?php echo $row_c[18];?></option>
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
						  <input type="text" id="salary_text" placeholder="Enter Pincode" value="<?php echo $row_c[19];?>" class="validate" name="text_pincode" size="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Pincode</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">cake</i>
						  <input type="date" value="<?php if($row_c[14]!="1970-01-01"){ echo $row_c[14]; }?>" name="text_birth_date">
						  <label>Date of Birth</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date" value="<?php if($row_c[15]!="1970-01-01"){ echo $row_c[15]; }?>" name="text_anniversary_date">
						  <label>Anniversary Date</label>
						</div>
						
						
						
						
					  </div>
					  <br><center><button style="width:200px;height:40px;" name="btn_save" type="submit" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-5 mr-1 mb-2">Save</button>
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