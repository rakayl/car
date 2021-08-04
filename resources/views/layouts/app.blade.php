@php
$routename = Route::currentRouteName();
@endphp

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<!-- begin::Head -->

<head>

	<!--begin::Base Path (base relative path for assets of this page) -->
	<title>Test</title>
	<!--end::Base Path -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Basic datatables examples">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Fonts -->
	<style>
		.kt-aside--minimize .kt-aside__brand .kt-aside__brand-logo svg {
			display: none;
		}
		.kt-header .kt-header__topbar .kt-header__topbar-item .kt-header__topbar-icon svg g [fill] {
			fill: #5d78ff!important;
		}
		hr {
			border: 0;
			clear:both;
			display:block;
			width: 100%;
			background-color:#ecf0f1;
			height: 1px;
		}
	</style>
	@stack('css')

	<!--end::Page Vendors Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="{{ asset('assets/vendors/global/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="{{ asset('assets/css/demo1/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/demo1/skins/header/menu/dark.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" />

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="{{ asset('assets/maskotv.png') }}" /> 
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
	class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="{{ url('/') }}">
				<!--<img alt="Logo" src="{{ asset('assets/logo_landscape_min_white.png') }}" height="35px">-->
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
				id="kt_aside_mobile_toggler"><span></span></button>
			{{-- <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button> --}}
			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
					class="flaticon-more"></i></button>
		</div>
	</div>

	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">

				<!-- begin:: Aside -->
				<div class="kt-aside__brand kt-grid__item text-center" id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="{{ url('/') }}">
							<img alt="Logo" src="{{ asset('assets/maskotv.png') }}" height="50px">
						</a>
					</div>
					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero"
											transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
										<path
											d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
									</g>
								</svg></span>
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" />
										<path
											d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
									</g>
								</svg></span>
						</button>

						<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
					</div>
				</div>

				<!-- end:: Aside -->

				<!-- begin:: Aside Menu -->
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">
						<ul class="kt-menu__nav ">
							<li class="kt-menu__item {{ (strpos($routename, 'home')!== false) ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
								<a href="{{ url('home') }}" class="kt-menu__link ">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" id="Combined-Shape" fill="#000000"/>
                                                                                    </g>
                                                                                </svg>
									</span>
									<span class="kt-menu__link-text">Home</span>
								</a>
							</li>
							<li class="kt-menu__item {{ (strpos($routename, 'kategori')!== false) ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
								<a href="{{ url('kategori') }}" class="kt-menu__link ">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                                                        <polygon id="Rectangle" fill="#000000" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
                                                                                        <path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" id="Combined-Shape" fill="#000000"/>
                                                                                    </g>
                                                                                </svg>
									</span>
									<span class="kt-menu__link-text">Kategori</span>
								</a>
							</li>
							<li class="kt-menu__item {{ (strpos($routename, 'transaksi')!== false) ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
								<a href="{{ url('transaksi') }}" class="kt-menu__link ">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" id="Combined-Shape-Copy" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" id="Combined-Shape" fill="#000000"/>
                                                                                    </g>
                                                                                </svg>
									</span>
									<span class="kt-menu__link-text">Transaksi</span>
								</a>
							</li>
							</ul>
					</div>
				</div>

				<!-- end:: Aside Menu -->
			</div>

			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

					<!-- begin:: Header Menu -->
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn">
						<i class="la la-close"></i>
					</button>
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						{{-- @if(Session::get('name')) --}}
						<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
<!--							<ul class="kt-menu__nav ">
								<li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
									<a class="kt-menu__link kt-menu__toggle">
										<span class="kt-menu__link-text">F1 : Kasir</span>
									</a>
								</li>
								<li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
									<a class="kt-menu__link kt-menu__toggle">
										<span class="kt-menu__link-text">F2 : Order</span>
									</a>
								</li>
							</ul>-->
						</div>
						{{-- @endif --}}
					</div>
					<!-- end:: Header Menu -->

					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">
							<div class="kt-header__topbar-item dropdown">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
									{{-- <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24" />
												<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
												<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000" />
											</g>
										</svg> 
										<span class="kt-pulse__ring"></span>
									</span> --}}

								</div>
								{{-- <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
									<form>

										<!--begin: Head -->
										<div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(./assets/media/misc/bg-1.jpg)">
											<h3 class="kt-head__title">
												Notifications
											</h3>
											<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
												<li class="nav-item">
													<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_izin" role="tab" aria-selected="true">Izin</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#topbar_notifications_dinas_luar" role="tab" aria-selected="false">Dinas Luar</a>
												</li>
												
											</ul>
										</div>

										<!--end: Head -->
										<div class="tab-content">
											<div class="tab-pane active show" id="topbar_notifications_izin" role="tabpanel">
												<div id="izin" class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
													<div id="data-izin">
													</div>
												</div>
											</div>
											<div class="tab-pane" id="topbar_notifications_dinas_luar" role="tabpanel">
												<div id="dinas" class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
													<div id="data-dinas">
													</div>
												</div>
											</div>
											
										</div>
									</form>
								</div> --}}
							</div>
						<!--begin: User Bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
								<div class="kt-header__topbar-user">
									<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
									<span
										class="kt-header__topbar-username kt-hidden-mobile">
											{{Auth::user()->name}}
										</span>
									<img class="kt-hidden" alt="Pic" src="{{ asset('assets/media/users/300_25.jpg') }}" />

									<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
									<span
										class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
										{{substr(Auth::user()->name, 0, 1)}}
										</span>
								</div>
							</div>
							<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

								<!--begin: Head -->
								<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
									style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
									<div class="kt-user-card__avatar">
										<img class="kt-hidden" alt="Pic" src="{{ asset('/assets/media/users/300_25.jpg') }}" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{substr(Auth::user()->name, 0, 1)}}</span>
									</div>
									<div class="kt-user-card__name">
										{{ Auth::user()->name }}
									</div>
									<!-- <div class="kt-user-card__badge">
											<span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
										</div> -->
								</div>

								<!--end: Head -->

								<!--begin: Navigation -->
								<div class="kt-notification">
										{{-- <a href="" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-calendar-3 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Profil
												</div>
												<div class="kt-notification__item-time">
													Setting akun dan lain-lain
												</div>
											</div>
										</a> --}}
									
									<div class="kt-notification__custom kt-space-between pull-right">
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();document.getElementById('logout-form').submit();"
											class="btn btn-label btn-label-brand btn-sm btn-bold">Logout</a>
										<!-- <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
									</div>
									<form id="logout-form" action="{{ route('logout') }}" method="POST"
										style="display: none;">
										@csrf
									</form>
								</div>

								<!--end: Navigation -->
							</div>
						</div>

						<!--end: User Bar -->
					</div>

					<!-- end:: Header Topbar -->
				</div>

				<!-- end:: Header -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

					@yield('content')
					
					<!-- end:: Content -->
				</div>

				<!-- begin:: Footer -->
				<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
					<div class="kt-footer__copyright">
						{{date('Y')}}&nbsp;&copy;&nbsp;<a href="https://github.com/rakayl" target="_blank"
							class="kt-link">Raka Yulian Listiyanto</a>
					</div>
				</div>

				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->

	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
	</div>
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": [
						"#c5cbe3",
						"#a1a8c3",
						"#3d4465",
						"#3e4466"
					],
					"shape": [
						"#f0f3ff",
						"#d9dffa",
						"#afb4d4",
						"#646c9a"
					]
				}
			}
		};
	</script>
	<script src="{{ asset('assets/vendors/global/vendors.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/demo1/scripts.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/lightbox.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap-datepicker.id.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/custom/moment/moment-with-locales.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
		$('.rupiah').inputmask("decimal", {
			prefix: '',
			radixPoint: '',
			groupSeparator: '.',
			autoGroup: true,
			placeholder: '0',
			rightAlign: false,
			greedy: false,
			autoUnmask: true,
			removeMaskOnSubmit: true,
			clearMaskOnLostFocus: true,
			// showMaskOnHover: false

		});
		$('.rupiah2').inputmask("decimal", {
			prefix: '',
			radixPoint: '',
			groupSeparator: '.',
			autoGroup: true,
			placeholder: '0',
			rightAlign: false,
			greedy: false,
			autoUnmask: true,
			removeMaskOnSubmit: true,
			clearMaskOnLostFocus: false,
			// showMaskOnHover: false

		});
		$('.persen').inputmask("decimal", {
			min:0, 
			max:100,
			prefix: '',
			radixPoint: ',',
			groupSeparator: '.',
			autoGroup: true,
			placeholder: '0',
			rightAlign: false,
			autoUnmask: true,
			removeMaskOnSubmit: true,
			clearMaskOnLostFocus: true,	
		});
		function angka(rupiah) {
			return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''));
		}
		function formatRupiah(jumlah) {
			var jumlah = jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
			return "Rp. " + jumlah;
		}
		
	</script>

	<!--end::Page Scripts -->
	@stack('js')
</body>

<!-- end::Body -->

</html>