<?php
error_reporting(0);
include('../../../connection.php');
$fname = substr($_POST['remark'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);
	
$q="Update tickets set remark = '".$_POST['remark']."', solve_by = '".$_POST['solve_by']."', is_solve = 'Completed', call_duration = '".$_POST['call_duration']."' where uid = '".$_POST['ticket_uid']."'";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>