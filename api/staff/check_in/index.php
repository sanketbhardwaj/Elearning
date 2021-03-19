<?php
error_reporting(0);
include('../../../connection.php');
$mac = $_SERVER['REMOTE_ADDR']; 
$PdfUploadFolder = "../../../images/";

$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date=date('Y-m-d',$time_now);
$time=date('H:i:s',$time_now);

$sql_late="select latemark from staff where uid = '".$_POST['staff_uid']."'";
$r_late=mysqli_query($cn,$sql_late);
$row_late=mysqli_fetch_array($r_late);

$sql_time="select office_close_time, office_start_time from office";
$r_time=mysqli_query($cn,$sql_time);
$row_time=mysqli_fetch_array($r_time);

$minutes = (strtotime($time) - strtotime($row_time[1])) / 60;
if($minutes>$row_late[0]){
	$present = "Late";
}else{
	$present = "Yes";
}
$myObj->latemark_min=$minutes;
$myObj->latemark_staff=$row_late[0];

if($_POST['checkin_outside_reason']==""){
	$lat = $_POST['latitude'];
	$long = $_POST['longitude'];
	$q="select latitude,longitude from office where status='Active'";
	$result=mysqli_query($cn,$q);
	while($row=mysqli_fetch_row($result)) 
	{
		$latitude=$row[0];
		$longitude=$row[1];
		$dist = haversineGreatCircleDistance($lat,$long,$latitude,$longitude);
		if($dist<=0.05){
			
			
			if(isset($_POST['item_image'])){
				$bin = base64_decode($_POST['item_image']);
				$im = imageCreateFromString($bin);
				$PdfName = rand().date("ljSofFYhisA").rand().".jpg";
				imagepng($im, $PdfUploadFolder.$PdfName, 0);
				
				$time_now=mktime(date('h')+5,date('i')+30,date('s'));
				$datetime=date('Y-m-d',$time_now);
				$name = substr($_POST['device_name'], 0,1);
				$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
				
				
				
				$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$_POST['staff_uid'])."','".mysqli_escape_string($cn,$time)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$present)."','".mysqli_escape_string($cn,$PdfName)."','".mysqli_escape_string($cn,"Mobile")."','".mysqli_escape_string($cn,$_POST['device_name'])."','".mysqli_escape_string($cn,$_POST['latitude'])."','".mysqli_escape_string($cn,$_POST['longitude'])."','".mysqli_escape_string($cn,$mac)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Active")."','','','','','','')";
				$r=mysqli_query($cn,$q);
				if($r){
					$myObj->result="Success";
					$myObj->status="In Office Area";
				}else{
					$myObj->result="Fail";
				}
				
				$sql_time="select office_close_time, office_start_time from office";
				$r_time=mysqli_query($cn,$sql_time);
				$row_time=mysqli_fetch_array($r_time);
	
				$time_now=mktime(date('h')+5,date('i')+30,date('s'));
				$datetime=date('Y-m-d',$time_now);
				
				$minutes = (strtotime($datetime) - strtotime($row_time[1])) / 60;
				//min = check in - office open time
				$myObj->minutes=$minutes;
				$myObj->percentage=round($minutes*0.21);
			}
		}else{
			$myObj->result="Success";
			$myObj->status="Outside Office Area";
		}
	}
	
}else{
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	$time=date('H:i:s',$time_now);
	if(isset($_POST['item_image'])){
		$bin = base64_decode($_POST['item_image']);
		$im = imageCreateFromString($bin);
		$PdfName = rand().date("ljSofFYhisA").rand().".jpg";
		imagepng($im, $PdfUploadFolder.$PdfName, 0);
		
		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$datetime=date('Y-m-d H:i:s',$time_now);
		$name = substr($_POST['device_name'], 0,1);
		$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
		
		
		
		$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$_POST['staff_uid'])."','".mysqli_escape_string($cn,$time)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$present)."','".mysqli_escape_string($cn,$PdfName)."','".mysqli_escape_string($cn,"Mobile")."','".mysqli_escape_string($cn,$_POST['device_name'])."','".mysqli_escape_string($cn,$_POST['latitude'])."','".mysqli_escape_string($cn,$_POST['longitude'])."','".mysqli_escape_string($cn,$mac)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Active")."','".mysqli_escape_string($cn,$_POST['checkin_outside_reason'])."','','','','','')";
		$r=mysqli_query($cn,$q);
		
		if($r){
			$myObj->result="Success";
			$myObj->status="Outside Office Area";
		}else{
			$myObj->result="Fail";
		}
		
		$sql_time="select office_close_time, office_start_time from office";
		$r_time=mysqli_query($cn,$sql_time);
		$row_time=mysqli_fetch_array($r_time);

		$time_now=mktime(date('h')+5,date('i')+30,date('s'));
		$datetime=date('Y-m-d',$time_now);
		
		$minutes = (strtotime($datetime) - strtotime($row_time[1])) / 60;
		//min = check in - office open time
		$myObj->minutes=$minutes;
		$myObj->percentage=round($minutes*0.21);
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