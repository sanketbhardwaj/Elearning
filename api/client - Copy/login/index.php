<?php
error_reporting(0);
include('../../../connection.php');
$sql="select count(*) from client where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."' and password='".mysqli_escape_string($cn,$_POST['text_password'])."' and status='Active' and client_status='Confirmed'";
$result=mysqli_query($cn,$sql);
$row=mysqli_fetch_array($result);
if($row[0]=="0")
{
	$myObj->status="Invalid Credentials";
	$myObj->result="Fail";
}else{
	
	$sql="select * from client where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."'";
	$r=mysqli_query($cn,$sql);
	$row=mysqli_fetch_array($r);
	$myObj->result="Success";
	$myObj->uid=$row[1];
	$myObj->name=$row[3];
	//$myObj->profile_pic=$row[23];
	$myObj->gender=$row[4];
	$myObj->mobile=$row[5];
	$myObj->alternet_mobile=$row[6];
	$myObj->whatsapp_number=$row[7];
	$myObj->email=$row[8];
	$myObj->business_name=$row[10];
	$myObj->business_type=$row[11];
	$myObj->business_category=$row[12];
	$myObj->order_form=$row[13];
	$myObj->date_of_birth=date("d-m-Y", strtotime($row[14]));
	$myObj->anniversary_date=date("d-m-Y", strtotime($row[15]));
	$myObj->address=$row[16];
	$myObj->city=$row[17];
	$myObj->state=$row[18];
	$myObj->pincode=$row[19];
	$myObj->lead_source=$row[21];
	$myObj->reference_name=$row[22];
	$myObj->sales_uid=$row[20];
	$sql="select name from staff where uid='".mysqli_escape_string($cn,$row[20])."'";
	$r=mysqli_query($cn,$sql);
	$row=mysqli_fetch_array($r);
	$myObj->sales_staff_name=$row[0];
	$myObj->support_uid=$row[26];
	$sql="select name from staff where uid='".mysqli_escape_string($cn,$row[26])."'";
	$r=mysqli_query($cn,$sql);
	$row=mysqli_fetch_array($r);
	$myObj->support_staff_name=$row[0];
	
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>