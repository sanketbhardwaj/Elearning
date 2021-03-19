<?php
error_reporting(0);
include('../../../connection.php');
$PdfUploadFolder = '../../../images/';
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_FILES['invoice_file']['name'])){
		$PdfName = rand().date("ljSofFYhisA").rand();
		$PdfInfo = pathinfo($_FILES['invoice_file']['name']);
		$PdfFileExtension = $PdfInfo['extension'];
		$PdfName = $PdfName . '.' . $PdfFileExtension;
		
		$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
		try{
			move_uploaded_file($_FILES['invoice_file']['tmp_name'],$PdfFileFinalPath);
			$fname = substr($_POST['remark'], 0,1);
			$uid = $fname.date("jYhisA").rand();
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d H:i:s',$time_now);
				
			$q="INSERT INTO invoices VALUES (NULL, '".$uid."','".$date_time."','".$_POST['client_uid']."','".$_POST['staff_uid']."','".$_POST['invoice_no']."','".$_POST['invoice_amount']."','".$PdfName."','Completed','Active')";
			$r=mysqli_query($cn,$q);
			if($r){
				$myObj->result="Success";
			}else{
				$myObj->result="Fail";
			}
		}catch(Exception $e){} 
	}
}

	
$myJSON = json_encode($myObj);
echo $myJSON;
?>