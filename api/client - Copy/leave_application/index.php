<?php
error_reporting(0);
include('../../../connection.php');
$mac = $_SERVER['REMOTE_ADDR']; 
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date=date('Y-m-d',$time_now);
$time=date('H:i:s',$time_now);
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$datetime=date('Y-m-d',$time_now);
$name = substr($_POST['device_name'], 0,1);
$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$_POST['staff_uid'])."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Pending")."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Mobile")."','".mysqli_escape_string($cn,$_POST['device_name'])."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$mac)."','".mysqli_escape_string($cn,$_POST['leave_reason'])."','".mysqli_escape_string($cn,$_POST['leave_date'])."','".mysqli_escape_string($cn,"Active")."','','','','','','Yes')";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>