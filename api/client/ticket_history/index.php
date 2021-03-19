<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from tickets where client_uid = '".$_POST['client_uid']."' AND is_solve = 'Completed' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'issue'=>$row_sql['5'],'solve_by'=>$row_sql['6'],'ticket_status'=>$row_sql['7'],'remark'=>$row_sql['8'],'call_duration'=>$row_sql['9']);
}
$my->ticket_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>