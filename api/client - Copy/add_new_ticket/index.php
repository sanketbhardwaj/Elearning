<?php
error_reporting(0);
include('../../../connection.php');
$fname = substr($_POST['remark'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);
if($_POST['call_duration']==""){
	$q="INSERT INTO tickets VALUES (NULL, '".$uid."','".$date_time."','".$_POST['staff_uid']."','".$_POST['client_uid']."','".$_POST['issue']."','".$_POST['solve_by']."','Completed','".$_POST['remark']."','".$_POST['call_duration']."','Active')";
}else{
	$q="INSERT INTO tickets VALUES (NULL, '".$uid."','".$date_time."','".$_POST['staff_uid']."','".$_POST['client_uid']."','".$_POST['issue']."','".$_POST['solve_by']."','Pending','".$_POST['remark']."','".$_POST['call_duration']."','Active')";
}	
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>