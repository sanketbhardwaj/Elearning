<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);


$sql="select * from client_staff where client_uid = '".$_POST['client_uid']."' ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$sql1="select name, mobile1, mobile2 from client where uid='$row_sql[4]'";
	$result=mysqli_query($cn,$sql1);
	$row_shop=mysqli_fetch_row($result);
	
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'client_uid'=>$row_sql['4'],'client_name'=>$row_shop['0'],'client_mobile1'=>$row_shop['1'],'client_mobile2'=>$row_shop['2'],'software_activation_date'=>date("d-m-Y g:i A", strtotime($row_sql[6])),'software_expire_date'=>date("d-m-Y g:i A", strtotime($row_sql[7])),'duration'=>$row_sql[8],'customer_id'=>$row_sql[9],'activation_id'=>$row_sql[10],'quotation_price'=>$row_sql[11],'confirm_price'=>$row_sql[12],'discount'=>$row_sql[13],'discount_type'=>$row_sql[14],'amc'=>$row_sql[15],'amc_with_gst'=>$row_sql[16],'version'=>$row_sql[17],'users'=>$row_sql[18],'edition'=>$row_sql[19],'paid_payment'=>$row_sql[20],'pending_payment'=>$row_sql[21],'pending_remind_date'=>$row_sql[22],'software_status'=>$row_sql[23],'quotation_no'=>$row_sql[25],'invoice_no'=>$row_sql[26]);
}


$my->product_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>