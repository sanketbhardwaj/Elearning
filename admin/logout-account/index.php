<?php
error_reporting(0);
session_start();
include('../../connection.php');
session_unset(); 
session_destroy(); 
$sql="select url from url where type='".mysqli_escape_string($cn,"admin")."'";
$result=mysqli_query($cn,$sql);
$row=mysqli_fetch_array($result);
$s = "location:".$row[0];
header($s);
?>