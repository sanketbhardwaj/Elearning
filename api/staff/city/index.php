<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from city ORDER BY name";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'name'=>$row_sql['3'],'pincode'=>$row_sql['4']);
}
$my->city=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>