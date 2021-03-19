<?php
error_reporting(0);
include('../../../connection.php');
$fname = substr($_POST['name'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);

$q="Select count(*) from client where mobile1='".$_POST['mobile']."'";
$r=mysqli_query($cn,$q);
$row=mysqli_fetch_array($r);

if($row[0]!=0){
	$myObj->result="Fail";
	$myObj->status="Mobile Already Exist";
}else{
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	
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
	
	
	$q="INSERT INTO client VALUES (NULL, '".$uid."','".$date_time."','".$_POST['name']."','".$_POST['gender']."','".$_POST['mobile']."','".$_POST['alternet_mobile']."','".$_POST['whatsapp']."','".$_POST['email']."','".implode($pass)."','".$_POST['business_name']."','".$_POST['business_type']."','".$_POST['business_category']."','','','','','','','','".$_POST['staff_uid']."','".$_POST['lead_source']."','".$_POST['reference_name']."','Pending','Active','','','".$_POST['area']."','')";
	$r=mysqli_query($cn,$q);
	
	
	if($r){
		
		
		$PdfUploadFolder = '../../../files/';
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(isset($_FILES['quotation_file']['name'])){
				$PdfName = rand().date("ljSofFYhisA").rand();
				$PdfInfo = pathinfo($_FILES['quotation_file']['name']);
				$PdfFileExtension = $PdfInfo['extension'];
				$PdfName = $PdfName . '.' . $PdfFileExtension;
				
				$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
				try{
					move_uploaded_file($_FILES['quotation_file']['tmp_name'],$PdfFileFinalPath);
					$q="INSERT INTO quotations VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['staff_uid']."','".$_POST['quotation_no']."','".$_POST['quotation_price']."','".$PdfName."','Pending','Active')";
					$r=mysqli_query($cn,$q);
					
				}catch(Exception $e){} 
			}
		}
		
		
		$q="INSERT INTO client_staff VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['staff_uid']."','','','','','','','".$_POST['quotation_price']."','".$_POST['quotation_price']."','','','".$_POST['amc']."','','".$_POST['version']."','".$_POST['users']."','".$_POST['edition']."','','','','Pending','Active','".$_POST['quotation_no']."','','".$_POST['sw_company']."')";
		$r=mysqli_query($cn,$q);

		$q="INSERT INTO followups VALUES (NULL, '".$uid."','".$date_time."','".$_POST['staff_uid']."','".$uid."','Pending','','','','Active','".$_POST['task']."')";
		$r=mysqli_query($cn,$q);
		$myObj->result="Success";
		$myObj->client_uid=$uid;
		$myObj->followup_uid=$uid;
	}else{
		$myObj->result="Fail";
		$myObj->status="Mobile or Email Already Exist";
	}
	
	
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>