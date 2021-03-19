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
	
	$q="INSERT INTO client VALUES (NULL, '".$uid."','".$date_time."','".$_POST['name']."','".$_POST['gender']."','".$_POST['mobile']."','".$_POST['alternet_mobile']."','".$_POST['whatsapp']."','".$_POST['email']."','".implode($pass)."','".$_POST['business_name']."','".$_POST['business_type']."','".$_POST['business_category']."','','','','','','','','','".$_POST['lead_source']."','".$_POST['reference_name']."','Pending','Active','','')";
	$r=mysqli_query($cn,$q);
	
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>