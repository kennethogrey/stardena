<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="./">

        <title>Form - Stardena</title>

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
        <!-- <link href="{{ asset('panel/css/coreui-chartjs.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('panel/css/simplebar.css') }}" rel="stylesheet">

        <link href="{{ asset('panel/icons/css/flag.min.css') }}" rel="stylesheet">
        @livewireStyles
        {{--@vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-center">
                            <div class="sidebar-brand-full" width="78" height="50" alt="CoreUI Logo">
                                <img src="{{ getLogoUrl() }}" alt="Stardena" width="auto" height="30">
                            </div>
                        </div><br>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
