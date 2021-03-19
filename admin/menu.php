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
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Masters</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="area"){ echo "active"; } ?>"><a class="<?php if($menu=="area"){ echo "active"; } ?>" href="<?php echo $ext; ?>area"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Area</span></a>
		  </li>
		  <li class="<?php if($menu=="business_category"){ echo "active"; } ?>"><a class="<?php if($menu=="business_category"){ echo "active"; } ?>" href="<?php echo $ext; ?>business-category"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Business Category</span></a>
		  </li>
		  <li class="<?php if($menu=="business_type"){ echo "active"; } ?>"><a class="<?php if($menu=="business_type"){ echo "active"; } ?>" href="<?php echo $ext; ?>business-type"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Business Type</span></a>
		  </li>
		  <li class="<?php if($menu=="city"){ echo "active"; } ?>"><a class="<?php if($menu=="city"){ echo "active"; } ?>" href="<?php echo $ext; ?>city"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">City</span></a>
		  </li>
		  <li class="<?php if($menu=="followup_type"){ echo "active"; } ?>"><a class="<?php if($menu=="followup_type"){ echo "active"; } ?>" href="<?php echo $ext; ?>followup-type"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Followup Type</span></a>
		  </li>
		  <li class="<?php if($menu=="lead_source"){ echo "active"; } ?>"><a class="<?php if($menu=="lead_source"){ echo "active"; } ?>" href="<?php echo $ext; ?>lead-source"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Lead Source</span></a>
		  </li>
		  <li class="<?php if($menu=="software_company"){ echo "active"; } ?>"><a class="<?php if($menu=="software_company"){ echo "active"; } ?>" href="<?php echo $ext; ?>software-company"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Software Company</span></a>
		  </li>
		  <li class="<?php if($menu=="software_version"){ echo "active"; } ?>"><a class="<?php if($menu=="software_version"){ echo "active"; } ?>" href="<?php echo $ext; ?>software-version"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Software Version</span></a>
		  </li>
		  <li class="<?php if($menu=="partner"){ echo "active"; } ?>"><a class="<?php if($menu=="partner"){ echo "active"; } ?>" href="<?php echo $ext; ?>partner"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Partner</span></a>
		  </li>
		  <li class="<?php if($menu=="tickets"){ echo "active"; } ?>"><a class="<?php if($menu=="tickets"){ echo "active"; } ?>" href="<?php echo $ext; ?>tickets"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Tickets</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Attendence</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="manage_presenty"){ echo "active"; } ?>"><a class="<?php if($menu=="manage_presenty"){ echo "active"; } ?>" href="<?php echo $ext; ?>manage-presenty"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Manage Presenty</span></a>
		  </li>
		  <li class="<?php if($menu=="manage_absenty"){ echo "active"; } ?>"><a class="<?php if($menu=="manage_absenty"){ echo "active"; } ?>" href="<?php echo $ext; ?>manage-absenty"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Manage Absenty</span></a>
		  </li>
		  <li class="<?php if($menu=="leave_application"){ echo "active"; } ?>"><a class="<?php if($menu=="leave_application"){ echo "active"; } ?>" href="<?php echo $ext; ?>leave-applications"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Leave Applications</span></a>
		  </li>
		  
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Inquiry</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_inq"){ echo "active"; } ?>"><a class="<?php if($menu=="add_inq"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-inquiry"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Inquiry</span></a>
		  </li>
		  <li class="<?php if($menu=="all_inq"){ echo "active"; } ?>"><a class="<?php if($menu=="all_inq"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-inquiries"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Inquiries</span></a>
		  </li>
		  
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Tickets</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_ticket"){ echo "active"; } ?>"><a class="<?php if($menu=="add_ticket"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-ticket"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Ticket</span></a>
		  </li>
		  <li class="<?php if($menu=="all_ticket"){ echo "active"; } ?>"><a class="<?php if($menu=="all_ticket"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-tickets"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Tickets</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Supports</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_support"){ echo "active"; } ?>"><a class="<?php if($menu=="add_support"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-support"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Support</span></a>
		  </li>
		  <li class="<?php if($menu=="all_support"){ echo "active"; } ?>"><a class="<?php if($menu=="all_support"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-supports"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Supports</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Clients</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_client"){ echo "active"; } ?>"><a class="<?php if($menu=="add_client"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-client"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Clients</span></a>
		  </li>
		  <li class="<?php if($menu=="all_client"){ echo "active"; } ?>"><a class="<?php if($menu=="all_client"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-clients"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Clients</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Staffs</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_staff"){ echo "active"; } ?>"><a class="<?php if($menu=="add_staff"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-staff"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Staffs</span></a>
		  </li>
		  <li class="<?php if($menu=="all_staff"){ echo "active"; } ?>"><a class="<?php if($menu=="all_staff"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-staffs"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Staffs</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Quotation</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_quotation"){ echo "active"; } ?>"><a class="<?php if($menu=="add_quotation"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-quotation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Quotation</span></a>
		  </li>
		  <li class="<?php if($menu=="all_quotation"){ echo "active"; } ?>"><a class="<?php if($menu=="all_quotation"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-quotation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Quotation</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Invoice</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_invoice"){ echo "active"; } ?>"><a class="<?php if($menu=="add_invoice"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-invoice"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Invoice</span></a>
		  </li>
		  <li class="<?php if($menu=="all_invoice"){ echo "active"; } ?>"><a class="<?php if($menu=="all_invoice"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-invoice"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Invoice</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Trainings</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_training"){ echo "active"; } ?>"><a class="<?php if($menu=="add_training"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-training"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Training</span></a>
		  </li>
		  <li class="<?php if($menu=="all_training"){ echo "active"; } ?>"><a class="<?php if($menu=="all_training"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-training"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Trainings</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Visits</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_visit"){ echo "active"; } ?>"><a class="<?php if($menu=="add_visit"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-visit"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Visit</span></a>
		  </li>
		  <li class="<?php if($menu=="all_visit"){ echo "active"; } ?>"><a class="<?php if($menu=="all_visit"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-visit"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Visits</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Demo</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_demo"){ echo "active"; } ?>"><a class="<?php if($menu=="add_demo"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-demo"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Demo</span></a>
		  </li>
		  <li class="<?php if($menu=="all_demo"){ echo "active"; } ?>"><a class="<?php if($menu=="all_demo"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-demo"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Demo</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Installation</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_installation"){ echo "active"; } ?>"><a class="<?php if($menu=="add_installation"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-installation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Installation</span></a>
		  </li>
		  <li class="<?php if($menu=="all_installation"){ echo "active"; } ?>"><a class="<?php if($menu=="all_installation"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-installation"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Installation</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="<?php if($menu=="product"){ echo "active"; } ?> bold"><a class="<?php if($menu=="product"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>manage-product"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Manage Products</span></a>
	</li>
	<li class="<?php if($menu=="followup"){ echo "active"; } ?> bold"><a class="<?php if($menu=="followup"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>manage-followup"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Manage Followup</span></a>
	</li>
	<li class="<?php if($menu=="transaction"){ echo "active"; } ?> bold"><a class="<?php if($menu=="transaction"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>manage-transactions"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Manage Transactions</span></a>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Salary</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="pay_salary"){ echo "active"; } ?>"><a class="<?php if($menu=="pay_salary"){ echo "active"; } ?>" href="<?php echo $ext; ?>pay-salary"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Pay Salary</span></a>
		  </li>
		  <li class="<?php if($menu=="all_salary"){ echo "active"; } ?>"><a class="<?php if($menu=="all_salary"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-salary"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Paid Salary</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="<?php if($menu=="feedback"){ echo "active"; } ?> bold"><a class="<?php if($menu=="feedback"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>manage-feedback"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Feedbacks</span></a>
	</li>
	<?php
	if($_SESSION['admin_type']=="Primary"){
		?>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Manage Admin</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="add_admin"){ echo "active"; } ?>"><a class="<?php if($menu=="add_admin"){ echo "active"; } ?>" href="<?php echo $ext; ?>add-admin"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Admin</span></a>
		  </li>
		  <li class="<?php if($menu=="all_admin"){ echo "active"; } ?>"><a class="<?php if($menu=="all_admin"){ echo "active"; } ?>" href="<?php echo $ext; ?>all-admin"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">List of Admins</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Setting</span></a>
	  <div class="collapsible-body">
		<ul class="collapsible collapsible-sub" data-collapsible="accordion">
		  <li class="<?php if($menu=="logo"){ echo "active"; } ?>"><a class="<?php if($menu=="logo"){ echo "active"; } ?>" href="<?php echo $ext; ?>change-logo"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Change Logo</span></a>
		  </li>
		  <li class="<?php if($menu=="office"){ echo "active"; } ?>"><a class="<?php if($menu=="office"){ echo "active"; } ?>" href="<?php echo $ext; ?>office-info"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Change Office Info</span></a>
		  </li>
		  <li class="<?php if($menu=="sms"){ echo "active"; } ?>"><a class="<?php if($menu=="sms"){ echo "active"; } ?>" href="<?php echo $ext; ?>sms-api"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Change SMS API</span></a>
		  </li>
		  <li class="<?php if($menu=="email"){ echo "active"; } ?>"><a class="<?php if($menu=="email"){ echo "active"; } ?>" href="<?php echo $ext; ?>email-setting"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">Change Email Setting</span></a>
		  </li>
		</ul>
	  </div>
	</li>
	<?php
	}
	?>
	
	<li class="<?php if($menu=="all_sms"){ echo "active"; } ?> bold"><a class="<?php if($menu=="all_sms"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>sms-reports"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">SMS Reports</span></a>
	</li>
	<li class="<?php if($menu=="all_email"){ echo "active"; } ?> bold"><a class="<?php if($menu=="all_email"){ echo "active"; } ?> waves-effect waves-cyan " href="<?php echo $ext; ?>email-reports"><i class="material-icons">chat_bubble_outline</i><span class="menu-title" data-i18n="Chat">Email Reports</span></a>
	</li>
	
	
	
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->