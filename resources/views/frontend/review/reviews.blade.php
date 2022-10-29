@include('layouts.frontend.head')
<style>
    .review {
        position: relative;
        bottom: 90px;
        background-color: #fff;
        padding: 20px;
        border-radius: 40px;
    }

    .justify-content-flex-start {
        justify-content: flex-start;
    }

    .fa-star {
        font-size: 32px;
        color: #e4cb62;
    }

    .margin-left-10 {
        margin-left: 10px;
    }

    .black-button {
        border: none;
        outline: none;
        background-color: black;
        color: white;
        font-weight: 700;
        text-transform: uppercase !important;
        border-radius: 33px !important;
        padding: 8px 24px;
    }

    .green-button {
        border: none;
        outline: none;
        background-color: #2bd67c;
        color: black;
        font-weight: 700;
        text-transform: uppercase !important;
        border-radius: 33px !important;
        padding: 8px 24px;
    }

    .green-button:hover {
        color: black;
    }

    .red-button {
        border: none;
        outline: none;
        background-color: #ec2323;
        color: black;
        font-weight: 700;
        text-transform: uppercase !important;
        border-radius: 33px !important;
        padding: 8px 30px;
    }

    .red-button:hover {
        color: black;

    }

    .black-button:hover {
        color: #fff;
    }

    .badge-success {
        background-color: #28a745;
        padding: 12px 22px;
    }

    .badge-danger {
        background-color: #dc3545;
        padding: 12px 22px;
    }
</style>
<div class="banner">
    <section class="password-section">
        <div>
            <a href="javascript::void(0)" class="btn password-button-text"><b>REVIEWS</b></a>
        </div>
        <div class="container-fluid text-center" style="position: relative;
    bottom: 22px;">
            <div class="row">
                <div class="col-12">
                    <div class="home-div" style="position: relative;bottom:50px">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" style="width:250px" alt="">
                    </div>

                </div>
            </div>
            <div class="row" style="position: relative;bottom:125px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <a href="javascript::void(0)"
                            class="btn button-text-3cf7f7"><b>/{{ auth()->user()->profile()->first()->profile_name }}</b></a>
                    </div>
                </div>
            </div>
            <div class="review">
                @php
                    $reviews = auth()->user()->profile->reviews;
                @endphp
                @if ($reviews->isNotEmpty())
                    @foreach ($reviews as $review)
                        <div class="row mb-5">
                            <div class="col-lg-2">
                                <img src="{{ URL::asset('storage/profiles/') }}/{{ $review->image }}"
                                    style="border-radius:50%" height="100" width="100" alt="">
                            </div>
                            <div class="col-lg-2">
                                <div class="text-left mb-2"><a href="javascript::void(0)"
                                        class="btn black-button">{{ $review->name }}</a>
                                </div>

                                <div class="display-flex justify-content-flex-start">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $review->rating)
                                            <div @if ($i > 0) class="margin-left-10" @endif>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        @else
                                            <div class="margin-left-10">
                                                <i class="fa fa-star" style="color:#060606"></i>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-left">{{ $review->review }}</p>
                            </div>
                            <div class="col-lg-2">
                                @if ($review->status == null)
                                    <a href="/approve/review/{{ $review->id }}" class="btn green-button">Approve</a>
                                    <a href="/decline/review/{{ $review->id }}"
                                        class="btn red-button mt-2">Decline</a>
                                @else
                                    <span
                                        class="badge badge-pill {{ $review->status == 'Approved' ? 'badge-success' : 'badge-danger' }}">{{ $review->status == 'Approved' ? 'Approved' : 'Declined' }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</div>


<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>
<script>
    $('#teacherProfileSearch').keypress(function (e) {
        var key = e.which;
        var value = e.value
        if(key == 13) // the enter key code
        {
            let href = '/search-teacher-by-username'
            $('#teacherProfileSearchForm').attr('action', href);
        }
    });
</script>

</body>

</html>
