<?php
error_reporting(0);
include('../../../connection.php');
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date_time=date('Y-m-d',$time_now);

$sql="SELECT name, gender FROM client UNION SELECT name, status FROM partner ORDER BY name;";
$result1=mysqli_query($cn,$sql);
while ($row_sql=mysqli_fetch_row($result1)) 
{
	if($row_sql[1]=="Active"){
		$info[]=array('uid'=>$row_sql['1'],'name'=>$row_sql[0]." (Partner)");
	}else{
		$info[]=array('uid'=>$row_sql['1'],'name'=>$row_sql[0]." (Client)");
	}
	
}
$my->followup_type=$info;

$myJSON = json_encode($my);
echo $myJSON;
?>