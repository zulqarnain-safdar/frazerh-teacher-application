<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>teacher4.me</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    @stack('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/components.css') }}">
    @notifyCss
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/custom.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('frontend/image/favicon.ico') }}">

    <style>
        .main-sidebar
        {
            margin-top: 70px;
        }
        .navbar-bg
        {
            background-color: #6b8ea4;
            z-index: 900;
            display: flex;
            align-items: center;
            color: #fff;
            justify-content:space-between;
        }

        .admin-dashboard-text
        {
            padding: 15px 60px;
            background-color: #586e82;
            border-radius: 20px;
            font-weight: 700;
        }

        .theme-white .navbar
        {
            background-color: #6b8ea4;
        }

        .main-sidebar {
            background-color: #227fbb;
           
        }

        .main-sidebar .sidebar-menu{
            margin-top: 28px;
           
        }
        .main-sidebar .sidebar-menu li.active span{
            background-color: #e29823;
            text-transform: uppercase;
           
        }

        .main-sidebar li span{
            padding: 15px 60px;
            background-color: #586e82;
            border-radius: 20px;
            font-weight: 800;
            color: #fff;
        }

        
        .card-statistic-4
        {
            padding-bottom: 24px !important;
        }
    </style>

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.head')

            @include('layouts.sidebar')

            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.main-footer')
        </div>

    </div>
    <!-- General JS Scripts -->
    <script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

    @stack('scripts')

    <!-- JS Libraies -->
    <script src="{{ URL::asset('theme-assets/js/scripts.js') }}"></script>

    <script src="{{ URL::asset('theme-assets/js/jquery.validate.min.js') }}"></script>
    <x:notify-messages />
    @notifyJs
    <!-- Custom JS File -->
    <script src="{{ URL::asset('theme-assets/js/custom.js') }}"></script>



</body>

</html>
