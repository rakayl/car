<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Test</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="{{ asset('assets/css/demo1/pages/custom/general/login/login-3.css') }}" rel="stylesheet" type="text/css" />

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
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading text-sm">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(./assets/boxed-bg.jpg);background-position: center;">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-portlet">

                            <div class="kt-portlet__body">
                                <div class="kt-login__logo" style="margin-bottom: 1rem;">
<!--                                    <a href="#">
                                        <img src="{{ asset('assets/logo_landscape_min.png') }}" height="100px">
                                    </a>-->
                                </div>
                                <hr>
                                <!--begin::Section-->
                                <div class="kt-section">
                                    <div class="kt-section__content">
                                        <div class="kt-login__signin">
                                            <div class="kt-login__head" style="margin-bottom: 0px;">
                                                <h3 class="kt-login__title">Register
                                                </h3>
                                            </div>
                                            <form class="kt-form" id="form">
                                                @csrf
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Name" name="name" id="name" autocomplete="off"autofocus>
                                               
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-control" type="email" placeholder="Email" name="email" id="email" autocomplete="off" autofocus>
                                                    
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-control" type="password" placeholder="Password" id="password" name="password">
                                                    
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-control" type="password" id="password-confirm" placeholder="Password Confirmasi" name="password-confirm">
                                                   
                                                </div>
                                                <div class="kt-align-right">
                                                    <a href="{{route('login')}}" id="kt_login_forgot"  class="kt_login_forgot">Masuk?</a>
                                                </div>
                                                <div class="kt-login__actions">
                                                    <button id="kt_login_signin_submit" class="btn btn-success btn-elevate kt-login__btn-primary btn-block">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--end::Section-->
                            </div>

                            <!--end::Form-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
       <script type="text/javascript">
        $(document).ready(function () {
              $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
             $("#form").on("submit", (function (e) {
            e.preventDefault();
            // var data = new FormData(this);
            KTApp.block('.kt-portlet', {message: 'Mohon Tunggu...'});
            var data = {
                'name': $("#name").val(),
                'email': $("#email").val(),
                'password': $("#password").val(),
                'password-confirm': $("#password-confirm").val(),
                
            }; 
            var type = "POST";
            var url = "{{ route('register.store') }}";
            $.ajax({
                 type: type,
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false,
                success: function (data) {
                    KTApp.unblock('.kt-portlet')
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if (obj.status) {
                        Swal.fire({
                            title: "Sukses",
                            text: obj.pesan,
                            icon: "success",
                            timer: 3000,
                            type: "success"
                        });
                      window.location.href = obj.url;
                    }else{
                        var error="";
                        $.each(obj.pesan, function(index, value) {
                            error+=value+"<br>";
                        });
                        Swal.fire({
                            title: "Gagal",
                            html: error,
                            type: "error"
                        });
                    }
                },
                error: function (data) {
                    KTApp.unblock('.kt-portlet')
                    Swal.fire({
                        title: "Gagal",
                        text: "Gagal menyimpan data.",
                        timer: 3000,
                        type: "error"
                    });
                }
            });
        }));
        });
    
    </script>
</body>

<!-- end::Body -->

</html>