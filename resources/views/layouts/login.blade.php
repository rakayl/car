<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

	<!-- begin::Head -->
	<head>

		<meta charset="utf-8" />
		<title>{{ env('APP_NAME') }}</title>
		<meta name="description" content="Login {{ env('APP_NAME') }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="{{ asset('assets/css/demo1/pages/custom/general/login/login-2.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('assets/vendors/global/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="{{ asset('assets/css/demo1/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/demo1/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ asset('assets/maskotv.png') }}"/> 
        <style>
            .kt-login.kt-login--v2 .kt-login__wrapper .kt-login__container .kt-form .form-control{
                /* background:#fff; */
                color:#fff;
            }
			body{
				/* Rectangle 239 */
				/* background: linear-gradient(149.93deg, #3AAF9F 6.86%, #2EAE77 94.37%); */
			}
			@media (max-width: 768px)
			.kt-login.kt-login--v2 .kt-login__wrapper .kt-login__container .kt-form .form-control {
				background: rgba(232,240,254)!important;
			}
			.kt-login.kt-login--v2 .kt-login__wrapper .kt-login__container .kt-form .form-control {
				background: rgba(232,240,254)!important;
				color :#000!important;
			}
			::-webkit-input-placeholder { /* WebKit, Blink, Edge */
				color:    #999!important;
			}
			:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
				color:    #999!important;
				opacity:  1;
			}
			::-moz-placeholder { /* Mozilla Firefox 19+ */
				color:    #999!important;
				opacity:  1;
			}
			:-ms-input-placeholder { /* Internet Explorer 10-11 */
				color:    #999!important;
			}
			::-ms-input-placeholder { /* Microsoft Edge */
				color:    #999!important;
			}
			::placeholder { /* Most modern browsers support this now. */
				color:    #999!important;
			}
        </style>
		@stack('css')

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
            @yield('content')

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
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
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('assets/vendors/global/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/demo1/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<!-- <script src="{{ asset('assets/js/demo1/pages/login/login-general.js') }}" type="text/javascript"></script> -->
        <script type="text/javascript" >
            var login = $('#kt_login');

            var displaySignInForm = function() {
                login.removeClass('kt-login--forgot');
                login.removeClass('kt-login--signup');

                login.addClass('kt-login--signin');
                KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
                //login.find('.kt-login__signin').animateClass('flipInX animated');
            }
            var displayForgotForm = function() {
                login.removeClass('kt-login--signin');
                login.removeClass('kt-login--signup');

                login.addClass('kt-login--forgot');
                //login.find('.kt-login--forgot').animateClass('flipInX animated');
                KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');
            }
            $('#kt_login_forgot').click(function(e) {
                e.preventDefault();
                displayForgotForm();
            });
             $('#kt_login_forgot_cancel').click(function(e) {
                e.preventDefault();
                displaySignInForm();
            });
        </script>
		@stack('js')

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
