<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "home";
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();

$device_details = $user_os." (".$user_browser.")";

if(isset($_POST['btn_checkin'])){
	$mac = $_SERVER['REMOTE_ADDR']; 
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$datetime=date('Y-m-d',$time_now);
	$name = substr($_POST['device_name'], 0,1);
	$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	$time=date('H:i:s',$time_now);

	$sql_late="select latemark from staff where uid = '".$_SESSION['staff_uid']."'";
	$r_late=mysqli_query($cn,$sql_late);
	$row_late=mysqli_fetch_array($r_late);

	$sql_time="select office_close_time, office_start_time from office";
	$r_time=mysqli_query($cn,$sql_time);
	$row_time=mysqli_fetch_array($r_time);

	$minutes = (strtotime($time) - strtotime($row_time[1])) / 60;
	if($minutes>$row_late[0]){
		$present = "Late";
	}else{
		$present = "Yes";
	}
	$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$_SESSION['staff_uid'])."','".mysqli_escape_string($cn,$time)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$present)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Computer")."','".mysqli_escape_string($cn,$device_details)."','".mysqli_escape_string($cn,$_POST['text_latitude'])."','".mysqli_escape_string($cn,$_POST['text_longitude'])."','".mysqli_escape_string($cn,$mac)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Active")."','','','','','','')";
	$r=mysqli_query($cn,$q);
	?><script>if(!alert("Checked In!")) document.location = '';</script><?php
	
}

if(isset($_POST['btn_checkout'])){
	
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$datetime=date('Y-m-d H:i:s',$time_now);
	$name = substr($datetime, 0,1);
	$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
	$date=date('Y-m-d',$time_now);
	$time=date('H:i:s',$time_now);
	$q="Update attendence set out_time = '".mysqli_escape_string($cn,$time)."', out_latitude = '".mysqli_escape_string($cn,$_POST['text_latitude'])."', out_longitude = '".mysqli_escape_string($cn,$_POST['text_longitude'])."' where staff_uid = '".mysqli_escape_string($cn,$_SESSION['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."'";
	$r=mysqli_query($cn,$q);
	
}

?>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:09 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Musskan CRM Software which is helps to manage your business properly and You can moniter, assign work to staff, leads reports etc">
    <meta name="keywords" content="CRM, crm, Musskan CRM, hst, Highsoft Technologies">
    <meta name="author" content="Highsoft Technologies">
    <title><?php echo $row_title[3]; ?> | Admin Dashboard</title>
    <link rel="apple-touch-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body onload="getLocation()" class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php
	include('../header.php')
	?>
    <!-- END: Header-->
    



    <?php
	include('../menu.php')
	?>

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!--card stats start-->
   <div id="card-stats" class="pt-0">
      <div class="row">
         
         
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Total Inquiries</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from client where client_status = 'Pending' AND sales_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Tickets</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from tickets where is_solve = 'Pending' AND support_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from tickets";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Supports</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from supports where is_solve = 'Pending' AND support_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from supports";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Total Clients</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from client where client_status = 'Confirmed' AND sales_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>Total Visits</p>
                     </div>
                     <div class="col s5 m5 right-align">
						<h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from visits where visit_status = 'Completed' AND staff_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from visits";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Total Trainings</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from training where training_status = 'Completed' AND staff_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						/</h5>
                        <p class="no-margin">
						<?php
							$sql1="select count(*) from training";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Total Transactions</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">
						<?php
							$sql1="select count(*) from transaction where staff_uid = '".$_SESSION['staff_uid']."'";
							$result1=mysqli_query($cn,$sql1);
							$row1=mysqli_fetch_array($result1);
							echo $row1['0'];
					    ?>
						</h5>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         
      </div>
	  <div class="row">
		  <div class="col s12">
			<div id="icon-prefixes" class="card card-tabs">
			  <div class="card-content">
				<div class="card-title">
				  <div class="row">
					<div class="col s12">
					  <h4 class="card-title">Check In / Check Out</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
				  <?php
					$time_now=mktime(date('h')+5,date('i')+30,date('s'));
					$date=date('Y-m-d',$time_now);
					$time=date('H:i:s',$time_now);

					$sql_at="select in_time from attendence where staff_uid='".mysqli_escape_string($cn,$_SESSION['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."'";
					$r_at=mysqli_query($cn,$sql_at);
					$row_at=mysqli_fetch_array($r_at);
					if($row_at[0]!=""){
						$sql_time="select office_start_time from office";
						$r_time=mysqli_query($cn,$sql_time);
						$row_time=mysqli_fetch_array($r_time);

						$minutes = (strtotime($row_at[0]) - strtotime($row_time[0])) / 60;
						//min = check in - office open time
						//echo $minutes."<br>";
						
					}
					$time_now=mktime(date('h')+5,date('i')+30,date('s'));
					$date=date('Y-m-d',$time_now);
					
					$sql_at="select date,in_time, out_time, present from attendence where staff_uid='".mysqli_escape_string($cn,$_SESSION['staff_uid'])."' AND date = '".mysqli_escape_string($cn,$date)."' AND application != 'Yes'";
					$r_at=mysqli_query($cn,$sql_at);
					$row_at=mysqli_fetch_array($r_at);
					if($row_at[3]!="No"){
						if($row_at[0]==$date){
							if($row_at[2]=="00:00:00"){
								$check = "Yes";
								?>
								Today's Progress in %
								<div class="progress">
									<div class="determinate" style="width: <?php echo round($minutes*0.21); ?>%"></div>
								</div>
								<?php
							}
						}
					}
				  ?>
				  
					
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <br><center>
					  <input id="latitude" type="hidden" name="text_latitude">
					  <input id="longitude" type="hidden" name="text_longitude">
					  <?php
					  if($check!="Yes"){
						  ?>
						  <button style="width:200px;height:40px;" name="btn_checkin" type="submit" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-5 mr-1 mb-2">Check In</button>
						  <?php
					  }else{
						  ?>
						  <button style="width:200px;height:40px;" name="btn_checkout" type="submit" class="waves-effect waves-light btn gradient-45deg-red-teal z-depth-5 mr-1 mb-2">Check Out</button>
						  <?php
					  }
					  ?>
					  
					  
					  </center>
					</form>
				  </div>
				</div>
				
			  </div>
			</div>
		  </div>
		</div>
   </div>
   <!--card stats end-->
   <!--yearly & weekly revenue chart start-->
   
   <!--end container-->
</div><!-- START RIGHT SIDEBAR NAV -->

<!-- END RIGHT SIDEBAR NAV -->
          </div>
          
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    <!-- Theme Customizer -->




    <!-- BEGIN: Footer-->

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2020          <a href="https://highsofttechno.com" target="_blank"><?php echo $row_title[3]; ?></a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://highsofttechno.com/">Team Highsoft Technologies</a></span></div>
      </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../app-assets/vendors/chartjs/chart.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../app-assets/js/plugins.min.js"></script>
    <script src="../app-assets/js/search.min.js"></script>
    <script src="../app-assets/js/custom/custom-script.min.js"></script>
    <script src="../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    
	

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    //document.getElementById("latitude").value = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
}
</script>

    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:11 GMT -->
</html>