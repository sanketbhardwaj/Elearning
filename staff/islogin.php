<?php
if(!isset($_SESSION['staff_uid'])){
	$sql="select * from url where type='staff'";
	$result=mysqli_query($cn,$sql);
	$row=mysqli_fetch_array($result);
	$s = "location:".$row[3]."login";
	header($s);
}
?>