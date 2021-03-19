<?php
error_reporting(0);
include('../../../connection.php');
$PdfUploadFolder = "../../../images/";
if($_POST['checkout_outside_reason']==""){
	$lat = $_POST['latitude'];
	$long = $_POST['longitude'];
	$q="select latitude,longitude from office where status='Active'";
	$result=mysqli_query($cn,$q);
	while($row=mysqli_fetch_row($result)) 
	{
		$latitude=$row[0];
		$longitude=$row[1];
		$dist = haversineGreatCircleDistance($lat,$long,$latitude,$longitude);
		if($dist<=0){
			
			if(isset($_POST['item_image'])){
				$bin = base64_decode($_POST['item_image']);
				$im = imageCreateFromString($bin);
				$PdfName = rand().date("ljSofFYhisA").rand().".jpg";
				imagepng($im, $PdfUploadFolder.$PdfName, 0);
				
				$time_now=mktime(date('h')+5,date('i')+30,date('s'));
				$datetime=date('Y-m-d H:i:s',$time_now);
				$name = substr($datetime, 0,1);
				$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
				$date=date('Y-m-d',$time_now);
				$time=date('H:i:s',$time_now);
				$q="Update attendence set out_time = '".mysqli_escape_string($cn,$time)."', out_image = '".mysqli_escape_string($cn,$PdfName)."', out_latitude = '".mysqli_escape_string($cn,$_POST['latitude'])."', out_longitude = '".mysqli_escape_string($cn,$_POST['longitude'])."' where staff_uid = '".mysqli_escape_string($cn,$_POST['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."'";
				$r=mysqli_query($cn,$q);
				if($r){
					$myObj->result="Success";
					$myObj->status="In Office Area";
				}else{
					$myObj->result="Fail";
				}
			}
			
		}else{
			$myObj->result="Success";
			$myObj->status="Outside Office Area";
		}
	}
}else{
	if(isset($_POST['item_image'])){
		
		$bin = base64_decode($_POST['item_image']);
		$im = imageCreateFromString($bin);
		$PdfName = rand().date("ljSofFYhisA").rand().".jpg";
		imagepng($im, $PdfUploadFolder.$PdfName, 0);
		
		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$datetime=date('Y-m-d H:i:s',$time_now);
		$name = substr($datetime, 0,1);
		$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
		$date=date('Y-m-d',$time_now);
		$time=date('H:i:s',$time_now);
		$q="Update attendence set out_time = '".mysqli_escape_string($cn,$time)."', checkout_outside_ofc_reason = '".mysqli_escape_string($cn,$_POST['checkout_outside_reason'])."', out_image = '".mysqli_escape_string($cn,$PdfName)."', out_latitude = '".mysqli_escape_string($cn,$_POST['latitude'])."', out_longitude = '".mysqli_escape_string($cn,$_POST['longitude'])."'  where staff_uid = '".mysqli_escape_string($cn,$_POST['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."'";
		$r=mysqli_query($cn,$q);
		if($r){
			$myObj->result="Success";
			$myObj->status="Outside Office Area";
		}else{
			$myObj->result="Fail";
		}
	}
	
}



$myJSON = json_encode($myObj);
echo $myJSON;

function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
	$latFrom = deg2rad($latitudeFrom);
	$lonFrom = deg2rad($longitudeFrom);
	$latTo = deg2rad($latitudeTo);
	$lonTo = deg2rad($longitudeTo);

	$latDelta = $latTo - $latFrom;
	$lonDelta = $lonTo - $lonFrom;

	$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	echo " ";   
	return $angle * $earthRadius/1000;
}
?>