<?php
error_reporting(0);
include('../../../connection.php');
$sql="select count(*) from staff where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."' and password='".mysqli_escape_string($cn,$_POST['text_password'])."' and status='Active'";
$result=mysqli_query($cn,$sql);
$row=mysqli_fetch_array($result);
if($row[0]=="0")
{
	$myObj->status="Invalid Credentials";
	$myObj->result="Fail";
}else{
	
	$sql="select * from staff where mobile1='".mysqli_escape_string($cn,$_POST['text_mobile'])."'";
	$r=mysqli_query($cn,$sql);
	$row=mysqli_fetch_array($r);
	$myObj->result="Success";
	
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	
	$sql_at="select date,in_time, out_time, present from attendence where staff_uid='".mysqli_escape_string($cn,$row[1])."' AND date = '".mysqli_escape_string($cn,$date)."' AND application != 'Yes'";
	$r_at=mysqli_query($cn,$sql_at);
	$row_at=mysqli_fetch_array($r_at);
	
	$sql_time="select office_close_time, office_start_time from office";
	$r_time=mysqli_query($cn,$sql_time);
	$row_time=mysqli_fetch_array($r_time);
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	
	if($row_at[3]!="No"){
		if($row_at[0]==$date){
			if($row_at[2]=="00:00:00"){
				$myObj->attendance_status="Check In";
				$myObj->check_in_time=$row_at[1];
				$myObj->office_close_time=date("g:i A", strtotime($row_time[0]));;
				$myObj->office_start_time=date("g:i A", strtotime($row_time[1]));;
				$time_now=mktime(date('h')+5,date('i')+30,date('s'));
				$date_time=date('Y-m-d H:i:s',$time_now);
				$end_date = strtotime($date_time); 
				$minutes = (strtotime($date." ".$row_at[1]) - strtotime($date." ".$row_time[1])) / 60;
				//min = check in - office open time
				$myObj->minutes=$minutes;
				$myObj->percentage=round($minutes*0.21);
			}else{
				$myObj->attendance_status="Check Out Today";
			}
			
		}else{
			$myObj->attendance_status="Check Out";
		}
	}else{
		$myObj->attendance_status="Today On Leave";
	}
	
	
	$myObj->uid=$row[1];
	$myObj->name=$row[3];
	$myObj->profile_pic=$row[23];
	$myObj->gender=$row[4];
	$myObj->address=$row[5];
	$myObj->city=$row[6];
	$myObj->state=$row[7];
	$myObj->pincode=$row[8];
	$myObj->email=$row[9];
	$myObj->mobile1=$row[10];
	$myObj->mobile2=$row[11];
	$myObj->department=$row[13];
	$myObj->joining_date=date("d-m-Y", strtotime($row[14]));
	$myObj->date_of_birth=date("d-m-Y", strtotime($row[15]));
	$myObj->anniversary_date=date("d-m-Y", strtotime($row[16]));
	$myObj->account_no=$row[18];
	$myObj->ifsc_code=$row[19];
	$myObj->ac_holder_name=$row[20];
	$myObj->salary=$row[21];
	
	
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>