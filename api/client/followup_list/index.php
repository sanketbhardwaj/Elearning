<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from followups where client_uid = '".$_POST['client_uid']."' AND next_date<='".$date_time."' AND follow_status = 'Pending' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'remark'=>$row_sql['6'],'call_duration'=>$row_sql['8'],'next_call_date'=>date("d-m-Y", strtotime($row_sql[5])),'task'=>$row_sql['10']);
}
$my->followup_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>