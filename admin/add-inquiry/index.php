<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "add_inq";

if(isset($_POST['btn_save'])){
	$fname = substr($_POST['text_name'], 0,1);
	$uid = $fname.date("jYhisA").rand();
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date_time=date('Y-m-d H:i:s',$time_now);
	
	$q="Select count(*) from client where mobile1='".$_POST['text_mobile']."'";
	$r=mysqli_query($cn,$q);
	$row=mysqli_fetch_array($r);
	
	if($row[0]!=0){
		?><script>if(!alert("Mobile Already Exist!")) document.location = '';</script><?php
	}else{
		$_POST['text_birth_date'] =  str_replace("/","-",$_POST['text_birth_date']);
		$birth_date = date("Y-m-d", strtotime($_POST['text_birth_date']));
		
		$_POST['text_anniversary_date'] =  str_replace("/","-",$_POST['text_anniversary_date']);
		$anniversary_date = date("Y-m-d", strtotime($_POST['text_anniversary_date']));
		
		$_POST['text_sw_activation_dt'] =  str_replace("/","-",$_POST['text_sw_activation_dt']);
		$sw_activation_dt = date("Y-m-d", strtotime($_POST['text_sw_activation_dt']));
		
		$_POST['text_sw_expire_dt'] =  str_replace("/","-",$_POST['text_sw_expire_dt']);
		$sw_expire_dt = date("Y-m-d", strtotime($_POST['text_sw_expire_dt']));
		
		$_POST['text_reminder_date'] =  str_replace("/","-",$_POST['text_reminder_date']);
		$reminder_dt = date("Y-m-d", strtotime($_POST['text_reminder_date']));
		
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
		
		
		if(file_exists($_FILES['text_order_form']['tmp_name'])){
			$fileinfo = pathinfo($_FILES['text_order_form']['name']);  
			$extension = $fileinfo['extension'];
			$file_name = rand().date("IjSofFYhisA").".".$extension;
			$location = "../../files/".$file_name;
			move_uploaded_file($_FILES['text_order_form']['tmp_name'],$location);
		}
		$_POST['text_city'] = explode("|", "$_POST[text_city]")[0];
		
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		
		if(file_exists($_FILES['text_profile']['tmp_name'])){
			$fileinfos = pathinfo($_FILES['text_profile']['name']);  
			$extensions = $fileinfos['extension'];
			$file_names = rand().date("IjSofFYhisA").".".$extensions;
			$locations = "../../files/".$file_names;
			move_uploaded_file($_FILES['text_profile']['tmp_name'],$locations);
		}
	
		$q="INSERT INTO quotations VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['text_sales_uid']."','".$_POST['text_quotation']."','".$_POST['text_sw_final_price']."','".$file_names."','Pending','Active')";
		$r=mysqli_query($cn,$q);
		
		$q="INSERT INTO client VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_name']."','".$_POST['radio_gender']."','".$_POST['text_mobile']."','".$_POST['text_alternet_mobile']."','".$_POST['text_whatsapp']."','".$_POST['text_email']."','".implode($pass)."','".$_POST['text_business_name']."','".$_POST['text_business_type']."','".$_POST['text_business_category']."','".$file_name."','".$birth_date."','".$anniversary_date."','".$_POST['text_address']."','".$_POST['text_city']."','".$_POST['text_state']."','".$_POST['text_pincode']."','".$_POST['text_sales_uid']."','".$_POST['text_lead_source']."','".$_POST['text_reference_name']."','Pending','Active','','','".$_POST['text_area']."','')";
		$r=mysqli_query($cn,$q);
		
		$q="INSERT INTO client_staff VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['text_sales_uid']."','".$_POST['text_support_uid']."','".$sw_activation_dt."','".$sw_expire_dt."','".$_POST['text_duration_day']."','".$_POST['text_customer_id']."','".$_POST['text_activation_id']."','".$_POST['text_sw_final_price']."','".$_POST['text_sw_final_price']."','".$_POST['text_discount']."','".$_POST['text_discount_type']."','".$_POST['text_amc']."','".$_POST['text_amc_inc_gst']."','".$_POST['text_version']."','".$_POST['text_user']."','".$_POST['text_edition']."','".$_POST['text_advance_payment']."','".$_POST['text_remaining_payment']."','".$reminder_dt."','Pending','Active','".$_POST['quotation_no']."','".$_POST['invoice_no']."','".$_POST['text_sw_company']."')";
		$r=mysqli_query($cn,$q);
		
		$q="INSERT INTO followups VALUES (NULL, '".$uid."','".$date_time."','".$_POST['text_sales_uid']."','".$uid."','Pending','','','','Active','".$_POST['task']."')";
		$r=mysqli_query($cn,$q);
		
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
    <title><?php echo $row_title[3]; ?> | Add Inquiry</title>
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
					  <h4 class="card-title">Add Inquiry</h4>
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
						<div class="input-field col s6">
						  <i class="material-icons prefix">business</i>
						  <input type="text" placeholder="Enter Business Name" class="validate" name="text_business_name">
						  <label>Business Name</label>
						</div>
						<div class="input-field col s6">
							<select id="dropdown_business_type" onchange="business_type_other();" name="text_business_type" >
								<option value="" disabled selected>Choose Business Type</option>
								<?php
								$sql_c="select * from business_type";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[3]; ?>"><?php echo $row_c[3]; ?></option>
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
								$sql_c="select * from business_category";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[3]; ?>"><?php echo $row_c[3]; ?></option>
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
								$sql_c="select * from lead_source";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[3]; ?>"><?php echo $row_c[3]; ?></option>
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
							  <option value="" disabled selected>Choose Reference</option>
								<?php
								$sql_c="SELECT name, gender FROM client UNION SELECT name, status FROM partner ORDER BY name;";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php if($row_c[1]=="Active"){ echo $row_c[0]." (Partner)"; }else{ echo $row_c[0]." (Client)"; } ?>"><?php if($row_c[1]=="Active"){ echo $row_c[0]." (Partner)"; }else{ echo $row_c[0]." (Client)"; } ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Reference</label>
					    </div>
						
						
						
						
						<div class="input-field col s6">
							<select name="text_sales_uid" >
							  <option value="" disabled selected>Choose Staff</option>
								<?php
								$sql_c="select * from staff";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[1]; ?>"><?php echo $row_c[3]." (".$row_c[13].")"; ?></option>
								<?php } ?>
							  
							</select>
							<label>Assign Staff</label>
					    </div>
						
						<div class="input-field col s6">
							<select name="task" >
							  <option value="" disabled selected>Choose Task</option>
								<?php
								$sql_c="select * from followup_type";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[3]; ?>"><?php echo $row_c[3]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Assign Task</label>
					    </div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" class="validate" name="text_mobile"  size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Mobile Number" class="validate" name="text_alternet_mobile" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Alternet Mobile Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Enter 10 Digit Whatsapp Number" class="validate" name="text_whatsapp" size="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Whatsapp Number</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">mail_outline</i>
						  <input type="email" placeholder="Enter Email ID" class="validate" name="text_email">
						  <label>Email</label>
						</div>
						
						<div class="input-field col s6">
						Gender:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <p>
						  <label>
							<input class="with-gap" value="Male" name="radio_gender" type="radio"/>
							<span>Male</span>
						  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label>
							<input class="with-gap" value="Female" name="radio_gender" type="radio"/>
							<span>Female</span>
						  </label>
						</p>
						  
						  
						</div>
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">location_on</i>
						  <textarea name="text_address" placeholder="Enter Address" class="materialize-textarea"></textarea>
						  <label>Address</label>
						</div>
						
						<div class="input-field col s6">
							<select onchange="pincode();" id="slry" name="text_city" >
							  <option value="" disabled selected>Choose City</option>
								<?php
								$sql_c="select * from city";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
								?>
								<option value="<?php echo $row_c[3]."|".$row_c[4]; ?>"><?php echo $row_c[3]." - ".$row_c[4]; ?></option>
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
								$sql_c="select * from area";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
									$sql="select * from city where uid = '".$row_c[3]."'";
									$result=mysqli_query($cn,$sql);
									$row=mysqli_fetch_array($result)
								?>
								<option value="<?php echo $row_c[4]; ?>"><?php echo $row_c[4]." (".$row[3].")"; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Area</label>
					    </div>
						
						<div class="input-field col s6">
						  <select name="text_state">
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
						  <input type="text" id="salary_text" placeholder="Enter Pincode" class="validate" name="text_pincode"  size="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Pincode</label>
						</div>
						<div class="input-field col s6">
							<select name="text_sw_company" >
							  <option value="" disabled selected>Choose Software Company</option>
								<?php
								$sql_c="select * from software_company";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
									
								?>
								<option value="<?php echo $row_c[3]; ?>"><?php echo $row_c[3]; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Software Company</label>
					    </div>
						<div class="input-field col s6">
							<select onchange="version();" id="vrsn" name="text_version" >
							  <option value="" disabled selected>Choose Version</option>
								<?php
								$sql_c="select * from software_version";
								$result_c=mysqli_query($cn,$sql_c);
								while($row_c=mysqli_fetch_array($result_c)){
									$sql="select * from software_company where uid = '".$row_c[3]."'";
									$result=mysqli_query($cn,$sql);
									$row=mysqli_fetch_array($result)
								?>
								<option value="<?php echo $row_c[4]."|".$row_c[5]."|".$row_c[6]."|".$row_c[7]."|".$row_c[8]; ?>"><?php echo $row_c[4]." (".$row[3].")"; ?></option>
								<?php } ?>
							  
							</select>
							<label>Select Version</label>
					    </div>
						<script>
						function version(){
							document.getElementById("versions").value = document.getElementById("vrsn").value.split('|')[0];
							document.getElementById("user").value = document.getElementById("vrsn").value.split('|')[1];
							document.getElementById("confirm_price").value = document.getElementById("vrsn").value.split('|')[2];
							document.getElementById("amc").value = document.getElementById("vrsn").value.split('|')[3];
							document.getElementById("edition").value = document.getElementById("vrsn").value.split('|')[4];
							//document.getElementById("versions").value = document.getElementById("vrsn").value.split('|')[0];
							
						}
						</script>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">payment</i>
						  <input type="text" oninput="rem_payment();" id="confirm_price" placeholder="Enter Software Confirmation Price" class="validate" name="text_sw_final_price"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Software Quotation Price</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">phone_android</i>
						  <input type="text" placeholder="Quotation Number" class="validate" name="text_quotation" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Quotation Number</label>
						</div>
						
						<div class="file-field input-field col s6">
						<i class="material-icons prefix">insert_drive_file</i>
							  <div class="btn">
								<span>File</span>
								<input type="file" name="text_profile">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" placeholder="Quotation File" type="text" name="text_profile_picture">
							  </div>
							
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input type="text" id="amc" placeholder="Enter AMC" class="validate" name="text_amc"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>AMC</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">computer</i>
						  <input type="text" id="versions" placeholder="Enter Version" class="validate" name="text_version" >
						  <label>Version</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">verified_user</i>
						  <input type="text" id="user" placeholder="Enter Users" class="validate" name="text_user"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Users</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">computer</i>
							<input type="text" id="edition" placeholder="Enter Edition" class="validate" name="text_edition" >
							<label>Edition</label>
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