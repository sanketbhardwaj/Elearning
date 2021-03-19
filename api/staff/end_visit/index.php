<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);
	
$q="Update visits set type= '".$_POST['type']."', end_on='".mysqli_escape_string($cn,$date_time)."', end_latitude='".mysqli_escape_string($cn,$_POST['latitude'])."', end_longitude='".mysqli_escape_string($cn,$_POST['longitude'])."', remark='".mysqli_escape_string($cn,$_POST['remark'])."', visit_status='Completed' where uid='".mysqli_escape_string($cn,$_POST['training_uid'])."'";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>