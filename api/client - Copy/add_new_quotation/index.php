<?php
error_reporting(0);
include('../../../connection.php');
$PdfUploadFolder = '../../../images/';
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_FILES['quotation_file']['name'])){
		$PdfName = rand().date("ljSofFYhisA").rand();
		$PdfInfo = pathinfo($_FILES['quotation_file']['name']);
		$PdfFileExtension = $PdfInfo['extension'];
		$PdfName = $PdfName . '.' . $PdfFileExtension;
		
		$PdfFileFinalPath = $PdfUploadFolder . $PdfName;
		try{
			move_uploaded_file($_FILES['quotation_file']['tmp_name'],$PdfFileFinalPath);
			$fname = substr($_POST['remark'], 0,1);
			$uid = $fname.date("jYhisA").rand();
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d H:i:s',$time_now);
			
			$q="Update followups set follow_status = 'Completed', remark = '".$_POST['remark']."', next_date = '".date('Y-m-d', strtotime(' +1 day'))."', call_duration = '".$_POST['call_duration']."' where uid = '".$_POST['followup_uid']."'";
			$r=mysqli_query($cn,$q);
			
			$q="INSERT INTO quotations VALUES (NULL, '".$uid."','".$date_time."','".$_POST['client_uid']."','".$_POST['staff_uid']."','".$_POST['quotation_no']."','".$_POST['quotation_amount']."','".$PdfName."','Pending','Active')";
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