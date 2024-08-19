<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="./">

        <title>@yield('title')</title>

        <link rel="icon" type="image/png" href="{{ getFaviconUrl() }}"/>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ getFaviconUrl() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ getFaviconUrl() }}">

        <link rel="icon" type="image/png" sizes="192x192" href="{{ getFaviconUrl() }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ getFaviconUrl() }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ getFaviconUrl() }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ getFaviconUrl() }}">

        <link rel="manifest" href="{{ asset('panel/assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ getFaviconUrl() }}">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="{{ asset('panel/css/vendors/simplebar.css') }}">
        <!-- Main styles for this application-->
        <link href="{{ asset('panel/css/style.css') }}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="{{ asset('panel/css/examples.css') }}" rel="stylesheet">
        <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
        <link href="{{ asset('panel/css/ads.css') }}" rel="stylesheet">
        <script src="{{ asset('panel/js/config.js') }}"></script>
        <script src="{{ asset('panel/js/color-modes.js') }}"></script>
        <link href="{{ asset('panel/css/coreui-chartjs.css') }}" rel="stylesheet">
        <link href="{{ asset('panel/css/simplebar.css') }}" rel="stylesheet">
        <link href="{{ asset('panel/icons/css/flag.min.css') }}" rel="stylesheet">

        <link href="{{ asset('panel/chartjs/dist/css/coreui-chartjs.css') }}" rel="stylesheet">
        @livewireStyles
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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


    </head>
    <body>
        @persist('nav')
            <livewire:layout.navigation />
            <div class="wrapper d-flex flex-column min-vh-100">
                <livewire:layout.header />
                @yield('content')
                
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
                </div>
                <footer class="footer px-4">
                    <div>
                        {{ __('Version: 1.0.0') }}
                    </div>
                    <div class="ms-auto"><a href="https://stardena.com">
                        <img src="{{ getLogoUrl() }}" alt="Stardena" width="100" height="32"></a> 
                    </div>
                </footer>
            </div>
        @endpersist
        @php
            $previousUrl = url()->previous();
            $previousRouteName = app('router')->getRoutes()->match(app('request')->create($previousUrl))->getName();
        @endphp
        @if ($previousRouteName == 'login')
            <script>
                setTimeout(function() {
                    location.reload();
                }, 1000);
            </script>
        @endif
        <script src="{{ asset('panel/js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('panel/js/simplebar.min.js') }}"></script>
        <script>
            const header = document.querySelector('header.header');
            document.addEventListener('scroll', () => {
                if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
                }
            });
        </script>
        <script src="{{ asset('panel/chart.js/dist/chart.umd.js') }}"></script>
        <script src="{{ asset('panel/chartjs/dist/js/coreui-chartjs.js') }}"></script>
        <script src="{{ asset('panel/utils/dist/umd/index.js') }}"></script>
        <script src="{{ asset('panel/js/main.js') }}"></script>
        
        @livewireScripts
    </body>
</html>
