
<?php $dashboard_location = base_url().'dashboard/home';?>
<?php 
	$page = $this->uri->segment(1);
	$nPage = str_replace('_', ' ', $page);
?>

<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			WIKLAN | <?= ucwords($nPage) ?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="<?php echo base_url();?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?php echo base_url();?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendors/summernote/summernote.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/calendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico" rel="icon">

		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/jquery.fancybox.css">

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoUOdMzbYns5TcDrLZYMEuXhUGkV5QIoo&libraries=places"
        async defer></script>
        
		<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>

		<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
		<script src="<?=base_url('assets/videojs/video.js');?>"></script>


	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">

								

								<div class="m-stack__item m-stack__item--middle m-brand__logo">

									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<a href="index.html" class="m-brand__logo-wrapper">
										<!-- <img alt="" src="<?php echo base_url();?>assets/demo/default/media/img/logo/logo_default_dark.png"/> -->
										<img alt="<?= $dashboard_location ?>" src="<?php echo base_url(); ?>assets/images/logo_wiklan.png" width="112"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
					 ">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
			<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						

						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<!-- BEGIN: Horizontal Menu -->
						<!--	

							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-add"></i>
											<span class="m-menu__link-text">
												Actions
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-file"></i>
														<span class="m-menu__link-text">
															Create New Post
														</span>
													</a>
												</li>
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-diagram"></i>
														<span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Generate Reports
																</span>
																<span class="m-menu__link-badge">
																	<span class="m-badge m-badge--success">
																		2
																	</span>
																</span>
															</span>
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="#" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															Manage Orders
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Latest Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Pending Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Processed Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Delivery Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Payments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customers
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="#" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-chat-1"></i>
														<span class="m-menu__link-text">
															Customer Feedbacks
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customer Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Supplier Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reviewed Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Resolved Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Feedback Reports
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-users"></i>
														<span class="m-menu__link-text">
															Register Member
														</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-line-graph"></i>
											<span class="m-menu__link-text">
												Reports
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<div class="m-menu__subnav">
												<ul class="m-menu__content">
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Finance Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-map"></i>
																	<span class="m-menu__link-text">
																		Annual Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-user"></i>
																	<span class="m-menu__link-text">
																		HR Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-clipboard"></i>
																	<span class="m-menu__link-text">
																		IPO Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Finance Margins
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-2"></i>
																	<span class="m-menu__link-text">
																		Revenue Reports
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Project Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Coca Cola CRM
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Delta Airlines Booking Site
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Malibu Accounting
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Vineseed Website Rewamp
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Zircon Mobile App
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Mercury CMS
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																HR Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Client Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Salary Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Payslips
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Corporate Expenses
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Project Expenses
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Reporting Apps
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Adjusments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Sources & Mediums
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reporting Settings
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Conversions
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Flows
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Audit & Logs
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-paper-plane"></i>
											<span class="m-menu__link-title">
												<span class="m-menu__link-wrap">
													<span class="m-menu__link-text">
														Apps
													</span>
													<span class="m-menu__link-badge">
														<span class="m-badge m-badge--brand m-badge--wide">
															new
														</span>
													</span>
												</span>
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															eCommerce
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="crud/datatable_v1.html" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-computer"></i>
														<span class="m-menu__link-text">
															Audience
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-users"></i>
																	<span class="m-menu__link-text">
																		Active Users
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-interface-1"></i>
																	<span class="m-menu__link-text">
																		User Explorer
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-lifebuoy"></i>
																	<span class="m-menu__link-text">
																		Users Flows
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Market Segments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic"></i>
																	<span class="m-menu__link-text">
																		User Reports
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-map"></i>
														<span class="m-menu__link-text">
															Marketing
														</span>
													</a>
												</li>
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-graphic-2"></i>
														<span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Campaigns
																</span>
																<span class="m-menu__link-badge">
																	<span class="m-badge m-badge--success">
																		3
																	</span>
																</span>
															</span>
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="#" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-infinity"></i>
														<span class="m-menu__link-text">
															Cloud Manager
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-add"></i>
																	<span class="m-menu__link-title">
																		<span class="m-menu__link-wrap">
																			<span class="m-menu__link-text">
																				File Upload
																			</span>
																			<span class="m-menu__link-badge">
																				<span class="m-badge m-badge--danger">
																					3
																				</span>
																			</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-signs-1"></i>
																	<span class="m-menu__link-text">
																		File Attributes
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-folder"></i>
																	<span class="m-menu__link-text">
																		Folders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-cogwheel-2"></i>
																	<span class="m-menu__link-text">
																		System Settings
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						-->
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<!--
										<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															9 New
														</span>
														<span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alerts
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
																		Events
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
																		Logs
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																					<span class="m-list-timeline__text">
																						12 new users registered
																					</span>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System shutdown
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						14 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						New invoice received
																					</span>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						DB overloaded 80%
																						<span class="m-badge m-badge--info m-badge--wide">
																							settled
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						1 hr
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System error -
																						<a href="#" class="m-link">
																							Check
																						</a>
																					</span>
																					<span class="m-list-timeline__time">
																						2 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span href="" class="m-list-timeline__text">
																						New order received
																						<span class="m-badge m-badge--danger m-badge--wide">
																							urgent
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server down
																					</span>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server up
																					</span>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																					<a href="" class="m-list-timeline__text">
																						New invoice received
																					</a>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server up
																					</a>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						System shutdown
																					</a>
																					<span class="m-list-timeline__time">
																						11 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server down
																					</a>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Quick Actions
														</span>
														<span class="m-dropdown__header-subtitle">
															Shortcuts
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-file"></i>
																			<span class="m-nav-grid__text">
																				Generate Report
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-time"></i>
																			<span class="m-nav-grid__text">
																				Add New Event
																			</span>
																		</a>
																	</div>
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-folder"></i>
																			<span class="m-nav-grid__text">
																				Create New Task
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-clipboard"></i>
																			<span class="m-nav-grid__text">
																				Completed Tasks
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									-->
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?php echo base_url();?>assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
													Nick
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="<?php echo base_url();?>assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Mark Andre
																</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">
																	mark.andre@gmail.com
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Activity
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Messages
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			FAQ
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Support
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="<?php echo base_url();?>dvilsf/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  <?= ($this->uri->segment(1) == 'dashboard') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
								<a  href="<?php echo base_url();?>dashboard/home" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Landing Page
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<!-- <li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_daftar') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_daftar/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										Daftar Persil
									</span>
								</a>								
							</li> -->

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_kontak' || $this->uri->segment(1) == 'enquiry') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-support"></i>
									<span class="m-menu__link-text">
										Kontak
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Kontak
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'manage_kontak') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>manage_kontak/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Kontak
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'enquiry') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>enquiry/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Log Reply
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_akun') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_akun/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
										Daftar Akun
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_faq') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_faq/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-info"></i>
									<span class="m-menu__link-text">
										Daftar FAQs
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_subscribe' || $this->uri->segment(1) == 'loghistory') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-paper-plane"></i>
									<span class="m-menu__link-text">
										Subscribe
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Subscribe
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'manage_subscribe') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>manage_subscribe/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Subsriber
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'loghistory') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>loghistory/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Log Reply
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_galeri') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_galeri/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-squares-3"></i>
									<span class="m-menu__link-text">
										Daftar Galeri
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_banner') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_banner/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-web"></i>
									<span class="m-menu__link-text">
										Daftar Banner
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_ourClient') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_ourClient/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-app"></i>
									<span class="m-menu__link-text">
										Daftar Our Client
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_testimoni') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_testimoni/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-speech-bubble-1"></i>
									<span class="m-menu__link-text">
										Daftar Testimoni
									</span>
								</a>								
							</li>
							
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Marketplace
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_daftar') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_daftar/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										Daftar Persil
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_product') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_product/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-map-location"></i>
									<span class="m-menu__link-text">
										Daftar OOH
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'vendor') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>vendor/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-profile"></i>
									<span class="m-menu__link-text">
										Daftar Vendor
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'webpages') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>webpages/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-browser"></i>
									<span class="m-menu__link-text">
										CMS
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'calendar') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>calendar/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-calendar"></i>
									<span class="m-menu__link-text">
										Calendar
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'blog') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>blog/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Artikel
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_categories' || $this->uri->segment(1) == 'store_roads' || $this->uri->segment(1) == 'store_sizes' || $this->uri->segment(1) == 'store_labels' || $this->uri->segment(1) == 'store_provinces' || $this->uri->segment(1) == 'store_cities' || $this->uri->segment(1) == 'store_districs' || $this->uri->segment(1) == 'store_duration') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-squares-4"></i>
									<span class="m-menu__link-text">
										Kategori
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Kategori
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_categories') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_categories/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Produk
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_roads') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_roads/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Jalan
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_sizes') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_sizes/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Ukuran
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_labels') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_labels/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Label
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_duration') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_duration/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Durasi
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_provinces') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_provinces/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Provinsi
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_cities') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_cities/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kota/kabupaten
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_districs') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_districs/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kecamatan
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'enquiries') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>enquiries/inbox" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat-1"></i>
									<span class="m-menu__link-text">
										Enquiries
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'slideshow') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>slideshow/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-web"></i>
									<span class="m-menu__link-text">
										Slideshow
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'client') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>client/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-signs"></i>
									<span class="m-menu__link-text">
										Daftar Our Client
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'review') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>review/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat"></i>
									<span class="m-menu__link-text">
										Daftar Review
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_settings') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>store_settings/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-settings-1"></i>
									<span class="m-menu__link-text">
										Settings
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_orders') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>store_orders/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-business"></i>
									<span class="m-menu__link-text">
										Order
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'confirmation') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>confirmation/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-coins"></i>
									<span class="m-menu__link-text">
										Konfirmasi Pembayaran
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'bank') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>bank/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-piggy-bank"></i>
									<span class="m-menu__link-text">
										Bank
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'request') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>request" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-9"></i>
									<span class="m-menu__link-text">
										Request
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'notifications') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>notifications/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-alert"></i>
									<span class="m-menu__link-text">
										Notifikasi
									</span>
								</a>								
							</li>

							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_subscribe' || $this->uri->segment(1) == 'loghistory') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-analytics"></i>
									<span class="m-menu__link-text">
										Accounting
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Accounting
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'invoices') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>invoices/" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Invoice
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'tax') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>tax/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pajak
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-3"></i>
									<span class="m-menu__link-text">
										General
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													General
												</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pricing Tables
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v4
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-suitcase"></i>
									<span class="m-menu__link-text">
										Custom Pages
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Custom Pages
												</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													User Pages
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 4
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 5
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error Pages
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 4
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 5
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-6.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 6
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li> -->
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									<?= ucwords($nPage) ?>
								</h3>
							</div>
							<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<!--Begin::Section-->

						<?php
						if (isset($view_file)) {
							$this->load->view($view_module.'/'.$view_file);
						}
						?>

						<!--End::Section-->
					</div>
				</div>
			</div>
			<!-- end:: Body -->
