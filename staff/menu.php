<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
  <div class="brand-sidebar">
	<h1 class="logo-wrapper"><a class="brand-logo darken-1" href="<?php echo $ext; ?>home"><img style="
    width: 150px;
    margin-top: -15px;
    height: 45px;
" class="hide-on-med-and-down" src="<?php echo $ext; ?>../logo/<?php echo $row_title[4]; ?>" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo $ext; ?>../logo/<?php echo $row_title[4]; ?>" alt="materialize logo"/></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
	
	<li class="<?php if($menu=="home"){ echo "active"; } ?> bold"><a class="<?php if($menu=="home"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>home"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Home</span></a>
	</li>
	<li class="<?php if($menu=="leave_application"){ echo "active"; } ?> bold"><a class="<?php if($menu=="leave_application"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>leave-applications"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Leave Applications</span></a>
	</li>
	
	
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Today's Work</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="followup"){ echo "active"; } ?>"><a class="<?php if($menu=="followup"){ echo "active"; } ?>" href="<?php echo $ext; ?>followup"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Followups</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from followups where staff_uid = '".$_SESSION['staff_uid']."' AND next_date<='".$date_time."' AND follow_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="ticket"){ echo "active"; } ?>"><a class="<?php if($menu=="ticket"){ echo "active"; } ?>" href="<?php echo $ext; ?>ticket"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Ticket</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from tickets where support_uid = '".$_SESSION['staff_uid']."' AND is_solve='Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="support"){ echo "active"; } ?>"><a class="<?php if($menu=="support"){ echo "active"; } ?>" href="<?php echo $ext; ?>support"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Support</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from supports where support_uid = '".$_SESSION['staff_uid']."' AND is_solve='Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="training"){ echo "active"; } ?>"><a class="<?php if($menu=="training"){ echo "active"; } ?>" href="<?php echo $ext; ?>training"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Training</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from training where staff_uid = '".$_SESSION['staff_uid']."' AND training_date <= '".$date_time."' AND training_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="visit"){ echo "active"; } ?>"><a class="<?php if($menu=="visit"){ echo "active"; } ?>" href="<?php echo $ext; ?>visit"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Visit</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from visits where staff_uid = '".$_SESSION['staff_uid']."' AND visit_date <= '".$date_time."' AND visit_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="demo"){ echo "active"; } ?>"><a class="<?php if($menu=="demo"){ echo "active"; } ?>" href="<?php echo $ext; ?>demo"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Demo</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from demo where staff_uid = '".$_SESSION['staff_uid']."' AND demo_date <= '".$date_time."' AND demo_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="install"){ echo "active"; } ?>"><a class="<?php if($menu=="install"){ echo "active"; } ?>" href="<?php echo $ext; ?>installation-and-implementation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Installation</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from installation where staff_uid = '".$_SESSION['staff_uid']."' AND installation_date <= '".$date_time."' AND installation_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="payment"){ echo "active"; } ?>"><a class="<?php if($menu=="payment"){ echo "active"; } ?>" href="<?php echo $ext; ?>payment"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Payments</span><span class="badge badge pill purple float-right mr-10">
		  <?php
			$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			$date_time=date('Y-m-d',$time_now);
			$sql_c="select count(*) from transaction where staff_uid = '".$_SESSION['staff_uid']."' AND reminder_date<='".$date_time."' AND transaction_status = 'Pending' ORDER BY id DESC";
			$result_c=mysqli_query($cn,$sql_c);
			$row_c=mysqli_fetch_array($result_c);
			echo $row_c[0];
		  ?>
		  </span></a></li>
		  <li class="<?php if($menu=="renew"){ echo "active"; } ?>"><a class="<?php if($menu=="renew"){ echo "active"; } ?>" href="<?php echo $ext; ?>renew-products"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Renew Products</span></a></li>
		  
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">New Entry</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_inquiry"){ echo "active"; } ?>"><a class="<?php if($menu=="add_inquiry"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-inquiry"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Inquiry</span></a></li>
		  <li class="<?php if($menu=="add_ticket"){ echo "active"; } ?>"><a class="<?php if($menu=="add_ticket"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-ticket"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Ticket</span></a></li>
		  <li class="<?php if($menu=="add_support"){ echo "active"; } ?>"><a class="<?php if($menu=="add_support"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-support"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Support</span></a></li>
		  <li class="<?php if($menu=="add_training"){ echo "active"; } ?>"><a class="<?php if($menu=="add_training"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-training"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Training</span></a></li>
		  <li class="<?php if($menu=="add_visit"){ echo "active"; } ?>"><a class="<?php if($menu=="add_visit"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-visit"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Visit</span></a></li>
		  <li class="<?php if($menu=="add_demo"){ echo "active"; } ?>"><a class="<?php if($menu=="add_demo"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-demo"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Demo</span></a></li>
		  <li class="<?php if($menu=="add_install"){ echo "active"; } ?>"><a class="<?php if($menu=="add_install"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-installation-and-implementation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Installation</span></a></li>
		  <li class="<?php if($menu=="add_quotation"){ echo "active"; } ?>"><a class="<?php if($menu=="add_quotation"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-quotation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Quotation</span></a></li>
		  <li class="<?php if($menu=="add_invoice"){ echo "active"; } ?>"><a class="<?php if($menu=="add_invoice"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-invoice"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Invoice</span></a></li>
		  <li class="<?php if($menu=="add_payment"){ echo "active"; } ?>"><a class="<?php if($menu=="add_payment"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-payment"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Payments</span></a></li>
		  <li class="<?php if($menu=="add_renew"){ echo "active"; } ?>"><a class="<?php if($menu=="add_renew"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-renew-products"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Add Renew Products</span></a></li>
		  
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Reports</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="report_client"){ echo "active"; } ?>"><a class="<?php if($menu=="report_client"){ echo "active"; } ?>" href="<?php echo $ext; ?>client-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Client Reports</span></a></li>
		  <li class="<?php if($menu=="report_product"){ echo "active"; } ?>"><a class="<?php if($menu=="report_product"){ echo "active"; } ?>" href="<?php echo $ext; ?>product-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Product Reports</span></a></li>
		  <li class="<?php if($menu=="report_inquiry"){ echo "active"; } ?>"><a class="<?php if($menu=="report_inquiry"){ echo "active"; } ?>" href="<?php echo $ext; ?>inquiry-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Inquiry Reports</span></a></li>
		  <li class="<?php if($menu=="report_followup"){ echo "active"; } ?>"><a class="<?php if($menu=="report_followup"){ echo "active"; } ?>" href="<?php echo $ext; ?>followup-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Followup Reports</span></a></li>
		  <li class="<?php if($menu=="report_ticket"){ echo "active"; } ?>"><a class="<?php if($menu=="report_ticket"){ echo "active"; } ?>" href="<?php echo $ext; ?>ticket-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Ticket Reports</span></a></li>
		  <li class="<?php if($menu=="report_support"){ echo "active"; } ?>"><a class="<?php if($menu=="report_support"){ echo "active"; } ?>" href="<?php echo $ext; ?>support-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Support Reports</span></a></li>
		  <li class="<?php if($menu=="report_training"){ echo "active"; } ?>"><a class="<?php if($menu=="report_training"){ echo "active"; } ?>" href="<?php echo $ext; ?>training-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Training Reports</span></a></li>
		  <li class="<?php if($menu=="report_visit"){ echo "active"; } ?>"><a class="<?php if($menu=="report_visit"){ echo "active"; } ?>" href="<?php echo $ext; ?>visit-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Visit Reports</span></a></li>
		  <li class="<?php if($menu=="report_demo"){ echo "active"; } ?>"><a class="<?php if($menu=="report_demo"){ echo "active"; } ?>" href="<?php echo $ext; ?>demo-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Demo Reports</span></a></li>
		  <li class="<?php if($menu=="report_install"){ echo "active"; } ?>"><a class="<?php if($menu=="report_install"){ echo "active"; } ?>" href="<?php echo $ext; ?>installation-and-implementation-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Installation Reports</span></a></li>
		  <li class="<?php if($menu=="report_quotation"){ echo "active"; } ?>"><a class="<?php if($menu=="report_quotation"){ echo "active"; } ?>" href="<?php echo $ext; ?>quotation-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Quotation Reports</span></a></li>
		  <li class="<?php if($menu=="report_invoice"){ echo "active"; } ?>"><a class="<?php if($menu=="report_invoice"){ echo "active"; } ?>" href="<?php echo $ext; ?>invoice-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Invoice Reports</span></a></li>
		  <li class="<?php if($menu=="report_payment"){ echo "active"; } ?>"><a class="<?php if($menu=="report_payment"){ echo "active"; } ?>" href="<?php echo $ext; ?>payment-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Payments Reports</span></a></li>
		  <li class="<?php if($menu=="report_renew"){ echo "active"; } ?>"><a class="<?php if($menu=="report_renew"){ echo "active"; } ?>" href="<?php echo $ext; ?>renew-products-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Renew Products Reports</span></a></li>
		  <li class="<?php if($menu=="report_attendence"){ echo "active"; } ?>"><a class="<?php if($menu=="report_attendence"){ echo "active"; } ?>" href="<?php echo $ext; ?>attendence-reports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Attendence Reports</span></a></li>
		  
		</ul>
	  </div>
	</li>
	
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->