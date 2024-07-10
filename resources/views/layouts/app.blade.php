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
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('panel/assets/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('panel/assets/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('panel/assets/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('panel/assets/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('panel/assets/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('panel/assets/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('panel/assets/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('panel/assets/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('panel/assets/favicon/apple-icon-180x180.png') }}">

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
        <!-- <link href="{{ asset('panel/css/coreui-chartjs.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('panel/css/simplebar.css') }}" rel="stylesheet">
        <link href="{{ asset('panel/icons/css/flag.min.css') }}" rel="stylesheet">
        @livewireStyles
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    </head>
    <body>
        @persist('nav')
            <livewire:layout.navigation />
            <div class="wrapper d-flex flex-column min-vh-100">
                <livewire:layout.header />
                @yield('content')
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
        <script src="{{ asset('panel/js/main.js') }}"></script>
        @livewireScripts
    </body>
</html>
