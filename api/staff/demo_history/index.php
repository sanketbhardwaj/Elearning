<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from demo where staff_uid = '".$_POST['staff_uid']."' AND demo_status != 'Pending' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$sql1="select name, mobile1, mobile2 from client where uid='$row_sql[4]'";
	$result=mysqli_query($cn,$sql1);
	$row_shop=mysqli_fetch_row($result);
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'client_uid'=>$row_sql['4'],'client_name'=>$row_shop['0'],'client_mobile1'=>$row_shop['1'],'client_mobile2'=>$row_shop['2'],'start_on'=>date("g:i A", strtotime($row_sql[6])),'start_latitude'=>$row_sql['7'],'start_longitude'=>$row_sql['8'],'end_on'=>date("g:i A", strtotime($row_sql[9])),'end_latitude'=>$row_sql['10'],'end_longitude'=>$row_sql['11'],'demo_status'=>$row_sql['12'],'demo_date'=>date("d-m-Y", strtotime($row_sql[13])));
}
$my->demo_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>