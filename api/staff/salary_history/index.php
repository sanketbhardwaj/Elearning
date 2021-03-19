<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from staff_salary where staff_uid = '".$_POST['staff_uid']."' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'salary_amount'=>$row_sql['4'],'paid_amount'=>$row_sql['5'],'incentive'=>$row_sql['6'],'remark'=>$row_sql['7'],'transaction_id'=>$row_sql['8'],'payment_type'=>$row_sql['9']);
}
$my->salary_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>