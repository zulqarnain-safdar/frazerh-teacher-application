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
    <meta property="og:title" content="TEACHER4.ME" />
    <meta property="og:description" content="We Match Students with Online Teachers" />
    <meta property="og:url" content="https://www.teacher4.me" />
    <meta property="og:image" content="{{ asset('frontend/image/placeholder.png') }}" />
    <title>Teacher4.me</title>
    <style>
       
        .has-search .form-control-feedback {
            position: absolute;
            left: 364px;
            top: 24px;
            display: block;
            line-height: 3.9rem;
            color: black;
        }

        .row {
            width: 100%;
        }

        .fa-search:before {
            font-size: 32px;
        }

        .header-search {
            height: 68px !important;
            border-radius: 50px;
        }

        .text-aligh-righ {
            text-align: right;
        }

        .add-button {
            padding: 14px;
            background-color: #f1f1f1;
            border-radius: 24px;
            background-color: #8c52ff;
            font-weight: 700;
        }

        .ml-12 {
            margin-left: 12px;
        }

        .justify-content-flex-end {
            justify-content: flex-end;
        }
        .my-input{
            position: relative;
        }
        .my-input .form-control-feedback-new{
            position: absolute;
            top: 17px;
            right: 15px;
            z-index: 999;
        }
        .navbar
        {
            padding: 14px 0 !important;
            z-index: 555;
        }

        @media (max-width: 576px) {
            .home-sec {
            position: absolute;
            top: 56%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
            }

            .sort-select{
            display: block !important;
            }
            .sort{
                display: none !important;
            }

            .header-search {
            height: 60px !important;
            border-radius: 50px;
            }

            .home-button
            {
                font-size: 12px;
            }
            .add-button {
                font-size: 13px !important;
                font-weight: 400 !important;
            }
            .social-btn
            {
                margin-top: 10px !important;
            }
            .login-button
            {
                font-size: 14px !important;
                font-weight: 400 !important;
                line-height: 2.4;
               
            }
            .login-nav-btn
            {
                margin-top: 20px !important;
            }

            #createForm label {
            color: #fff;
            font-weight: 800;
            margin: 15px;
            font-size: 16px;
            }
            #passwordForm input {
            text-align: center;
            font-size: 16px !important;
            font-weight: 600 !important;
            }

            #profileForm .border-right-line {
            border-right: unset !important;
            }
            #profileForm {
            padding: unset !important;
            }
            #profileForm .logo {
            width: 80px;
            position: absolute;
            right: 48px;
            top: 120px;
            display: none;
            }

            #profileForm .btn-submit {
            margin-top: 20px;
            margin-bottom: 20px;
            }
            .profile-section
            {
                margin:40px 20px !important;
            }
            .pricing-section .card
            {
            margin:20px 0 !important;
            }

            .width-featured {
            width: 34px !important;
            }
            .detail-button-text {
            background-color: #ffde59;
            padding: 8px 25px;
            margin-top: -35px;
            margin-left: 25px;
            border-radius: 25px;
            z-index: 1;
            }

            .parent-section {
            position: absolute;
            top: 14% !important;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            }
            .btn-teacher
            {
                margin-top: 210px !important;
                
            }
            .white-box
            {
                margin-top:20px;
            }
            .upgrade-button {
            position: relative;
            top: 2px !important;
            }
            .margin-top-bottom
            {
                margin-top: 40px;
                margin-bottom: 40px;
            }
            .search-seaction {
            margin: 5px !important;
            }
            .search-bar
            {
                text-align: center;
                margin-top:25px;
            }
            .price-div
            {
                text-align: center;
                margin-bottom:20px;
            }
            .price-div a{
                margin-top: 15px;
            
            }
            
            .teacher-profile-image
            {
            height: 100px !important;width: 100px !important;object-fit: fill;
            }

            #teacherProfiles span{
                display: block;
                margin:10px 0;
            }
        }
        // Medium devices (tablets, 768px and up)
        @media (min-width: 768px) {
            #profileForm .border-right-line {
            border-right: unset !important;
            }
            #profileForm {
            padding: unset !important;
            }
            #profileForm .logo {
            width: 80px;
            position: absolute;
            right: 48px;
            top: 120px;
            display: none;
            }
            
            #profileForm .btn-submit {
            margin-top: 20px;
            margin-bottom: 20px;
            }
            
         }
         @media (min-width: 992px) { 
            #profileForm .border-right-line {
            border-right: unset !important;
            }
            #profileForm {
            padding: unset !important;
            }
            #profileForm .logo {
            width: 80px;
            position: absolute;
            right: 48px;
            top: 120px;
            display: none;
            }
            
            #profileForm .btn-submit {
            margin-top: 20px;
            margin-bottom: 20px;
            }
          }
         @media (max-width: 992px) { 
            #profileForm .border-right-line {
            border-right: unset !important;
            }
            #profileForm {
            padding: unset !important;
            }
            #profileForm .logo {
            width: 80px;
            position: absolute;
            right: 48px;
            top: 120px;
            display: none;
            }
            
            #profileForm .btn-submit {
            margin-top: 20px;
            margin-bottom: 20px;
            }
          }
    </style>
</head>

<body>
    <section class="top-nav">
        <nav class="navbar" style=" background-color: #6b8ea4 !important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="" id="teacherProfileSearchForm" method="POST">
                            @csrf
                            <div>
                                <div class="form-group my-input">
                                    <span class="fa fa-search form-control-feedback-new"></span>
                                    <input type="text" name="teacher_name"
                                        value="{{ isset($teacher_name) ? $teacher_name : '' }}"
                                        id="teacherProfileSearch" autocomplete="off" class="form-control header-search"
                                        id="search" placeholder="find a teacher">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <div class="social-btn display-flex mt-2 justify-content-flex-end">
                            @if (!Auth::check())
                            <div class="add-button">
                                <a href="/create-teacher" style="color: black;text-decoration:none;">
                                    <div>
                                        <i class="fa fa-plus"></i>
                                        Add My Teacher Profile
                                    </div>

                                </a>

                            </div>
                            @endif
                            @if (!Auth::check())
                            <a href="/login" class="btn login-button ml-12"> LOG IN </a>
                            @endif
                            @if (Auth::check())
                            <a href="{{ auth()->user()->account_type == 'Free' || auth()->user()->account_type == 'Unpaid' ? '/free-dashboard' : '/premium-dashboard' }}"
                                class="btn login-button ml-12"> DASHBOARD </a>
                            @endif
                        </div>

                    </div>
                </div>


            </div>
        </nav>
    </section>