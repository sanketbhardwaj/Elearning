<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);


$sql="select * from transaction where client_uid = '".$_POST['client_uid']."' AND transaction_status != 'Pending' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	
	$sql_product="select software_final_price from client_staff where uid='$row_sql[3]'";
	$result_product=mysqli_query($cn,$sql_product);
	$row_product=mysqli_fetch_row($result_product);

	$sql = "SELECT SUM(payment) FROM `transaction` where id BETWEEN '1' AND '".$row_sql[0]."' AND client_uid = '".$_POST['client_uid']."' AND transaction_status != 'Pending' ORDER BY id DESC";
	$result_payment=mysqli_query($cn,$sql);
	$row_payment=mysqli_fetch_row($result_payment);
	
	$pending_payment = $row_product[0]-$row_payment[0];
	$paid_payment = $row_product[0]-$pending_payment;
	
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'total_payment'=>$row_product['0'],'paid_payment'=>$paid_payment,'pending_payment'=>$pending_payment,'payment'=>$row_sql[7],'payment_mode'=>$row_sql[8],'payment_id'=>$row_sql[9],'reminder_date'=>date("d-m-Y", strtotime($row_sql[10])));
}


$my->transaction_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>