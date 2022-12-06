<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title> @if(View::hasSection('title')) @yield('title') @else ND Manager @endif </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/argon-dashboard.css?v=2.0.4') }}">
</head>
<body class="g-sidenav-show bg-gray-100">
{{--    @include('layouts.preloader')--}}
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('layouts.sideabar')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.navbar')
        @yield('content', view('dashboard'))
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/plugins/main.js') }}"></script>
    <script src="{{ asset('js/plugins/validate.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('js/argon-dashboard.min.js?v=2.0.4') }}"></script>

    @stack('validate')
</body>

</html>
