<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date=date('Y-m-d',$time_now);
$sqll="select * from followups where next_date='".mysqli_escape_string($cn,$date)."'";
$resultl=mysqli_query($cn,$sqll);
while($rowl=mysqli_fetch_row($resultl)){
	
	$fname = substr($rowl[3], 0,1);
	$uid = $fname.date("jYhisA").rand();
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date_time=date('Y-m-d H:i:s',$time_now);
	
	$q="INSERT INTO followups VALUES (NULL, '".$uid."','".$date_time."','".$rowl[3]."','".$rowl[4]."','Pending','','','','Active','".$rowl[10]."')";
	$r=mysqli_query($cn,$q);
}
?>