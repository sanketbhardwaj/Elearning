<?php
error_reporting(0);
include('../../../connection.php');

$fname = substr($_POST['client_uid'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);

$q="SELECT uid FROM staff where dept = 'Support' ORDER BY RAND() limit 1";
$r=mysqli_query($cn,$q);	
$row_dept=mysqli_fetch_row($r);


	
$q="INSERT INTO client_staff VALUES (NULL, '".$uid."','".$date_time."','".$_POST['client_uid']."','".$_POST['staff_uid']."','".$row_dept[0]."','".$_POST['software_activation_date']."','".$_POST['software_expire_date']."','".$_POST['duration']."','".$_POST['customer_id']."','".$_POST['activation_id']."','".$_POST['quotation_price']."','".$_POST['confirm_price']."','".$_POST['discount']."','".$_POST['discount_type']."','".$_POST['amc']."','".$_POST['amc_with_gst']."','".$_POST['version']."','".$_POST['users']."','".$_POST['edition']."','".$_POST['paid_payment']."','".$_POST['pending_payment']."','".$_POST['reminder_date']."','Working','Active','".$_POST['quotation_no']."','".$_POST['invoice_no']."')";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}

$q="INSERT INTO transaction VALUES (NULL, '".$uid."','".$date_time."','".$uid."','".$_POST['client_uid']."','".$_POST['staff_uid']."','".$row_dept[0]."','".$_POST['paid_payment']."','".$_POST['payment_mode']."','".$_POST['payment_id']."','".$_POST['reminder_date']."','Active','Completed')";
$r=mysqli_query($cn,$q);
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>