<?php
error_reporting(0);
include('../../../connection.php');
$sqll="select count(*) from staff where status='".mysqli_escape_string($cn,"Active")."' AND password='".mysqli_escape_string($cn,$_POST['old_password'])."' AND uid='".mysqli_escape_string($cn,$_POST['staff_uid'])."'";
$resultl=mysqli_query($cn,$sqll);
$rowl=mysqli_fetch_row($resultl);
if($rowl[0]==0){
	$myObj->result="Fail";
}else{
	$q="Update staff set password='".mysqli_escape_string($cn,$_POST['new_password'])."' where uid='".mysqli_escape_string($cn,$_POST['staff_uid'])."'";
	$r=mysqli_query($cn,$q);
	$myObj->result="Success";
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>