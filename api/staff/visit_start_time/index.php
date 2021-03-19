<?php
error_reporting(0);
include('../../../connection.php');
$sqll="select * from visits where uid='".mysqli_escape_string($cn,$_POST['visit_uid'])."'";
$resultl=mysqli_query($cn,$sqll);
$rowl=mysqli_fetch_row($resultl);

if($rowl[6]=="0000-00-00 00:00:00"){
	$myObj->result="Fail";
	//$myObj->start_time=$rowl[6];
}else{
	$myObj->result="Success";
	$myObj->start_time=$rowl[6];
}

$myJSON = json_encode($myObj);
echo $myJSON;
?>