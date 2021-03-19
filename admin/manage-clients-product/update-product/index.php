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
	
	$_POST['text_city'] = explode("|", "$_POST[text_city]")[0];
	$_POST['text_version'] = explode("|", "$_POST[text_version]")[0];
	
	
	
	$_POST['text_sw_activation_dt'] =  str_replace("/","-",$_POST['text_sw_activation_dt']);
		$sw_activation_dt = date("Y-m-d", strtotime($_POST['text_sw_activation_dt']));
		
		$_POST['text_sw_expire_dt'] =  str_replace("/","-",$_POST['text_sw_expire_dt']);
		$sw_expire_dt = date("Y-m-d", strtotime($_POST['text_sw_expire_dt']));
		
		$_POST['text_reminder_date'] =  str_replace("/","-",$_POST['text_reminder_date']);
		$reminder_dt = date("Y-m-d", strtotime($_POST['text_reminder_date']));
	
	$q="Update client_staff set activate_on = '".$sw_activation_dt."', expire_on = '".$sw_expire_dt."', duration = '".$_POST['text_duration_day']."', customer_id = '".$_POST['text_customer_id']."', activation_id = '".$_POST['text_activation_id']."', software_quote_price = '".$_POST['text_sw_quote_price']."', software_final_price = '".$_POST['text_sw_final_price']."', discount = '".$_POST['text_discount']."', discount_type = '".$_POST['text_discount_type']."', amc = '".$_POST['text_amc']."', version = '".$_POST['text_version']."', users = '".$_POST['text_user']."', edition = '".$_POST['text_edition']."', payment_remind_date = '".$_POST['text_reminder_date']."', quotation_no = '".$_POST['quotation_no']."', invoice_no = '".$_POST['invoice_no']."', company_name = '".$_POST['text_sw_company']."' where uid='".$_GET['id']."'";
	$r=mysqli_query($cn,$q);
	if($r){
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
						$sql_c="select * from client where client_status = 'Confirmed' AND uid = '".$_GET['client']."'";
						$result_c=mysqli_query($cn,$sql_c);
						$row_c=mysqli_fetch_array($result_c);
					  ?>
						<div class="input-field col s6">
						  <i class="material-icons prefix">account_circle</i>
						  <input type="text" disabled placeholder="Enter Name" value="<?php echo $row_c[3];?>" class="validate" name="text_name">
						  <label>Name</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">business</i>
						  <input type="text" disabled placeholder="Enter Business Name" value="<?php echo $row_c[10];?>" class="validate" name="text_business_name">
						  <label>Business Name</label>
						</div>
						<div class="input-field col s6">
							<select disabled id="dropdown_business_type" onchange="business_type_other();" name="text_business_type" >
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
							<select disabled id="dropdown_business_category" onchange="business_category_other();" name="text_business_category" >
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
						
						<?php
							$sql_product="select * from client_staff where uid = '".$_GET['id']."'";
							$result_product=mysqli_query($cn,$sql_product);
							$row_product=mysqli_fetch_array($result_product);
						
							$time_now=mktime(date('h')+5,date('i')+30,date('s'));
							$cur_date=date('Y-m-d',$time_now);
							$exp_date = date('Y-m-d', strtotime($cur_date. ' + 365 days'));
						  ?>
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date"  name="text_sw_activation_dt" value="<?php echo $cur_date; ?>" onchange="duration();" id="sw_activation_dt">
						  <label>Software Activation Date</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date"  name="text_sw_expire_dt" id="sw_expire_dt" value="<?php echo $exp_date; ?>"  onchange="duration();">
						  <label>Software Expire Date</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">timer</i>
						  <input type="text" value="365" placeholder="Enter Software Duration" class="validate" name="text_duration_day"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Duration in Days</label>
						</div>
						<div class="input-field col s6">
							<select name="text_sw_company" >
							  <option value="" disabled selected>Choose Software Company</option>
							  <option selected value="<?php echo $row_product[27]; ?>"><?php echo $row_product[27]; ?></option>
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
							  <option value="<?php echo $row_product[18]."|".""."|".""."|".""."|".""; ?>" selected><?php echo $row_product[18]; ?></option>
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
						  <i class="material-icons prefix">people</i>
						  <input type="text" placeholder="Enter Customer ID" value="<?php echo $row_product[9]; ?>" class="validate" name="text_customer_id"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Customer ID</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">people_outline</i>
						  <input type="text" placeholder="Enter Activation ID" value="<?php echo $row_product[10]; ?>" class="validate" name="text_activation_id"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Activation ID</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">format_list_numbered</i>
						  <input type="text" placeholder="Enter Quotation No" value="<?php echo $row_product[25]; ?>" class="validate" name="quotation_no" >
						  <label>Quotation No.</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">format_list_numbered</i>
						  <input type="text" placeholder="Enter Invoice No" value="<?php echo $row_product[26]; ?>" class="validate" name="invoice_no" >
						  <label>Invoice No.</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input type="text" value="<?php echo $row_product[11]; ?>" placeholder="Enter Software Quotation Price" class="validate" name="text_sw_quote_price"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Software Quotation Price</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">payment</i>
						  <input type="text" value="<?php echo $row_product[12]; ?>" oninput="rem_payment();" id="confirm_price" placeholder="Enter Software Confirmation Price" class="validate" name="text_sw_final_price"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Software Confirmation Price</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">local_atm</i>
						  <input disabled type="text" oninput="rem_payment();" value="<?php echo $row_product[20]; ?>" id="adv_price" placeholder="Enter Advanced Payment" class="validate" name="text_advance_payment"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Paid Payment</label>
						</div>
						<script>
						function rem_payment(){
							document.getElementById("rem_price").value = document.getElementById("confirm_price").value - document.getElementById("adv_price").value;
							
						}
						</script>
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input disabled type="text" id="rem_price" value="<?php echo $row_product[21]; ?>" placeholder="Enter Remaining Payment" class="validate" name="text_remaining_payment"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Remaining Payment</label>
						</div>
						<div class="input-field col s6">
							<select name="text_discount_type" >
							  <option value="" disabled selected>Choose Discount Type</option>
							  <option <?php if($row_product[14]=="Percentage"){ echo "selected";}?> value="Percentage">Percentage</option>
							  <option <?php if($row_product[14]=="Amount"){ echo "selected";}?> value="Amount">Amount</option>
							</select>
							<label>Discount Type</label>
					    </div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input type="text" placeholder="Enter Discount" value="<?php echo $row_product[13]; ?>" class="validate" name="text_discount"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Discount</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">date_range</i>
						  <input type="date" placeholder="Enter Payment Reminder Date" value="<?php echo $row_product[22]; ?>"  name="text_reminder_date">
						  <label>Payment Reminder Date</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">attach_money</i>
						  <input type="text" value="<?php echo $row_product[15]; ?>" id="amc" placeholder="Enter AMC" class="validate" name="text_amc"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>AMC</label>
						</div>
						
						<div class="input-field col s6">
						  <i class="material-icons prefix">computer</i>
						  <input type="text" value="<?php echo $row_product[17]; ?>" id="versions" placeholder="Enter Version" class="validate" name="text_version" >
						  <label>Version</label>
						</div>
						<div class="input-field col s6">
						  <i class="material-icons prefix">verified_user</i>
						  <input type="text" value="<?php echo $row_product[18]; ?>" id="user" placeholder="Enter Users" class="validate" name="text_user"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						  <label>Users</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">computer</i>
							<input type="text" value="<?php echo $row_product[19]; ?>" id="edition" placeholder="Enter Edition" class="validate" name="text_edition" >
							<label>Edition</label>
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