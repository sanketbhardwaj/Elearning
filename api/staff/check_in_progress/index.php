<?php
error_reporting(0);
include('../../../connection.php');

$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date=date('Y-m-d',$time_now);
$time=date('H:i:s',$time_now);

$sql_at="select in_time from attendence where staff_uid='".mysqli_escape_string($cn,$_POST['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."'";
$r_at=mysqli_query($cn,$sql_at);
$row_at=mysqli_fetch_array($r_at);
if($row_at[0]!=""){
	$sql_time="select office_start_time from office";
	$r_time=mysqli_query($cn,$sql_time);
	$row_time=mysqli_fetch_array($r_time);

	$minutes = (strtotime($row_at[0]) - strtotime($row_time[0])) / 60;
	//min = check in - office open time
	$myObj->minutes=$minutes;
	$myObj->checkin_time=date("g:i A", strtotime($row_at[0]));
	$myObj->percentage=round($minutes*0.21);
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}


$myJSON = json_encode($myObj);
echo $myJSON;
?>