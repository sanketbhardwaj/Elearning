<?php
error_reporting(0);
include('../../../connection.php');
$_GET['id'] = $_POST['client_uid'];
$fname = substr($_POST['client_uid'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);

$q="SELECT uid FROM staff ORDER BY RAND() limit 1";
$r=mysqli_query($cn,$q);	
$row_staff=mysqli_fetch_row($r);

if($_POST['business_type']=="other"){
	$_POST['business_type'] = $_POST['businesstype'];
	$q="INSERT INTO business_type VALUES (NULL, '".$uid."','".$date_time."','".$_POST['business_type']."','Active')";
	$r=mysqli_query($cn,$q);
}

if($_POST['business_category']=="other"){
	$_POST['business_category'] = $_POST['businesscategory'];
	$q="INSERT INTO business_category VALUES (NULL, '".$uid."','".$date_time."','".$_POST['business_category']."','Active')";
	$r=mysqli_query($cn,$q);
}

if($_POST['lead_source']=="other"){
	$_POST['lead_source'] = $_POST['leadsource'];
	$q="INSERT INTO lead_source VALUES (NULL, '".$uid."','".$date_time."','".$_POST['lead_source']."','Active')";
	$r=mysqli_query($cn,$q);
}


$PdfUploadFolder = '../../../files/';
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_FILES['order_file']['name'])){
		$PdfName = rand().date("ljSofFYhisA").rand();
		$PdfInfo = pathinfo($_FILES['order_file']['name']);
		$PdfFileExtension = $PdfInfo['extension'];
		$PdfName = $PdfName . '.' . $PdfFileExtension;
		
		$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
		try{
			move_uploaded_file($_FILES['order_file']['tmp_name'],$PdfFileFinalPath);
		}catch(Exception $e){} 
	}
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_FILES['profile_file']['name'])){
		$PdfName = rand().date("ljSofFYhisA").rand();
		$PdfInfo = pathinfo($_FILES['profile_file']['name']);
		$PdfFileExtension = $PdfInfo['extension'];
		$PdfName = $PdfName . '.' . $PdfFileExtension;
		
		$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
		try{
			move_uploaded_file($_FILES['profile_file']['tmp_name'],$PdfFileFinalPath);
		}catch(Exception $e){} 
	}
}

$q="Update client set client_status='Confirmed', name = '".$_POST['name']."', telephone = '".$_POST['phone']."', business_name = '".$_POST['business_name']."', business_type = '".$_POST['business_type']."', business_category = '".$_POST['business_category']."', lead_source = '".$_POST['lead_source']."', reference_name = '".$_POST['reference_name']."', mobile1 = '".$_POST['mobile']."', mobile2 = '".$_POST['alternet_mobile']."', whatsapp_no = '".$_POST['whatsapp']."', email = '".$_POST['email']."', gender = '".$_POST['gender']."', address = '".$_POST['address']."', city = '".$_POST['city']."', state = '".$_POST['state']."', pincode = '".$_POST['pincode']."', support_uid = '".$row_staff[0]."', area = '".$_POST['area']."' where uid='".$_GET['id']."'";
$r=mysqli_query($cn,$q);
		
if($r){
	$q="Delete from client_staff where client_uid = '".$_GET['id']."' AND software_status='Pending'";
	$r=mysqli_query($cn,$q);
	
	
	
	$q="INSERT INTO client_staff VALUES (NULL, '".$uid."','".$date_time."','".$_GET['id']."','".$_POST['staff_uid']."','".$row_staff[0]."','".$_POST['software_activation_date']."','".$_POST['software_expire_date']."','".$_POST['duration']."','".$_POST['customer_id']."','".$_POST['activation_id']."','".$_POST['quotation_price']."','".$_POST['confirm_price']."','".$_POST['discount']."','".$_POST['discount_type']."','".$_POST['amc']."','','".$_POST['version']."','".$_POST['users']."','".$_POST['edition']."','".$_POST['paid_payment']."','".$_POST['pending_payment']."','".$_POST['reminder_date']."','Working','Active','".$_POST['quotation_no']."','".$_POST['invoice_no']."','".$_POST['sw_company']."')";
	$r=mysqli_query($cn,$q);
	
	$q="INSERT INTO transaction VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$uid."','".$_GET['id']."','".$_POST['paid_payment']."','".$_POST['payment_mode']."','".$_POST['payment_id']."','".$_POST['reminder_date']."','Active','Completed')";
	$r=mysqli_query($cn,$q);
	
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_FILES['quotation_file']['name'])){
			$PdfName = rand().date("ljSofFYhisA").rand();
			$PdfInfo = pathinfo($_FILES['quotation_file']['name']);
			$PdfFileExtension = $PdfInfo['extension'];
			$PdfName = $PdfName . '.' . $PdfFileExtension;
			
			$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
			try{
				move_uploaded_file($_FILES['quotation_file']['tmp_name'],$PdfFileFinalPath);
				$q="INSERT INTO quotations VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['staff_uid']."','".$_POST['quotation_no']."','".$_POST['confirm_price']."','".$file_names."','Confirmed','Active')";
				$r=mysqli_query($cn,$q);
			}catch(Exception $e){} 
		}else{
			$q="Update quotations set staff_uid = '".$_POST['staff_uid']."', quote_amount = '".$_POST['confirm_price']."', quote_status = 'Confirmed' WHERE client_uid = '".$_GET['id']."' AND quote_no = '".$_POST['quotation_no']."'";
			$r=mysqli_query($cn,$q);
		}
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_FILES['invoice_file']['name'])){
			$PdfName = rand().date("ljSofFYhisA").rand();
			$PdfInfo = pathinfo($_FILES['invoice_file']['name']);
			$PdfFileExtension = $PdfInfo['extension'];
			$PdfName = $PdfName . '.' . $PdfFileExtension;
			
			$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
			try{
				move_uploaded_file($_FILES['invoice_file']['tmp_name'],$PdfFileFinalPath);
				
			}catch(Exception $e){} 
		}
	}

	$q="INSERT INTO invoices VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['staff_uid']."','".$_POST['invoice_no']."','".$_POST['confirm_price']."','".$file_names."','Confirmed','Active')";
	$r=mysqli_query($cn,$q);
	
	
	$q="Update followups set follow_status='Completed' where client_uid='".$_GET['id']."'";
	$r=mysqli_query($cn,$q);
	
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
	$myObj->status="Mobile Number Already Exist";
}



	
$myJSON = json_encode($myObj);
echo $myJSON;
?>