<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<!-- <span class="m-footer__copyright">
								2017 &copy; Metronic theme by
								<a href="#" class="m-link">
									Keenthemes
								</a>
							</span> -->
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<!-- <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											About
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#"  class="m-nav__link">
										<span class="m-nav__link-text">
											Privacy
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											T&C
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											Purchase
										</span>
									</a>
								</li>
								<li class="m-nav__item m-nav__item">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    		       	    
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
		
		<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->
    	
		
		<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
	
		<script type="text/javascript" src="<?php echo base_url();?>assets/calendar/fullcalendar.min.js"></script>
		<script type="text/javascript">
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
            eventAfterRender: function(event, element, view) {
                if (event.type == 'fo') {
                    $(element).attr('data-toggle', 'ajaxModal').addClass('ajaxModal');
                }
            },
            eventSources: [
                {          
                    events: [
                                                {
                                title  : 'test',
                                start  : '2018-07-11',
                                end: '2018-07-20',
                                url: 'https://gitbench.com/demo/calendar/event/events/1',
                                type: 'fo',
                                color: '#c0392b'
                            },
                                                {
                                title  : 'test2',
                                start  : '2018-07-05',
                                end: '2018-07-14',
                                url: 'https://gitbench.com/demo/calendar/event/events/2',
                                type: 'fo',
                                color: ''
                            },
                                        ],
                    color: '#38354a',
                    textColor: 'white'
                }
            ]
        });
    });
