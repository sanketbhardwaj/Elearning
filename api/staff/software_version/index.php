<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from software_version where sw_company_uid = '".$_POST['sw_company_uid']."'";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'version'=>$row_sql['4'],'users'=>$row_sql['5'],'rate'=>$row_sql['6'],'amc'=>$row_sql['7'],'edition'=>$row_sql['8']);
}
$my->software_company=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>