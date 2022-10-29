@include('layouts.frontend.head')
<style>
    .pricing-section {
        background-color: #586e82;
        height: auto;
        margin: 28px 56px;
        border-radius: 20px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;

    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: #586e82;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #fff;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #fff;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    span {
        font-weight: 400;
        position: relative;
        top: 5px;
        right: 5px;
    }

    .anual-toggle {
        left: 5px;
    }

    .text-2bd67c {
        color: #2bd67c;
    }

    .text-fff {
        color: #fff;
    }

    .fa-check:before {
        content: "\f00c";
        position: relative;
        left: 3px;
        top: 2px;
    }

    .fa-check {
        height: 22px;
        width: 22px;
        border-radius: 50%;
        color: #fff;
        background-color: #2bd67c;
        margin-top: 10px;
        margin-right: 5px;
    }

    .fa-times:before {
        position: relative;
        left: 5px;
        top: 2px;
    }

    .fa-times {
        height: 22px;
        width: 22px;
        border-radius: 50%;
        color: #fff;
        background-color: #fb5623;
        margin-top: 10px;
        margin-right: 5px;
    }

    .price-header {
        background-color: #586e82;
        padding: 20px;
        border-radius: 25px;
        margin-top: 0px;
        text-align: center;
        color: #fff;
        font-weight: 700;
    }

    .price-header-2bd67c {
        background-color: #2bd67c;
        padding: 20px;
        border-radius: 25px;
        margin-top: 0px;
        text-align: center;
        color: #fff;
        font-weight: 700;
    }

    .text-black {
        color: black;
    }

    .card {
        padding: 20px;
        margin: 5px 22px 50px 22px;
        border-radius: 20px;
    }

    .card div {
        margin-top: 5px;
    }

    .go-button {
        padding: 5px;
        background-color: #2bd67c;
        border-radius: 50%;
        text-decoration: none;
        color: #fff;
    }
</style>
<div class="banner">
    <section class="pricing-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center;">
                            <div class="home-div">
                                <img src="{{ URL::asset('frontend/image/image1.png') }}"
                                    style="margin-top: -52px;width:310px" alt="">
                            </div>
                            <div class="form-group"
                                style="position: relative;
                            bottom: 50px;text-align:center">
                                <span class="montly-toggle text-fff"><b>Montly</b></span>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                                <span class="anual-toggle text-2bd67c"><b>Anually</b></span>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="card">
                                <div class="price-header" style="padding:42px 20px 46px">0.00 p/m</div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2">Basic Website</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times"></i>
                                    <div class="m-2"> Add payment links </div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times"></i>
                                    <div class="m-2"> Add booking Callendar</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times"></i>
                                    <div class="m-2"> Feature an Intro Video</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times" style="width:30px !important"></i>
                                    <div class="m-2"> Be featured in search and ad
                                        campaigns</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times"></i>
                                    <div class="m-2"> Receive Reviews</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-times"></i>
                                    <div class="m-2"> No ADS </div>
                                </div>
                                @if (Auth::check())
                                    <div class="text-center" style="margin-top:12px;">
                                        <a href="javascript:void(0)">Selected</a>
                                    </div>
                                @else
                                    <div class="text-center" style="margin-top:12px;">
                                        <a href="/get-basic-plan">GET BASIC</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="price-header-2bd67c ">
                                    <div class="choice-price">$ 4.50 p/m</div>
                                    <p class="text-black choice">$54 per Year</p>
                                </div>

                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2">Basic Website</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2"> Add payment links </div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2"> Add booking Callendar</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2"> Feature an Intro Video</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check" style="width:30px;"></i>
                                    <div class="m-2"> Be featured in search and ad
                                        campaigns</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2"> Receive Reviews</div>
                                </div>
                                <div class="display-flex">
                                    <i class="fa fa-check"></i>
                                    <div class="m-2"> No ADS </div>
                                </div>
                                <form action="{{ route('get_premium_plan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="Yearly">
                                    <div class="text-center mt-3">
                                        <button type="submit" class="go-button">GO</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
</div>


<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>
<script>
    $("input[type='checkbox']").change(function() {
        if (this.checked) {
            $(".choice-price").html("$4.50 p/m")
            $(".choice").html("$54 per Year")
            $(".anual-toggle").addClass("text-2bd67c")
            $(".anual-toggle").removeClass("text-fff")
            $(".montly-toggle").removeClass("text-2bd67c")
            $(".montly-toggle").addClass("text-fff")
            $('input[name="plan"]').val("Yearly")
        } else {
            $(".choice-price").html("$8.50 p/m")
            $(".choice").html("Billed monthly")
            $(".anual-toggle").removeClass("text-2bd67c")
            $(".anual-toggle").addClass("text-fff")
            $(".montly-toggle").removeClass("text-fff")
            $(".montly-toggle").addClass("text-2bd67c")
            $('input[name="plan"]').val("Monthly")
        }

    });
</script>
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
