<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from transaction where client_uid = '".$_POST['client_uid']."' AND reminder_date<='".$date_time."' AND transaction_status = 'Pending' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	
	$sql_product="select software_final_price, paid_payment, pending_payment from client_staff where uid='$row_sql[3]'";
	$result_product=mysqli_query($cn,$sql_product);
	$row_product=mysqli_fetch_row($result_product);
	
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'total_payment'=>$row_product['0'],'paid_payment'=>$row_product['1'],'pending_payment'=>$row_product['2']);
}
$my->transaction_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>