<?php
error_reporting(0);
include('../../../connection.php');

$q="Update client set client_status='".mysqli_escape_string($cn,"Rejected")."' where uid='".mysqli_escape_string($cn,$_POST['client_uid'])."' AND sales_uid = '".mysqli_escape_string($cn,$_POST['staff_uid'])."'";
$r=mysqli_query($cn,$q);

$q="Update followups set follow_status = 'Completed', remark = '".$_POST['remark']."', call_duration = '".$_POST['call_duration']."' where uid = '".$_POST['followup_uid']."'";
$r=mysqli_query($cn,$q);

$myObj->result="Success";

$myJSON = json_encode($myObj);
echo $myJSON;
?>