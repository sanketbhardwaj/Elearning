<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from invoices where client_uid = '".$_POST['client_uid']."' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'inv_no'=>$row_sql['5'],'inv_amount'=>$row_sql['6'],'inv_file'=>$row_sql['7'],'inv_status'=>$row_sql['8']);
}
$my->invoice_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>