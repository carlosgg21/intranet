<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>INTRANET</title>
    {{-- <title>{{ config('app.name') }} - @yield('title')</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />


    <!-- Bootstrap Css -->
    {{--
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons Css -->
    {{--
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <!-- App Css-->
    {{--
    <link href="assets/css/app.css" id="app-style" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <style>
        .required-field {
            color: red;
        }

        body[data-topbar=colored] #page-topbar {
            background-color: #0174BB !important;
        }
    </style>

    @yield('css')

</head>

<body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">
    <div id="layout-wrapper">    
        @include('include.header')
        @include('include.topnav')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="container text-right">
                                @if (session('success'))
                                <div class="alert alert-success js-alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                    
                                @if ($errors->any())
                                <div class="alert alert-danger js-alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    @include('include.script')
    @yield('js')
    <script>
        window.addEventListener('load', function() {
            var alerts = document.querySelectorAll('.js-alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.opacity = 0;
                    alert.style.transition = 'opacity 0.5s, visibility 0.5s';
                    alert.style.visibility = 'hidden';

             
                    setTimeout(function() {
                        alert.remove(); 
                    }, 500); 
                }, 3000);
            });
        });
    </script>
</body>

</html>