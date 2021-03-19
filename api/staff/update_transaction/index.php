<?php
error_reporting(0);
include('../../../connection.php');
$fname = substr($_POST['remark'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);

$sql1="select cs_uid from transaction where uid = '".$_POST['transaction_uid']."'";
$result=mysqli_query($cn,$sql1);
$row_shop=mysqli_fetch_row($result);
	
$q="Update client_staff set payment_remind_date = '".$_POST['reminder_date']."' where uid = '".$row_shop[0]."'";
$r=mysqli_query($cn,$q);	
	
$q="Update transaction set payment = '".$_POST['payment']."', payment_mode = '".$_POST['payment_mode']."', payment_id = '".$_POST['payment_id']."', reminder_date = '".$_POST['reminder_date']."' where uid = '".$_POST['transaction_uid']."'";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>