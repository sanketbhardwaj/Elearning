<?php
error_reporting(0);
include('../../../connection.php');

$fname = substr($_POST['product_uid'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);

$q="Update client_staff set payment_remind_date = '".$_POST['reminder_date']."' where uid = '".$_POST['product_uid']."'";
$r=mysqli_query($cn,$q);	
	
$q="INSERT INTO transaction VALUES (NULL, '".$uid."','".$date_time."','".$_POST['product_uid']."','".$_POST['client_uid']."','".$_POST['sales_uid']."','".$_POST['support_uid']."','".$_POST['payment']."','".$_POST['payment_mode']."','".$_POST['payment_id']."','".$_POST['reminder_date']."','Active','Completed')";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>