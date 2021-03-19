<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "leave_application";

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
$mac = $_SERVER['REMOTE_ADDR']; 

if(isset($_POST['btn_save'])){
	
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date=date('Y-m-d',$time_now);
	$time=date('H:i:s',$time_now);
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$datetime=date('Y-m-d',$time_now);
	$name = substr($device_details, 0,1);
	$unique_uid = rand().$name.date("jYhisA").$name.rand().$name;
	$q="INSERT INTO attendence VALUES (NULL, '".mysqli_escape_string($cn,$unique_uid)."','".mysqli_escape_string($cn,$datetime)."','".mysqli_escape_string($cn,$_SESSION['staff_uid'])."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Pending")."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,"Computer")."','".mysqli_escape_string($cn,$device_details)."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,'')."','".mysqli_escape_string($cn,$mac)."','".mysqli_escape_string($cn,$_POST['text_reason'])."','".mysqli_escape_string($cn,$_POST['text_leave_date'])."','".mysqli_escape_string($cn,"Active")."','','','','','','Yes')";
	$r=mysqli_query($cn,$q);
	?><script>if(!alert("Request Submitted!")) document.location = '';</script><?php
	
}

if(isset($_POST['btn_reject'])){
	
	$q="Delete from attendence where uid = '".$_POST['leave_uid']."'";
	$r=mysqli_query($cn,$q);
	?><script>if(!alert("Leave Application Withdrawed!")) document.location = '';</script><?php
	
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
    <title><?php echo $row_title[3]; ?> | Leave Application</title>
    <link rel="apple-touch-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../../logo/<?php echo $row_title[4]; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/data-tables/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/custom/custom.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

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
   
      <div class="row">
		  <div class="col s12">
			<div id="icon-prefixes" class="card card-tabs">
			  <div class="card-content">
				<div class="card-title">
				  <div class="row">
					<div class="col s12 m6 l10">
					  <h4 class="card-title">Leave Application</h4>
					</div>
				  </div>
				</div>
				<div id="view-icon-prefixes">
				  <br>
				  <div class="row">
					<form class="col s12" method="POST" action="" enctype="multipart/form-data">
					  <div class="row">
						
						<div class="input-field col s12">
						  <i class="material-icons prefix">cake</i>
						  <input type="date" name="text_leave_date">
						  <label>Leave Date</label>
						</div>
						<div class="input-field col s12">
						  <i class="material-icons prefix">location_on</i>
						  <textarea name="text_reason" placeholder="Enter Reason" class="materialize-textarea"></textarea>
						  <label>Reason for Leave</label>
						</div>
						
						
						
						
						
						
					  </div>
					  <br><center><button style="width:200px;height:40px;" name="btn_save" type="submit" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-5 mr-1 mb-2">Save</button></center>
					</form>
				  </div>
				  <hr>
				  <div class="row">
            
            <div class="col s12">
              <table id="data-table-simple" class="display">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Application Date</th>
                    <th>Leave Date</th>
                    <th>Leave Reason</th>
                    <th>Status</th>
                    <th>Withdraw</th>
                    
                  </tr>
                </thead>
                <tbody>
				<?php
				
				$sql="select * from attendence where (present='Pending' or present='No' or present='Reject') and application = 'Yes' and staff_uid='".$_SESSION['staff_uid']."'";
				$result=mysqli_query($cn,$sql);
				//$row=mysqli_fetch_array($result);
				
				$f=0;
				while($row=mysqli_fetch_array($result))
				{
					$f = $f+1;
					$sql_c="select uid, name, mobile1, dept from staff where uid='".$row[3]."'";
					$result_c=mysqli_query($cn,$sql_c);
					$row_c=mysqli_fetch_array($result_c);
					
					
					
				?>
                  <tr  style="<?php
				  if($row[6]=="Pending"){ echo "color:red;"; }elseif($row[6]=="Reject") { echo "color:orange;"; }elseif($row[6]=="No") { echo "color:green;"; } ?>">
                    <td><?php echo $f;?></td>
                    <td><?php echo date_format(date_create($row[2]),"d/m/Y");?></td>
                    
					<td><?php echo date_format(date_create($row[14]),"d/m/Y");?></td>
					<td><?php echo $row[13];?></td>
					
					
                    <td><?php
					if($row[6]=="Pending"){
						echo "Pending for Approval"; 
					}
					if($row[6]=="No"){
						echo "Leave Approved"; 
					}
					if($row[6]=="Reject"){
						echo "Leave Rejected"; 
					}
					
					?>
					</td>
					<td>
						<form action="" method="POST">
							<input type="hidden" name="leave_uid" value="<?php echo $row[1]; ?>">
							<button type="submit" name="btn_reject" class="mb-6 btn waves-effect waves-light red darken-1">Cancel</button>
						</form>
					</td>
                  </tr>
                  <?php
				}
				  ?>
                </tbody>
                <tfoot>
                  <tr>
					<th>Sr. No.</th>
                    <th>Application Date</th>
                    <th>Leave Date</th>
                    <th>Leave Reason</th>
                    <th>Status</th>
                    <th>Withdraw</th>
                    
                  </tr>
                </tfoot>
              </table>
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
	<script src="../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>
	<script src="../app-assets/js/scripts/data-tables.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 10:27:11 GMT -->
</html>