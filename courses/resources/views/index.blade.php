<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title> @if(View::hasSection('title')) {{$title}} @else ND Manager @endif </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/argon-dashboard.css?v=2.0.4') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('toast/toast.css') }}">
    <script src="{{ asset('toast/toast.js') }}"></script>
    <style>
        .dt-buttons {
            /*float: right !important;*/
            margin-right: 10px !important;
        }
        .dt-button {
            background: none !important;
            border-radius: 10px !important;
            box-shadow: 0 4px 6px rgb(50 50 93 / 10%), 0 1px 3px rgb(0 0 0 / 8%);
            transition: 0.3s all ease-in-out;
            background: transparent !important;
            border: none !important;

        }
        .dt-button:hover {
            border: none !important;
            transform: translateY(-1.5px);
        }
        .form-select {
            width: 65px !important;
        }
        #example_length {
            float: left;
        }
        .page-item {
            color: #000000 !important;
        }
        .page-item.active > a{
            color: #ffffff !important;
        }
        .not-export {
            text-align: center;
        }
    </style>

</head>
<body class="g-sidenav-show bg-gray-100">
{{--    @include('layouts.preloader')--}}
    <div id="toastt"></div>
    <div class="min-height-300 bg-secondary position-absolute w-100"></div>
    @include('layouts.sideabar')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.navbar')
        @yield('content', view('dashboard'))
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">            </script>
    <script src="{{ asset('js/plugins/main.js') }}"></script>
    <script src="{{ asset('js/plugins/validate.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">                </script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js">            </script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js">  </script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js">  </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">              </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">         </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">           </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js">             </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">             </script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

    @stack('validate')
    @stack('datatable')
</body>

</html>
