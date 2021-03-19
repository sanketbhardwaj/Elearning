<?php
error_reporting(0);
include('../connection.php');
session_start();
$sql="select * from url where type='admin'";
$result=mysqli_query($cn,$sql);
$row=mysqli_fetch_array($result);
if(!isset($_SESSION['admin_uid']) ){
	$s = "location:".$row[3]."login";
	header($s);
}else{
	$s = "location:".$row[3]."home";
	header($s);
}
?>