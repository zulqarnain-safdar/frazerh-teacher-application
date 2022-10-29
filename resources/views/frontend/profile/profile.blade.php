@foreach ($profiles as $profile)
    <div class="wrap-box">
        <div class="profile-box">
            <div class="row">
                <div class="col-lg-2">
                    <div class="text-center">
                        <img class="mb-2" src="{{ URL::asset('storage/profiles/') }}/{{ $profile->profile_image }}"
                            style="border-radius:50%" height="100" width="100" alt="">
                        <span class="rating"><i
                                class="fa fa-star mr-2"></i>{{ number_format((float) $profile->reviews->avg('rating'), 1, '.', '') }}
                        </span>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="display-flex flex-space-between">
                        <div class="display-flex">
                            <div>
                                <h3>{{ $profile->teacher_name }}</h3>
                            </div>
                            <div style="margin-left: 10px">
                                <img src="{{ URL::asset('frontend/icons/6.png') }}" height="23" alt="">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                        {{-- <div>
                            <i class="fa fa-heart-o"></i>
                        </div> --}}
                    </div>
                    <p>Community Tutor</p>
                    <div class="display-flex">
                        <div class="display-flex">
                            <p>Speaks: </p>
                            <h5 class="ml-5">{{ implode(', ', $profile->languages) }}</h5>
                        </div>
                        <div class="display-flex ml-5">
                            <p class="native-text">Native</p>
                            <h5 class="ml-5">English</h5>
                        </div>
                    </div>
                    <p><b>{{ $profile->about_me }}</b></p>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-5" style="margin-top:8px">
                                    <b>THB {{ $profile->lesson_price }}</b> / Hour
                                </div>
                                <div class="col-lg-7">
                                    <a href="/{{ $profile->profile_name }}" class="btn btn-primary">Contact
                                        Teacher</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
