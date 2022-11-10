@include('layouts.frontend.head1')
<style>
    .search-seaction {
        margin-top: 20px;
    }

    .box {
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .box1 {
        padding: 28px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .add {
        padding: 30px;
        background-color: #d9d9d9;
        border-radius: 24px;
        margin-top: 15px;
    }



    .ml-5 {
        margin-left: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .email-text {
        font-size: 22px;
        margin-left: 10px;
        word-wrap: anywhere;
    }

    .img-fluid {
        width: 100%;
        height: 60vh;
        object-fit: cover;
    }

    .img-res {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    p {
        text-align: justify;
    }

    .text-right {
        text-align: right;
    }

    .fa-star {
        color: #ffc319;
    }

    .rating {
        color: #ffc319;
    }

    .margin-right-50 {
        margin-right: 50px;
    }

    .margin-right-22 {
        margin-right: 22px;
    }
    .ml-15
    {
        margin-left: 15px;
    }
</style>
<div>
    <section class="search-seaction">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                    <div class="box">
                        <img src="{{ URL::asset('storage/covers/') }}/{{ $profile->cover_photo }}" class="img-fluid"
                            alt="">
                        <div class="mt-3 display-flex justify-content-space-between">
                            <div class="display-flex">
                                <h4><b>{{ $profile->teacher_name }}</b></h4><span class="ml-15 font-10">from {{ $profile->nationality }}</span>
                            </div>
                            <div class="margin-right-22">
                                <h4>Speaks: {{ implode(', ', $profile->languages) }}</h4>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-2">
                                <div class="text-center">
                                    <img src="{{ URL::asset('storage/profiles/') }}/{{ $profile->profile_image }}"
                                        style="border-radius:50%" height="80" width="80" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="headline"><b>{{ $profile->headline }}</b></h5>
                                <h5><b>Teaches: {{ implode(', ', $profile->subjects_taught) }}</b></h5>
                                <ul>
                                    @foreach ($profile->qualifications as $qualification)
                                        <li>{{ $qualification }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="col-lg-5">
                                <div class="text-right margin-right-50">
                                    <div class="mb-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span class="rating">4.5</span>
                                    </div>
                                    <h5 class="mb-2">415 LESSONS</h5>
                                    <h5>104 STUDENTS</h5>
                                </div>
                            </div> --}}
                        </div>
                        <hr>
                        <h2 class="mt-2">About Me</h2>
                        <p>{!! $profile->about_me !!}</p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box1">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="mt-20 ml-5">
                                    <h4>Contact Teacher</h4>
                                    <div class="display-flex">
                            
                                        <div> <img src="{{ URL::asset('frontend/icons/9.png') }}" height="32" alt=""></div>
                                        <div>
                                            <p class="email-text">{{ $profile->email }}</p>
                                        </div>
                            
                            
                                    </div>
                                </div>
                            </div>
                            @foreach ($free_ads as $add)
                            <div class="add">
                                <a href="{{ $add->link }}">
                                    <img src="{{ URL::asset('storage/ads') }}/{{ $add->image }}" class="img-res" alt="">
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>

        </div>
    </section>


</div>
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

</body>

</html>
