<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date=date('Y-m-d',$time_now);
$sqll="select * from attendence where leave_date='".mysqli_escape_string($cn,$date)."' AND present = 'No'";
$resultl=mysqli_query($cn,$sqll);
while($rowl=mysqli_fetch_row($resultl)){
	
	$mac = $_SERVER['REMOTE_ADDR']; 
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	$time=date('H:i:s',$time_now);
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$datetime=date('Y-m-d',$time_now);
	$name = substr($_POST['device_name'], 0,1);
	$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
	$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$rowl[3])."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"No")."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"")."','".mysqli_escape_string($cn,"")."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$rowl[13])."','".mysqli_escape_string($cn,$rowl[14])."','".mysqli_escape_string($cn,"Active")."','','','','','','')";
	$r=mysqli_query($cn,$q);
}
?>