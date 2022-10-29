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
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('frontend/image/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Teacher4.me</title>
    <style>
        .has-search {
            width: 418px;
        }

        /* input {
            background-color: #f2f2f2 !important;
        } */

        .has-search .form-control-feedback {
            position: absolute;
            left: 400px;
            top: 23px;
            z-index: -1;
            display: block;
            line-height: 3.9rem;
            color: black;
        }

        .fa-search:before {
            font-size: 32px;
        }

        .header-search {
            height: 68px !important;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <section class="top-nav">
        <nav class="navbar navbar-light bg-light" style=" background-color: #6b8ea4 !important;">
            <div class="container-fluid">
                <form action="" id="teacherProfileSearchForm" method="POST">
                    @csrf
                    <div class="navbar-brand">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" name="teacher_name" value="{{ isset($teacher_name) ? $teacher_name : '' }}" id="teacherProfileSearch" autocomplete="off" class="form-control header-search" id="search"
                                placeholder="Search">
                        </div>
                    </div>
                </form>
                @if (!Auth::check())
                    <a href="/login" class="btn login-button"> LOG IN </a>
                @endif
                @if (Auth::check())
                    <a href="{{ auth()->user()->account_type == 'Free' || auth()->user()->account_type == 'Unpaid' ? '/free-dashboard' : '/premium-dashboard' }}"
                        class="btn login-button"> DASHBOARD </a>
                @endif
            </div>
        </nav>
    </section>