</script>

		<script src="<?php echo base_url();?>assets/vendors/summernote/summernote.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/demo/default/custom/components/forms/widgets/summernote.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="<?php echo base_url();?>assets/app/js/dashboard.js" type="text/javascript"></script>

		<script src="<?php echo base_url();?>assets/demo/default/custom/components/datatables/base/<?= ($this->uri->segment(1) == 'manage_subscribe') ? 'html-table-check.js' : 'html-table.js' ?>" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script type="text/javascript" src="<?= base_url() ?>marketplace/js/jquery.fancybox.js"></script>
		
		<script type="text/javascript">
			$("[data-fancybox]").fancybox({
				// Options will go here
				infobar : false,
				buttons : false
			});
		</script>
		<script>
			$(document).ready(function() {
			  	$('#summernote').summernote({
			  		height: 150,
			  	});

			  	$('#provinsi').change(function(){
		    		$.post("<?php echo base_url();?>store_cities/get_city/"+$('#provinsi').val(),{},function(obj){
						$('#kota').html(obj);
		    		});
	    		});

	    		$('#kota').change(function(){
		    		$.post("<?php echo base_url();?>store_districs/get_distric/"+$('#kota').val(),{},function(obj){
						$('#kecamatan').html(obj);
		    		});
	    		});

			});
		</script>

<script>
	
let har_pers = document.getElementById('harga_target');
let pers = document.getElementById('per_cent');
let har_want = document.getElementById('harga_want');
let disk = document.getElementById('persen');
let dur = document.getElementById('durasi');
let targ = document.getElementById('harga_bayar');
let targ2 = document.getElementById('rec_price');


let getPercent = parseInt(har_pers.value) * (parseInt(pers.value) / 100);

targ2.value = convertToRupiah(parseInt(har_pers.value) + getPercent);

