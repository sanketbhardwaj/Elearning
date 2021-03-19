<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from training where client_uid = '".$_POST['client_uid']."' AND training_status != 'Pending' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'start_on'=>date("g:i A", strtotime($row_sql[6])),'start_latitude'=>$row_sql['7'],'start_longitude'=>$row_sql['8'],'end_on'=>date("g:i A", strtotime($row_sql[9])),'end_latitude'=>$row_sql['10'],'end_longitude'=>$row_sql['11'],'training_status'=>$row_sql['12'],'training_date'=>date("d-m-Y", strtotime($row_sql[13])));
}
$my->training_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>