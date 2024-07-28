<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="The Best Software Development Company Uganda.">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="apple-touch-icon" href="{{ getFaviconUrl() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ getFaviconUrl() }}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/font-awesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/fonts/flaticon.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/animate.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/owl.carousel.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/slick.css')}}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/off-canvas.css')}}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/magnific-popup.css')}}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{asset('front/assets/css/rsmenu-main.css')}}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/rs-spacing.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/responsive.css')}}">

    <!-- Jquerry -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        .custom-swal-popup {
            font-size: 16px; /* Adjust font size as needed */
        }

        .custom-swal-title-error {
            color: red; /* Red color for the title */
            font-size: 20px; /* Increase font size */
        }

        .custom-swal-title-success {
            color: green; /* green color for the title */
            font-size: 20px; /* Increase font size */
        }

        .custom-swal-icon {
            width: 40px; /* Increase icon size */
            height: 40px; /* Increase icon size */
        }
    </style>

    @livewireStyles
</head>

<body class="defult-home">
    <div class="offwrap"></div>

    <!--Preloader area start here-->
    <div id="loader" class="loader">
        <div class="loader-container"></div>
    </div>
    <!--Preloader area End here-->
    
    <!--Full width header Start-->
    <div class="full-width-header">
        @include('landing-page.layout.navigation')
        <div class="content">
            @if (session('error'))
                <script>
                    $(document).ready(function() {
                        let title = '{{ session('error') }}';
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: title,
                            showConfirmButton: false,
                            timer: 5000,
                            toast: true,
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title-error',
                                icon: 'custom-swal-icon'
                            }
                        });
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                    $(document).ready(function() {
                        let title = '{{ session('success') }}';
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: title,
                            showConfirmButton: false,
                            timer: 5000,
                            toast: true,
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title-success',
                                icon: 'custom-swal-icon'
                            }
                        });
                    });
                </script>
            @endif

            @yield('content')
        </div>
    </div>
    @include('landing-page.layout.footer')

    <!-- modernizr js -->
    <script src="{{asset('front/assets/js/modernizr-2.8.3.min.js')}}"></script>
    <!-- jquery latest version -->
    <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <!-- Menu js -->
    <script src="{{asset('front/assets/js/rsmenu-main.js')}}"></script>
    <!-- op nav js -->
    <script src="{{asset('front/assets/js/jquery.nav.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('front/assets/js/wow.min.js')}}"></script>
    <!-- Skill bar js -->
    <script src="{{asset('front/assets/js/skill.bars.jquery.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- counter top js -->
    <script src="{{asset('front/assets/js/waypoints.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('front/assets/js/swiper.min.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('front/assets/js/particles.min.js')}}"></script>
    <!-- magnific popup js -->
    <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{asset('front/assets/js/plugins.js')}}"></script>
    <!-- pointer js -->
    <script src="{{asset('front/assets/js/pointer.js')}}"></script>
    <!-- contact form js -->
    <script src="{{asset('front/assets/js/contact.form.js')}}"></script>
    <!-- appointment form js -->
    <script src="{{asset('front/assets/js/appointment.form.js')}}"></script>
    <!-- shuffle js -->
    <script src="{{asset('front/assets/js/shuffle.min.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    @livewireScripts
</body>

</html>
