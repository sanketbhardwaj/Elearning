<?php
error_reporting(0);
$cn = new mysqli("localhost", "root", "","musskan_crm");
if($cn){
	 //echo "Success";
}
else{
	 echo "Fail";
	 echo mysqli_connect_error();
}
 ?>