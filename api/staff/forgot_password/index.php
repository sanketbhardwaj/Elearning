<?php
error_reporting(0);
include('../../../connection.php');
$q="select count(id),password from staff where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."'";
$r=mysqli_query($cn,$q);
$count=mysqli_fetch_array($r);
if($count[0]!="0"){
	//not exist
	$otp_sms = urlencode("Your Password is $count[1]");
	$q="select * from sms where type='transactional'";
	$r=mysqli_query($cn,$q);
	$count=mysqli_fetch_array($r);
	$url = $count[3];
	$url = str_replace("{mob}","$_POST[text_mobile]",$url);
	$url = str_replace("{message}","$otp_sms",$url);
	$json = file_get_contents($url);
	$json_data = json_decode($json, true);
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
	$myObj->status="Mobile Number Not Found";
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>