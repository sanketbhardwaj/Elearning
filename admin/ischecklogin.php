<?php
if(isset($_SESSION['admin_uid']) ){
	$s = "location:".$ext;
	header($s);
}
?>