<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from attendence where staff_uid = '".$_POST['staff_uid']."' and application != 'Yes' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$sql1="select name, mobile1, mobile2 from staff where uid='$row_sql[3]'";
	$result=mysqli_query($cn,$sql1);
	$row_shop=mysqli_fetch_row($result);
	
	if($row_sql['6']=="Yes" || $row_sql['6']=="Late"){
		$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y", strtotime($row_sql[2])),'in_time'=>date("g:i A", strtotime($row_sql[4])),'out_time'=>date("g:i A", strtotime($row_sql[5])),'present'=>$row_sql['6'],'in_image'=>$row_sql['7'],'login_from'=>$row_sql['8'],'device_name'=>$row_sql['9'],'in_latitude'=>$row_sql['10'],'in_longitude'=>$row_sql['11'],'ip_address'=>$row_sql['12'],'checkin_outside_reason'=>$row_sql['16'],'out_latitude'=>$row_sql['17'],'out_longitude'=>$row_sql['18'],'out_image'=>$row_sql['20'],'checkout_outside_reason'=>$row_sql['19']);
	}elseif($row_sql['6']=="No"){
		$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y", strtotime($row_sql[2])),'leave_reason'=>$row_sql['13'],'leave_date'=>date("d-m-Y", strtotime($row_sql[14])),'application_date'=>date("d-m-Y", strtotime($row_sql[21])),'present'=>$row_sql['6'],'apply_from'=>$row_sql['8'],'device_name'=>$row_sql['9'],'ip_address'=>$row_sql['12']);
	}elseif($row_sql['6']=="Reject"){
		$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y", strtotime($row_sql[2])),'leave_reason'=>$row_sql['13'],'leave_date'=>date("d-m-Y", strtotime($row_sql[14])),'application_date'=>date("d-m-Y", strtotime($row_sql[21])),'present'=>$row_sql['6'],'apply_from'=>$row_sql['8'],'device_name'=>$row_sql['9'],'ip_address'=>$row_sql['12']);
	}else{
		$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y", strtotime($row_sql[2])),'leave_reason'=>"Absent whole day without informed",'leave_date'=>date("d-m-Y", strtotime($row_sql[14])),'present'=>"");
	}
	
}

$my->attendence_history=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>