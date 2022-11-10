<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @stack('custom-css')
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('frontend/image/favicon.ico') }}">
    <title>Teacher4.me</title>
    <style>
        .button-text-f9fbfc {
            background-color: #f9fbfc;
            padding: 0px 82px 0px 0px;
            border-radius: 25px;
            color: black;
            font-weight: 600;
        }
        @media (max-width: 576px) {
            .button-text-f9fbfc {
                font-size: 12px;
            }
            h4{
                font-size: 12px;
            }
            h5{
                font-size: 14px;
            }
            h2{
                font-size: 18px;
            }
            .box1 {
                margin-top:20px;
            }
            .font-10{
                font-size:10px;
            }
            .text-right
            {
                text-align: center !important;
                margin-right: unset;
            }
            p{
                font-size: 15px;
            }
            .headline
            {
                margin-top: 20px;
            }
            span
            {
                font-size: 10px;
            }
            .email-text{
                font-size: 18px !important;
            }
            .package-div a {
            font-size: 14px !important;
            }
            .booking-div a {
            font-size: 14px !important;
            }
        }
    </style>
</head>

<body>
    <section class="top-nav">
        <nav class="navbar navbar-light bg-light" style=" background-color: #fff !important;">
            <div class="container-fluid">

                <div  style="display: flex;">
                    <div class="button-text-f9fbfc">
                        <img src="{{ URL::asset('frontend/image/logo.png') }}" height="72" alt="">
                        <a><b>Teacher4.me/{{ $profile->profile_name }}</b></a>
                    </div>
                </div>

            </div>
        </nav>
    </section>
