<?php
error_reporting(0);
include('../../../connection.php');

$PdfUploadFolder = '../../../files/';
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_FILES['support_file']['name'])){
		$PdfName = rand().date("ljSofFYhisA").rand();
		$PdfInfo = pathinfo($_FILES['support_file']['name']);
		$PdfFileExtension = $PdfInfo['extension'];
		$PdfName = $PdfName . '.' . $PdfFileExtension;
		
		$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
		try{
			move_uploaded_file($_FILES['support_file']['tmp_name'],$PdfFileFinalPath);
		}catch(Exception $e){} 
	}
}

$fname = substr($_POST['remark'], 0,1);
$uid = $fname.date("jYhisA").rand();
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d H:i:s',$time_now);
$q="INSERT INTO supports VALUES (NULL, '".$uid."','".$date_time."','".$_POST['staff_uid']."','".$_POST['client_uid']."','".$_POST['issue']."','".$_POST['solve_by']."','".$_POST['support_status']."','".$_POST['remark']."','".$_POST['call_duration']."','Active','".$_POST['answer']."','".$PdfName."','".$_POST['url']."','".$_POST['solve_date']."')";
$r=mysqli_query($cn,$q);
if($r){
	$myObj->result="Success";
}else{
	$myObj->result="Fail";
}
	
$myJSON = json_encode($myObj);
echo $myJSON;
?>