@include('layouts.frontend.head')
<style>
    .white-box {
        background-color: #f9fbfc;
        border-radius: 20px;
        font-weight: 500;
    }

    .padding-60 {
        padding: 60px;
    }

    .padding-72 {
        padding: 72px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .premium-button-text {
        background-color: #ffde59;
        padding: 12px 72px;
        margin-top: 22px;
        margin-left: 5px;
        border-radius: 25px;
        color: black;
        font-weight: 700;
    }

    .upgrade-button {
        position: relative;
        top: 40px;
    }
</style>
<div class="banner">
    <section class="password-section">
        <div class="display-flex justify-content-space-between">
            <div>
                <a href="javascript::void(0)" class="btn logout-button-text"><b>FREE DASHBOARD</b></a>
            </div>
            <div>
                <a href="javascript::void(0)" class="btn logout-button-text"><b>LOGOUT</b></a>
            </div>

        </div>
        <div class="container-fluid text-center" style="position: relative;
    bottom: 72px;">
            <div class="row">
                <div class="col-12">
                    <div class="home-div">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" style="width:250px" alt="">
                    </div>
                </div>
            </div>
            <div class="row" style="position: relative;bottom:62px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <a href="javascript::void(0)"
                            class="btn button-text-3cf7f7"><b>/{{ auth()->user()->profile()->first()->profile_name }}</b></a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 2px 72px;">
                <div class="col-lg-4">
                    <div class="white-box padding-72">
                        <a href="/edit-teacher-profile">Edit My Profile</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="white-box padding-60">
                        <a href="/reset-password">Reset<br>Password</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- <div class="white-box padding-72">
                        <a href="/">LOGOUT</a>
                    </div> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="white-box padding-72">
                            <a href="javascript::void(0)"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-5 upgrade-button">
                <img src="{{ URL::asset('frontend/icons/4.png') }}" style="width:100px" alt="">
                <a href="/pricing" class="btn premium-button-text"><b>UPGRADE</b></a>

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
