<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);
	
$q="Update installation set start_on='".mysqli_escape_string($cn,$date_time)."', start_latitude='".mysqli_escape_string($cn,$_POST['latitude'])."', start_longitude='".mysqli_escape_string($cn,$_POST['longitude'])."' where uid='".mysqli_escape_string($cn,$_POST['installation_uid'])."'";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>