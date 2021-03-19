<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="select * from ticket_master where tq_uid = '".$_POST['question_uid']."'";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	$info[]=array('uid'=>$row_sql['1'],'answer'=>$row_sql['4'],'image'=>$row_sql['5']);
}
$my->steps=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>