<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from client where (sales_uid = '".$_POST['staff_uid']."' || support_uid = '".$_POST['staff_uid']."') ORDER BY id DESC";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'date'=>date("d-m-Y g:i A", strtotime($row_sql[2])),'name'=>$row_sql['3'],'gender'=>$row_sql['4'],'mobile1'=>$row_sql['5'],'mobile2'=>$row_sql['6'],'whatsapp_no'=>$row_sql['7'],'email'=>$row_sql['8'],'business_name'=>$row_sql['10'],'business_type'=>$row_sql['11'],'business_category'=>$row_sql['12'],'lead_source'=>$row_sql['21'],'reference_name'=>$row_sql['22'],'profile_pic'=>$row_sql['25'],'client_status'=>$row_sql['23'],'address'=>$row_sql['16'],'city'=>$row_sql['17'],'state'=>$row_sql['18'],'pincode'=>$row_sql['19']);
}
$my->client_list=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>