<?php
error_reporting(0);
session_start();
include('../../connection.php');
include('../islogin.php');
$sql_title="select * from logo where type='circle'";
$result_title=mysqli_query($cn,$sql_title);
$row_title=mysqli_fetch_array($result_title);
$ext = "../";
$menu = "product";

if(isset($_POST['btn_delete'])){
	
	$q="Delete from client where uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from client_staff where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from followups where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from invoices where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from quotations where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from tickets where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from training where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from transaction where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
	
	$q="Delete from visits where client_uid = '".$_POST['uid']."'";
	$r=mysqli_query($cn,$q);
		
	?><script>if(!alert("Deleted!")) document.location = '';</script><?php
	
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
    <title><?php echo $row_title[3]; ?> | List of Products</title>
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
    <div class="col s12 m12 l12">
      <div id="button-trigger" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">All Products</h4>
          <div class="row">
            
            <div class="col s12">
              <table id="data-table-simple" class="display">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Date</th>
                    <th>Business Name</th>
                    <th>Mobile Number</th>
                    <th>Products</th>
                    <th>Activate On</th>
                    <th>Expire On</th>
                    <th>Renew Software</th>
                    <th>Pay</th>
                    <th>Button</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$sql_c="select * from client_staff where software_status != 'Pending'";
				$result_c=mysqli_query($cn,$sql_c);
				$f=0;
				while($row_c=mysqli_fetch_array($result_c))
				{
					$sql_client="select name, business_name, email, mobile1, uid from client where uid = '".$row_c[3]."' AND client_status = 'Confirmed'";
					$result_client=mysqli_query($cn,$sql_client);
					$row_client=mysqli_fetch_array($result_client);
					$f = $f+1;
				?>
                  <tr>
                    <td><?php echo $f;?></td>
					<td><?php echo date_format(date_create($row_c[2]),"d/m/Y h:i A");?></td>
                    <td><?php echo $row_client[1]." (".$row_client[0].")";?></td>
                    <td><?php echo $row_client[3];?></td>
                    <td><?php echo $row_c[27]." (".$row_c[17].")";?></td>
					<td><?php echo date_format(date_create($row_c[6]),"d/m/Y");?></td>
					<td><?php echo date_format(date_create($row_c[7]),"d/m/Y");?></td>
                    <td>
					<?php
					if($row_c[21]!=0){
						?>
						<a href="renew-software/?product=<?php echo $row_c[1]."&staff=".$row_c[4]."&client=".$row_c[3]; ?>" class="mb-6 btn waves-effect waves-light green darken-1">Pay Now</a>
						<?php
					}
					?>
					
					</td>
					<td>
					<?php
					$now = time(); // or your date as well
					$your_date = strtotime($row_c[7]);
					$datediff = $now - $your_date;

					$days =  round($datediff / (60 * 60 * 24));
					if($days<=15){
						?>
						<a href="pay-now/?product=<?php echo $row_c[1]."&client=".$row_c[3]; ?>" class="mb-6 btn waves-effect waves-light green darken-1">Pay Now</a>
						<?php
					}
					?>
					
					</td>
					<td>
					<p>
						<form action="" method="POST">
							<input type="hidden" name="uid" value="<?php echo $row_c[4]; ?>">
							<a href="update-product/?id=<?php echo $row_c[1]."&client=".$row_c[3]; ?>" class="mb-6 btn-floating waves-effect waves-light orange darken-1">
								<i class="material-icons dp48">edit</i>
							</a>
							
						</form>
						
					</p>
					</td>
                  </tr>
                  <?php
				}
				  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Date</th>
                    <th>Business Name</th>
                    <th>Mobile Number</th>
                    <th>Products</th>
                    <th>Activate On</th>
                    <th>Expire On</th>
					<th>Renew Software</th>
					<th>Pay</th>
                    <th>Button</th>
                  </tr>
                </tfoot>
              </table>
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