['change', 'keyup', 'cut'].forEach(event => pers.addEventListener(event, recom_price));

function recom_price(e) {
	let getPercent = parseInt(har_pers.value) * (parseInt(pers.value) / 100);

	targ2.value = convertToRupiah(parseInt(har_pers.value) + getPercent);

	console.log('berubah');

	e.preventDefault();
}


dur.addEventListener('change', function(e) {
	let dur_val = this.value;
	let harg_val = har_want.value;

	if (harg_val == '') {
		alert('tidak boleh kosong!');
	}

	// get price in month
	let pri = harg_val;
	let perMonth = parseInt(pri) / 12;
	let diss = parseInt(disk.value) / 100;
	let diskon = parseInt(pri) * diss;

	console.log(diskon);

	switch(dur_val) {
		case '1':
			ress = perMonth * 1;
		break;

		case '2':
			ress = perMonth * 2;
		break;

		case '3':
			ress = perMonth * 3;
		break;

		case '4':
			ress = perMonth * 4;
		break;

		case '6':
			ress = perMonth * 6;
		break;

		case '9':
			ress = perMonth * 9;
		break;

		default:
			ress = parseInt(pri) - diskon;
	}

	targ.innerHTML = convertToRupiah(ress);

})

let handler =()=> targ.innerHTML = 0;
['change', 'keyup', 'cut'].forEach(event => disk.addEventListener(event, handler));


function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return rupiah.split('',rupiah.length-1).reverse().join('');
}

</script>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/geocomplete/map.css">
		
<script src="<?= base_url() ?>assets/geocomplete/geocomplete.js"></script>

<script>
      // $(function(){
      //   $("#geocomplete").geocomplete({
      //     map: ".map_canvas",
      //     details: "form ",
      //     markerOptions: {
      //       draggable: true
      //     }
      //   });

        
      //   $("#geocomplete").bind("geocode:dragged", function(event, latLng){
      //     $("input[name=lat]").val(latLng.lat());
      //     $("input[name=lng]").val(latLng.lng());
      //     $("#reset").show();
      //   });
        
        
      //   $("#reset").click(function(){
      //     $("#geocomplete").geocomplete("resetMarker");
      //     $("#reset").hide();
      //     return false;
      //   });
        
      //   $("#find").click(function(){
      //     $("#geocomplete").trigger("geocode");
      //   }).click();
      // });
</script>

<script>
    $(function () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showLocation, showError,
                {
                    enableHighAccuracy: true,
                    timeout: 10000 // 10s
                    //maximumAge : 0
                }
            );
        }
        function showError(error) {
        	var x;
        	if(document.getElementById("alert")){
			    x = document.getElementById("alert");
			} 
            
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred.";
                    break;
            }
            $(x).show();

            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form ",
                markerOptions: {
             		draggable: true
         		}
            });

            $("#geocomplete").bind("geocode:dragged", function (event, latLng) {
                $("input[name=sr_lat]").val(latLng.lat());
                $("input[name=sr_lng]").val(latLng.lng());
                $("input[name=sr_address]").geocomplete("find", latLng.lat() + "," + latLng.lng()).val();
                $(this).geocomplete('marker')
                    .setOptions({position: latLng, map: $(this).geocomplete("map")});

                $("#reset,#sr_lat,#sr_lng").show();
            });

        }

        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            $("input[name=sr_lat]").val(latitude);
            $("input[name=sr_lng]").val(longitude);
            getAddress(latitude, longitude);
            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form ",
                location: [latitude, longitude],
                markerOptions: {
             		draggable: true
         		}

            });

            $("#geocomplete").bind("geocode:dragged", function (event, latLng) {
                $("input[name=sr_lat]").val(latLng.lat());
                $("input[name=sr_lng]").val(latLng.lng());
                $("input[name=sr_address]").geocomplete("find", latLng.lat() + "," + latLng.lng()).val();
                $(this).geocomplete('marker')
                    .setOptions({position: latLng, map: $(this).geocomplete("map")});

                $("#reset,#sr_lat,#sr_lng").show();
            });
        }

        function getAddress(myLatitude, myLongitude) {

            var geocoder = new google.maps.Geocoder();							// create a geocoder object
            var location = new google.maps.LatLng(myLatitude, myLongitude);		// turn coordinates into an object

            geocoder.geocode({'latLng': location}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {						// if geocode success
                    var ad = results[0].formatted_address;
                    $("input[name=sr_address]").val(ad);									// write address to field
                } else {
                    alert("Geocode failure: " + status);								// alert any other error(s)
                    return false;
                }
            });
        }

     

    });
</script>
<script>
	$('.note-editor > .note-editing-area > .note-handle').find('textarea').attr('name','mytextarea');
</script>

	</body>
	<!-- end::Body -->
</html>
