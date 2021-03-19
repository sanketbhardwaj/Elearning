<?php
if(isset($_SESSION['staff_uid']) ){
	$s = "location:".$ext;
	header($s);
}
?>